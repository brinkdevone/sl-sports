<?php

namespace App\Http\Controllers;

use App\Article;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->limit(1)->get();
        $articles = Article::orderBy('created_at', 'desc')->limit(1)->get();
        return view('links.home',compact('events', 'articles'));
    }
}
