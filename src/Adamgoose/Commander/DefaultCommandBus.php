<?php namespace Adamgoose\Commander;


use Illuminate\Foundation\Application;

class DefaultCommandBus implements CommandBus {

  /**
   * @var \Illuminate\Foundation\Application
   */
  private $app;

  /**
   * @var CommandTranslator
   */
  protected $commandTranslator;

  /**
   * @param Application       $app
   * @param CommandTranslator $commandTranslator
   */
  function __construct(Application $app, CommandTranslator $commandTranslator)
  {
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
    $handler = $this->commandTranslator->toCommandHandler($command);

    return $this->app->make($handler)->handle($command);
  }

} 