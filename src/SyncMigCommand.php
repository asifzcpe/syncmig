<?php

namespace Asif\SyncMig;
use Illuminate\Console\Command;
class SyncMigCommand extends Command
{
    protected $signature="syncmig:diff";
    protected $description="to generate migration on model changes";

    public function handle()
    {
        $this->generateModelChangesJson();
    }

    private function getStub($stubName)
	{
		return file_get_contents(base_path('vendor/asif/syncmig/src/stubs/'.$stubName.'.stub'));
    }
    
    private function generateModelChangesJson()
    {
        file_put_contents('database/modelchanges.json',$this->getStub('modelchanges'));
    }
}