<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
class Player extends Model
{
    use HasFactory;


    public function scopeSearch($query, $s){
    	return $query->where('frist_name','like','%'.$s.'%');
    }

    public function player_type(){
        $player_type = [
            'forward' => 'Довтлогч',
            'defender' => 'Хамгаалагч',
            'midfielder' => 'Дунд блоккэр',
            'goalkeeper' => 'Либэро',
        ];

        return isset($player_type[$this->player_type]) ? $player_type[$this->player_type] : '';
    }

    public function getTeamLogo(){
        $team = Team::select('logo')->where('id',$this->team_id)->first();
        return $team->logo;
    }

    public function getTeamName(){
        $team = Team::select('team_name')->where('id',$this->team_id)->first();
        return $team->team_name;
    }

    public function getAge(){

        $year = strtotime($this->brithday);
        $now = strtotime(date('Y-m-d'));

        return intval((($now - $year)/86400)/365);
        // return date('Y-m-d') - $this->brithday;

    }

}
