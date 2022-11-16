<?php

namespace App\Models\Web;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

class Reward extends Model
{
    //
    use Sortable;

    public $sortable = ['id', 'title', 'created_at'];
    protected $fillable = ['id', 'title', 'reward_image', 'inventory', 'purchase_date', 'created_at', 'updated_at', 'reward_description'];
    protected $appends = ['full_path'];
    public function email()
    {


        $emails = DB::table('users')->select('email')->get();

        return $emails;
    }

    public function getreward($id)
    {

        $campaign = DB::table('rewards')->where('id', '=', $id)->get();


        return $campaign;
    }


    public function getFullPathAttribute($value)
    {
        return url('/') . "/images/" . $this->reward_image;  // whatever you want add here
    }


    public function getTitleAttribute($value)
    {
        $breaks = array("<br />", "<br>", "<br/>");
        $text = str_ireplace($breaks, "\r\n", $value);
        return    htmlspecialchars_decode($text);
    }
    public function getRewardDescriptionAttribute($value)
    {

        return strip_tags($value);
    }
}
