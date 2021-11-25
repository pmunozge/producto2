@extends('templateperfil')

@section('perfil')

<div style="text-align:center;">
    <h1>Pagina de Perfiles</h1>


    <TABLE BORDER="5"    WIDTH="50%"   CELLPADDING="4" CELLSPACING="3" class="center">
   <TR>
      <TH COLSPAN="2"><BR><H3>Datos de usuario</H3>
      </TH>
   </TR>
   <TR>
      <TH>ID Usuario</TH>
      <TH>Nombre usuario</TH>
      <TH>Correo</TH>
      <TH>Password</TH>
   </TR>
   @foreach ($users as $user)
    <tr>
            <td> {{$user->id}} </td>
            <td> {{$user->name}}</td>
            <td> {{$user->email}}</td>
            <td> {{$user->password}}</td>
    </tr>
    @endforeach
   </TR>
</TABLE>

@endsection