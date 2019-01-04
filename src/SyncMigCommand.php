<?php

namespace Asif\SyncMig;
use Illuminate\Console\Command;
use Asif\SyncMig\Factories\SyncMigFactory;
class SyncMigCommand extends Command
{
    protected $signature="syncmig:diff";
    protected $description="to generate migration on model changes";
    private $circulate=1;
    private $tableName=null;
    private $fieldName=null;
    private $fieldType=null;
    private $fieldComment=null;
    private $nullable=null;
    private $proceed;

    public function handle()
    {
        $this->info(SyncMigFactory::generate('StringType'));
//        $this->info($this->asciiCharacterHeadLine());
//        $this->tableName=$this->ask('Please, enter your table name:');
//        while($this->circulate)
//        {
//            $this->fieldName=$this->ask('Enter Field Name');
//            $this->fieldType=$this->ask('Field Type','string');
//            $this->fieldComment=$this->ask('Comment','This column is added on '.date('d-m-Y'));
//            $this->nullable=$this->ask('Is Nullable ? ','Yes');
//            $this->proceed=$this->choice('Do you want to add more?',['No','Yes']);
//            $this->info($this->proceed);
//            if($this->proceed=='No')
//            {
//                break;
//            }
//            else{
//                continue;
//            }
//
//        }
    }

    private function getStub($stubName)
	{
		return file_get_contents(base_path('vendor/asif/syncmig/src/stubs/'.$stubName.'.stub'));
    }
    
    private function generateModelChangesJson()
    {
        file_put_contents('database/modelchanges.json',$this->getStub('modelchanges'));
    }

    private function asciiCharacterHeadLine()
    {
        return $this->getStub('AsciiCharacter');
    }
}