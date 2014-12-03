<?php

namespace Gaufrette\Core\Adapter;

use Gaufrette\Core\Adapter\Behavior;

/**
 * This element can get/set a content from a key
 */
interface KnowsContent extends Behavior
{
    /**
     * @param string $key
     *
     * @return string
     */
    public function readContent($key);

    /**
     * @param string $key
     * @param string $content
     *
     * @return KnowsContent
     */
    public function writeContent($key, $content);
}
