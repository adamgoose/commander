<?php namespace Adamgoose\Commander;

use Exception;

class CommandTranslator {

  /**
   * Translates "SomeCommand" into "SomeCommandHandler"
   *
   * @param $command
   *
   * @return mixed
   * @throws \Exception
   */
  public function toCommandHandler($command)
  {
    $handler = str_replace('Command', 'CommandHandler', get_class($command));

    if( ! class_exists($handler))
    {
      $message = "Command handler [$handler] does not exist.";

      throw new Exception($message);
    }

    return $handler;
  }

  /**
   * @param $command
   *
   * @return string
   */
  public function toValidator($command)
  {
    return str_replace('Command', 'Validator', get_class($command));
  }

}