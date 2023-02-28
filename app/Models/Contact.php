<?php

namespace App\Models;

use App\DB;

/**
 * @class Contact
 * 
 * 
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 */
class Contact extends BaseModel
{

    public static function tableName(): string
    {
        return "contacts";
    }

    public static function allWithClientsSum()
    {
        $tableName = static::tableName();

        $result = DB::make()->query("SELECT *, CONCAT(CONCAT(b.surname, ' '), b.name) as full_name, (SELECT count(DISTINCT(a.client_id)) FROM contact_clients AS a WHERE a.contact_id = b.id ) as clients_sum 
         FROM `{$tableName}` AS b  ORDER BY full_name ASC");

        $rows = [];

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $rows[] = $row;
            }
        }

        return $rows;
    }
}
