<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = "Bills";
    protected $primaryKey = 'ID_Bill';
    protected $foreignKey = 'Customer';
}