<?php

namespace Langnang;

class lnModel
{
  function __construct($model)
  {
    foreach (get_class_vars(__CLASS__) as $name => $default_value) {
      if (is_array($default_value) && is_string($model[$name])) {
        $model[$name] = json_decode($model[$name], true);
      }
      if (is_bool($default_value) && is_string($model[$name])) {
        $model[$name] = (bool)$model[$name];
      }
      if (is_int($default_value) && is_string($model[$name])) {
        $model[$name] = (int)$model[$name];
      }
    }
  }
}
