<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;


class TaskController extends Controller
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

   
    public function index(Request $request)
	{
        //dd($request->user()->tasks()->orderby('created_at', 'asc')->get());
        return view('tasks.index', [
            'tasks' => $request->user()->tasks()->orderby('created_at', 'asc')->get(),
            ]);
	}
	public function store(Request $request)
	{
       
    $this->validate($request, [
        'name' => 'required|max:255',
    ]);
    $request->user()->tasks()->create([
        'name' => $request->name,
        ]);
    return redirect('tasks');
   

   
	}
    public function destroy(Task $task)
    {
        $task->delete();
        
        return redirect('tasks');   
    }

}
