<?php

declare(strict_types=1);

namespace Rikta\Repository\Tests;

/**
 * @internal
 * @coversNothing
 */
abstract class AbstractFileRepositoryFunctionalTestCase extends AbstractRepositoryTestCase
{
    protected string $dir;

    protected function setUp(): void
    {
        $this->dir = __DIR__.'/../tmp/'.uniqid('', true).'/';
    }
}
