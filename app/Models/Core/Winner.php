<?php



namespace App\Models\Core;



use http\Env\Request;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Kyslik\ColumnSortable\Sortable;



class Winner extends Model

{

    //

    use Sortable;



    public $sortable = ['id', 'title', 'created_at'];



    protected $fillable = ['id', 'campaigns_id', 'customers_id', 'status', 'created_at'];

    public function email()
    {





        $emails = DB::table('users')->select('email')->get();



        return $emails;
    }



    public function getwinner($id)
    {



        $campaign = DB::table('winners')->where('id', '=', $id)->get();





        return $campaign;
    }


    public function getUser()
    {
        return $this->hasone(User::class,'id','customers_id');
    }
}
