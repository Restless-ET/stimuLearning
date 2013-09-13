<?php

/**
 * Helper class contain methods for strings manipulation.
 *
 * @package    stimuLearning
 * @subpackage helper
 * @author     Artur Melo <adsmelo@ua.pt>
 */
abstract class StringHelper
{
    /**
     * Gets the part of a string between two given tags
     *
     * @param string $string The string we want to parse
     * @param string $start  The start tag
     * @param string $end    The end tag
     *
     * @return string The chunk of the string between the two tags
     */
    public static function getStringBetween($string, $start, $end)
    {
        $string = ' '.$string;
        $ini = strpos($string, $start);
        if ($ini == 0) {
            return '';
        }
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;

        return substr($string, $ini, $len);
    }
}
