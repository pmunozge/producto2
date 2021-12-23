@extends('template')

@section('usuario')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <style type="text/css">
        body,th{
            color: #000000;
        }
        td{
           width: 25%;
        }
        table{
           width:100%;
        }
        body{
            background-color: #F0F0F0;
 
        }
        .style1
        {
            font-family: arial, helvetica, sans-serif;
            font-size: 14px;
            padding: 12px;
            line-height: 25px;
            border-radius: 4px;
            text-decoration: none;
            text-align:center
        }
 
        .style2
        {
            font-family: arial, helvetica, sans-serif;
            font-size: 17px;
            padding: 12px;
            line-height: 25px;
            border-radius: 4px;
            text-decoration: none;
 
        }
 
    </style>
 
 
</head>

<div class="container">
    <table width="100%" height="100%" border="0" cellspacing="0" align="center">
        <tr>
            <td align="center" valign="middle">
                <table class="table-bordered" width="350" border="0" cellpadding="3" cellspacing="3" bgcolor="#FFFFFF">
                <tr>
                              <td height="25" colspan="5" align="left" valign="middle" bgcolor="#FF9900" class="style2">
                                  <div align="center">
                                      @if($users->first())
                                      <strong>Panel de alumno: {{$users[0]->name}}</strong>
                                      @else
                                      <strong>Panel de alumno:</strong>
                                      @endif
                                  </div>
                              </td>
                          </tr>
               <tr>
                  <Th  align="center" valign="middle" class="style1">ID Asginatura</Th>
                  <th align="center" valign="middle" class="style1">Asignatura matriculado</Th>
                  <th align="center" valign="middle" class="style1">Hora inicio</Th>
                  <th align="center" valign="middle" class="style1">Hora fin</Th>
                  <th align="center" valign="middle" class="style1">Nota</Th>
               </TR>


               @if($users->first())
               @foreach ($users as $user)
               
               <form action= "/asignatura" method ="POST">
               @csrf
               
                 <tr>
                        <td align="middle" valign="middle" class="style1">{{$user->id_course}}</td>
                        <td align="middle" valign="middle" class="style1">{{$user->nombreAsignatura}}</td>
                        <td align="middle" valign="middle" class="style1">{{$user->start}}</td>
                        <td align="middle" valign="middle" class="style1">{{$user->end}}</td>
                        <td align="middle" valign="middle" class="style1">{{$user->mark}}</td>
               
                @endforeach
               </tr>
               </form>

               @else
                   <tr>
                   <td align="middle"colspan="5" valign="middle" class="style1">NINGUNA ASINGATURA EN EL ALUMNO
                    </td>
                   </tr>
                         
                @endif

               <tr>
               <td height="25" colspan="5" align="middle" valign="middle" bgcolor="#FFFFFF" class="style2">
                    <form action="/perfil"        >  
                        <button  type="submit" class="btn btn-primary" name='submit' value="Ir a perfil" >Ir a perfil</button>
                    </form>
                    </td>
                 </tr>

            </table>
            <p>
            </td>
         <tr>
      </table>
   </div>
</body>





<!-- 
@if($users->first()) {       
<div style="text-align:center;">
    <h1>Pagina de usuarios</h1>
    <p> Sesión iniciada del usuario con ID: {{$users[0]->id}} 
    <p> Con nombre: {{$users[0]->name}} 
    <p> {{auth()->user()->name}}
 

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
            <td> {{$user->id_course}} </td>
            <td> {{$user->nombreAsignatura}}</td>
            <td> {{$user->start}}</td>
            <td> {{$user->end}}</td>
    </tr>
    @endforeach
   </TR>
</TABLE>
<p>
}
@else
      <td>NINGUNA ASINGATURA EN EL ALUMNO</td>  @endif
<form action="/perfil"        >  
        <input type="submit" value="Ir a perfil" />
        <button  type="submit" class="btn btn-primary" name='submit' value="Ir a perfil" >Ir a perfil</button>
    </form>

    <p><p>

   <form action="/perfil/1"        >  
        <input type="submit" value="Ir a perfil 1" />
    </form>
    <p>
    <p><p>

    <form action="/perfil/2"        >  
        <input type="submit" value="Ir a perfil 2" />
    </form>

    
-->
</a>


</div>
@endsection