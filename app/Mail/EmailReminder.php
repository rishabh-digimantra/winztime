<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Core\Campaign;
use Carbon;

class EmailReminder extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $day_after = Carbon\Carbon::now()->addDay(10)->format('Y-m-d 00:00:00');
        $close_soon = Campaign::where('status', '1')->where('campaign_type', '!=', 'regular')->where('end_date', '<=', $day_after);
        $close_soon_id = $close_soon->pluck('id')->toarray();
        $activeCampaigns = Campaign::withCount('getTicket')->with('getReward', 'getProducts.ProductDescription')
            ->where('status', '1')
            ->whereNotIn('id', $close_soon_id)
            ->whereRaw('campaigns.start_date <= CURDATE()')
            ->latest()->take(4)->get();
        return $this->subject('Wish you Happy Birthday')
            ->view('mail.emailReminder')
            ->with(['user' => $this->user, 'activeCampaigns' => $activeCampaigns]);
    }
}
