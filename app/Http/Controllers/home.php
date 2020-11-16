<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class home extends Controller
{
    public function catMenu(){
        
    }

    public function index(){
        $author = DB::table('author')->limit(4)->get();
        $category = DB::table('category')->get();
        $book = DB::table('book1')->limit(36)->get();
        $cat = DB::table('book1')->orderBy('brand' , 'desc')->limit(8)->get();
        return view('page.home' , ['category' => $category ,
                            'book' => $book, 
                            'cat' => $cat , 
                            'author' => $author,]
                            );
    }

    public function masterCategory($name){
        $author = DB::table('author')->limit(4)->get();
        $category = DB::table('category')->get();
        $cat_title = DB::table('category')->where('name' , '=' , $name)->first();
        $book = DB::table('book1')->join('category', 'book1.cat_id', '=', 'category.id')
                                ->select('book1.*')
                                ->where('category.name' , '=' , $name)
                                ->limit(36)->get();
        $cat = DB::table('book1')->orderBy('brand' , 'desc')->limit(8)->get();
        return view('page.category' , ['category' => $category ,
                            'book' => $book, 
                            'cat' => $cat , 
                            'author' => $author,
                            'cat_title' => $cat_title]);
    }
    public function detailsBook($name){
        $authorOne = DB::table('author')->join('book1', 'author.id', '=', 'book1.author_id')
                                ->select('author.*')
                                ->where('book1.name' , '=' , $name)
                                ->first();
        $author = DB::table('author')->limit(4)->get();
        $category = DB::table('category')->get();
        $cat_title = DB::table('category')->where('name' , '=' , $name)->first();
        $book = DB::table('book1')->where('name', '=' , $name)->first();
        $cat = DB::table('book1')->orderBy('brand' , 'desc')->limit(8)->get();
        return view('page.details' , ['category' => $category ,
                            'book' => $book, 
                            'cat' => $cat , 
                            'author' => $author,
                            'cat_title' => $cat_title,
                            'authorOne' => $authorOne]);
    }
    public function detail(){
        return view('page.detail');
    }
    public function search(){
        
        
    }
}
