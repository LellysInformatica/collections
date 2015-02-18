<?php

namespace Collections\Iterator;

trait IteratorCollectionTrait /* implements \Collections\Collection */
{

    /**
     * @return \Iterator
     */
    private function asIterator()
    {
        if ($this instanceof \IteratorAggregate) {
            return $this->getIterator();
        }
        return $this;
    }


    /**
     * @return bool
     */
    public function isEmpty()
    {
        $i = $this->asIterator();
        $i->rewind();
        return !$i->valid();
    }


    /**
     * @param callable $map
     * @return Enumerator
     */
    public function map(callable $map)
    {
        return new MappingIterator($this->asIterator(), $map);
    }


    /**
     * @param callable $filter
     * @return Enumerator
     */
    public function filter(callable $filter)
    {
        return new FilteringIterator($this->asIterator(), $filter);
    }


    /**
     * @param int $n
     * @return Enumerator
     */
    public function limit($n)
    {
        return new LimitingIterator($this->asIterator(), $n);
    }


    /**
     * @param $initialValue
     * @param callable $combine
     * @return mixed
     */
    public function reduce($initialValue, callable $combine)
    {
        $carry = $initialValue;
        foreach ($this->asIterator() as $value) {
            $carry = $combine($carry, $value);
        }
        return $carry;
    }


    /**
     * @param int $n
     * @return Enumerator
     */
    public function skip($n)
    {
        return new SkippingIterator($this->asIterator(), $n);
    }


    /**
     * @param int $start
     * @param int $count
     * @return Enumerator
     */
    public function slice($start, $count)
    {
        return new SlicingIterator($this->asIterator(), $start, $count);
    }


    /**
     * @return array
     */
    public function toArray()
    {
        return iterator_to_array($this->asIterator());
    }


    public function keys()
    {
        return new KeyIterator($this->asIterator());
    }


    public function values()
    {
        return new ValueIterator($this->asIterator());
    }

}