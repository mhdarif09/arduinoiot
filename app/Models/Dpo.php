<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpo extends Model
{
    use HasFactory;

    protected $table= "dpos";

    protected $fillable = [
        'nik',
        'name',
    ];

}
