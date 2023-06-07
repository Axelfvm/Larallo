<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id',
        'idgenerated',
        'iduser',
        'description',
        'public',
        'bpass',
        'password',

    ];

    protected $table = 'projects';
}
