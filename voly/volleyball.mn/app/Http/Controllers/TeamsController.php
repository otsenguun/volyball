<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->s;
        $teams = Team::paginate(50);
        // dd($teams);
        return view('admin.teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team_statistic = [
            'Нийт' => [
                'Нийт тоглолт' => 0,
                'Ялалт' => 0,
                'Ялагдалт' => 0,
                'Нийт авсан оноо' => 0,
                'Нийт алдсан оноо' => 0,
                'Сэрвис эйс' => 0
            ],
            'Довтолгоо' => [
                'Оноо' =>0,
                'Дундаж хожсон сэт' => 0,
                'Цохилтууд' => 0,
                'Цохилтын оновч %' => 0,
                'Хамгийн өндөр оноо' => 0,
                'Боломж' => 0,
            ],
            'Багын тоглолт' => [
                'Дамжуулалт' => 0,
                'Дундаж дамжуулалт' => 0,
                'Дамжуулалтын оновч %' => 0,
                'Гараа' => 0,
                'Гарааны оновч %' => 0
            ],
            'Хамгаалалт' => [
                'Блок' => 0,
                'Хамгаалалт' =>  0,
                'Дундаж хамгаалалт' => 0,
                'Өсгөлт' => 0,
                'Алдсан' => 0
            ]
        ];
        return view('admin.teams.create',compact('team_statistic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $team = new Team;


        $team->team_name = $request->team_name;
        $team->create_date = $request->create_date;
        $team->leader_name = $request->leader_name;
        $team->creative_name = $request->creative_name;
        $team->coach_name = $request->coach_name;
        $team->sert_number = $request->sert_number;
        $team->social = $request->social;
        $team->facebook = $request->facebook;
        $team->twiter = $request->twiter;
        $team->instagramm = $request->instagramm;
        $team->you_tube = $request->you_tube;
        $team->sponsors = $request->sponsors;



        if( $request->hasFile('image') ){

            $path = $request->file('image')->store('teams_image');
            $team->image = $path;
        }

        if( $request->hasFile('logo') ){

            $path1 = $request->file('logo')->store('teams_logo');
            $team->logo = $path1;
        }

        $team->details = $request->details;

        $team->statistic = serialize($request->statictic);

        $team->save();

        return redirect()->route('Teams.index');
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
        $team = Team::find($id);
        $team->team_name = $request->team_name;
        $team->create_date = $request->create_date;
        $team->leader_name = $request->leader_name;
        $team->creative_name = $request->creative_name;
        $team->coach_name = $request->coach_name;
        $team->sert_number = $request->sert_number;
        $team->social = $request->social;
        $team->facebook = $request->facebook;
        $team->twiter = $request->twiter;
        $team->instagramm = $request->instagramm;
        $team->you_tube = $request->you_tube;
        $team->sponsors = $request->sponsors;



        if( $request->hasFile('image') ){

            $path = $request->file('image')->store('teams_image');
            $team->image = $path;
        }

        if( $request->hasFile('logo') ){

            $path1 = $request->file('logo')->store('teams_logo');
            $team->logo = $path1; 
        }

        $team->details = $request->details;

        $team->statistic = serialize($request->statictic);

        $team->save();

        return redirect()->route('Teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
