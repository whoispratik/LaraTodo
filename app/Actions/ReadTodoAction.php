<?php

namespace App\Actions;

use Illuminate\Http\Request;

class ReadTodoAction
{
    public function execute(Request $request)
    {
        $query = $request->user()->todos();

        if ($request->query('status') === 'completed') {
            $query->completed();
        } elseif ($request->query('status') === 'incomplete') {
            $query->incomplete();
        }

        return inertia('Todo/Index',
            [
                'todos' => $query->get(),
                'filter' => $request->query('status', 'all'),
            ]);
    }
}
