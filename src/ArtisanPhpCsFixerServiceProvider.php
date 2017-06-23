<?php namespace Jackiedo\ArtisanPhpCsFixer;

use Illuminate\Support\ServiceProvider;
use Jackiedo\ArtisanPhpCsFixer\Console\Commands\ArtisanPhpCsFixerFix;

/**
 * The ArtisanPhpCsFixerServiceProvider class.
 *
 * @package Jackiedo\ArtisanPhpCsFixer
 * @author  Jackie Do <anhvudo@gmail.com>
 */
class ArtisanPhpCsFixerServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->configHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.phpcsfixer.fix', function ($app) {
            return new ArtisanPhpCsFixerFix;
        });

        $this->commands('command.phpcsfixer.fix');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.phpcsfixer.fix',
        ];
    }

    /**
     * Publish php-cs-fixer's config file to the root directory of project.
     *
     * @return void
     */
    protected function configHandle()
    {
        $sourceConfig = __DIR__.'/Config/.php_cs';
        $exportConfig = base_path('.php_cs');

        $this->publishes([
            $sourceConfig => $exportConfig,
        ], 'config');
    }
}
