<?php

namespace Asif\SyncMig;
use Illuminate\Support\ServiceProvider;
use Asif\SyncMig\SyncMigCommand;
class SyncMigServiceProvider extends ServiceProvider
{
	public function boot()
	{
		if($this->app->runningInConsole())
		{
			$this->commands([
				SyncMigCommand::class,
			]);
		}
	}

	public function register()
	{

	}
}