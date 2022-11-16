<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;
    protected $winner_campaign;
    protected $campaignList;
    protected $user_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($winner_campaign, $campaignList, $user_name)
    {
        $this->winner_campaign = $winner_campaign;
        $this->campaignList = $campaignList;
        $this->user_name = $user_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Lucky Draw Winner Announcement')->view('mail.winnerList')->with(['winner_campaign' => $this->winner_campaign, 'campaignList' => $this->campaignList,'name' => $this->user_name]);
    }
}
