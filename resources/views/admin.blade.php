
@extends('templateadmin')

@section('admin')
<head>
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

<body>
<div class="container">
    <table width="100%" height="100%" border="0" cellspacing="0" align="center">
        <tr>
            <td align="center" valign="middle">
                <table class="table-bordered" width="350" border="0" cellpadding="3" cellspacing="3" bgcolor="#FFFFFF">
                <tr>
                              <td height="25" colspan="5" align="left" valign="middle" bgcolor="#FF9900" class="style2">
                                  <div align="center">
                                      <strong>ASIGNATURAS</strong>
                                  </div>
                              </td>
                          </tr>
               <tr>
                  <Th  align="center" valign="middle" class="style1">Nombre asignatura</Th>
                  <Th  align="middle" valign="middle" class="style1">Profesor</Th>
                  <Th  align="middle" valign="middle" class="style1">Hora Inicio</Th>
                  <Th  align="middle" valign="middle" class="style1">Hora Fin</Th>
                  <th></th>
               </TR>
              
                
               @foreach ($cursos as $curso)
               <form action= "/asignatura" method ="POST">
               @csrf
               <tr>
                        <td align="middle" valign="middle" class="style1">{{$curso->nombreAsignatura}}</td>
                        <td align="middle" valign="middle" class="style1">{{$curso->profesor}}</td>
                        <td align="middle" valign="middle" class="style1">{{$curso->time_start}}</td>
                        <td align="middle" valign="middle" class="style1">{{$curso->time_end}}</td>
                        <td colspan="1" align="right" valign="middle" class="style1">
                                <button  type="submit" class="btn btn-primary" name='submit' value="{{$curso->nombreAsignatura}}" >Ver</button>
                        </td>
               </tr>
               </form>
               @endforeach
               </TR>
               <tr>
               <form action= "/admin" method ="POST">
                  @csrf   
                  <td align="middle" valign="middle" class="style1"><input type="text" name="asignatura" placeholder="Asingatura" ></td>
                  <td align="middle" valign="middle" class="style1"><input type="number" name="profesor" placeholder="Profesor" > </td>
                  <td align="middle" valign="middle" class="style1"><input type="number" name="tramoHorario" placeholder="Tramo Horario(1,2,3...)" > </td>
                  
                  <td colspan="2" align="right" valign="middle" class="style1">
                        <button type="submit"  class="btn btn-primary"> Añadir</button></td>
                        </td>
               </form>
               </tr>


            </TABLE>
            <p>
            </td>
         <tr>
      </table>
   </div>
</body>




@endsection