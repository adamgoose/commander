<?php namespace Adamgoose\Commander\Eventing;

class EventListener {

  /**
   * @param $event
   *
   * @return mixed
   */
  public function handle($event)
  {
    $eventName = $this->getEventName($event);

    if($this->listenerIsRegistered($eventName))
    {
      return call_user_func([$this, 'when' . $eventName], $event);
    }
  }

  /**
   * @param $event
   *
   * @return string
   */
  protected function getEventName($event)
  {
    return class_basename($event);
  }

  /**
   * @param $eventName
   *
   * @internal param $method
   * @return bool
   */
  protected function listenerIsRegistered($eventName)
  {
    $method = "when{$eventName}";

    return method_exists($this, $method);
  }
}