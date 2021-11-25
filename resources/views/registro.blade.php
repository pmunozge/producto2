
@extends('templateregistro')

@section('registro')
<p>Pagina de registros<p>

<form action="/user/1">
        <input type="submit" value="Ir al usuario 1" />
</form>
<p><p><p>
<form action="/user/2">
        <input type="submit" value="Ir al usuario 2" />
</form>

@endsection