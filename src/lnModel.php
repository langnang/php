<?php

namespace Langnang;

class lnModel
{
  /**
   * 构造方法
   */
  function __construct($model, ...$args)
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
    foreach ($model as $name => $value) {
      $this->__set($name, $value);
    }
    if (method_exists($this, '__self__construct')) {
      $this->{'__self__construct'}($model, ...$args);
    }
  }
  /**
   * 
   */
  function __set($name, $value)
  {
    // 判断存在自定义函数
    if (method_exists($this, 'set_' . $name)) {
      $this->{'set_' . $name}($value);
    } else if (method_exists($this, 'set_' . $name)) {
      $this->{'set_' . $name}($value);
    } else if (!property_exists($this, $name)) {
      return;
    } else {
      $default_value = get_class_vars(__CLASS__)[$name];
      // 如果为null 或未设置默认值 || 类型一致
      if (is_null($default_value) || lnFunction::get_var_type($value) == lnFunction::get_var_type($default_value)) {
        $this->{$name} = $value;
      } else {
        $result = $value;
        switch (lnFunction::get_var_type($value)) {
          case 'string':
            $result = call_user_func([lnString::class, "to_" . lnFunction::get_var_type($default_value)], $value);
            break;
          case 'array':
            $result = call_user_func([lnArray::class, "to_" . lnFunction::get_var_type($default_value)], $value);
            break;
          default:
            break;
        }
        $this->{$name} = $result;
      }
    }
  }
  /**
   * 
   */
  function __get($name)
  {
    if (method_exists($this, 'get_' . $name)) {
      $this->{'get_' . $name}();
    } else if (method_exists($this, 'get_' . $name)) {
      $this->{'get_' . $name}();
    } else if (!isset($this->{$name})) return;
    return $this->{$name};
  }
}
