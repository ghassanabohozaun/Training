<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{


    // index function
    public function index()
    {

        $articles = Article::get();

        if (!$articles) {
            return response()->json(['message' => 'No Records found'], 204);
        }

        return response()->json($articles, 200);
    }

    public function show($id)
    {

        $article = Article::find($id);
        if (!$article) {
            return response()->json('record not found', 400);
        } else {
            return response()->json($article, 200);
        }
    }

    // Store function
    public function store(Request $request)
    {

        $article = new Article();
        $article->title =  $request->title;
        $article->description  = $request->description;
        $article->summary = $request->summary;
        $article->views =  $request->views;

        $article->save();

        if ($article->save()) {
            return response()->json(['msg' => 'record added'], 201);
        } else {
            return response()->json(['msg' => 'record not added'], 400);
        }
    }


    public function store2(Request $request)
    {

        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'summary' => $request->summary,
            'views' => $request->views
        ]);

        return response()->json(['msg' => 'record added', 'data' =>  $article], 201);
    }

    // update function
    public function update(Request $request, $id)
    {

        $article = Article::find($id);
        if (!$article) {
            return response()->json('reoord not found', 400);
        }

        $article->update($request->only('title', 'description', 'summary'));

        return response()->json($article, 200,);
    }

    // delete function
    public function delete($id)
    {

        $article = Article::find($id);
        if (!$article) {
            return response()->json('record not found', 400);
        } else {
            $article->delete();
            return response()->json('record deleted', 200);
        }
    }
}
