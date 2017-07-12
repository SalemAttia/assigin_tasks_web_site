<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Session;
use DB;
use Mail;
use App\Task;

use App\Http\Requests\addtask;
use App\Http\Requests\addnewuser;


class taskmanager extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

   public function tasks()
   {
   	  $user = \Auth::user();
   	  $myid = $user->id;

      if($user->rol == '0'){
      	  $newtask = Task::with('user')->where('statue','0')->where('assignedto',$myid)->orderBy('deadline', 'Asc')->get();
   	  $inprogress = Task::with('user')->where('statue','1')->where('assignedto',$myid)->orderBy('deadline', 'Asc')->get();
   	  $rejected = Task::with('user')->where('statue','3')->where('assignedto',$myid)->orderBy('created_at', 'Asc')->get();
   	  $done = Task::with('user')->where('statue','2')->where('assignedto',$myid)->orderBy('deadline', 'Asc')->get();


   	  return view('home',compact('newtask','inprogress','done','rejected'));
      }
      else{
        $users = User::get();

        $newtask = Task::with('user')->where('statue','0')->orderBy('deadline', 'Asc')->get();
   	  $inprogress = Task::with('user')->where('statue','1')->orderBy('deadline', 'Asc')->get();
   	  $done = Task::with('user')->where('statue','2')->orderBy('deadline', 'Asc')->get();
         $rejected = Task::with('user')->where('statue','3')->orderBy('deadline', 'Asc')->get();

   	  return view('home',compact('newtask','inprogress','done','rejected','users'));
      }

   	
   }

   public function singletask($id)
   {
     $users = User::get();
   	  $newtask = Task::with('user')->where('id',$id)->get();
   	  return view('single',compact('newtask','users'));
   }

   public function update(Request $request)
   {

   	 DB::table('tasks')
            ->where('id', $request->id)
            ->update(['statue' => $request->statue]);

        //flash('success','complete','data created successfully');

        return redirect('/');
   }
   public function addnewtask(addtask $request)
    {
        
        $taskname = $request->input('taskname');
        $description = $request->input('description');
        $assignedto = $request->input('assignedto');
        $deadline = $request->input('deadline');
       
         
        $attachfile = $request->file('file')->store('uploads');
        $attachfile = substr($attachfile, 8);
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        DB::table('tasks')->insert(
      array('taskname' => $taskname, 'description' => $description, 'attachfile' => $attachfile, 'statue' => '0','assignedto' => $assignedto,'deadline' => $deadline,'created_at' => $created_at,'updated_at' => $updated_at));
       
        return redirect()->back();
       
    }

   public function download($id)
    {

      $patha = 'app\uploads/'.$id;
      $path = storage_path($patha);
      return response()->download($path);
    }
    public function addnewuser(addnewuser $request)
    {
        
        $name = $request->input('name');
        $rol = $request->input('rol');
        $email = $request->input('email');
        $password = $request->input('password');
        $avatar = 'uploads/photo/1489158967996782_1548108335506832_3250857313487702482_n.jpg';
        $position = $request->input('position');
        
        
        
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

       
         DB::table('users')->insert(
         array('name' => $request->name,'position' => $request->position,'rol' => $request->rol,'email' => $request->email,'password' => bcrypt($request->password),'avatar' => $avatar,'slug' => str_slug($name),'created_at' => $created_at,'updated_at' => $updated_at));
       

       
       // flash('success','new user','new user added successfully');
        
        return redirect()->back();
    }
    
}
