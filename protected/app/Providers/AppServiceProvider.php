<?php

namespace App\Providers;
use App\Providers\View;
use App\Customer;
use App\Service;
use App\Level;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       /* $service = \DB::table('service')->select('service.name as nama','service.id as id')->where('type','bahasa')->orderBy('service.name', 'ASC')->get(); 

        $preparation = \DB::table('service')->select('service.name as nama','service.id as id')->where('type','preparation')->orderBy('service.name', 'ASC')->get(); 

        $test = \DB::table('service')->select('service.name as nama','service.id as id')->where('type','test')->orderBy('service.name', 'ASC')->get(); 
        $level = \DB::table('level')->select('level.name as nama','level.service_id as id')->orderBy('level.name', 'ASC')->get(); 
        return view('layouts.app',compact('service', 'preparation','test','level'));*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
