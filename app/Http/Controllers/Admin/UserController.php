<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('admin.users.index', ['users' => User::all()]); //object users pass to view admin/users/index
        return view('admin.users.index', ['users' => User::paginate(10)]); //
        // The second argument can be replace by " with('users'=> $users) " /$user=User::all()
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $user = User::create($request->except('_token', 'roles'));
    //     // //Vì không có @csrf và roles không lưu trong bảng users: If you attemp=>throw errors
    //     // // roles():relationship , sync: add multiple roles (ngược với attach: chỉ tạo 1 roles), roles: mảng tại bên checkbox
       $user->roles()->sync($request->roles); //Thêm tất cả các roles
        return redirect(route('admin.users.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        return view('admin.users.edit', 
        [
            'roles' => Role::all(),
            'user'=>User::find($id)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Nếu không tìm thấy id thì trả về fail và return về Error 404: Ngăn chặn hacker cố tình dodgy/ delete user dont exist
        $user = User::findOrFail($id);
        $user->update($request->except('_token', 'roles'));
        // sync new roles with DB onto many-to-many relationship
        $user->roles()->sync($request->roles);
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id1)
    {
        // dd($id1);
        User::destroy($id1);
        return redirect(route('admin.users.index'));
    }
}
