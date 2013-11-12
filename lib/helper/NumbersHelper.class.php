<?php

/**
 * Abstract class containing support methods related with number manipulation.
 *
 * @package    stimuLearning
 * @subpackage helper
 * @author     Artur Melo <adsmelo@ua.pt>
 */
abstract class NumbersHelper
{
  private static $ordinals = array(
    1 => 'first',
    2 => 'second',
    3 => 'third',
    4 => 'fourth',
    5 => 'fifth',
    6 => 'sixth',
    7 => 'seventh',
    8 => 'eighth',
    9 => 'ninth',
    10 => 'tenth');

  /**
   * When fed a number, adds the English ordinal suffix. Works for any number, even negatives.
   * It can also return the ordinal number name if the number is between 1 and 10.
   *
   * @param integer $number   The number for which we want the ordinal.
   * @param boolean $extended If 'true' this method return only the ordinal number name. (Default = false)
   *
   * @return The number with the suffix next to it, or the ordinal number name (if asked).
   */
  public static function ordinalEnglish($number, $extended = false)
  {
    if ($extended && $number >= 1 && $number <= 10) {
      return self::$ordinals[$number];
    } else {
      if ($number % 100 > 10 && $number % 100 < 14) {
        $suffix = 'th';
      } else {
        switch($number % 10){
          case 0:
            $suffix = 'th';
            break;
          case 1:
            $suffix = 'st';
            break;
          case 2:
            $suffix = 'nd';
            break;
          case 3:
            $suffix = 'rd';
            break;
          default:
            $suffix = 'th';
            break;
        }
      }
      return $number.$suffix;
    }
    return null;
  }

  const GENERO_MASC = 0;
  const GENERO_FEM = 1;

  private static $unidades = array(
    self::GENERO_MASC => array(
      1 => 'primeiro',
      2 => 'segundo',
      3 => 'terceiro',
      4 => 'quarto',
      5 => 'quinto',
      6 => 'sexto',
      7 => 'sétimo',
      8 => 'oitavo',
      9 => 'nono'
    ),
    self::GENERO_FEM => array(
      1 => 'primeira',
      2 => 'segunda',
      3 => 'terceira',
      4 => 'quarta',
      5 => 'quinta',
      6 => 'sexta',
      7 => 'sétima',
      8 => 'oitava',
      9 => 'nona'
    ),
  );

  private static $dezenas = array(
    self::GENERO_MASC => array(
      10 => 'décimo',
      20 => 'vigésimo',
      30 => 'trigésimo',
      40 => 'quadragésimo',
      50 => 'quinquagésimo',
      60 => 'sexagésimo',
      70 => 'septuagésimo',
      80 => 'octogésimo',
      90 => 'nonagésimo'
    ),
    self::GENERO_FEM => array(
      10 => 'décima',
      20 => 'vigésima',
      30 => 'trigésima',
      40 => 'quadragésima',
      50 => 'quinquagésima',
      60 => 'sexagésima',
      70 => 'septuagésima',
      80 => 'octogésima',
      90 => 'nonagésima'
    )
  );

  private static $centenas = array(
    self::GENERO_MASC => array(
      100 => 'centésimo',
      200 => 'ducentésimo',
      300 => 'tricentésimo',
      400 => 'quadrigentésimo',
      500 => 'quingentésimo',
      600 => 'sexcentésimo',
      700 => 'septingentésimo',
      800 => 'octingentésimo',
      900 => 'noningentésimo'
    ),
    self::GENERO_FEM => array(
      100 => 'centésima',
      200 => 'ducentésima',
      300 => 'tricentésima',
      400 => 'quadrigentésima',
      500 => 'quingentésima',
      600 => 'sexcentésima',
      700 => 'septingentésima',
      800 => 'octingentésima',
      900 => 'noningentésima'
    )
  );

  /**
   * Returns the ordinal number name in Portuguese.
   * Only works for numbers between 1 and 999.
   *
   * @param integer $number The number for which we want the ordinal.
   * @param boolean $gender Indicates the name gender. Possible values are GENERO_MASC(default) and GENERO_FEM.
   *
   * @return The ordinal number name, or number with the suffix next to it.
   */
  public static function ordinalPortuguese($number, $gender = self::GENERO_MASC)
  {
    if ($gender != self::GENERO_MASC && $gender != self::GENERO_FEM) {
      //throw new Exception('Indicated gender at ordinalPortuguese is not a valid one!');
      return $number.'º/ª';
    }

    if ($number >= 1 && $number < 1000) {
      $nbr_name = '';
      $cents = floor($number / 100);
      if ($cents) {
        $nbr_name .= self::$centenas[$gender][$cents * 100];
        $number %= 100;
        if ($number) {
          $nbr_name .= ' ';
        }
      }
      $tenths = floor($number / 10);
      if ($tenths) {
        $nbr_name .= self::$dezenas[$gender][$tenths * 10];
        $number %= 10;
        if ($number) {
          $nbr_name .= ' ';
        }
      }
      if ($number) {
        $nbr_name .= self::$unidades[$gender][$number];
      }

      return $nbr_name;
    }
    return $number.'º/ª';
  }

  /**
   * Helper function to apply the format "1.000.000,00" to currency values
   *
   * @param float  $value        Currency value to be formated
   * @param string $charPosition Indicates if the currency char is to be placed on right or left. (Default = right)
   * @param string $currencyChar The currency character to use. (Default = €)
   *
   * @return string $formatedCurrency Formated currency value
   */
  public static function currency($value, $charPosition = 'right', $currencyChar = '€')
  {
    $format = array(
      'currency_char' => $currencyChar,
      'decimal_points' => 2,
      'decimal_separator' => ',',
      'thousands_separator' => '.',
      'pos' => $charPosition,
    );

    $valueText = number_format(
      $value,
      $format['decimal_points'],
      $format['decimal_separator'],
      $format['thousands_separator']
    );

    $posTemplate = $format['pos'] == 'right' ? '%%value%% %%currency_char%%' : '%%currency_char%% %%value%%';
    $formatedCurrency = strtr($posTemplate, array(
      '%%value%%' => $valueText, '%%currency_char%%' => $format['currency_char']));

    return $formatedCurrency;
  }

  /**
   * Helper function to apply the format "2,000" to taxes values, for being manipulated by excel
   *
   * @param float   $value    Value to be formated
   * @param integer $decimals The number of decimals to format the number with. (Default = 3)
   *
   * @return string $formatedTax Formated tax value
   */
  public static function taxes($value, $decimals = 3)
  {
    $format = array(
      'decimal_points' => $decimals,
      'decimal_separator' => ',',
      'thousands_separator' => '',
    );

    return number_format(
      $value,
      $format['decimal_points'],
      $format['decimal_separator'],
      $format['thousands_separator']
    );
  }
}
