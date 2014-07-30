<?php namespace Adamgoose\Commander;

interface CommandBus {

  /**
   * @param $command
   *
   * @return mixed
   * @throws \Exception
   */
  public function execute($command);

}