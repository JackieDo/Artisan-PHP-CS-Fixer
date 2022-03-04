<?php

namespace Jackiedo\ArtisanPhpCsFixer\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * The ArtisanPhpCsFixerFix class.
 *
 * @package jackiedo/artisan-php-cs-fixer
 *
 * @author  Jackie Do <anhvudo@gmail.com>
 */
class ArtisanPhpCsFixerFix extends BaseCommand
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
    protected $description = 'Fix php coding standards for directories or files';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $configFile = __DIR__ . '/../../Config/.php-cs-fixer.php';

        if (file_exists($rootConfig = base_path('.php-cs-fixer.php'))) {
            $configFile = $rootConfig;
        }

        if (!is_null($optionConfig = $this->option('config'))) {
            $configFile = $optionConfig;
        }

        $commandParams   = [];
        $commandParams[] = '--config="' . realpath($configFile) . '"';
        $commandParams[] = '--path-mode="' . $this->option('path-mode') . '"';

        if (!is_null($this->option('allow-risky'))) {
            $commandParams[] = '--allow-risky="' . $this->option('allow-risky') . '"';
        }

        if ($this->option('dry-run')) {
            $commandParams[] = '--dry-run';
        }

        if (!is_null($this->option('rules'))) {
            $commandParams[] = '--rules="' . $this->option('rules') . '"';
        }

        if (!is_null($this->option('using-cache'))) {
            $commandParams[] = '--using-cache="' . $this->option('using-cache') . '"';
        }

        if (!is_null($this->option('cache-file'))) {
            $commandParams[] = '--cache-file="' . $this->option('cache-file') . '"';
        }

        if ($this->option('diff')) {
            $commandParams[] = '--diff';
        }

        if (!is_null($this->option('format'))) {
            $commandParams[] = '--format="' . $this->option('format') . '"';
        }

        if ($this->option('stop-on-violation')) {
            $commandParams[] = '--stop-on-violation';
        }

        if (!is_null($this->option('show-progress'))) {
            $commandParams[] = '--show-progress="' . $this->option('show-progress') . '"';
        }

        if ($this->option('quiet')) {
            $commandParams[] = '--quiet';
        }

        if ($this->option('verbose')) {
            $commandParams[] = '--verbose';
        }

        if ($this->option('ansi')) {
            $commandParams[] = '--ansi';
        }

        if ($this->option('no-ansi')) {
            $commandParams[] = '--no-ansi';
        }

        if ($this->option('no-interaction')) {
            $commandParams[] = '--no-interaction';
        }

        if (!empty($this->argument('path'))) {
            $paths = [];

            foreach ($this->argument('path') as $path) {
                $paths[] = '"' . $path . '"';
            }

            $commandParams[] = implode(' ', $paths);
        }

        $paramString = (empty($commandParams)) ? '' : ' ' . implode(' ', $commandParams);

        passthru($this->phpCsFixerBinnary . ' fix' . $paramString);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['path', InputArgument::IS_ARRAY, 'The path to directory or file.', null],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['path-mode', null, InputOption::VALUE_REQUIRED, 'Specify path mode (can be override or intersection).', 'override'],
            ['allow-risky', null, InputOption::VALUE_REQUIRED, 'Are risky fixers allowed (can be yes or no).'],
            ['config', null, InputOption::VALUE_REQUIRED, 'The path to a .php-cs-fixer.php file.'],
            ['dry-run', null, InputOption::VALUE_NONE, 'Only shows which files would have been modified, leaving your files unchanged.'],
            ['rules', null, InputOption::VALUE_REQUIRED, 'The rules to apply for fixer (the rule names must be separated by a comma).'],
            ['using-cache', null, InputOption::VALUE_REQUIRED, 'Does cache should be used (can be yes or no).'],
            ['cache-file', null, InputOption::VALUE_REQUIRED, 'The path to the cache file.'],
            ['diff', null, InputOption::VALUE_NONE, 'Also produce diff for each file.'],
            ['format', null, InputOption::VALUE_REQUIRED, 'To output results in other formats.'],
            ['stop-on-violation', null, InputOption::VALUE_NONE, 'Stop execution on first violation.'],
            ['show-progress', null, InputOption::VALUE_REQUIRED, 'Type of progress indicator (none, run-in, or estimating).'],
        ];
    }
}
