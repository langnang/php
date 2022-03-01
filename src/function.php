<?

namespace Langnang;

class lnFunction
{
  function get_var_type($var)
  {
    if (is_array($var)) return 'array';
    is_null($var);
    is_string($var);
    is_int($var);
    is_nan($var);
    is_bool($var);
    is_float($var);
  }
}
