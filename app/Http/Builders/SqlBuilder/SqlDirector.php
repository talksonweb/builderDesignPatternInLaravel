<?php

namespace App\Http\Builders\SqlBuilder;

class SqlDirector
{
    protected $sqlBuilder;

    public function __construct($sqlBuilder)
    {
        $this->sqlBuilder = $sqlBuilder;
    }

    public function getEarliestEmployees()
    {
        return $this->sqlBuilder->select('users', ['id', 'name', 'email'])
            ->where('id', '>=', 2)
            ->orWhere('name', '=', 'sam')
            ->orWhere('name', '=', 'jill')
            ->limit(0, 6)
            ->getSQL();
    }
}