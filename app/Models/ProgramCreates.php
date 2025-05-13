<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCreates extends Model
{
    use HasFactory;

    protected $table = 'program_creates';
    protected $primaryKey = 'create_id';
    protected $fillable = ['center_id', 'Program_name'];

    public function center()
    {
        return $this->belongsTo(CenterManagements::class, 'center_id');
    }
}
