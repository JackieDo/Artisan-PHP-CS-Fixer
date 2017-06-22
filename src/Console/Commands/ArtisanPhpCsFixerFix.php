<?php namespace Jackiedo\ArtisanPhpCsFixer\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * The ArtisanPhpCsFixerFix class.
 *
 * @package Jackiedo\ArtisanPhpCsFixer
 * @author  Jackie Do <anhvudo@gmail.com>
 */
class ArtisanPhpCsFixerFix extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'php-cs-fixer:fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix php coding standards for a directory or a file';

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
        $this->info('This is a PHP-CS-Fixer bridge for use via Artisan CLI on Laravel.');
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
