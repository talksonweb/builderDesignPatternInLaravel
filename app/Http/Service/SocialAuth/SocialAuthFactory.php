<?php

namespace App\Http\Service\SocialAuth;

use Symfony\Component\HttpFoundation\Response;

class SocialAuthFactory
{
    protected static string $providerPath = 'App\\Http\\Service\\SocialAuth\\Providers';

    public static function create(string $provider)
    {
        $providerFullPath = self::$providerPath . '\\' . ucfirst($provider) . 'Provider';

        if (! class_exists($providerFullPath)) {
            return throw new \Exception('there was a problem ' . $providerFullPath, Response::HTTP_NOT_FOUND);
        }
        
        return new $providerFullPath;
    }
}