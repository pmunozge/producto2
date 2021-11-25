@extends('template')

@section('usuario')
<div style="text-align:center;">
    <h1>Pagina de usuarios</h1>
    <p> Sesión iniciada del usuario con ID: {{$users[0]->id}} 
    <p> Con nombre: {{$users[0]->name}} 
 <!--   <p> Asignaturas alumno:

    @foreach ($users as $user)
    <p>{{$user->idasignatura}}:{{$user->nombreAsignatura}} Empieza a las: {{$user->start}} y termina a las: {{$user->end}}
    @endforeach

    <table class="default">
    <tr> 
        <td>ID Asignatura</td>
        <td>Nombre Asignatura</td>
        <td>Hora Inicio</td>
        <td>Hora Fin</td>
    </tr>


    @foreach ($users as $user)
    <tr>
            <td> {{$user->idasignatura}} </td>
            <td> {{$user->nombreAsignatura}}</td>
            <td> {{$user->start}}</td>
            <td> {{$user->end}}</td>
    </tr>
    @endforeach
    </table>
-->

    <TABLE BORDER="5"    WIDTH="50%"   CELLPADDING="4" CELLSPACING="3" class="center">
   <TR>
      <TH COLSPAN="2"><BR><H3>HORARIO DE ASIGNATURAS</H3>
      </TH>
   </TR>
   <TR>
      <TH>ID Asignatura</TH>
      <TH>Nombre Asignatura</TH>
      <TH>Hora Inicio</TH>
      <TH>Hora Fin</TH>
   </TR>
   @foreach ($users as $user)
    <tr>
            <td> {{$user->idasignatura}} </td>
            <td> {{$user->nombreAsignatura}}</td>
            <td> {{$user->start}}</td>
            <td> {{$user->end}}</td>
    </tr>
    @endforeach
   </TR>
</TABLE>
<p>
    <p><p>

    <form action="/perfil/1"        >  
        <input type="submit" value="Ir a perfil 1" />
    </form>
    <p>
    <p><p>

    <form action="/perfil/2"        >  
        <input type="submit" value="Ir a perfil 2" />
    </form>

    

</a>


</div>
@endsection