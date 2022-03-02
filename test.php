<?

require_once __DIR__ . "/vendor/autoload.php";

use Langnang\lnArray;
use Langnang\lnFunction;


var_dump(lnArray::to_ini([
  "name" => "name",
  "value" => [
    "value" => "value"
  ]
]));
