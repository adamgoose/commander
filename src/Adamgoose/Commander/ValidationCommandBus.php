<?php namespace Adamgoose\Commander;

use Illuminate\Foundation\Application;

class ValidationCommandBus implements CommandBus {

  /**
   * @var DefaultCommandBus
   */
  private $commandBus;

  /**
   * @var Application
   */
  private $app;

  /**
   * @var CommandTranslator
   */
  private $commandTranslator;

  /**
   * @param DefaultCommandBus $commandBus
   * @param Application       $app
   * @param CommandTranslator $commandTranslator
   */
  function __construct(DefaultCommandBus $commandBus, Application $app, CommandTranslator $commandTranslator)
  {
    $this->commandBus = $commandBus;
    $this->app = $app;
    $this->commandTranslator = $commandTranslator;
  }

  /**
   * @param $command
   *
   * @return mixed
   * @throws \Exception
   */
  public function execute($command)
  {
    $validator = $this->commandTranslator->toValidator($command);

    if(class_exists($validator))
    {
      $this->app->make($validator)->validate($command);
    }

    return $this->commandBus->execute($command);
  }
}