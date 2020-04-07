<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactUSController extends Controller
{
    public function create ()
    {
        return view('layouts.app');
    }

    public function store (ContactRequest $request)
    {
        Mail::to('contact@sl-sports.net')
            ->send(new ContactSLS($request->except('_token')));

        return view('confirm');
    }
}
