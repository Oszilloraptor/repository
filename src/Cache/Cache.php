<?php

declare(strict_types=1);

namespace Rikta\Repository\Cache;

/**
 * Very primitive Cache, but still faster than multiple times unserializing or computing something.
 *
 * @template K
 * @template V
 *
 * @internal
 */
final class Cache
{
    public function __construct(bool $enabled = true)
    {
        $this->enabled = $enabled;
    }

    public function create($key, callable $callable, ...$args)
    {
        return $this->set($key, $callable(...$args));
    }

    public function delete($key): void
    {
        unset($this->data[$key]);
    }

    public function get($key)
    {
        return $this->data[$key];
    }

    public function getOrCreate($key, callable $callable, ...$args)
    {
        return $this->enabled && $this->has($key) ? $this->get($key) : $this->create($key, $callable, ...$args);
    }

    public function has($key)
    {
        return $this->enabled && \array_key_exists($key, $this->data);
    }

    public function set($key, $value)
    {
        return $this->data[$key] = $value;
    }

    private array $data = [];
    private bool $enabled;
}
