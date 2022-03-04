<?php

namespace Jackiedo\ArtisanPhpCsFixer\Console\Commands;

use Illuminate\Console\Command;

/**
 * The BaseCommand class.
 *
 * @package jackiedo/artisan-php-cs-fixer
 *
 * @author  Jackie Do <anhvudo@gmail.com>
 */
abstract class BaseCommand extends Command
{
    /**
     * Path to PHP-CS-Fixer binnary file
     *
     * @var string
     */
    protected $phpCsFixerBinnary;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->phpCsFixerBinnary = base_path('vendor/bin/php-cs-fixer');
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
     * Execute the console command.
     *
     * @return mixed
     */
    abstract public function fire();
}
