<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserManagements extends Model
{  
    use HasFactory;
    protected $table = 'user_managemnts';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_name',
        'user_type',
        'user_status',
    ];
}
