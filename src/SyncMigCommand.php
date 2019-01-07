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
    private $commandsArray=[];
    private $qualifiedNameSpace='\\Asif\\SyncMig\\Factories\\Types\\';
    private $className=null;
    private $commands=null;

    public function handle()
    {
        // $c=$this->qualifiedNameSpace.'IntegerType';
        
        // $this->info(SyncMigFactory::generate(new $c(),'user_name',true,'change'));
        // die();
       $this->info($this->asciiCharacterHeadLine());
       $this->tableName=$this->ask('Please, enter your table name:');
       while($this->circulate)
       {
           $this->fieldName=$this->ask('Enter Field Name');
           $this->fieldType=$this->ask('Field Type','string');
           $this->fieldComment=$this->ask('Comment','This column is added on '.date('d-m-Y'));
           $this->nullable=$this->ask('Is Nullable ? ','Yes');
           $this->proceed=$this->choice('Do you want to add more?',['No','Yes']);
           array_push($this->commandsArray,[
                'fieldName'     =>$this->fieldName,
                'fieldType'     =>$this->fieldType,
                'fieldComment'  =>$this->fieldComment,
                'nullable'      =>$this->nullable,
           ]);
           
           if($this->proceed=='No')
           {
               break;
           }
           else{
               continue;
           }

       }

       foreach($this->commandsArray as $c)
       {
            $this->className=$this->qualifiedNameSpace.ucfirst($c['fieldType']).'Type';

            $this->commands.=SyncMigFactory::generate(new $this->className(),$c['fieldName'],true,'change')."\n";
       }

       $this->info($this->commands);
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