<?php

namespace App\Kernel\Database;

interface DatabaseInterface
{
    public function insert(string $table, array $data):int|false;

    public function getAll(string $table): ?array;

    public function deleteAll(string $table): void;


}