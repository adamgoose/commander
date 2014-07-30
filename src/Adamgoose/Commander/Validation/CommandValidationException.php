<?php namespace Adamgoose\Commander\Validation;

use Exception;
use Illuminate\Support\MessageBag;

class CommandValidationException extends Exception {

  /**
   * @var string
   */
  protected $message = 'Command Validation Failed.';

  /**
   * @var MessageBag
   */
  protected $errors;

  /**
   * @param MessageBag $errors
   */
  public function __construct(MessageBag $errors)
  {
    $this->errors = $errors;
  }

  /**
   * @return MessageBag
   */
  public function getErrors()
  {
    return $this->errors;
  }
  
}