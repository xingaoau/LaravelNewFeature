<?php

namespace App\packages\FamilyPackage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use App\packages\FamilyPackage\Family;
use App\packages\FamilyPackage\Person;
use App\packages\FamilyPackage\Tv;

class FamilyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('Family', function () {
            echo "Family binding";
            return new Family(new Person(), new Tv());
        });
    }
}
