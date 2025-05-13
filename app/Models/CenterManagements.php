<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CenterManagements extends Model
{
    use HasFactory;
    protected $table = 'center_managments'; // your table name
    protected $primaryKey = 'center_id';

    protected $fillable = [
        'center_name',
        'center_address',
        'center_email'
    ];

    public function programs()
    {
         return $this->hasMany(ProgramMasters::class, 'center_id');
    }

}
