<?php

namespace Shelf\Entity;

use Shelf\Entity\AbstractDataEntity;

/**
 * Class used to represent a name of an entity
 */
abstract class AbstractName extends AbstractDataEntity
{
    /**
     * Returns true if the name is considered to be the primary name
     *
     * @return boolean
     */
    public function isPrimary()
    {
        return $this->getType() == 'primary';
    }

    /**
     * Returns the sort index with an option to make it zero based
     *
     * @param boolean $zeroBased OPTIONAL
     *
     * @return int
     */
    public function getSortIndex($zeroBased = false)
    {
        $sortIndex = parent::getSortIndex();
        if ($zeroBased) {
            --$sortIndex;
        }
        return $sortIndex;
    }

    /**
     * Returns the value starting with the sort index
     *
     * @param $appendPreSort OPTIONAL Controls whether the characters pre-sort
     *                                index are appended to returned result
     *
     * @return string
     */
    public function getSortValue($appendPreSort = true)
    {
        $value = $this->getValue();
        $sortIndex = $this->getSortIndex(true);

        $sortValue = substr($value, $sortIndex);
        if ($appendPreSort && $sortIndex > 0) {
            $sortValue .= ', ' . substr($value, 0, $sortIndex - 1);
        }
        return $sortValue;
    }
}
