<?php

namespace HCWS\Providers;

use Illuminate\Support\ServiceProvider;

class CloudinaryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        \Cloudinary::config(array(
            "cloud_name" => env("CLOUDINARY_CLOUD_NAME", ""),
            "api_key" => env("CLOUDINARY_KEY", ""),
            "api_secret" => env("CLOUDINARY_SECRET", "")
        ));
    }
}
