<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\CooperationLogos;
use App\Models\Gallery;
use App\Models\Comment;
use Illuminate\Support\Str;
use App\Models\Competition;
use App\Models\Player;
use App\Models\Team;
class IndexController extends Controller
{
    public function ShowPlayers($id){

        $articles = Article::orderby('updated_at', 'desc')->take(11)->get();
        $cooperationLogos = CooperationLogos::orderby('updated_at', 'desc')->take(7)->get();
        $galleries = Gallery::orderby('updated_at', 'desc')->get();
        $player = Player::find($id);
        $page = 'home';
        $player_type = [
            'forward' => 'Довтлогч',
            'defender' => 'Хамгаалагч',
            'midfielder' => 'Дунд блоккэр',
            'goalkeeper' => 'Либэро',
        ];

        return view('player_show')->with([
            'page' => $page,
            'articles' => $articles,
            'cooperationLogos' => $cooperationLogos,
            'galleries' => $galleries,
            'player' => $player,
            'player_type' => $player_type
        ]);

    }

    public function AllPlayers(Request $request){

        $articles = Article::orderby('updated_at', 'desc')->take(11)->get();
        $cooperationLogos = CooperationLogos::orderby('updated_at', 'desc')->take(7)->get();
        $galleries = Gallery::orderby('updated_at', 'desc')->get();
        $players = Player::paginate(100);
        $page = 'home';
        $player_type = [
            'forward' => 'Довтлогч',
            'defender' => 'Хамгаалагч',
            'midfielder' => 'Дунд блоккэр',
            'goalkeeper' => 'Либэро',
        ];

        return view('players')->with([
            'page' => $page,
            'articles' => $articles,
            'cooperationLogos' => $cooperationLogos,
            'galleries' => $galleries,
            'players' => $players,
            'player_type' => $player_type
        ]);

    }
    public function showTeam($id){

        $articles = Article::orderby('updated_at', 'desc')->take(11)->get();
        $cooperationLogos = CooperationLogos::orderby('updated_at', 'desc')->take(7)->get();
        $galleries = Gallery::orderby('updated_at', 'desc')->get();

        $team = Team::find($id);
        $page = 'home';
        $comps = Competition::where('main_team_id',$id)->orWhere('second_team_id', $id)->get();

        // dd($comps);

        return view('team_show')->with([
            'page' => $page,
            'articles' => $articles,
            'cooperationLogos' => $cooperationLogos,
            'galleries' => $galleries,
            'team' => $team,
            'comps' => $comps
        ]);

    }
    public function showAllteams(){

        $articles = Article::orderby('updated_at', 'desc')->take(11)->get();
        $cooperationLogos = CooperationLogos::orderby('updated_at', 'desc')->take(7)->get();
        $galleries = Gallery::orderby('updated_at', 'desc')->get();

        $teams = Team::paginate(50);
        $page = 'home';

        $team_cats = [
            '21 аймагийн УАШТ',
            '330 сумын АШТэмцээн',
            'Хөгжлийн Лиг',
            'Оюутны Лиг',
            'зэрэглэлийн УАШТэмцээн',
            'С зэрэглэл',
            'Д зэрэглэл',
            'Залуучуудын УАШТ',
            'Безнис кап',
            'U19',
            'U18',
            'U16',
            'U14',
            'Mini'

        ];



        return view('allteams_show')->with([
            'page' => $page,
            'articles' => $articles,
            'cooperationLogos' => $cooperationLogos,
            'galleries' => $galleries,
            'teams' => $teams,
            'team_cats' => $team_cats
        ]);

    }

    public function showCompetition($id){

        $articles = Article::orderby('updated_at', 'desc')->take(11)->get();
        $cooperationLogos = CooperationLogos::orderby('updated_at', 'desc')->take(7)->get();
        $galleries = Gallery::orderby('updated_at', 'desc')->get();

        $comp = Competition::find($id);
        $page = 'home';

        return view('competition_show')->with([
            'page' => $page,
            'articles' => $articles,
            'cooperationLogos' => $cooperationLogos,
            'galleries' => $galleries,
            'comp' => $comp
        ]);

    }


    public function index()
    {
        $articles = Article::where('is_special','2')->orderby('updated_at', 'desc')->take(5)->get();
        $normal_articles = Article::where('is_special','1')->orderby('updated_at', 'desc')->take(4)->get();

        $cooperationLogos = CooperationLogos::orderby('updated_at', 'desc')->take(7)->get();
        $galleries = Gallery::orderby('updated_at', 'desc')->get();
        $top_players = Player::select('frist_name','last_name','image')->take(9)->get();
        $page = 'home';
        return view('index')->with([
            'page' => $page,
            'articles' => $articles,
            'cooperationLogos' => $cooperationLogos,
            'galleries' => $galleries,
            'normal_articles' => $normal_articles,
            'top_players' => $top_players,
        ]);
    }
    public function newslist()
    {
        $articles = Article::orderby('updated_at', 'desc')->paginate(11);
        $cooperationLogos = CooperationLogos::orderby('updated_at', 'desc')->take(7)->get();
        $galleries = Gallery::orderby('updated_at', 'desc')->take(8)->get();
        $ArticleCategories = ArticleCategory::orderBy('category', 'asc')->get();
        $page = 'newslist';
        return view('newslist')->with([
            'page' => $page,
            'articles' => $articles,
            'cooperationLogos' => $cooperationLogos,
            'galleries' => $galleries,
            'ArticleCategories' => $ArticleCategories,
        ]);
    }

    public function categorylist($id, $category)
    {
        if(ArticleCategory::where('id', $id)->where('category', $category)->count() != 1)
        {
            return Redirect::to('/news/list');
        }
        $articles = Article::where('category', $category)->orderby('updated_at', 'desc')->paginate(11);
        $cooperationLogos = CooperationLogos::orderby('updated_at', 'desc')->take(7)->get();
        $galleries = Gallery::orderby('updated_at', 'desc')->take(8)->get();
        $ArticleCategories = ArticleCategory::orderBy('category', 'asc')->get();
        $page = 'newslist';
        return view('categorylist')->with([
            'page' => $page,
            'articles' => $articles,
            'cooperationLogos' => $cooperationLogos,
            'galleries' => $galleries,
            'ArticleCategories' => $ArticleCategories,
            'categoryid' => $id,
            'categoryvalue' => $category,
        ]);
    }
    public function search(Request $request)
    {
        $skey = $request->searchkey;
        $articles = Article::where('title', 'LIKE', "%{$skey}%")->orwhere('article', 'LIKE', "%{$skey}%")->orderby('updated_at', 'desc')->get();
        $cooperationLogos = CooperationLogos::orderby('updated_at', 'desc')->take(7)->get();
        $galleries = Gallery::orderby('updated_at', 'desc')->take(8)->get();
        $ArticleCategories = ArticleCategory::orderBy('category', 'asc')->get();
        $page = 'newslist';
        return view('search')->with([
            'page' => $page,
            'articles' => $articles,
            'cooperationLogos' => $cooperationLogos,
            'galleries' => $galleries,
            'ArticleCategories' => $ArticleCategories,
        ]);
    }
    public function singlenews($id, $slug)
    {
        if(Article::where('id', $id)->count() != 1)
        {
            return Redirect::to('/news/list');
        }
        $article = Article::where('id', $id)->get();
        $ArticleCategories = ArticleCategory::orderBy('category', 'asc')->get();
        $page = 'newslist';
        $comments = Comment::where('article_id', $id)->get();
        return view('singlenews')->with([
            'page' => $page,
            'article' => $article,
            'ArticleCategories' => $ArticleCategories,
            'comments' => $comments,
        ]);
    }
    public function comment(Request $request, $id, $slug)
    {
        Comment::create([
            'article_id' => $id,
            'article_comment_reply_user' => 'null',
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ])->save();

        return back();
    }
}
