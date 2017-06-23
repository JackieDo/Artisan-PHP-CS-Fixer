<?php namespace Jackiedo\ArtisanPhpCsFixer;

use Illuminate\Support\ServiceProvider;
use Jackiedo\ArtisanPhpCsFixer\Console\Commands\ArtisanPhpCsFixerFix;
use Jackiedo\ArtisanPhpCsFixer\Console\Commands\ArtisanPhpCsFixerVersion;
use Jackiedo\ArtisanPhpCsFixer\Console\Commands\ArtisanPhpCsFixerDescribe;
use Jackiedo\ArtisanPhpCsFixer\Console\Commands\ArtisanPhpCsFixerReadme;

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

        $this->app->singleton('command.phpcsfixer.version', function ($app) {
            return new ArtisanPhpCsFixerVersion;
        });

        $this->app->singleton('command.phpcsfixer.describe', function ($app) {
            return new ArtisanPhpCsFixerDescribe;
        });

        $this->app->singleton('command.phpcsfixer.readme', function ($app) {
            return new ArtisanPhpCsFixerReadme;
        });

        $this->commands('command.phpcsfixer.fix');
        $this->commands('command.phpcsfixer.version');
        $this->commands('command.phpcsfixer.describe');
        $this->commands('command.phpcsfixer.readme');
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
            'command.phpcsfixer.version',
            'command.phpcsfixer.describe',
            'command.phpcsfixer.readme',
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
