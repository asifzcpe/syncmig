<?php
namespace Asif\SyncMig\Factories;
interface SyncMigInterface
{
    public function makeCommand(string $columnName,bool $isNullable=false, string $modificationType);
}