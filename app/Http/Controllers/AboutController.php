<?php

namespace App\Http\Controllers;

use App\About;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = DB::table('abouts')->latest()->paginate(5);

        if (Gate::allows('manage-users'))
        {
            return view('aboutus.indexabout', compact('abouts'));
        }
        else
        {
            return view('aboutus.aboutus', compact('abouts'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aboutus.createabout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'avatar' => 'jpeg,png,jpg,gif',
        ]);

        About::create($request->all());

        return redirect()->route('aboutus.indexabout')
            ->with('status','Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('aboutus.editabout',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);

        $about->update($request->all());

        return redirect()->route('aboutus.indexabout')
            ->with('status','Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('aboutus.indexabout')
            ->with('status','Article deleted successfully');
    }
}
