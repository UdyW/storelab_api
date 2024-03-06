<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store() : Task{
        return Task::create(['description'=> request('description')]);
    }

    public function retrieve($id) : Task | JsonResponse {

        $task = Task::where(['id'=>$id])->with('task_status')->first();

        if( $task && get_class($task) === "App\Models\Task") return $task;
        else return response()->json([
            'message' => 'Record not found',
        ], 404);
    }

    public function update($id): Task | JsonResponse {
        $task = $this->retrieve($id);

        if(get_class($task) === "Illuminate\Http\JsonResponse") return $task;

        $task->description = request('description');

        if($task->save()) return $task;

        return response()->json([
            'message' => 'Error updating the record',
        ], 404); 
    }

    public function remove($id): Task | JsonResponse {
        $task = $this->retrieve($id);

        if(get_class($task) === "Illuminate\Http\JsonResponse") return $task;

        if($task->delete()) return $task;

        return response()->json([
            'message' => 'Error deleting the record',
        ], 404); 
    }
}
