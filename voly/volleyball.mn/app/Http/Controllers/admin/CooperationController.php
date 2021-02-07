<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CooperationLogos;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Redirect;

class CooperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'cooperation';
        $cooperationLogos = CooperationLogos::orderby('updated_at', 'desc')->paginate(10);
        $countArticle = Article::count();
        $countCooperation = CooperationLogos::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.cooperation.index')->with([
            'page' => $page,
            'page_values' => $page,
            'cooperationLogos' => $cooperationLogos,
            'countArticle' => $countArticle,
            'countCooperation' => $countCooperation,
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
        $page = 'cooperation';
        $countArticle = Article::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.cooperation.create')->with([
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
        $image = $request->file('logo');
        $ext = $image->getClientOriginalExtension();
        if($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG' || $ext == 'jpeg' || $ext == 'JPEG')
        {
            $destinationPath = "assets/images/cooperation/";
        }
        else{
            return back()->with([
                'error' => 'Зургын өргөтгөл "JPG, JPEG, PNG" байх ёстой.',
                'backcompany' => $request->company,
            ]);
        }
        $image->move($destinationPath, $image->getClientOriginalName());
        CooperationLogos::create([
            'company' => $request->company,
            'logo' => $destinationPath.$image->getClientOriginalName(),
        ])->save();
        return Redirect::to('/admin/cooperation')->with('success', $request->company.' байгууллагыг хамтран ажиллагч байгууллагаар системд нэмлээ.');
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
        if(CooperationLogos::where('id', $id)->count() != 1)
        {
            return Redirect::to('/admin/cooperation');
        }
        $old = CooperationLogos::where('id', $id)->get();
        unlink($old[0]->logo);

        CooperationLogos::where('id', $id)->delete();
        return Redirect::to('/admin/cooperation')->with('success', $old[0]->company.' байгууллагыг хамтран ажиллагч байгууллагаас хаслаа.');
    }

    public function dropbox(Request $request)
    {
        $message = "";
        $count = 0;
        foreach($request->logo_id as $value => $id)
        {
            $old = CooperationLogos::where('id', $id)->get();
            unlink($old[0]->logo);

            CooperationLogos::where('id', $id)->delete();

            if($value != 0)
            {
                $message .= ', '.$old[0]->company;
            }
            else{
                $message .= $old[0]->company;
            }
            $count += 1;
        }
        if($count == 1)
        {
            $message .= ' байгууллагыг хамтран ажиллагч байгууллагаас хаслаа.';
        }
        else{
            $message .= ' байгууллагуудыг хамтран ажиллагч байгууллагаас хаслаа.';
        }
        return Redirect::to('/admin/cooperation')->with('success', $message);
    }
}
