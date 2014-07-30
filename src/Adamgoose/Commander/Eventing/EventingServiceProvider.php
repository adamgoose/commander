<?php namespace Adamgoose\Commander\Eventing;

use Illuminate\Support\ServiceProvider;

class EventingServiceProvider extends ServiceProvider {

  /**
   * Register the service provider.
   * @return void
   */
  public function register()
  {
    $listeners = $this->app['config']->get('commander::listeners');
    $namespace = $this->app['config']->get('commander::listener_namespace');

    foreach($listeners as $listener)
    {
      $this->app['events']->listen($namespace . '.*', $listener);
    }
  }
}