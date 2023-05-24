<?php

namespace App\Http\Controllers;

class SecretController extends Controller
{
    public function showSecret()
    {
        return response()->json([
            'location' => getenv('SECRET_LOCATION')
        ]);
    }
}
