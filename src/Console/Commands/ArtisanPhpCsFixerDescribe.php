<?php

namespace Jackiedo\ArtisanPhpCsFixer\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;

/**
 * The ArtisanPhpCsFixerDescribe class.
 *
 * @package jackiedo/artisan-php-cs-fixer
 *
 * @author  Jackie Do <anhvudo@gmail.com>
 */
class ArtisanPhpCsFixerDescribe extends BaseCommand
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
    protected $description = 'Describe rule / rule set of fixer.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        passthru($this->phpCsFixerBinnary . ' describe ' . $this->argument('name'));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Name of rule / rule set.'],
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
