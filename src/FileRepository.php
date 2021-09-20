<?php

declare(strict_types=1);

namespace Rikta\Repository;

use RuntimeException;

/**
 * @template UnserializedItem
 * @template-implements RepositoryInterface<string, UnserializedItem>
 */
class FileRepository implements RepositoryInterface
{
    /**
     * @param string        $dir            directory that stores the data for this query
     * @param true|string[] $allowedClasses allowed classes for deserializing
     */
    public function __construct(string $dir, $allowedClasses = true)
    {
        if (!is_dir($dir) && !mkdir($dir, 0755, true) && !is_dir($dir)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $dir));
        }

        $this->dir = $dir;
        $this->allowedClasses = $allowedClasses;
    }

    /** Returns the filename for a specific $key. */
    protected function getFilenameForKey(string $key): string
    {
        return $this->dir.'/'.$key;
    }

    /**
     * Unserializes an Item.
     *
     * @param UnserializedItem $item
     */
    protected function serialize($item): string
    {
        return serialize($item);
    }

    /**
     * Serializes an Item.
     *
     * @return UnserializedItem
     */
    protected function unserialize(string $serialized)
    {
        return unserialize($serialized, ['allowedClasses' => $this->allowedClasses]);
    }

    /** {@inheritDoc} */
    public function deleteAllItems(): void
    {
        $this->deleteItem(...$this->getAllKeys());
    }

    /** {@inheritDoc} */
    public function deleteItem(...$keys): void
    {
        foreach ($keys as $key) {
            unlink($this->dir.$key);
        }
    }

    /** {@inheritDoc} */
    public function getAllItems(): array
    {
        $items = [];
        foreach ($this->getAllKeys() as $fileName) {
            $items[$fileName] = $this->getItem($fileName);
        }

        return $items;
    }

    /** {@inheritDoc} */
    public function getAllKeys(): array
    {
        return array_diff(scandir($this->dir), ['..', '.']);
    }

    /** {@inheritDoc} */
    public function getItem($key)
    {
        $serialized = file_get_contents($this->dir.$key);

        return $this->unserialize($serialized);
    }

    /** {@inheritDoc} */
    public function hasItem($key): bool
    {
        return file_exists($this->getFilenameForKey($key));
    }

    /** {@inheritDoc} */
    public function setItem($key, $item): void
    {
        file_put_contents($this->getFilenameForKey($key), $this->serialize($item));
    }

    /** @var true|string[] allowed classes for deserializing */
    private $allowedClasses;
    /** directory that stores the data for this query  */
    private string $dir;
}
