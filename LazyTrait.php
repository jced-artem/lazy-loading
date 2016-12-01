<?php

namespace Jced;

/**
 * Class LazyTrait
 */
trait LazyTrait
{
    /**
     * @param mixed $property
     * @param mixed $return
     * @param bool $triggerEmpty
     * @param bool $triggerNull
     * @param bool $triggerFalse
     * @return mixed
     */
    public function lazy(&$property, $return, $triggerEmpty = true, $triggerNull = false, $triggerFalse = false)
    {
        if ($triggerEmpty && empty($property) or $triggerNull && is_null($property) or $triggerFalse && $property === false) {
            $property = is_callable($return) ? $return() : $return;
        }
        return $property;
    }
}
