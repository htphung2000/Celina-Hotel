<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = "Departments";
    protected $primaryKey = 'ID_Department';
    protected $fillable = [
        'DPM_Name',
        'DPM_Phone',
        'DPM_Address',
        'DPM_Img'
    ];
}
