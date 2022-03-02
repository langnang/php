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
  static function to_ini($array)
  {
    $result = "";
    foreach ($array as $key => $value) {
      if (is_array($value)) {
        $result .= "[$key]\n";
        $result .= self::to_ini($value);
      } else {
        $result .= "$key = $value\n";
      }
    }
    return $result;
  }
}
