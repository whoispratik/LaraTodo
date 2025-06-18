<?php

namespace App\Actions;

use App\Models\Todo;

class DeleteTodoAction
{
    public function execute(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index');
    }
}
