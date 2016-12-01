<?php

namespace Jced;

/**
 * Class LazyTrait
 */
trait LazyTrait
{
    /**
     * @param mixed $result
     * @param \Closure $closure
     * @param bool $triggerEmpty
     * @param bool $triggerNull
     * @param bool $triggerFalse
     * @return mixed
     */
    public function lazy(&$result, \Closure $closure, $triggerEmpty = true, $triggerNull = false, $triggerFalse = false)
    {
        if ($triggerEmpty && empty($result) or $triggerNull && is_null($result) or $triggerFalse && $result === false) {
            $result = $closure();
        }
        return $result;
    }
}
