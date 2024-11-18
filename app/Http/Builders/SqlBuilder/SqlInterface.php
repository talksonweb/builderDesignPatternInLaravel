<?php

namespace App\Http\Builders\SqlBuilder;

interface SqlInterface
{
    public function reset();
    public function select(string $table, array $fields);
    public function where(string $field, string $operator, string $value, $andOr = ' AND ');
    public function orWhere(string $field, string $operator, string $value);
    public function limit(int $start, int $offset);
    public function getSQL();
}