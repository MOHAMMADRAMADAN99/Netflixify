<?php

namespace App\Http\Controllers;

use App\Category;
use App\Movie;

class WelcomeController extends Controller
{
    public function index()
    {   
        $latest_movies = Movie::latest()->limit(4)->get();
        $categories = Category::with('movies')->get();
        $categories1 = Category::with('movies')->get();
        return view('welcome', compact('latest_movies', 'categories'));

    }// end of index
    public function categoryFilter($id){
        $latest_movies = Movie::join('movie_category','movies.id','=','movie_category.movie_id')
                                ->select('movies.*','movies.id as id')
                                ->where('movie_category.category_id','=',$id)->get();
        $categories = Category::where('id','=',$id)->with('movies')->get();
        $categories1 = Category::with('movies')->get();
        return view('welcome', compact('latest_movies', 'categories'));
    }

    public function yearFilter($id){
        $latest_movies = Movie::join('movie','movies.year','=','movie.movie_year')
                                ->select('movies.*','movies.id as id')
                                ->where('movie_category.category_id','=',$id)->get();
        $categories = Category::where('id','=',$id)->with('movies')->get();
        $categories1 = Category::with('movies')->get();
        return view('welcome', compact('latest_movies', 'categories'));
    }
}//end of controller
