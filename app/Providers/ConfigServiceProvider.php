<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        config([
			'laravellocalization.supportedLocales' => [
				'ca'  => [
                    'name' => 'Catalan',
                    'script' => 'Latn',
                    'native' => 'català',
                    'regional' => 'ca_ES',
                ],
                'en'  => [
                    'name' => 'English',
                    'script' => 'Latn',
                    'native' => 'english',
                    'regional' => 'en_GB'
                    
                ],
                'es' => [
                    'name' => 'Spanish',
                    'script' => 'Latn',
                    'native' => 'español',
                    'regional' => 'es_ES'
                ]
			],

            // If false, system will take app.php locale attribute
			'laravellocalization.useAcceptLanguageHeader' => true,

            'laravellocalization.hideDefaultLocaleInURL' => true,
            
            'laravellocalization.urlsIgnored' => [''],
        ]);

        $locales = collect(config('laravellocalization.supportedLocales'))->map(function($locale, $key){
            return $locale['native'];
        })->toArray();

        config(['backpack.crud.locales' => $locales]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
