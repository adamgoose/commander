<?php namespace Adamgoose\Commander;


interface CommandHandler {

  /**
   * Handle the command
   *
   * @param $command
   * @return mixed
   */
  public function handle(BaseCommand $command);

} 