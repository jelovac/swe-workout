<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'protected_to_private' => false,
    ])
    ->setFinder(
        (new PhpCsFixer\Finder())->in(__DIR__ . '/src')
    )
    ->setCacheFile('.php-cs-fixer.cache');
