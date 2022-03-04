<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "Admins";
    protected $primaryKey = 'Username';
    protected $foreignKey = 'ID_Admin';
    protected $fillable = [
        'Email',
        'Password',
    ];
    protected $hidden = [
        'Password',
        'remember_token',
    ];

}
