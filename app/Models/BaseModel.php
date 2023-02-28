<?php

namespace App\Models;

use App\DbConnection;

abstract class BaseModel
{
    abstract static function tableName(): string;

    public static function all(): array
    {
        $tableName = static::tableName();

        $result = DbConnection::make()->query("SELECT * FROM `{$tableName}`");

        $rows = [];

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $rows[] = $row;
            }
        }

        return $rows;
    }
}
