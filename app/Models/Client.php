<?php

namespace App\Models;

use App\DbConnection;

class Client extends BaseModel
{
    public static function tableName(): string
    {
        return "clients";
    }
}
