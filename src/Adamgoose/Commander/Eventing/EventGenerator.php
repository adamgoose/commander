<?php namespace Adamgoose\Commander\Eventing;


trait EventGenerator {

  /**
   * @var array
   */
  protected $pendingEvents = [];

  /**
   * @param $event
   */
  public function raise($event)
  {
    $this->pendingEvents[] = $event;
  }

  /**
   * @return array
   */
  public function releaseEvents()
  {
    $events = $this->pendingEvents;

    $this->pendingEvents = [];

    return $events;
  }

} 