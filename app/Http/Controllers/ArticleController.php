<?php

namespace App\Http\Controllers;

use App\Article;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = DB::table('articles')->latest()->paginate(5);

        if (Gate::allows('manage-users'))
        {
            return view('articles.index', compact('articles'))->with('i',(request()->input('page',1)-1)*5);
        }else
        {
            return view('articles.guestindex', compact('articles'))->with('i',(request()->input('page',1)-1)*5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
            'content' => 'required',
            'imgarticles' => 'jpeg,png,jpg,gif',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')
            ->with('status','Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //$article = Article::paginate(5);
        return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Logic for user upload of avatar
        if($request->hasFile('imgarticles')){
            $imgarticles = $request->file('imgarticles');
            $filename = time() . '.' . $imgarticles->getClientOriginalExtension();
            Image::make($imgarticles)->resize(900, 300)->save( public_path('/images/' . $filename ) );
            $article->imgarticles = $filename;
            $article->save();
        }

        $article->update($request->all());

        return redirect()->route('articles.index')
            ->with('status','Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
            ->with('status','Article deleted successfully');
    }
}
