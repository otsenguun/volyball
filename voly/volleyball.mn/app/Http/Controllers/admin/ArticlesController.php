<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Redirect;
use File;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'article';
        $articles = Article::orderby('updated_at', 'desc')->paginate(10);
        $countArticle = Article::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.article.index')->with([
            'page' => $page,
            'page_values' => $page,
            'articles' => $articles,
            'countArticle' => $countArticle,
            'last5articles' => $last5articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'article';
        $category = ArticleCategory::orderby('category', 'asc')->get();
        $countArticle = Article::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.article.create')->with([
            'page' => $page,
            'page_values' => $page,
            'categories' => $category,
            'countArticle' => $countArticle,
            'last5articles' => $last5articles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        if($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG' || $ext == 'jpeg' || $ext == 'JPEG')
        {
            $year = date("Y");
            $month = date("M");
            $slug = Str::slug($request->title);
            $destinationPath = "assets/images/news/".$year."/".$month."/".$slug."/";
        }
        else{
            return back()->with([
                'error' => 'Зургын өргөтгөл "JPG, JPEG, PNG" байх ёстой.',
                'backcategory' => $request->category,
                'backtitle' => $request->title,
                'backarticle' => $request->article
            ]);
        }
        if(Article::where('title', $request->title)->count() == 1){
            return back()->with([
                'error' => 'Нийтлэлийг гарчиг давхардаж байгаа тул солих юмуу тэмдэгт нэмэх /хасах/ шаардлагатай.',
                'backcategory' => $request->category,
                'backtitle' => $request->title,
                'backarticle' => $request->article
            ]);
        }
        $image->move($destinationPath, $image->getClientOriginalName());
        Article::create([
            'category' => $request->category,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'useremail' => Auth::user()->email,
            'username' => Auth::user()->nickname,
            'image' => $destinationPath.$image->getClientOriginalName(),
            'article' => $request->article,
            'is_special' => $request->is_special
        ])->save();
        return Redirect::to('/admin/articles')->with('success', $request->title.' гарчигтай нийтлэлийг амжилттай нийтэллээ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Article::where('id', $id)->count() != 1)
        {
            return Redirect::to('/admin/articles');
        }
        $page = 'article';
        $article = Article::where('id', $id)->get();
        $countArticle = Article::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.article.show')->with([
            'page' => $page,
            'page_values' => $page,
            'article' => $article,
            'countArticle' => $countArticle,
            'last5articles' => $last5articles,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Article::where('id', $id)->count() != 1)
        {
            return Redirect::to('/admin/articles');
        }
        $page = 'article';
        $category = ArticleCategory::orderby('category', 'asc')->get();
        $article = Article::where('id', $id)->get();
        $countArticle = Article::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.article.edit')->with([
            'page' => $page,
            'page_values' => $page,
            'categories' => $category,
            'article' => $article,
            'countArticle' => $countArticle,
            'last5articles' => $last5articles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->file('image'))
        {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();

            if($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG' || $ext == 'jpeg' || $ext == 'JPEG')
            {
                $year = date("Y");
                $month = date("M");
                $slug = Str::slug($request->title);
                $destinationPath = "assets/images/news/".$year."/".$month."/".$slug."/";

                $old = Article::where('id', $id)->get();

                $year = date_format($old[0]->created_at, "Y");
                $month = date_format($old[0]->created_at, "M");
                $slug = Str::slug($old[0]->slug);
                $oldDestinationPath = "assets/images/news/".$year."/".$month."/".$slug."/";
                File::deleteDirectory(public_path($oldDestinationPath));

                echo $destinationPath;

                $image->move($destinationPath, $image->getClientOriginalName());
                Article::where('id', $id)->update([
                    'image' => $destinationPath.$image->getClientOriginalName(),
                ]);
            }
            else{
                return back()->with([
                    'error' => 'Зургын өргөтгөл "JPG, JPEG, PNG" байх ёстой.',
                    'backcategory' => $request->category,
                    'backtitle' => $request->title,
                    'backarticle' => $request->article
                ]);
            }
        }

        Article::where('id', $id)->update([
            'category' => $request->category,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'article' => $request->article,
            'is_special' => $request->is_special
        ]);

        return Redirect::to('/admin/articles')->with('success', $request->title.' гарчигтай нийтлэлийг амжилттай засварлалаа.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Article::where('id', $id)->count() != 1)
        {
            return Redirect::to('/admin/articles');
        }
        $old = Article::where('id', $id)->get();
        $year = date_format($old[0]->created_at, "Y");
        $month = date_format($old[0]->created_at, "M");
        $slug = Str::slug($old[0]->slug);
        $oldDestinationPath = "assets/images/news/".$year."/".$month."/".$slug."/";
        File::deleteDirectory(public_path($oldDestinationPath));

        Article::where('id', $id)->delete();
        return Redirect::to('/admin/articles')->with('success', $old[0]->title.' гарчигтай нийтлэлийг амжилттай системээс хаслаа.');
    }

    public function dropbox(Request $request)
    {
        $message = "";
        $count = 0;
        foreach($request->article_id as $value => $id)
        {
            $old = Article::where('id', $id)->get();
            $year = date_format($old[0]->created_at, "Y");
            $month = date_format($old[0]->created_at, "M");
            $slug = Str::slug($old[0]->slug);
            $oldDestinationPath = "assets/images/news/".$year."/".$month."/".$slug."/";
            File::deleteDirectory(public_path($oldDestinationPath));

            Article::where('id', $id)->delete();

            if($value != 0)
            {
                $message .= ', '.$old[0]->title;
            }
            else{
                $message .= $old[0]->title;
            }
            $count += 1;
        }
        if($count == 1)
        {
            $message .= ' гарчигтай нийтлэлийг системээс хаслаа.';
        }
        else{
            $message .= ' гарчигтай нийтлэлүүдийг системээс хаслаа.';
        }
        return Redirect::to('/admin/articles')->with('success', $message);
    }

    public function search(Request $request)
    {
        $searchKey = $request->value;
        $page = 'article';

        $page = 'article';
        $search_datas = Article::where('title', 'LIKE', "%{$searchKey}%")->orwhere('article', 'LIKE', "%{$searchKey}%")->get();
        $countArticle = Article::where('title', 'LIKE', "%{$searchKey}%")->orwhere('article', 'LIKE', "%{$searchKey}%")->count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.article.search')->with([
            'page' => $page,
            'page_values' => $page,
            'articles' => $search_datas,
            'countArticle' => $countArticle,
            'searchKey' => $searchKey,
            'last5articles' => $last5articles,
        ]);
    }
}
