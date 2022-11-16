<?php

namespace App\Models\Web;

use App\Http\Controllers\Web\AlertController;
use App\Models\Web\Index;
use App\Models\Web\Products;
use App\User;
use Auth;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Lang;
use Session;
use Socialite;

class Card extends Model
{
    

    public $fillable =[ 'user_id', 'cardnumber', 'cardholder', 'expirydate', 'securitycode'];
}
