<?php

namespace Jackiedo\ArtisanPhpCsFixer\Console\Commands;

/**
 * The ArtisanPhpCsFixerVersion class.
 *
 * @package Jackiedo\ArtisanPhpCsFixer
 *
 * @author  Jackie Do <anhvudo@gmail.com>
 */
class ArtisanPhpCsFixerVersion extends BaseCommand
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
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        passthru($this->phpCsFixerBinary . ' --version');
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
