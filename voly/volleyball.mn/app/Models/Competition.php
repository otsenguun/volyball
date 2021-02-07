<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
