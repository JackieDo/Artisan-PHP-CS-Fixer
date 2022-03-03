<?php

namespace Jackiedo\ArtisanPhpCsFixer\Console\Commands;

use Illuminate\Console\Command;

/**
 * The ArtisanPhpCsFixerVersion class.
 *
 * @package jackiedo/artisan-php-cs-fixer
 *
 * @author  Jackie Do <anhvudo@gmail.com>
 */
class ArtisanPhpCsFixerVersion extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'php-cs-fixer:version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display PHP-CS-Fixer version';

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

        passthru($phpCsFixerBinnaryPath . ' --version');
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
