<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Status;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        // dd($project);
        $tasks = Task::with('status')->with('project')->where('project_id', $project->id)->get();
        // dd($tasks);
        return view('dashboard.task.index')->with([
            'tasks' => $tasks,
            'project' => $project
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $status = Status::all();
        return view('dashboard.task.create')->with([
            'status' => $status,
            'project' => $project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        // dd($request);
        Task::create($request->all());
        $project = Project::find($request->project_id);
        return redirect()->route('task.index', $project->id)->with([
            'success' => 'Task created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task = Task::with('project')->with('status')->find($task->id);
        $status = Status::all()->except($task->status->id);

        return view('dashboard.task.edit')->with([
            'task' => $task,
            'status' => $status
        ]);
        // dd($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)    
    {
        $tassk = Task::find($task->id);
        // dd($tassk->project);
        $task->update($request->all());
        return redirect()->route('task.index', $tassk->project->id)->with([
            'success' => 'Task updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with([
            'success' => 'Task deleted successfully'
        ]);
    }
}
