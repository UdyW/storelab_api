<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTask;
use Illuminate\Http\JsonResponse;

class TaskUserController extends Controller
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

    public function store($id) : UserTask | JsonResponse  {
        if($this->validateTaskId($id)) {
            return UserTask::create(['task'=> $id, 'user'=> request('user')]);
        }
        else {                        
            return response()->json([
                'message' => 'Task not found',
            ], 404);
        }
    }

    public function retrieve($filter, $id) : UserTask | JsonResponse {

        $usertask = UserTask::where([$filter=> $id] )->with('user')->first();

        if( $usertask && get_class($usertask) === "App\Models\UserTask") return $usertask;
        else return response()->json([
            'message' => 'Record not found',
        ], 404);
    }

    public function update($id): UserTask | JsonResponse {
        $userTask = $this->retrieve('task', $id);

        if(get_class($userTask) === "Illuminate\Http\JsonResponse") return $userTask;

        $userTask->user = request('user');

        if($userTask->save()) return $userTask;

        return response()->json([
            'message' => 'Error updating the record',
        ], 404); 
    }

    public function remove($id): UserTask | JsonResponse {
        $userTask = $this->retrieve('task', $id);

        if(get_class($userTask) === "Illuminate\Http\JsonResponse") return $userTask;

        if($userTask->delete()) return $userTask;

        return response()->json([
            'message' => 'Error deleting the record',
        ], 404); 
    }

    private function validateTaskId($id) {
        $taskctrl = new TaskController();
        if(get_class($taskctrl->retrieve($id)) === "App\Models\Task") return true;
        else return false;
    }
}
