<?php

/**
 * DateTimeHelper
 * Abstract class containing support methods related with dates and time manipulation.
 *
 * @package    stimuLearning
 * @subpackage helper
 * @author     Artur Melo <adsmelo@ua.pt>
 */
abstract class DateTimeHelper
{
  /**
   * This function format date values to the format dd-mm-YYYY
   * If no value given, return today date
   *
   * @param datestring $value DateTime value
   *
   * @return formated value
   */
  public static function dateFormat($value = null)
  {
    if ($value == '0000-00-00') {
      return '---';
    }

    $date = new DateTime($value);
    return $date->format('d-m-Y');
  }

  /**
   * Function to format date with our format accurately to the second.
   * If no value given, return today date
   *
   * @param datestring $value DateTime value
   *
   * @return DateTime $date Date in the format dd-MM-yyyy HH:mm:ss
   */
  public static function dateFormatWithTime($value = null)
  {
    $date = new DateTime($value);
    return $date->format('d-m-Y H:i:s');
  }

  /**
   * Convert time() into ISO-8601 format
   *
   * @param string $timestamp Time
   * @param string $format    Time Format
   *
   * @return string
   */
  public static function unixTimestampToHuman($timestamp = '', $format = 'Y-m-d H:i:s')
  {
    if (empty($timestamp) || ! is_numeric($timestamp)) {
      $timestamp = time();
    }
    return ($timestamp) ? date($format, $timestamp) : date($format, $timestamp);
  }

  /**
   * Convert ISO-8601 format into time
   *
   * @param string $dateString String (Y-m-d H:i:s)
   *
   * @return string
   */
  public static function humanToUnixTimestamp($dateString)
  {
    $arrayDateTime = explode(' ', $dateString);

    $dateArray = explode('-', trim($arrayDateTime[0]));

    if (isset($arrayDateTime[1]) && trim($arrayDateTime[1])) {
      $timeArray = explode(':', trim($arrayDateTime[1]));
      return mktime($timeArray[0], $timeArray[1], $timeArray[2], $dateArray[1], $dateArray[2], $dateArray[0]);
    } else {
      return mktime(0, 0, 0, $dateArray[1], $dateArray[2], $dateArray[0]);
    }
  }

  /**
   * Convert date to an specific format
   *
   * @param string $value  Date to be formated
   * @param string $format Date Format
   *
   * @return date $value Formated Date
   */
  public static function convertDateFormat($value, $format)
  {
    $date = new DateTime($value);
    $formatedDate = $date->format($format);

    return $formatedDate;
  }

  /**
   * Helper function to transform some number of months on a date object (format 'Y-m-d')
   *
   * @param integer $months Number of months to be transformed on a date object
   *
   * @return DateTime formatedDate Date object (format 'Y-m-d')
   */
  public static function formatMonthsToDate($months)
  {
    // get the current time
    $currentTime = time();
    // get the current time in ISO-8601
    $currentTimeIso = self::unixTimestampToHuman($currentTime);

    $date = new DateTime($currentTimeIso);
    $interval = new DateInterval('P'.$months.'M');
    $date->sub($interval);

    return $date->format('Y-m-d');
  }

  /**
   * Helper function to transform some number of days on a date object (format 'Y-m-d H:i:s' by default)
   *
   * @param integer $days   Number of days to be transformed on a date object
   * @param string  $format Format the date object will be contructed with
   * @param string  $where  Indicates if number of days should be considered towards 'future' or 'past' (default = past)
   *
   * @return DateTime formatedDate Date object (format 'Y-m-d H:i:s' by default)
   */
  public static function formatDaysToDate($days, $format = 'Y-m-d H:i:s', $where = 'past')
  {
    // get current Time
    $currentTime = time();

    if ($where == 'future') {
      $referenceTime = $currentTime + 24 * 60 * 60 * $days;
    } else {
      $referenceTime = $currentTime - 24 * 60 * 60 * $days;
    }
    $referenceTimeIso = self::unixTimestampToHuman($referenceTime);
    $dateTime = new DateTime($referenceTimeIso);

    return $dateTime->format($format);
  }

  /**
   * Helper function to get difference between two dates in chosen units (Days by default)
   * Dates should be formatted like 'Y-m-d H:i:s' (with or w/o the time part)
   *
   * @param string $start Earlier date as string
   * @param string $end   Older date as string
   * @param string $units Units wanted for the difference (Days, Hours, Minutes or Seconds)
   *
   * @return int Difference between the two dates in chosen units
   * (if units given option isn't valid, difference will be returned in seconds)
   */
  public static function dateTimeDiff($start, $end, $units = 'Days')
  {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;

    $divider = 86400;
    if ($units != 'Days') {
      $divider = $divider / 24;
      if ($units != 'Hours') {
        $divider = $divider / 60;
        if ($units != 'Minutes') {
          $divider = $divider / 60;
        }
      }
    }

    return round($diff / $divider);
  }
}
