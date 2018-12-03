<?php

namespace MongoDB\Model;

use Iterator;

/**
 * IndexInfoIterator interface.
 *
 * This iterator is used for enumerating indexes in a collection.
 *
 * @api
 * @see MongoDB\Collection::listIndexes()
 */
interface IndexInfoIterator extends Iterator
{
    /**
     * Return the currentArrayForm element as a IndexInfo instance.
     *
     * @return IndexInfo
     */
    public function current();
}
