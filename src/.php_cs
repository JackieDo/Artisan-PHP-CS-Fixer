<?php

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

$finder = Finder::create()
    ->exclude('bootstrap')
    ->exclude('resources')
    ->exclude('storage')
    ->exclude('vendor')
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php')
    ->notName('_ide_helper.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$rules = [
    '@Symfony' => true,
    'binary_operator_spaces' => [
        'align_double_arrow' => true,
        'align_equals' => true,
    ],
    'braces' => [
        'allow_single_line_closure' => true,
    ],
    'no_empty_comment' => false,
    'no_extra_consecutive_blank_lines' => [
        'tokens' => [
            'parenthesis_brace_block',
            'extra',
            'throw',
            'use',
        ]
    ],
    'no_blank_lines_after_class_opening' => false,
    'new_with_braces' => false,
    'blank_line_after_opening_tag' => false,
];

return Config::create()
    ->setFinder($finder)
    ->setRules($rules)
    ->setUsingCache(true);
