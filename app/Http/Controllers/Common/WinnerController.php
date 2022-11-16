<?php

namespace App\Http\Controllers\Common;

use App\Jobs\SendEmailJob;
use App\Jobs\EmailReminder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Core\Campaign;
use App\Models\Core\User;
use App\Models\Web\Customer;
use Carbon;
use Validator;
use Mail;
use DB;

class WinnerController extends Controller
{
    public function sendWinnerListMail(Request $request)
    {
        // return $request;
        $id = $request->id;
        $winner_campaign = Campaign::with('getReward')->where('id', $id)->get();
        $order_user = DB::table('tickets')->where('campaign_id', $winner_campaign[0]->id)->where('type', "O")->pluck('customers_id')->unique()->toArray();
        $order_user = DB::table('tickets')->where('campaign_id', $winner_campaign[0]->id)->where('type', "O")->pluck('customers_id')->unique()->toArray();
        $campaignList = Campaign::with('getReward', 'getProducts.ProductDescription')->where('status', '1')->whereRaw('campaigns.start_date <= CURDATE()')->take(3)->latest()->get();
        SendEmailJob::dispatch($winner_campaign, $campaignList,$order_user);
        return view('mail.winnerList', compact('winner_campaign', 'campaignList'));
        return 'done';
    }

    public function sendWinnerListMail1(Request $request)
    {
        $id = array('45');
        // $id = $request->id;
        $winner_campaign = Campaign::with('getReward')->whereIn('id', $id)->get();
        $campaignList = Campaign::with('getReward', 'getProducts.ProductDescription')->where('status', '1')->whereRaw('campaigns.start_date <= CURDATE()')->take(3)->latest()->get();
        Mail::send('mail.winnerList', ['winner_campaign' => $winner_campaign, 'campaignList' => $campaignList, 'name' => 'Test Name'], function ($m) {
            $m->to('kumarhursh7@gmail.com')->subject("Lucky Draw Winner Announcement");
        });
        return 'done';
    }

    // public function campaignStart($id = null)
    // {
    //     $today = date('Y-m-d 00:00:00');
    //      $campaigns = DB::table('campaigns')
    //         ->where(
    //             function ($query) use ($id) {
    //                 if ($id) {
    //                     $query->where('id', $id);
    //                 }
    //                 // $query->where('status', '0');
    //             }
    //         )
    //         ->latest()
    //         ->get();
    //     foreach ($campaigns as $campaign) {
    //         $campaigns_id = $campaign->id;
    //         $startDate = strtotime(date('Y-m-d', strtotime($campaign->start_date) ) );
    //         $currentDate = strtotime(date('Y-m-d'));
    //         $endDate = strtotime(date('Y-m-d', strtotime($campaign->end_date) ) );

    //         if ($startDate <= $currentDate && $endDate > $currentDate) {
    //            $status = 1;
    //            echo 'on';
    //         }
    //         else {
    //             $status = 0;
    //            echo 'off';
    //         }
    //         DB::table('campaigns')->where('id', $campaigns_id)->update(['status' => $status]);

    //     }
    // }

    public function campaignExpire($id = null)
    {
        $today = date('Y-m-d 00:00:00');
        $campaigns = DB::table('campaigns')
            ->where(
                function ($query) use ($id) {
                    if ($id) {
                        $query->where('id', $id);
                    }
                    $query->where('status', '1');
                }
            )
            ->latest()
            ->get();
        foreach ($campaigns as $campaign) {
            $end_date = $campaign->end_date;
            $campaigns_id = $campaign->id;
            if ($today >= $end_date) {
                DB::table('campaigns')->where('id', $campaigns_id)->update(['status' => 0]);
                DB::table('customers_basket')->where('campaign_id', $campaigns_id)->delete();
                // echo $campaigns_id . ' is updated <br>';
            }
            $total_order = DB::table('tickets')->where('campaign_id', $campaigns_id)->where('type', 'O')->count();
            if ($total_order == $campaign->no_of_orders) {
                DB::table('campaigns')->where('id', $campaigns_id)->update(['status' => 0]);
                DB::table('customers_basket')->where('campaign_id', $campaigns_id)->delete();
                // echo $campaigns_id . ' is updated <br>';
            }
        }
        // echo 'cron sucessfull hit';
    }

    public function BirthdayEmail()
    {
        // whereIn('email', ['rishab.rishab@digimantra.com','harpreet.digimantra@hotmail.com','rishab.digimantra@gmail.com','harpreet.digimantra@yahoo.com','ali.jaber@winztime.com','deepak.kumar@digimantra.com','rohit.puri@digimantra.com'])->
        $users = User::get();
        foreach ($users as $key => $user) {
            $birthDate = $user->dob;
            $time = strtotime($birthDate);
            if (date('m-d') == date('m-d', $time)) {
                EmailReminder::dispatch($user);
                DB::table('users')->where('id', $user->id)->increment('redeem_points', 100);
                echo $user->id . '<br>';
            }
        }
        echo 'done';
    }
}
