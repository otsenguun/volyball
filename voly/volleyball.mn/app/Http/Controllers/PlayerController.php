<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;
class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->s;
        $players = Player::search($s)->paginate(50);

        return view('admin.players.index',compact('s','players'));
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

        $player_type = [
            'forward' => 'Довтлогч',
            'defender' => 'Хамгаалагч',
            'midfielder' => 'Дунд блоккэр',
            'goalkeeper' => 'Либэро',
        ];

        $teams = Team::select('id','team_name')->get();
        return view('admin.players.create',compact('team_statistic','teams','player_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $player = new Player;
        $player->frist_name = $request->frist_name;
        $player->last_name = $request->last_name;
        $player->huviin_number = $request->huviin_number;
        $player->player_type = $request->player_type;
        $player->team_id = $request->team_id;
        $player->total_match = $request->total_match;
        $player->total_score = $request->total_score;
        $player->total_mvp = $request->total_mvp;
        $player->facebook = $request->facebook;
        $player->twiter = $request->twiter;
        $player->instagramm = $request->instagramm;
        $player->you_tube = $request->you_tube;
        $player->details = $request->details;
        $player->weight = $request->weight;
        $player->lenght = $request->lenght;
        $player->country = $request->country;
        $player->country_live = $request->country_live;
        $player->brithday = $request->brithday;



        if( $request->hasFile('image') ){

            $path = $request->file('image')->store('players_image');
            $player->image = $path;
        }

        if( $request->hasFile('cover') ){

            $path1 = $request->file('cover')->store('players_cover');
            $player->cover_image = $path1;
        }
        if( $request->hasFile('background_image') ){

            $path2 = $request->file('background_image')->store('players_background_image');
            $player->background_image = $path2;
        }
        $player->brithday = $request->brithday;
        $player->carrer = $request->carrer;
        $player->statistik = serialize($request->statictic);
        $player->save();

        return redirect()->route('Player.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::find($id);
        return view('admin.players.show',compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $player = Player::find($id);
        $teams = Team::select('id','team_name')->get();
        $player_type = [
            'forward' => 'Довтлогч',
            'defender' => 'Хамгаалагч',
            'midfielder' => 'Дунд блоккэр',
            'goalkeeper' => 'Либэро',
        ];
        return view('admin.players.edit',compact('player','team_statistic','teams','player_type'));

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
        $player = Player::find($id);
        $player->frist_name = $request->frist_name;
        $player->last_name = $request->last_name;
        $player->huviin_number = $request->huviin_number;
        $player->player_type = $request->player_type;
        $player->team_id = $request->team_id;
        $player->total_match = $request->total_match;
        $player->total_score = $request->total_score;
        $player->total_mvp = $request->total_mvp;
        $player->facebook = $request->facebook;
        $player->twiter = $request->twiter;
        $player->instagramm = $request->instagramm;
        $player->you_tube = $request->you_tube;
        $player->details = $request->details;
        $player->weight = $request->weight;
        $player->lenght = $request->lenght;
        $player->country = $request->country;
        $player->country_live = $request->country_live;
        $player->brithday = $request->brithday;



        if( $request->hasFile('image') ){

            $old_path = $player->image;

            if($old_path != ''){
                unlink('app/'.$old_path);
            }
            $path = $request->file('image')->store('players_image');
            $player->image = $path;
        }

        if( $request->hasFile('cover') ){

            $old_path1 = $player->image;

            if($old_path1 != ''){
                unlink('app/'.$old_path1);
            }
            $path1 = $request->file('cover')->store('players_cover');
            $player->cover_image = $path1;
        }

        if( $request->hasFile('background_image') ){

            $old_path2 = $player->image;

            if($old_path2 != ''){
                unlink('app/'.$old_path2);
            }

            $path2 = $request->file('background_image')->store('players_background_image');
            $player->background_image = $path2;
        }

        $player->brithday = $request->brithday;
        $player->carrer = $request->carrer;
        $player->statistik = serialize($request->statictic);
        $player->save();

        return redirect()->route('Player.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $player = Player::find($id);
        $player->destroy();

        return redirect()->route('Player.index');
    }
}
