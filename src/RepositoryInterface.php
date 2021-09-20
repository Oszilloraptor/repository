<?php

declare(strict_types=1);

namespace Rikta\Repository;

/**
 * @template Key
 * @template Value
 */
interface RepositoryInterface
{
    /** Deletes all items. */
    public function deleteAllItems(): void;

    /**
     * Deletes the item(s) with key(s) ...$keys.
     *
     * @param Key ...$keys
     */
    public function deleteItem(...$keys): void;

    /**
     * Returns all items in the repository.
     *
     * @return array<Key, Value>
     */
    public function getAllItems(): array;

    /**
     * Returns the key of all currently stored objects.
     *
     * @return Key[]
     */
    public function getAllKeys(): array;

    /**
     * Returns the item with key $key.
     *
     * @param Key $key
     *
     * @throws ItemNotFoundException if there is no item with key $key
     *
     * @return Value|null
     */
    public function getItem($key);

    /**
     * Checks for existence of an item at key $key.
     *
     * @param Key $key
     */
    public function hasItem($key): bool;

    /**
     * Sets the $key to $item.
     *
     * @param Key   $key
     * @param Value $item
     */
    public function setItem($key, $item): void;
}
