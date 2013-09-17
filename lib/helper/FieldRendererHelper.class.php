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

    /**
     * Converts the received value to percentual format with two decimal places
     *
     * @param decimal $value The value of the field to convert
     *
     * @return string with the correct representation for the field
     */
    public static function perc($value)
    {
        if (! is_numeric($value)) {
            throw new Exception('[fieldRendererHelper::perc] The inserted value is not numeric!');
        }

        return number_format($value, 2, ',', '.').' %';
    }

    /**
     * Converts the received boolean value to an equivalent text string
     *
     * @param boolean $value The value of the field to convert
     *
     * @return string with the correct representation for the field
     */
    public static function plainBoolean($value)
    {
        if ($value === true) {
            return 'Yes';
        } elseif ($value === false) {
            return 'No';
        }

        return '---';
    }

    /**
     * Appends a text before or after(default) when rendering a given value
     *
     * @param mixed  $value The value of the field to append the text
     * @param string $text  The text to append
     * @param string $pos   The position of the text in relation to the value
     *
     * @return string with the correct representation for the field
     */
    public static function append($value, $text, $pos = 'after')
    {
        if (! in_array($pos, array('after', 'before'))) {
            throw new Exception('[fieldRendererHelper::append] The value for arg $pos is not valid!');
        }

        if ($pos == 'after') {
            return $value.' '.$text;
        } elseif ($pos == 'before') {
            return $text.' '.$value;
        }

    }
}
