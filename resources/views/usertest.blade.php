<form action="producttest/1/edit" method="post">
@csrf
@method('GET')
{{-- @method('delete') --}}
    <button type="submit">Send</button>
</form>