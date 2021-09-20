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
     * @depends testInitialises
     *
     * @return RepositoryInterface<string, string>
     */
    final public function testCreate(RepositoryInterface $repository): RepositoryInterface
    {
        $repository->setItem('a', 'A');
        $repository->setItem('b', 'B');
        $repository->setItem('c', 'C');
        $this->addToAssertionCount(1); // setItem works

        return $repository;
    }

    /**
     * @param RepositoryInterface<string, string> $repository
     * @depends testDeleteItem
     *
     * @return RepositoryInterface<string, string>
     */
    final public function testDeleteAllItems(RepositoryInterface $repository): RepositoryInterface
    {
        $repository->deleteAllItems();
        static::assertEmpty($repository->getAllItems());

        return $repository;
    }

    /**
     * @param RepositoryInterface<string, string> $repository
     * @depends testHasItem
     *
     * @return RepositoryInterface<string, string>
     */
    final public function testDeleteItem(RepositoryInterface $repository): RepositoryInterface
    {
        $repository->deleteItem('b');
        static::assertSame(['a' => 'A', 'c' => 'C'], $repository->getAllItems());

        return $repository;
    }

    /**
     * @param RepositoryInterface<string, string> $repository
     * @depends testCreate
     *
     * @return RepositoryInterface<string, string>
     */
    final public function testGetAllItems(RepositoryInterface $repository): RepositoryInterface
    {
        static::assertSame(['a' => 'A', 'b' => 'B', 'c' => 'C'], $repository->getAllItems());

        return $repository;
    }

    /**
     * @param RepositoryInterface<string, string> $repository
     * @depends testGetAllItems
     *
     * @return RepositoryInterface<string, string>
     */
    final public function testGetItem(RepositoryInterface $repository): RepositoryInterface
    {
        static::assertSame('A', $repository->getItem('a'));
        static::assertSame('B', $repository->getItem('b'));
        static::assertSame('C', $repository->getItem('c'));

        return $repository;
    }

    /**
     * @param RepositoryInterface<string, string> $repository
     * @depends testGetItem
     *
     * @return RepositoryInterface<string, string>
     */
    final public function testHasItem(RepositoryInterface $repository): RepositoryInterface
    {
        static::assertTrue($repository->hasItem('a'));
        static::assertFalse($repository->hasItem('z'));

        return $repository;
    }

    final public function testInitialises(): RepositoryInterface
    {
        $repository = $this->getRepositoryInterface();
        $this->addToAssertionCount(1); // constructor works

        return $repository;
    }
}
