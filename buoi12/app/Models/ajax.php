<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ajax extends Model
{
    public static function nhan($ten,$tuoi){
        echo $ten;
        echo "<br>";
        echo $tuoi;
    }
}
