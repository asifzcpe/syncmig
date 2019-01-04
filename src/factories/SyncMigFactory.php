<?php
namespace Asif\SyncMig\Factories;
use Asif\SyncMig\Factories;
class SyncMigFactory
{

    public static function generate($columnType)
    {
         $sysMig=  new StringType;
//         dd($sysMig);
         return $sysMig->makeCommand();
    }
}