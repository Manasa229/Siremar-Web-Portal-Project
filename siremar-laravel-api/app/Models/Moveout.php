<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moveout extends Model
{
    use HasFactory;
    protected $table='Moveouts';
    protected $primarykey='id';
}
