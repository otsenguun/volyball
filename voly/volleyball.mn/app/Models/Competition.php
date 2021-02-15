<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
class Competition extends Model
{
    use HasFactory;

    public function scopeSearch($query, $s){
    	return $query->where('name','like','%'.$s.'%');
    }

    public function result(){
       return $this->score_main." : ".$this->score_second;
    }

    public function status(){
        if($this->status == 1){
            return "Эхлээгүй";
        }
        else{
            return "Дууссан";
        }
    }

    public function mainTeamLogo(){
        $team = Team::select('logo')->where('id',$this->main_team_id)->first();
        if($team !=''){
            return $team->logo;
        }
        else{
            return '';
        }
        // return
    }
    public function secondTeamLogo(){
        $team = Team::select('logo')->where('id',$this->second_team_id)->first();
        if($team !=''){
            return $team->logo;
        }
        else{
            return '';
        }

    }

}
