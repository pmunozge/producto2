<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Middleware;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;



class userControl extends Controller
{
    //public function index($id)
    public function index()
    {
       //$users = DB::table('example2')->get();
       //return view('usuario', ['cursos' => $cursos]);
       //return view('usuario', ['cursos' => $cursos])->withId($id);

        //Query builder
        //$users = DB::table('students')->get();
        //return view('usuario', ['users' => $users])->withId($id);

        //Query builder
        /*$users = DB::table('students')
            ->where('id','=',1)
            ->get();*/

    
/*
        $users = DB::table('students')
            ->select('students.id','students.name','asignaturasestudiantes.idasignatura')
            ->where('students.id','=',auth()->user()->id)
            ->join('asignaturasestudiantes', 'asignaturasestudiantes.idestudiante', '=', 'students.id')
            ->join('courses', 'courses.id_course', '=', 'asignaturasestudiantes.idasignatura')
            ->join('schedule', 'id_class', '=', 'courses.id_course')
            ->select('students.id','students.name','asignaturasestudiantes.idasignatura', 'courses.name as nombreAsignatura','schedule.time_start as start', 'schedule.time_end as end')
            ->get();*/

            $users = DB::table('students')
            ->select('students.id','students.name','enrollment.id_course')
            ->where('students.id','=',auth()->user()->id)
            ->join('enrollment', 'enrollment.id_student', '=', 'students.id')
            ->join('courses', 'courses.id_course', '=', 'enrollment.id_course')
            ->join('schedule', 'id_class', '=', 'courses.id_course')
            ->select('students.id','students.name','enrollment.id_course', 'courses.name as nombreAsignatura','schedule.time_start as start', 'schedule.time_end as end')
         ->get();


        //return view('usuario', ['users' => $users])->withId(auth()->user()->id);
        return view('usuario', ['users' => $users])->withId(auth());


       //ORM
        //$users = User::all();
        //return view('usuario', ['users' => $users]); 

    }

    //public function perfil($id)
    public function perfil()
    {
    //$cursos = DB::table('example2')->get();
    //return view('perfil');

    $users = DB::table('users')
    ->select('id','name','email','password')
    ->where('id','=',auth()->user()->id)
    ->get();

    //return view('perfil', ['users' => $users])->withId($id);
    return view('perfil', ['users' => $users]);
    }

    function editarUsuario(Request $req){

        switch($req->get('submit')){
            case 'nombre': 
                DB::table('users')
                ->where('id',auth()->user()->id)
                ->update(
                [
                    'name'=>$req->nombre
                ]
                );
                break;
            case 'correo':    
                DB::table('users')
                ->where('id',auth()->user()->id)
                ->update(
                [
                    'email'=>$req->correo
                ]
                );
                
            break;

            case 'pass': 
                $hashed = Hash::make($req->pass);   
                DB::table('users')
                ->where('id',auth()->user()->id)
                ->update(
                [
                    'password'=>$hashed
                ]
                );
            break;
         }
         return $this->perfil();

        }
   

    public function registro()
    {
    //$cursos = DB::table('example2')->get();
    return view('registro');
    }

    public function check(Request $request)
    {  
        $user = $request->username;
        $pass  = $request->password;
 
        if (Auth::attempt(array('name' => $user, 'password' => $pass)))
        {
            
          /*$users = DB::table('students')
            ->select('students.id','students.name','enrollment.id_course')
            ->where('students.id','=',auth()->user()->id)
            ->join('enrollment', 'enrollment.id_student', '=', 'students.id')
            ->join('courses', 'courses.id_course', '=', 'enrollment.id_course')
            ->join('schedule', 'id_class', '=', 'courses.id_course')
            ->select('students.id','students.name','enrollment.id_course', 'courses.name as nombreAsignatura','schedule.time_start as start', 'schedule.time_end as end')
            ->get();*/


           /* select students.id,students.name, enrollment.id_course, 
        Courses.name as nombreAsignatura,schedule.time_start as start, schedule.time_end as end, class.id_class, exams.mark, exams.id_student
        from students
        join enrollment ON enrollment.id_student = students.id
        join courses ON courses.id_course = enrollment.id_course
        join schedule ON id_class = courses.id_course
        join class on class.id_course=courses.id_course
        join exams on exams.id_class= class.id_class
        where students.id=1 and exams.id_student=1 */

            $users = DB::table('students')
            ->select('students.id','students.name', 'enrollment.id_course', 
            'courses.name as nombreAsignatura','schedule.time_start as start', 'schedule.time_end as end', 'class.id_class', 'exams.mark as mark', 'exams.id_student')
            ->join('enrollment', 'enrollment.id_student', '=', 'students.id')
            ->join('courses', 'courses.id_course', '=', 'enrollment.id_course')
            ->join('schedule', 'schedule.id_class', '=', 'courses.id_course')
            ->join('class', 'class.id_course', '=', 'courses.id_course')  
            ->join('exams', 'exams.id_class', '=', 'class.id_class')  
            ->where('students.id','=',auth()->user()->id)
            ->where('exams.id_student','=',auth()->user()->id)
            ->get();




            if(auth()->user()->id<>0){
                return view('usuario', ['users' => $users])->withId(auth()->user()->id);
            }else{
                return $this->admin();
            }
        }
        else
         {  
             session()->flash('error', 'Usuario o Pass invalidos');
             return back()->withInput();
         }  
    }
    /*select courses.name,teachers.name
    FROM class
    inner join courses on courses.id_course= class.id_course
    inner join teachers ON teachers.id_teacher=class.id_teacher;*/

    public function admin()
    {
    //$cursos = DB::table('example2')->get();
    //return view('admin');
    //$cursos = DB::table('courses')->get();
        $cursos = DB::table('class')
        ->select ('courses.name as nombreAsignatura','teachers.name as profesor', 'schedule.time_start', 'schedule.time_end')
        ->from ('class')
        ->join ('courses', 'courses.id_course','=','class.id_course')
        ->join ('teachers', 'teachers.id_teacher','=','class.id_teacher')
        ->join ('schedule', 'schedule.id_class','=','class.id_schedule')
        ->orderBy('class.id_class')
        ->get();


    return view('admin', ['cursos' => $cursos]);
    }


    function añadirAsignatura(Request $req){

        
        $timestamp = date("Y-m-d", strtotime('2020-12-20'));
  
        //añadir la asignatura
        $idCursoInsertado= DB::table('courses')->insertGetId(
            ['name' => $req->asignatura,'description'=>' ','date_start'=>$timestamp,'date_end'=>$timestamp, 'active'=>1]
        );

        //añadir la clase para vincularla a un profesor y a un tramo horario
        DB::table('class')
        ->insert([
            //['name' => $req->asignatura,'description'=>' ','date_start'=>$timestamp,'date_end'=>$timestamp, 'active'=>1]
            ['id_teacher' =>$req->profesor,'id_course'=>$idCursoInsertado,'id_schedule'=>$req->tramoHorario,'name'=>' ', 'color'=>'']
        ]);

    /*DB::table('courses')
    ->where('id',$idInsertado)
    ->update(
        [
            //'name'=>'actualizado'
            'name'=>$req->asignatura
        ]
        );*/
        
        /*$cursos = DB::table('example2')->get();
        return view('admin', ['cursos' => $cursos]);*/
        return $this->admin();
    }

    public function registrarUsuario()
    {
        return view('register');
    }

    public function checkRegistrar(Request $request)
    {  
        $user = $request->username;
        $pass  = $request->password;
        $hashed = Hash::make($request->password);

        //comprobacion de que el nombre no esta en la base de datos
        $aparicion = DB::table('users')
        ->select('name')
        ->where('name','=',$user)
        ->get()->count();
 
        if ($aparicion==0)
        {
            DB::table('users')
            ->insert([
            ['name' =>$user,'email'=>' ','password'=>$hashed]
                    ]);
            return view('registro');

        }
        else
         {  
             session()->flash('error', 'Usuario o Pass invalidos');
             return back()->withInput();
         }  
    }

    public function showAsignatura(Request $req)
    {  
        $asignatura = $req->get('submit');
        //se le va a pasar lo que sea y se mostrara, como los estudiantes que estudian en esa asignatura
        /*SELECT courses.id_course FROM courses
            where courses.name='Asignatura1'*/

           /*SELECT students.name
FROM enrollment
JOIN students on students.id = enrollment.id_student
WHERE enrollment.id_course=1;*/
/*SELECT students.name, exams.mark
from enrollment
JOIN students on students.id = enrollment.id_student
JOIN EXAMS ON exams.id_student = enrollment.id_student
WHERE enrollment.id_course=1;*/
/*SELECT students.name, exams.id_class, exams.mark, class.id_course
from enrollment
JOIN students on students.id = enrollment.id_student
JOIN EXAMS ON exams.id_student = enrollment.id_student
JOIN class ON class.id_class = exams.id_class
WHERE enrollment.id_course=1 and class.id_course=1;*/

        $idBuscado = DB::table('courses')
        ->select('courses.id_course as id')
        ->FROM('courses')
        ->where('courses.name','=',strval($asignatura))
        ->get();
        $idInt= strval($idBuscado[0]->id);
        
        
       /* $alumnos = DB::table('enrollment')
        ->select('students.name as nombre', 'exams.mark as nota')
        ->FROM('enrollment')
        ->join('students', 'students.id', '=', 'enrollment.id_student')
        ->join('exams', 'exams.id_student', '=', 'enrollment.id_student')
        ->where('enrollment.id_course','=',  $idInt)   
        ->get();*/

        $alumnos =  DB::table('enrollment')
        ->select('students.name as nombre','exams.id_class', 'exams.mark as nota')
        ->FROM('enrollment')
        ->join('students', 'students.id', '=', 'enrollment.id_student')
        ->join('exams', 'exams.id_student', '=', 'enrollment.id_student')
        ->join('class','class.id_class', '=', 'exams.id_class')
        ->where('enrollment.id_course','=',  $idInt)   
        ->where('class.id_course','=',$idInt)   
        ->get();

        return view('asignatura',['alumnos' => $alumnos,'nombreAsignatura'=>$asignatura]);

        
        
         
        
    }


}  



