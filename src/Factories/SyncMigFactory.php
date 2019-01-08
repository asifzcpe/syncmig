<?php
namespace Asif\SyncMig\Factories;
use Asif\SyncMig\Factories;
class SyncMigFactory
{

    public static function generate(SyncMigInterface $columnType,string $columnName,bool $isNullable=false, string $modificationType='new')
    {
         return $columnType->makeCommand($columnName,$isNullable,$modificationType);
    }
}