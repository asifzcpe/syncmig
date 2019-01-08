<?php
namespace Asif\SyncMig\Factories\Types;
use  Asif\SyncMig\Factories\SyncMigInterface;
class FloatType implements SyncMigInterface
{
   public function makeCommand(string $columnName,bool $isNullable=false, string $modificationType='new')
   {
       $generatedCommand= '$table->float("'.$columnName.'")';
       ($isNullable)?$generatedCommand.="->nullable()":'';
       ($modificationType=='change')?$generatedCommand.="->change()":'';
       return $generatedCommand.";";
   }
}