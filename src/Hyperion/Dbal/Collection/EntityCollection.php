<?php

namespace Hyperion\Dbal\Collection;

use Guzzle\Inflection\Inflector;
use Hyperion\Dbal\Entity\HyperionEntity;
use Hyperion\Dbal\Exception\NotFoundException;
use Hyperion\Dbal\Exception\UnexpectedValueException;

class EntityCollection implements \IteratorAggregate
{
    protected $items;

    function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Get the array iterator
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }


    /**
     * Get an entity by ID
     *
     * @param int $key
     * @return HyperionEntity
     * @throws UnexpectedValueException
     * @throws NotFoundException
     */
    public function getById($key) {
        return $this->getBy($key, 'id');
    }

    /**
     * Get an entity by name
     *
     * @param string $key
     * @return HyperionEntity
     * @throws UnexpectedValueException
     * @throws NotFoundException
     */
    public function getByName($key) {
        return $this->getBy($key, 'name');
    }

    /**
     * Get an entity by any given field
     *
     * @param mixed $key
     * @param string $field
     * @return HyperionEntity
     * @throws UnexpectedValueException
     * @throws NotFoundException
     */
    protected function getBy($key, $field)
    {
        foreach ($this->items as $item) {
            if (!($item instanceof HyperionEntity)) {
                throw new UnexpectedValueException("Unexpected entity type: ".get_class($item));
            }

            $fn = 'get'.Inflector::getDefault()->camel($field);
            if ($item->$fn() == $key) {
                return $item;
            }
        }

        throw new NotFoundException("Project ".$field." not found in collection: ".$key);
    }

    /**
     * Returns the number of entities in the collection
     *
     * @return int
     */
    public function count() {
        return count($this->items);
    }
}
