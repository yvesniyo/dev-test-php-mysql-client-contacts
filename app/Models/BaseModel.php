<?php

namespace App\Models;

use App\DB;
use ArrayAccess;

abstract class BaseModel
{
    abstract static function tableName(): string;

    public static function all(): array
    {
        $tableName = static::tableName();

        $result = DB::make()->query("SELECT * FROM `{$tableName}`");

        $rows = [];

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $rows[] = $row;
            }
        }

        return $rows;
    }


    public static function find(int $id)
    {
        $tableName = static::tableName();

        $result = DB::make()->query("SELECT * FROM `{$tableName}` WHERE id = {$id} LIMIT 1");

        if ($result->num_rows > 0) {

            $model = new static;

            $row =  $result->fetch_assoc();

            foreach ($row as $key => $value) {

                $model->{$key} = $value;
            }

            return $model;
        }

        return null;
    }


    public static function create(array $data): ?BaseModel
    {

        $tableName = static::tableName();
        $columnsCount = count(array_keys($data));
        $columns = implode(",", array_keys($data));
        $values =  array_values($data);

        $bindingStringMarks = str_repeat("s", $columnsCount);
        $bindingQuestionMarks =  substr(str_repeat(",?", $columnsCount), 1);

        $query = "INSERT INTO {$tableName} ({$columns}) VALUES ({$bindingQuestionMarks})";
        $stmt = DB::make()->prepare($query);

        $stmt->bind_param($bindingStringMarks, ...$values);

        $stmt->execute();

        return static::find($stmt->insert_id);
    }


    public function toArray(): array
    {
        return (array) $this;
    }
}
