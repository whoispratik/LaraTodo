<?php

namespace App\Http\Controllers;

use App\Actions\CreateTodoAction;
use App\Actions\DeleteTodoAction;
use App\Actions\MarkTodoAction;
use App\Actions\UpdateTodoAction;
use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.]
     */
    public function index(Request $request)
    {
        //
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return inertia('Todo/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTodoRequest $request, CreateTodoAction $createTodoAction)
    {
        //
        return $createTodoAction->execute($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
        return inertia('Todo/Edit', [
            'todo' => $todo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo, UpdateTodoAction $updateTodoAction)
    {
        //
        return $updateTodoAction->execute($request, $todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo, DeleteTodoAction $deleteTodoAction)
    {
        return $deleteTodoAction->execute($todo);
    }

    // Mark a todo as complete or incomplete
    public function mark(Request $request, Todo $todo, MarkTodoAction $markTodoAction)
    {
        return $markTodoAction->execute($request, $todo);
    }
}
