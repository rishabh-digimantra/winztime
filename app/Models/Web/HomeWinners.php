<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeWinners extends Model
{


     protected $fillable = ['id', 'winner_title', 'winner_image', 'winner_prize', 'status', 'languages_id'];

    public function images(){
        return $this->belongsTo('App\Images');
    }


  

    
}