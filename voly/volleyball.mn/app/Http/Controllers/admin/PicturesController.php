<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Redirect;

class PicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'pictures';
        $Galleries = Gallery::orderby('updated_at', 'desc')->paginate(10);
        $countArticle = Article::count();
        $countGalleries = Gallery::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.pictures.index')->with([
            'page' => $page,
            'page_values' => $page,
            'Galleries' => $Galleries,
            'countArticle' => $countArticle,
            'countGalleries' => $countGalleries,
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
        $page = 'pictures';
        $countArticle = Article::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.pictures.create')->with([
            'page' => $page,
            'page_values' => $page,
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
            $destinationPath = "assets/images/pictures/";
        }
        else{
            return back()->with([
                'error' => 'Зургын өргөтгөл "JPG, JPEG, PNG" байх ёстой.',
                'backtitle' => $request->title,
            ]);
        }
        if(Gallery::where('image', $destinationPath.$image->getClientOriginalName())->count() == 1)
        {
            return back()->with([
                'error' => 'Зургын нэр системд давхардаж байна. Зургын нэрийг солино уу?',
                'backtitle' => $request->title,
            ]);
        }
        $image->move($destinationPath, $image->getClientOriginalName());
        Gallery::create([
            'title' => $request->title,
            'image' => $destinationPath.$image->getClientOriginalName(),
        ])->save();
        return Redirect::to('/admin/pictures')->with('success', $request->title.' тайлбартай зураг амжилттай нэмэгдлээ.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gallery::where('id', $id)->count() != 1)
        {
            return Redirect::to('/admin/pictures');
        }
        $old = Gallery::where('id', $id)->get();
        unlink($old[0]->image);

        Gallery::where('id', $id)->delete();
        return Redirect::to('/admin/pictures')->with('success', $old[0]->title.' тайлбартай зургыг амжилттай хаслаа.');
    }

    public function dropbox(Request $request)
    {
        $message = "";
        $count = 0;
        foreach($request->gallery_id as $value => $id)
        {
            $old = Gallery::where('id', $id)->get();
            unlink($old[0]->image);

            Gallery::where('id', $id)->delete();

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
            $message .= ' тайлбартай зураг системээс хасагдлаа.';
        }
        else{
            $message .= ' тайлбартай зургууд тус тус системээс хасагдлаа.';
        }
        return Redirect::to('/admin/pictures')->with('success', $message);
    }
}
