<?php
namespace Asif\SyncMig\Factories;
use  Asif\SyncMig\Factories\SyncMigInterface;
class StringType implements SyncMigInterface
{
   public function makeCommand()
   {
       echo 'dddd';
   }
}