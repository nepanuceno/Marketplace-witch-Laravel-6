<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('message_type', function($type_id) {
            return "<input id=\"message_type\" type=\"text\" name=\"type_id\" value=\"{$type_id}\">";
        });


//        Blade::directive('msg_error', function($field){
//            return "@error('photos')
//                <div class=\"invalid-feedback\">
//                    {{ $message }}
//                </div>
//                @enderror";
//        });

//        Blade::directive('delete_button', function($route, $param) {
//            return "<a href=\"javascript:void(0);\" class=\"btn btn-danger btn-sm\" data-toggle=\"tooltip\" onclick=\"$(this).find('form').submit();\" >
//            <i class=\"fas fa-trash\"></i>
//            <form action=\"{{ route('{$route}',[{$param}]) }}\" method=\"post\">
//                @method(\"DELETE\")
//                @csrf
//            </form>
//        </a>";
//        });
    }
}
