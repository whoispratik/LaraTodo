<?php
namespace App\Actions;

use App\Models\Todo;
use Illuminate\Http\Request;

class MarkTodoAction
{
    public function execute(Request $request, Todo $todo)
    {
        $todo->is_completed = $request->input('is_completed');
        $todo->save();
        return redirect()->route('todos.index');
    }
}