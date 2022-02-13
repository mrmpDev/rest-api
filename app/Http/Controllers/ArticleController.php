<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\CreateRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleResourceCollection;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::paginate(6);
//        $articles = Article::all();
        $response = (new ArticleResourceCollection($articles))
            ->additional(['addddddddd' => 123456, 'meta' => ['name' => 'mrmp.ir']])
            ->toresponse($request);

        $response->header('FOO', 'BAR');
        $response->setStatusCode('202');
        return $response;
        //        dd($response->header('FOO','BAR'));
        return new ArticleResourceCollection($articles);
    }

    public function show(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        return new ArticleResource($article->load('user'));
    }

    public function store(CreateRequest $request)
    {
        $data = $request->only('title', 'body');
        $user = User::find(1);
        $article = $user->articles()->create($data);
        return $article;
    }


    public function update(UpdateRequest $request, $articleId)
    {
        $data = $request->only(['title', 'body']);
        $post = Article::findOrFail($articleId);
        $post->update($data);

        return response($post, 202);
    }

    public function remove(Request $request, $articleId)
    {
        $article = Article::findOrFail($articleId);
        $article->delete();
        return response($article, 204);
    }


}
