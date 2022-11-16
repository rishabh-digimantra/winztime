<?php
namespace App\Repository;

interface ICampaignRepository 
{
    public function getActiveCampaigns($user_id);

    public function getCloseCampaigns($user_id);

    public function getCampaignById($user_id,$id);
}
?>