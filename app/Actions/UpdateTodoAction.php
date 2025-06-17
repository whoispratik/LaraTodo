<?php
namespace App\Actions;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
class UpdateTodoAction
{
    public function execute(UpdateTodoRequest $request,Todo $todo)
    {
        $todo->update($request->validated());
        return redirect()->route('todos.index');
    }
}