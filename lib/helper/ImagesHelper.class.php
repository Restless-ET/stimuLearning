<?php
/**
 * Abstract class containing support methods for images manipulation/generation.
 *
 * @package    stimuLearning
 * @subpackage helper
 * @author     Artur Melo <adsmelo@ua.pt>
 */
abstract class imagesHelper
{
  /**
   * This an helper to create image tags using jQuery UI icons
   *
   * @param string $imagename The jQuery UI image name
   * @param array  $options   Array with options (optional, default is an empty array).
   *
   * @static
   *
   * @return string $html HTML tag.
   */
  public static function jQueryUIImageTag($imagename, $options = array())
  {
    if (!$imagename) {
      return '';
    }

    $options = _parse_attributes($options);

    if (isset($options['alt_title'])) {
      // set as alt and title but do not overwrite explicitly set
      if (!isset($options['alt'])) {
        $options['alt'] = $options['alt_title'];
      }
      if (!isset($options['title'])) {
        $options['title'] = $options['alt_title'];
      }
      unset($options['alt_title']);
    }

    if (!isset($options['alt']) && sfConfig::get('sf_compat_10')) {
      $options['alt'] = $imagename;
    }

    $options['class'] = 'ui-icon ui-icon-'.$imagename;

    return content_tag('span', '', $options);
  }

  /**
   * Function to automatically resize and trim virtually any JPEG, GIF, or PNG image.
   * If the file extension of the destination file is different from the source file,
   *  the image will automatically be converted to the appropriate format.
   *
   * This function requires the PHP GD library (http://www.php.net/manual/en/book.image.php)
   *
   * @param string  $src_image   The path to the source image.
   * @param string  $dest_image  The destination path to the created thumbnail image.
   * @param integer $thumb_size  The size of the new thumbnail in pixels (default = 72).
   * @param integer $jpg_quality Compression quality: 0-100 (optional).
   *
   * @return true on success, false otherwise.
   */
  public static function squareThumbnail($src_image, $dest_image, $thumb_size = 72, $jpg_quality = 90)
  {
    // Get dimensions of existing image
    $image = getimagesize($src_image);

    // Check for valid dimensions
    if ($image[0] <= 0 || $image[1] <= 0) {
      return false;
    }

    // Determine format from MIME-Type
    $image['format'] = strtolower(preg_replace('/^.*?\//', '', $image['mime']));

    // Import image
    switch($image['format']) {
      case 'jpg':
      case 'jpeg':
        $image_data = imagecreatefromjpeg($src_image);
        break;
      case 'png':
        $image_data = imagecreatefrompng($src_image);
        break;
      case 'gif':
        $image_data = imagecreatefromgif($src_image);
        break;
      default:
        // Unsupported format
        $image_data = false;
        break;
    }

    // Verify import
    if ($image_data == false) {
      return false;
    }

    // Calculate measurements
    if ($image[0] > $image[1]) {
      // For landscape images
      $x_offset = ($image[0] - $image[1]) / 2;
      $y_offset = 0;
      $square_size = $image[0] - ($x_offset * 2);
    } else {
      // For portrait and square images
      $x_offset = 0;
      $y_offset = ($image[1] - $image[0]) / 2;
      $square_size = $image[1] - ($y_offset * 2);
    }

    // Resize and crop
    $canvas = imagecreatetruecolor($thumb_size, $thumb_size);
    if (imagecopyresampled($canvas, $image_data, 0, 0, $x_offset, $y_offset, $thumb_size, $thumb_size, $square_size, $square_size)) {
      // Create thumbnail
      switch(strtolower(preg_replace('/^.*\./', '', $dest_image))) {
        case 'jpg':
        case 'jpeg':
          $success = imagejpeg($canvas, $dest_image, $jpg_quality);
          break;
        case 'png':
          $success = imagepng($canvas, $dest_image);
          break;
        case 'gif':
          $success = imagegif($canvas, $dest_image);
          break;
        default:
          // Unsupported format
          $success = false;
          break;
      }

      return $success;
    } else {
      return false;
    }
  }
}
