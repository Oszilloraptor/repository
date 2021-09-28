<?php

declare(strict_types=1);

namespace Rikta\Repository;

/**
 * @template UnserializedObject
 * @extends FileRepository<UnserializedObject>
 */
class SerializedObjectsFileRepository extends FileRepository
{
    /** @var true|string[] allowed classes for deserializing */
    private $allowedClasses;

    /**
     * @param string        $dir            directory that stores the data for this query
     * @param bool          $cached         should the files be cached?
     * @param true|string[] $allowedClasses allowed classes for deserializing
     */
    public function __construct(string $dir, bool $cached = true, $allowedClasses = true)
    {
        parent::__construct($dir, $cached);
        $this->allowedClasses = $allowedClasses;
    }

    /**
     * Unserializes an Item.
     *
     * @param UnserializedObject $item
     */
    protected function serialize($item): string
    {
        return serialize($item);
    }

    /**
     * Serializes an Item.
     *
     * @return UnserializedObject
     */
    protected function unserialize(string $serialized)
    {
        return unserialize($serialized, ['allowedClasses' => $this->allowedClasses]);
    }
}
