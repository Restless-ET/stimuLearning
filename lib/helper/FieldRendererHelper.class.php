<?php

/**
 * Helper class contain methods for custom rendering of field values.
 *
 * @package    stimuLearning
 * @subpackage helper
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class FieldRendererHelper
{
    /**
     * Converts the received value to the Euro format
     *
     * @param decimal $value The value of the field to convert
     *
     * @return string with the correct representation for the field
     */
    public static function euro($value)
    {
        if (! is_numeric($value)) {
            throw new Exception('[fieldRendererHelper::euro] The inserted value is not numeric!');
        }

        return '€ '.number_format($value, 2, ',', '.');
    }
}
