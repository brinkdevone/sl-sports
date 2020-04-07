<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Article;
use App\Event;
use App\User;

class DashboardController extends Controller
{
    public function index ()
    {
        $users = User::orderBy('created_at', 'desc')->limit(5)->get();
        $articles = Article::orderBy('created_at', 'desc')->limit(5)->get();
        $events = Event::orderBy('created_at', 'desc')->limit(5)->get();
        $tasks = Task::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('users', 'articles', 'events', 'tasks'));
    }
}
