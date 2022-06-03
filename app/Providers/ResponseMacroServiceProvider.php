<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Response::macro('success', function ($message = "", $data = null) {
            return Response::json([
                'success'  => true,
                'message'  => $message,
                'data'     => $data,
            ]);
        });

        Response::macro('error', function ($message, $status = 500) {
            return Response::json([
                'success'  => false,
                'message'  => $message,
                'data'     => null,
            ], $status);
        });
    }
}
