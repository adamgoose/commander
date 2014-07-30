<?php namespace Adamgoose\Commander\Validation;

use Illuminate\Validation\Factory;
use Illuminate\Validation\Validator;
use Str;
use TAA\Commanding\BaseCommand;

abstract class CommandValidator {

  /**
   * @var Factory
   */
  protected $validator;

  /**
   * @var
   */
  protected static $rules;

  /**
   * @param Factory $validator
   */
  function __construct(Factory $validator)
  {
    $this->validator = $validator;
  }

  /**
   * @param BaseCommand $command
   *
   * @throws CommandValidationException
   */
  public function validate(BaseCommand $command)
  {
    if(isset(static::$rules) && is_array(static::$rules))
      $rules = static::$rules;
    elseif(isset(static::$rules) && Str::startsWith(static::$rules, '@'))
      $rules = $this->{substr(static::$rules, 1)}($command);
    else
      $rules = [];

    $validation = $this->validator->make($command->all(), $rules);

    if($validation->fails())
    {
      $this->throwException($validation);
    }
  }

  /**
   * @param Validator $validator
   *
   * @throws CommandValidationException
   */
  protected function throwException(Validator $validator)
  {
    throw new CommandValidationException($validator->messages());
  }
}