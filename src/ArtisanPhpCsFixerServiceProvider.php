<?php

namespace Jackiedo\ArtisanPhpCsFixer;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Jackiedo\ArtisanPhpCsFixer\Console\Commands\ArtisanPhpCsFixerDescribe;
use Jackiedo\ArtisanPhpCsFixer\Console\Commands\ArtisanPhpCsFixerFix;
use Jackiedo\ArtisanPhpCsFixer\Console\Commands\ArtisanPhpCsFixerVersion;

/**
 * The ArtisanPhpCsFixerServiceProvider class.
 *
 * @package jackiedo/artisan-php-cs-fixer
 *
 * @author  Jackie Do <anhvudo@gmail.com>
 */
class ArtisanPhpCsFixerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->bootConfig();
        $this->bootCommands();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.phpcsfixer.version', function ($app) {
            return new ArtisanPhpCsFixerVersion;
        });

        $this->app->singleton('command.phpcsfixer.fix', function ($app) {
            return new ArtisanPhpCsFixerFix;
        });

        $this->app->singleton('command.phpcsfixer.describe', function ($app) {
            return new ArtisanPhpCsFixerDescribe;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.phpcsfixer.version',
            'command.phpcsfixer.fix',
            'command.phpcsfixer.describe',
        ];
    }

    /**
     * Publish php-cs-fixer's config file to the root directory of project.
     *
     * @return void
     */
    protected function bootConfig()
    {
        $sourceConfig = __DIR__ . '/Config/.php-cs-fixer.php';
        $exportConfig = base_path('.php-cs-fixer.dist.php');

        $this->publishes([
            $sourceConfig => $exportConfig,
        ], 'fixer-config');
    }

    /**
     * Handle package's commands.
     *
     * @return void
     */
    protected function bootCommands()
    {
        $this->commands([
            'command.phpcsfixer.version',
            'command.phpcsfixer.fix',
            'command.phpcsfixer.describe',
        ]);
    }
}
