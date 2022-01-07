<form action="/products/comments/{{$productid}}/delete" method="post">
    @csrf
    @method("delete")
    <button type="submit"><span class="text-red-600 fas fa-trash ml-4 mb-1"></span></button>
</form>
