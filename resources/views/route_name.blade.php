<form method="post" action="{{ route('route_name') }}">
    @csrf
    <input type="text" name="field_name">
    <button type="submit">Submit</button>
</form>