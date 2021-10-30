<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Tasks;

class TasksController extends Controller
{
    //
    public function getTasks()
    {
        $tasks = Tasks::all();
        return response()->json($tasks,200);
    }

    public function getTaskById($id)
    {
        $task = Tasks::find($id);
        
        if(is_null($task))
        {
            return response()->json(['message'=> 'Task not found']);
        }

        return response()->json($task::find($id),200); 

    }
    public function getTaskByUser(Request $request)
    {
        $task = Tasks::where("uid", $request->uid)->get();
     
        if(is_null($task))
        {
            return response()->json(['message'=> 'Tasks not available']);
        }else{
            return response()->json(['data'=>$task,'code'=>200]);
        }
       
    }

    public function addTask(Request $request)
    {
        $task = Tasks::create($request->all());

        //return response($task,201);
        return response()->json(['message'=> 'Added Successfully','code'=>201,'data'=>$task]);
    }
    public function updateTask(Request $request,$id)
    {
        $task = Tasks::find($id);

        if(is_null($task))
        {
            return response()->json(['message'=> 'User not found']);
        }else{
            $task ->update($request->all());

            return response()->json(['message'=> 'Updated Successfully','data'=>$task,'code'=>'200']);

            //return response($task,200); 

        }

    }
    public function deleteTask(Request $request,$id)
    {
        $task = Tasks::find($id);

        if(is_null($task))
        {
            return response()->json(['message'=> 'Task not found']);
        }

        $task->delete();

        return response()->json(null,204);

        return $task;

    }
}
