<?php

declare(strict_types=1);

namespace Rikta\Repository\Tests;

use Rikta\Repository\ArrayRepository;
use Rikta\Repository\RepositoryInterface;

/**
 * @internal
 * @coversNothing
 *
 * @small
 */
final class ArrayRepositoryFunctionalTest extends AbstractRepositoryTestCase
{
    protected function getRepositoryInterface(): RepositoryInterface
    {
        return new ArrayRepository();
    }
}
