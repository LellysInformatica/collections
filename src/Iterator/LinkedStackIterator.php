<?php

namespace Collections\Iterator;

use Collections\Pair;

class LinkedStackIterator implements StackIteratorInterface
{

    use IteratorCollectionTrait;

    /**
     * @var int
     */
    private $count = 0;

    /**
     * @var int
     */
    private $key = null;

    /**
     * @var Pair
     */
    private $pair;

    /**
     * @var Pair
     */
    private $top;


    /**
     * @param int $count
     * @param Pair $top
     */
    public function __construct($count, Pair $top = null)
    {
        $this->pair = $this->top = $top;
        $this->count = $count;
    }


    /**
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void
     */
    public function rewind()
    {
        $this->pair = $this->top;
        if ($this->pair !== null) {
            $this->key = 0;
        }
    }


    /**
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean
     */
    public function valid()
    {
        return $this->pair !== null;
    }


    /**
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed
     */
    public function key()
    {
        return $this->key;
    }


    /**
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed
     */
    public function current()
    {
        return $this->pair->first;
    }


    /**
     * @link http://php.net/manual/en/iterator.next.php
     * @return void
     */
    public function next()
    {
        $this->pair = $this->pair->second;
        $this->key++;
    }


    /**
     * @link http://php.net/manual/en/countable.count.php
     * @return int
     */
    public function count()
    {
        return $this->count;
    }

}
