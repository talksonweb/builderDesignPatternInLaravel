<?php

namespace App\Http\Service\SocialAuth\Providers;

use App\Http\Service\SocialAuth\SocialAuthInterface;

class InstagramProvider implements SocialAuthInterface
{
    public function login()
    {
        echo ' In the '. __FUNCTION__ .' for ' . __CLASS__ . '<br /><br />'; 
    }

    public function getUser()
    {
        echo ' In the '. __FUNCTION__ .' for ' . __CLASS__ . '<br /><br />';
    }

    public function logout()
    {
        echo ' In the '. __FUNCTION__ .' for ' . __CLASS__ . '<br /><br />';
    }

}