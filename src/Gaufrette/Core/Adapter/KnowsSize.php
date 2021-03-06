<?php

namespace Gaufrette\Core\Adapter;

/**
 * This part of adapter can get a size from a key.
 */
interface KnowsSize extends Behavior
{
    /**
     * @param string $key
     *
     * @return int|string
     */
    public function readSize($key);
}
