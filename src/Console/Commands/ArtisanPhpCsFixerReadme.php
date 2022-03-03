<?php

namespace Jackiedo\ArtisanPhpCsFixer\Console\Commands;

use Illuminate\Console\Command;

/**
 * The ArtisanPhpCsFixerReadme class.
 *
 * @package jackiedo/artisan-php-cs-fixer
 *
 * @author  Jackie Do <anhvudo@gmail.com>
 */
class ArtisanPhpCsFixerReadme extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'php-cs-fixer:readme';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display PHP-CS-Fixer README content';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $phpCsFixerBinnaryPath = base_path('vendor/bin/php-cs-fixer');

        passthru($phpCsFixerBinnaryPath . ' readme');
    }

    /**
     * Alias of the fire() method.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->fire();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
