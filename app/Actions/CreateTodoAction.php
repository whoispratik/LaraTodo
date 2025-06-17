<?php
namespace App\Actions;

use App\Http\Requests\CreateTodoRequest;
class CreateTodoAction
{
    public function execute(CreateTodoRequest $request)
    {
       $request->user()->todos()->create(
            $request->validated()
       );
       return redirect()->route('todos.index');
    }

}