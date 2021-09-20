<?php

declare(strict_types=1);

namespace Rikta\Repository\Tests;

use Rikta\Repository\FileRepository;
use Rikta\Repository\RepositoryInterface;

/**
 * @internal
 * @coversNothing
 */
final class FileRepositoryFunctionalTest extends AbstractFileRepositoryFunctionalTestCase
{
    protected function getRepositoryInterface(): RepositoryInterface
    {
        return new FileRepository($this->dir);
    }
}
