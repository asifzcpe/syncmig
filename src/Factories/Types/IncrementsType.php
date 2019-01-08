<?php
namespace Asif\SyncMig\Factories\Types;
use  Asif\SyncMig\Factories\SyncMigInterface;
class IncrementsType implements SyncMigInterface
{
   public function makeCommand(string $columnName,bool $isNullable=false, string $modificationType='new')
   {
       $generatedCommand= '$table->increments("'.$columnName.'")';
       return $generatedCommand.";";
   }
}