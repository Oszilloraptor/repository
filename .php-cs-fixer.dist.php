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
        'date_time_immutable' => true,
        'final_public_method_for_abstract_class' => true,
        'global_namespace_import' => true,
        'nullable_type_declaration_for_default_null_value' => true,
        'ordered_class_elements' => ['order' => ['constant', 'constant_private', 'constant_protected', 'constant_public', 'construct', 'destruct', 'magic', 'method', 'method_abstract', 'method_private', 'method_private_static', 'method_protected', 'method_protected_abstract', 'method_protected_abstract_static', 'method_protected_static', 'method_public', 'method_public_abstract', 'method_public_abstract_static', 'method_public_static', 'method_static', 'phpunit', 'private', 'property', 'property_private', 'property_private_static', 'property_protected', 'property_protected_static', 'property_public', 'property_public_static', 'property_static', 'protected', 'public', 'use_trait'], 'sort_algorithm' => 'alpha'],
        'ordered_interfaces' => true,
        'phpdoc_line_span' => ['const' => 'single', 'property' => 'single', 'method' => 'single'],
        'phpdoc_order_by_value' => ['annotations' => ['author', 'covers', 'coversNothing', 'dataProvider', 'depends', 'group', 'internal', 'method', 'property', 'property-read', 'property-write', 'requires', 'throws', 'uses']],
        'phpdoc_tag_casing' => true,
        'regular_callable_call' => true,
        'self_static_accessor' => true,
        'simplified_if_return' => true,
        'simplified_null_return' => true,
    ]
)
;
