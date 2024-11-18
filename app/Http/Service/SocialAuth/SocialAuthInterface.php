<?php

namespace App\Http\Service\SocialAuth;

interface SocialAuthInterface
{
    public function login();
    public function getUser();
    public function logout();
}