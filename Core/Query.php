<?php

namespace Core;

class Query
{
    private string $tableName;
    private array $columns = ['*'];
    private string $where = '';
    private string $orderBy = '';

    public function table(string $tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function columns($columns)
    {
        $this->columns = $columns;
        return $this;
    }

    public function where(string $condition)
    {
        $this->where = ' WHERE ' . $condition;
        return $this;
    }

    public function orderBy(string $column, string $sort = 'ASC')
    {
        $this->orderBy = " ORDER BY {$column} {$sort}";
        return $this;
    }

    public function get()
    {
        $sql = "SELECT " . implode(', ', $this->columns);
        $sql .= " FROM " . $this->tableName;
        $sql .= $this->where;
        $sql .= $this->orderBy;
        
        return $sql;
    }
}