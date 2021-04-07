<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\Models\Task;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {

        $tasks=Task::all();

        return view('Tasks.index' ,compact('tasks'));

    }

    public function show(Task $task){



        return view('Tasks.show',compact('task'));
    }
}
