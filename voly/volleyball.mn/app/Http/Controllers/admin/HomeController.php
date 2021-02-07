<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $page = 'home';
        $countArticle = Article::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.index')->with([
            'page' => $page,
            'page_values' => $page,
            'countArticle' => $countArticle,
            'last5articles' => $last5articles,
        ]);
    }
}
