<?php

declare(strict_types=1);

namespace Rikta\Repository;

/**
 * @template Item
 * @extends AbstractQuery<string|int, Item>
 */
class ArrayRepository implements RepositoryInterface
{
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /** {@inheritDoc} */
    public function deleteAllItems(): void
    {
        $this->data = [];
    }

    /** {@inheritDoc} */
    public function deleteItem(...$keys): void
    {
        foreach ($keys as $key) {
            unset($this->data[$key]);
        }
    }

    /** {@inheritDoc} */
    public function getAllItems(): array
    {
        return $this->data;
    }

    public function getAllKeys(): array
    {
        return array_keys($this->data);
    }

    /** {@inheritDoc} */
    public function getItem($key)
    {
        return $this->data[$key];
    }

    /** {@inheritDoc} */
    public function hasItem($key): bool
    {
        return \array_key_exists($key, $this->data);
    }

    /** {@inheritDoc} */
    public function setItem($key, $item): void
    {
        $this->data[$key] = $item;
    }

    /** @var array<string, Item> */
    private array $data;
}
