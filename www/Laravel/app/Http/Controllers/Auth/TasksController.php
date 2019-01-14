<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function show(){
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks.tasks',[
            'tasks' => $tasks,
        ]);
    }

    public function addTask(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
//    dd($task);
        $task->save();
        return redirect('/');

}
    public function delete($id){
        Task::findOrFail($id)->delete();
        return redirect('/');
}};
