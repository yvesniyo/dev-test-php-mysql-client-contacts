<?php

namespace App\Models;

use App\DB;

/**
 * @class Client
 * 
 * 
 * @property int $id
 * @property string $name
 * @property string $client_code
 */
class Client extends BaseModel
{
    public static function tableName(): string
    {
        return "clients";
    }


    public static function allWithContactsSum()
    {
        $tableName = static::tableName();

        $result = DB::make()->query("SELECT *, (SELECT count(DISTINCT(a.contact_id)) FROM contact_clients AS a WHERE a.client_id = b.id ) as contacts_sum 
         FROM `{$tableName}` AS b  ORDER BY b.name ASC");

        $rows = [];

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $rows[] = $row;
            }
        }

        return $rows;
    }
}
