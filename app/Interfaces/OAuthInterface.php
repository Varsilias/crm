<?php

namespace App\Interfaces;

interface OAuthInterface
{
    public function redirectToProvider(string $provider);

    public function getUserInfoFromProvider(string $provider);

}
