<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function index()
    {
        return $this->task->all();
    }

    public function store(Request $request)
    {
        return $this->task->create($request->all());
    }

    public function show(Int $id)
    {   
        if ($task = $this->task->find($id)) {
            return $task;
        }
        return response()->json(['msg' => 'Item não encontrado.']);
    }

    public function update(Request $request, Int $id)
    {
        if ($task = $this->task->find($id)) {
            $task->update($request->all());
            return $task;
        }
        return response()->json(['msg' => 'Item não encontrado.']);
    }

    public function destroy(Int $id)
    {
        if ($task = $this->task->find($id)) {
            $task->delete();
            return $task;
        }
        return response()->json(['msg' => 'Item não encontrado.']);
    }
}
