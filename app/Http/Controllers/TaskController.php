<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('web.index',compact('tasks'));
    }
    public function create(){
        return view('web.index');
    }
    public function store(Request $request){
        $request->validate([
            'Title'=>'required',
            'Description'=>'required',
            'Price'=>'required',
        ]);
         $tasks = new Task();
 
         $tasks->Title = $request->title;
         $tasks->Description = $request->description;
         $tasks->Price = $request->price;
 
         $tasks->save();
          return redirect()->back();
     }
  
    public function edit(Tasks $tasks){
       
     return view('web.index', compact('tasks'));
    }
 
    public function update(Request $request, Task $tasks){
     $request->validate([
         'price'=>'required',
         'description'=>'required',
         'price'=>'required',
     ]);
           $tasks->Title = $request->price;
         $tasks->Description = $request->description;
         $tasks->Price = $request->price;
          $tasks->save();
 
         return redirect('/web');
    }
 
    public function destroy($id){
     
     $tasks=Task::find($id);
     $tasks->delete();
 
     return redirect()->back();
 }

 

}
