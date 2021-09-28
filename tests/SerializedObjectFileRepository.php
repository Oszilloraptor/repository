<?php

declare(strict_types=1);

namespace Rikta\Repository\Tests;

use Rikta\Repository\RepositoryInterface;
use Rikta\Repository\SerializedObjectsFileRepository;

/**
 * @internal
 * @coversNothing
 *
 * @small
 */
final class SerializedObjectFileRepository extends AbstractFileRepositoryFunctionalTestCase
{
    protected function getRepositoryInterface(): RepositoryInterface
    {
        return new SerializedObjectsFileRepository($this->dir);
    }
}
