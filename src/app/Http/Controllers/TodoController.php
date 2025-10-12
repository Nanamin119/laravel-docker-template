<?php

namespace App\Http\Controllers;

// 追加
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();

        return view('todo.index', ['todos' => $todos]);
    }
}
