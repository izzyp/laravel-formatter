<?php namespace IzzyP\Formatter;

use Illuminate\Support\ServiceProvider;

/**
 * Used to register Authroize with service providers, mainly for Laravel.
 */
class FormatterServiceProvider extends ServiceProvider {
  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;
  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot() {
    $this->package('izzy-p/laravel-formatter');
  }
  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register() {
    $this->app['formatter'] = $this->app->share(function($app) {
      return new Formatter();
    });
  }
  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides() {
    return array('formatter');
  }
}