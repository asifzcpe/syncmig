<?php
namespace Asif\SyncMig\Factories\Types;
use  Asif\SyncMig\Factories\SyncMigInterface;
class DecimalType implements SyncMigInterface
{
   public function makeCommand(string $columnName,bool $isNullable=false, string $modificationType='new')
   {
       $generatedCommand= '$table->decimal("'.$columnName.'")';
       ($isNullable)?$generatedCommand.="->nullable()":'';
       ($modificationType=='change')?$generatedCommand.="->change()":'';
       
       return $generatedCommand.";";
   }
}