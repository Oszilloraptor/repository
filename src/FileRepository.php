<?php

declare(strict_types=1);

namespace Rikta\Repository;

use Rikta\Repository\Cache\Cache;
use RuntimeException;

/**
 * @template Item
 * @template-implements RepositoryInterface<string, Item>
 */
class FileRepository implements RepositoryInterface
{
    private Cache $cache;
    /** directory that stores the data for this query  */
    private string $dir;

    /**
     * @param string $dir    directory that stores the data for this query
     * @param bool   $cached should the files be cached?
     */
    public function __construct(string $dir, bool $cached = true)
    {
        if (!is_dir($dir) && !mkdir($dir, 0755, true) && !is_dir($dir)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $dir));
        }
        $this->cache = new Cache($cached);
        $this->dir = $dir;
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
            $this->cache->delete($key);
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
        return $this->cache->getOrCreate($key, fn () => $this->unserialize(file_get_contents($this->dir.$key)));
    }

    /** {@inheritDoc} */
    public function hasItem($key): bool
    {
        return $this->cache->has($key) || file_exists($this->getFilenameForKey($key));
    }

    /** {@inheritDoc} */
    public function setItem($key, $item): void
    {
        file_put_contents($this->getFilenameForKey($key), $this->cache->getOrCreate($key, fn () => $this->serialize($item)));
    }

    /** Returns the filename for a specific $key. */
    protected function getFilenameForKey(string $key): string
    {
        return $this->dir.\DIRECTORY_SEPARATOR.$key;
    }

    /**
     * Unserializes an Item.
     *
     * @param Item $item
     */
    protected function serialize($item): string
    {
        return $item;
    }

    /**
     * Serializes an Item.
     *
     * @return Item
     */
    protected function unserialize(string $serialized)
    {
        return $serialized;
    }

    public static function getTempDir(?string $identifier = null): string
    {
        return sys_get_temp_dir().\DIRECTORY_SEPARATOR.($identifier ?? uniqid('', true)).\DIRECTORY_SEPARATOR;
    }
}
