<?php namespace Jackiedo\ArtisanPhpCsFixer\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * The ArtisanPhpCsFixerDescribe class.
 *
 * @package Jackiedo\ArtisanPhpCsFixer
 * @author  Jackie Do <anhvudo@gmail.com>
 */
class ArtisanPhpCsFixerDescribe extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'php-cs-fixer:describe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Describe rule / ruleset of fixer.';

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

        passthru($phpCsFixerBinnaryPath.' describe '.$this->argument('name'));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            array('name', InputArgument::REQUIRED, 'Name of rule / set.'),
        ];
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
