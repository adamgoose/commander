<?php namespace Adamgoose\Commander;

abstract class BaseCommand {

  /**
   * @var array
   */
  protected $attributes;

  /**
   * @param array $attributes
   */
  function __construct(array $attributes)
  {
    $this->attributes = $attributes;
  }

  /**
   * Get all attributes
   *
   * @return array
   */
  public function all()
  {
    return $this->attributes;
  }

  /**
   * @param $name
   *
   * @return null
   */
  function __get($name)
  {
    if(array_key_exists($name, $this->attributes))
      return $this->attributes[$name];

    return null;
  }
}