<?php

// Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
namespace Collections\Rx;

use Collections\CollectionInterface;

/**
 * Provides functionality to evaluate queries against a specific data source wherein the type of the data
 * is not specified.
 */
interface IterableInterface
{

    /**
     * Executes the passed callable for each of the elements in this collection
     * and passes both the value and key for them on each step.
     * Returns the same collection for chaining.
     *
     * @param callable $callable callable function that will receive each of the elements
     * in this collection
     * @return CollectionInterface
     */
    public function each(callable $callable);

    /**
     * Returns another collection after modifying each of the values in this one using
     * the provided callable.
     *
     * Each time the callback is executed it will receive the value of the element
     * in the current iteration, the key of the element and this collection as
     * arguments, in that order.
     *
     * @param callable $callable the method that will receive each of the elements and
     * returns the new value for the key that is being iterated
     * @return CollectionInterface
     */
    public function map(callable $callable);

    /**
     * Returns a new collection containing the column or property value found in each
     * of the elements, as requested in the $matcher param.
     *
     * The matcher can be a string with a property name to extract or a dot separated
     * path of properties that should be followed to get the last one in the path.
     *
     * If a column or property could not be found for a particular element in the
     * collection, that position is filled with null.
     *
     * @param string $matcher a dot separated string symbolizing the path to follow
     * inside the hierarchy of each value so that the column can be extracted.
     * @return CollectionInterface
     */
    public function extract($matcher);
}
