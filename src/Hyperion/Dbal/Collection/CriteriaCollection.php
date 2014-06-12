<?php
namespace Hyperion\Dbal\Collection;

use Hyperion\Dbal\Criteria\Criteria;
use Hyperion\Dbal\Enum\Comparison;

class CriteriaCollection implements \IteratorAggregate
{
    protected $items;

    function __construct(array $items = [])
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
     * Get criteria as an array
     *
     * @return Criteria[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Returns the number of entities in the collection
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Create a new collection of criteria
     *
     * @return CriteriaCollection
     */
    public static function build()
    {
        return new self([]);
    }

    /**
     * Add some pre-built criteria
     *
     * @param Criteria $criteria
     * @return $this
     */
    public function addCriteria(Criteria $criteria)
    {
        $this->items[] = $criteria;

        return $this;
    }

    /**
     * Add some criteria
     *
     * @return $this
     */
    public function add($field, $value, Comparison $comparison = null)
    {
        $this->items[] = new Criteria($field, $value, $comparison);

        return $this;
    }

}
