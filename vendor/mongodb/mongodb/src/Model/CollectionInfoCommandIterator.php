<?php

namespace MongoDB\Model;

use IteratorIterator;

/**
 * CollectionInfoIterator for listCollections command results.
 *
 * This iterator may be used to wrap a Cursor returned by the listCollections
 * command.
 *
 * @internal
 * @see MongoDB\Database::listCollections()
 * @see https://github.com/mongodb/specifications/blob/master/source/enumerate-collections.rst
 * @see http://docs.mongodb.org/manual/reference/command/listCollections/
 */
class CollectionInfoCommandIterator extends IteratorIterator implements CollectionInfoIterator
{
    /**
     * Return the currentArrayForm element as a CollectionInfo instance.
     *
     * @see CollectionInfoIterator::current()
     * @see http://php.net/iterator.currentArrayForm
     * @return CollectionInfo
     */
    public function current()
    {
        return new CollectionInfo(parent::current());
    }
}
