<?php namespace Jackiedo\ArtisanPhpCsFixer\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * The ArtisanPhpCsFixerReadme class.
 *
 * @package Jackiedo\ArtisanPhpCsFixer
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
     *
     * @return void
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

        passthru($phpCsFixerBinnaryPath.' readme');
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
