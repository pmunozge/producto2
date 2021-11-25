<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;


class userControl extends Controller
{
    public function index($id)
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

    

        $users = DB::table('students')
            ->select('students.id','students.name','asignaturasestudiantes.idasignatura')
            ->where('students.id','=',$id)
            ->join('asignaturasestudiantes', 'asignaturasestudiantes.idestudiante', '=', 'students.id')
            ->join('courses', 'courses.id_course', '=', 'asignaturasestudiantes.idasignatura')
            ->join('schedule', 'id_class', '=', 'courses.id_course')
            ->select('students.id','students.name','asignaturasestudiantes.idasignatura', 'courses.name as nombreAsignatura','schedule.time_start as start', 'schedule.time_end as end')
            ->get();


        return view('usuario', ['users' => $users])->withId($id);


       //ORM
        //$users = User::all();
        //return view('usuario', ['users' => $users]); 

    }

    public function perfil($id)
    {
    //$cursos = DB::table('example2')->get();
    //return view('perfil');

    $users = DB::table('users')
    ->select('id','name','email','password')
    ->where('id','=',$id)
    ->get();

return view('perfil', ['users' => $users])->withId($id);

    }

    public function registro()
    {
    //$cursos = DB::table('example2')->get();
    return view('registro');
    }

    public function admin()
    {
    //$cursos = DB::table('example2')->get();
    //return view('admin');
    $cursos = DB::table('example2')->get();
    return view('admin', ['cursos' => $cursos]);
    }

}