<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
class CompertitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->s;
        $comps = Competition::search($s)->paginate(50);
        // dd($comps);
        return view('admin/competition/index',compact('comps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistic_info = [
            'point 1',
            'point 2',
            'point 3',
            'point 4',
            'point 5',
        ];
        $set_count = [
            1,2,3,4,5
        ];
        $main_statistic = [
            'Давуулалтын %',
            'Амжилттай довтолгоо',
            'Блок',
            'Сэрвис эйс',
            'Дундаж оноо/сэт',
            'Алдаа',
            'Гэмтэл'
        ];


        return view('admin/competition/create',compact('statistic_info','set_count','main_statistic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $comp = new Competition;
        $comp->name = $request->name;
        $comp->create_date = $request->create_date;
        $comp->address = $request->address;
        $comp->uzegch_count = $request->uzegch_count;
        $comp->status = $request->status;
        $comp->score_main = $request->score_main;
        $comp->score_second = $request->score_second;
        $comp->winner = $request->winner;

        $comp->main_team_name = $request->main_team_name;
        $comp->second_team_name = $request->second_team_name;

        $comp->main_team_id = $request->main_team_id;
        $comp->second_team_id = $request->second_team_id;

        $comp->mvp_main = $request->mvp_main;
        $comp->mvp_second = $request->mvp_second;
        $comp->mvp_main_info = serialize($request->mvp_main_info);
        $comp->mvp_second_info = serialize($request->mvp_second_info);

        $sets = [];
        $set_count = 0;
        if(isset($request->main_set) && count($request->main_set) > 0){
            $main_set_count = 0;
            foreach($request->main_set as $ms){
                if($ms > 0 && $ms != ""){
                    $main_set_count += 1;
                }
            }
            $sets['main'] = $request->main_set;
            $set_count +=  $main_set_count;
        }

        if(isset($request->second_set) && count($request->second_set) > 0){
            $sets['second'] = $request->second_set;
        }

        $comp->set_count = $set_count;
        $comp->sets = serialize($sets);

        if( $request->hasFile('image') ){

            $path = $request->file('image')->store('competition_image');
            $comp->image = $path;
        }

        if( $request->hasFile('background_image') ){

            $path1 = $request->file('background_image')->store('competition_background_image');
            $comp->background_image = $path1;
        }


        // $comp->image = $request->image;
        // $comp->background_image = $request->background_image;
        $comp->details = $request->details;
        $match_status['main'] = $request->request_match_status;
        $match_status['second'] = $request->request_match_second;
        $comp->match_status = serialize($match_status);

        $comp->match_guide = $request->match_guide;
        $comp->save();

        return redirect()->route('Competition.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comp = Competition::find($id);
        return view('admin/competition/show',compact('comp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $comp = Competition::find($id);
        $statistic_info = [
            'point 1',
            'point 2',
            'point 3',
            'point 4',
            'point 5',
        ];
        $set_count = [
            1,2,3,4,5
        ];
        $main_statistic = [
            'Давуулалтын %',
            'Амжилттай довтолгоо',
            'Блок',
            'Сэрвис эйс',
            'Дундаж оноо/сэт',
            'Алдаа',
            'Гэмтэл'
        ];

        return view('admin/competition/edit',compact('comp','statistic_info','set_count','main_statistic'));
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
        $comp = Competition::find($id);
        $comp->name = $request->name;
        $comp->create_date = $request->create_date;
        $comp->address = $request->address;
        $comp->uzegch_count = $request->uzegch_count;
        $comp->status = $request->status;
        $comp->score_main = $request->score_main;
        $comp->score_second = $request->score_second;
        $comp->winner = $request->winner;

        $comp->main_team_name = $request->main_team_name;
        $comp->second_team_name = $request->second_team_name;

        $comp->main_team_id = $request->main_team_id;
        $comp->second_team_id = $request->second_team_id;


        $comp->mvp_main = $request->mvp_main;
        $comp->mvp_second = $request->mvp_second;
        $comp->mvp_main_info = serialize($request->mvp_main_info);
        $comp->mvp_second_info = serialize($request->mvp_second_info);

        $sets = [];
        $set_count = 0;
        if(isset($request->main_set) && count($request->main_set) > 0){
            $main_set_count = 0;
            foreach($request->main_set as $ms){
                if($ms > 0 && $ms != ""){
                    $main_set_count += 1;
                }
            }
            $sets['main'] = $request->main_set;
            $set_count +=  $main_set_count;
        }

        if(isset($request->second_set) && count($request->second_set) > 0){
            $sets['second'] = $request->second_set;
        }

        $comp->set_count = $set_count;
        $comp->sets = serialize($sets);


        if( $request->hasFile('image') ){

            $old_path1 = $comp->image;

            if($old_path1 != ''){
                unlink('app/'.$old_path1);
            }
            $path1 = $request->file('image')->store('competition_image');
            $comp->image = $path1;

        }

        // $comp->image = $request->image;


        if( $request->hasFile('background_image') ){

            $old_path = $comp->image;

            if($old_path != ''){
                unlink('app/'.$old_path);
            }
            $path = $request->file('background_image')->store('competition_background_image');
            $comp->background_image = $path;

        }

        // $comp->background_image = $request->background_image;

        $comp->details = $request->details;
        $match_status['main'] = $request->request_match_status;
        $match_status['second'] = $request->request_match_second;
        $comp->match_status = serialize($match_status);
        $comp->match_guide = $request->match_guide;

        $comp->save();

        return redirect()->route('Competition.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comp = Competition::find($id);
        if($comp->image != ""){
            unlink('app/'.$comp->image);
        }
        if($comp->background_image != ""){
            unlink('app/'.$comp->background_image);
        }

        $comp->destroy();

        return redirect()->route('Compertition.index');

    }
}
