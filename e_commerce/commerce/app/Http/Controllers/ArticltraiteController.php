<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticltraiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("articlespage");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
     {
         $request->validate(rules:[
             'nom_articles'=>['required'],
             'prix'=>['required','numeric'],
             'stock_restant'=>['required','numeric'],
             'image'=>['required','image'],

         ]);
        $imageArticle=$request->file('image')->store('articles_photos','public');
        $article=new Articles();
        $article->users_id = auth()->id();
        $article->nom_articles=$request->nom_articles;
        $article->prix= $request->prix;
        $article->stock_restant=$request->stock_restant;
        $article->image=$imageArticle;
        $article->save();

        return redirect()->route('the.shop');
    }


    public function affichage(){
        $articles=auth()->user()->articles;
        return view('article.la_boutique', compact('articles'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $article=Articles::findOrfail($id);
        $article->delete();
        return redirect()->route('the.shop');
    }
}
