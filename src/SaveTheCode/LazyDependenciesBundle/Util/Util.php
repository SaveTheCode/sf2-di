<?php

namespace SaveTheCode\LazyDependenciesBundle\Util;

/**
 * Class Util
 * @package SaveTheCode\LazyDependenciesBundle\Util
 */
class Util
{
    const LIMIT = 100000;

    /**
     * Simple method to consume memory & time
     */
    public static function consumeResources()
    {
        $array = [];
        foreach (range(0, self::LIMIT) as $i) {
            $array[$i] = rand(0, self::LIMIT);
        }
        ksort($array, SORT_NATURAL);
    }
}