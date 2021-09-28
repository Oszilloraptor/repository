<?php

declare(strict_types=1);

namespace Rikta\Repository\Tests;

use PHPUnit\Framework\TestCase;
use Rikta\Repository\RepositoryInterface;

/**
 * @internal
 * @coversNothing
 */
abstract class AbstractRepositoryTestCase extends TestCase
{
    /** @return RepositoryInterface<string, string> */
    abstract protected function getRepositoryInterface(): RepositoryInterface;

    /**
     * @param RepositoryInterface<string, string> $repository
     * @depends initialises
     *
     * @return RepositoryInterface<string, string>
     *
     * @test
     */
    final public function create(RepositoryInterface $repository): RepositoryInterface
    {
        $repository->setItem('a', 'A');
        $repository->setItem('b', 'B');
        $repository->setItem('c', 'C');
        $this->addToAssertionCount(1); // setItem works

        return $repository;
    }

    /**
     * @param RepositoryInterface<string, string> $repository
     * @depends deleteItem
     *
     * @return RepositoryInterface<string, string>
     *
     * @test
     */
    final public function deleteAllItems(RepositoryInterface $repository): RepositoryInterface
    {
        $repository->deleteAllItems();
        static::assertEmpty($repository->getAllItems());

        return $repository;
    }

    /**
     * @param RepositoryInterface<string, string> $repository
     * @depends hasItem
     *
     * @return RepositoryInterface<string, string>
     *
     * @test
     */
    final public function deleteItem(RepositoryInterface $repository): RepositoryInterface
    {
        $repository->deleteItem('b');
        static::assertSame(['a' => 'A', 'c' => 'C'], $repository->getAllItems());

        return $repository;
    }

    /**
     * @param RepositoryInterface<string, string> $repository
     * @depends create
     *
     * @return RepositoryInterface<string, string>
     *
     * @test
     */
    final public function getAllItems(RepositoryInterface $repository): RepositoryInterface
    {
        static::assertSame(['a' => 'A', 'b' => 'B', 'c' => 'C'], $repository->getAllItems());

        return $repository;
    }

    /**
     * @param RepositoryInterface<string, string> $repository
     * @depends getAllItems
     *
     * @return RepositoryInterface<string, string>
     *
     * @test
     */
    final public function getItem(RepositoryInterface $repository): RepositoryInterface
    {
        static::assertSame('A', $repository->getItem('a'));
        static::assertSame('B', $repository->getItem('b'));
        static::assertSame('C', $repository->getItem('c'));

        return $repository;
    }

    /**
     * @param RepositoryInterface<string, string> $repository
     * @depends getItem
     *
     * @return RepositoryInterface<string, string>
     *
     * @test
     */
    final public function hasItem(RepositoryInterface $repository): RepositoryInterface
    {
        static::assertTrue($repository->hasItem('a'));
        static::assertFalse($repository->hasItem('z'));

        return $repository;
    }

    /** @test */
    final public function initialises(): RepositoryInterface
    {
        $repository = $this->getRepositoryInterface();
        $this->addToAssertionCount(1); // constructor works

        return $repository;
    }
}
