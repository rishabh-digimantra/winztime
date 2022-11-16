<?php

namespace App\Models\Core;

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


}
