<?php

namespace Shelf\Entity\Boardgame;

use Shelf\Entity\AbstractDataEntityCollection;
use Shelf\Exception\OutOfBoundsException;

/**
 * A collection of names belonging to a board game
 */
class NameCollection extends AbstractDataEntityCollection
{
    /**
     * {@inheritDoc}
     */
    public function getChildClass()
    {
        return 'Shelf\\Entity\\Boardgame\\Name';
    }

    /**
     * Returns the primary name from the collection
     *
     * @return Name
     */
    public function getPrimaryName()
    {
        return $this->findByIsPrimary(true);
    }

    /**
     * Sorts the collection by the value
     */
    public function sortByValue()
    {
        usort($this->children, array($this, 'valueSort'));
    }

    /**
     * Sorts two names by their sort value
     *
     * @param Name $nameA
     * @param Name $nameB
     *
     * @return boolean
     */
    protected function valueSort(Name $nameA, Name $nameB)
    {
        return strcasecmp(
            $nameA->getSortValue(),
            $nameB->getSortValue()
        );
    }
}
