<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->in(__DIR__)
    ->exclude('vendor')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
;

return (new PhpCsFixer\Config())
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP74Migration' => true,
        '@PHP74Migration:risky' => true,
        '@PHPUnit84Migration:risky' => true,
        '@PSR12' => true,
        '@PSR12:risky' => true,
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'align_multiline_comment' => ['comment_type' => 'all_multiline'],
        'binary_operator_spaces' => true,
        'blank_line_before_statement' => [
            'statements' => [
                'continue',
                'default',
                'exit',
                'if',
                'return',
                'throw',
                'try',
                'yield',
            ],
        ],
        'cast_spaces' => ['space' => 'none'],
        'date_time_immutable' => true,
        'declare_parentheses' => true,
        'final_internal_class' => ['consider_absent_docblock_as_internal_class' => false],
        'final_public_method_for_abstract_class' => true,
        'fopen_flags' => ['b_mode' => true],
        'general_phpdoc_tag_rename' => true,
        'global_namespace_import' => true,
        'mb_str_functions' => true,
        'no_unset_on_property' => false,
        'nullable_type_declaration_for_default_null_value' => true,
        'operator_linebreak' => true,
        'ordered_class_elements' => [
            'order' => [
                'use_trait',

                'constant',
                'constant_public',
                'constant_protected',
                'constant_private',

                'property_static',
                'property_public_static',
                'property_protected_static',
                'property_private_static',

                'property',
                'property_public',
                'property_protected',
                'property_private',

                'construct',
                'destruct',
                'magic',
                'phpunit',

                'method_abstract',
                'method_public_abstract',
                'method_protected_abstract',

                'method',
                'method_public',
                'method_protected',
                'method_private',

                'method_public_abstract_static',
                'method_protected_abstract_static',
                'method_static',
                'method_public_static',
                'method_protected_static',
                'method_private_static',
            ],
            'sort_algorithm' => 'alpha',
        ],
        'ordered_interfaces' => true,
        'php_unit_dedicate_assert' => ['target' => 'newest'],
        'php_unit_dedicate_assert_internal_type' => ['target' => 'newest'],
        'php_unit_expectation' => ['target' => 'newest'],
        'php_unit_internal_class' => ['types' => ['abstract', 'final', 'normal']],
        'php_unit_method_casing' => ['case' => 'camel_case'],
        'php_unit_mock' => ['target' => 'newest'],
        'php_unit_namespaced' => ['target' => 'newest'],
        'php_unit_no_expectation_annotation' => ['target' => 'newest'],
        'php_unit_size_class' => ['group' => 'small'],
        'php_unit_test_annotation' => ['style' => 'annotation'],
        'php_unit_test_case_static_method_calls' => true,
        'php_unit_test_class_requires_covers' => false,
        'phpdoc_align' => [
            'tags' => [
                'method',
                'param',
                'property',
                'property-read',
                'property-write',
                'return',
                'throws',
                'type',
                'var',
            ],
        ],
        'phpdoc_line_span' => [
            'const' => 'single',
            'property' => 'single',
            'method' => 'single',
        ],
        'phpdoc_order_by_value' => [
            'annotations' => [
                'author',
                'covers',
                'coversNothing',
                'dataProvider',
                'depends',
                'group',
                'internal',
                'method',
                'property',
                'property-read',
                'property-write',
                'requires',
                'throws',
                'uses',
            ],
        ],
        'phpdoc_tag_casing' => true,
        'regular_callable_call' => true,
        'self_static_accessor' => true,
        'simplified_if_return' => true,
        'simplified_null_return' => true,
        'static_lambda' => true,
        'trailing_comma_in_multiline' => ['elements' => ['arguments', 'arrays']],
        'yoda_style' => [
            'always_move_variable' => true,
            'less_and_greater' => true,
        ],
    ],
)
;
