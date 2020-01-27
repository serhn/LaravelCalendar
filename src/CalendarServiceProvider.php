<?php

namespace Serh\LaravelCalendar;

use Illuminate\Support\ServiceProvider;

class CalendarServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('calendar', function ($app) {
			$request = $app['request'];
			return new Calendar($request);
		});
	}

	public function boot()
	{
		//$this->loadRoutesFrom(__DIR__ . '/routes.php');
		$this->loadTranslationsFrom(__DIR__.'/lang', 'calendar');
		$this->loadViewsFrom(__DIR__.'/views', 'calendar');
	}
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}
}
