<?php

namespace Jackiedo\ArtisanPhpCsFixer\Console\Commands;

use Illuminate\Console\Command;
use Jackiedo\PathHelper\Path;

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
     * Path to PHP-CS-Fixer binary file.
     *
     * @var string
     */
    protected $phpCsFixerBinary;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->phpCsFixerBinary = Path::osStyle(base_path('vendor/bin/php-cs-fixer'));
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
