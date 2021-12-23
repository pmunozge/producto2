@extends('templateperfil')

@section('perfil')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <style type="text/css">
        body,th{
           
            color: #000000;
        }
        td{
           
        }
        table{
          
    
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
        <tr >
            <td align="center" valign="middle">
                <table class="table-bordered" width=100% border="0" cellpadding="3" cellspacing="3" bgcolor="#FFFFFF">
                <tr>
                              <td height="25" colspan="5" align="left" valign="middle" bgcolor="#FF9900" class="style2">
                                  <div align="center">
                                      <strong>Panel de perfil</strong>

                                  </div>
                              </td>
                          </tr>
               <tr>
                  <Th style="width:5%" align="center" valign="middle" class="style1">ID Usuario</Th>
                  <th style="width:25%" align="center" valign="middle" class="style1">Nombre usuario</Th>
                  <th style="width:25%" align="center" valign="middle" class="style1">Correo</Th>
                  <th style="width:25%" align="center" valign="middle" class="style1">Password</Th>
               </TR>

               @foreach ($users as $user)
               
               <form action= "/asignatura" method ="POST">
               @csrf
               
               <tr>
                        <td  align="middle" valign="middle" class="style1">{{$user->id}}</td>
                        <td align="middle" valign="middle" class="style1">{{$user->name}}</td>
                        <td align="middle" valign="middle" class="style1">{{$user->email}}</td>
                        <td align="middle" valign="middle" class="style1">{{$user->password}}</td>     
                @endforeach
               </tr>
               </form>

               <tr>
                  <td align="middle" valign="middle" class="style1">-
                  </td>
              <td align="middle" valign="middle" class="style1">
                           <form action= "/perfil" method ="POST">
                        @csrf

                              <input style="width:100px" type="text" name="nombre" placeholder="Editar" ><button  class="btn btn-primary" type="submit"  name="submit" value="nombre"> Editar</button>
                        </td>
      
         

                   <td align="middle" valign="middle" class="style1">
                      <input style="width:100px" type="text" name="correo"  placeholder="Editar" ><button  class="btn btn-primary" type="submit"  name="submit" value="correo"> Editar</button>
                  </td>
              <td align="middle" valign="middle" class="style1">
               <input type="text" name="pass"  placeholder="Editar" >
               <button  class="btn btn-primary" type="submit"  name="submit" value="pass"> Editar</button>
             </td>  
             </tr>
    </tr>


               </table>
            <p>
            </td>
         <tr>
      </table>
   </div>
</body>


<!--
<div style="text-align:center;">
    <h1>Pagina de Perfiles</h1>


    <TABLE BORDER="5"    WIDTH="90%"   CELLPADDING="4" CELLSPACING="3" class="center">
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

    <tr>
       <td>
          -
       </td>
      <td>
         <form action= "/perfil" method ="POST">
         @csrf
         <input type="text" name="nombre" placeholder="Editar" ><button type="submit"  name="submit" value="nombre"> Editar</button>
         
      </td>
      <td>
      
         
         <input type="text" name="correo"  placeholder="Editar" ><button type="submit"  name="submit" value="correo"> Editar</button>
         
       </td>
       <td>
       
         
         <input type="text" name="pass"  placeholder="Editar" ><button type="submit"  name="submit" value="pass"> Editar</button>
         
       </td>  
    </tr>
    @endforeach
   </TR>
   
</TABLE>

      -->

@endsection