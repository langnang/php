<?

namespace Langnang;

class lnArray
{
  static function to_array()
  {
  }

  /**
   * 一维数组转为树状数组
   */
  static function to_tree($array, $children_key)
  {
    $tree = [];
  }
  static function to_ini($array, $to_string = false)
  {
    $result = "";
    foreach ($array as $key => $value) {
      if (is_array($value)) {
        if (!$to_string) {
          $result .= "[$key]\n";
          $result .= self::to_ini($value, true);
        } else {
          $result .= "$key = " . implode(',', $value) . "\n";
        }
      } else {
        $result .= "$key = " . $value . "\n";
      }
    }
    return $result;
  }
}
