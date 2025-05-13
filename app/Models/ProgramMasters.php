<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramMasters extends Model
{
    use HasFactory;

    protected $table = 'program_masters';
    protected $primaryKey = 'Program_id';

    protected $fillable = [
        'center_id',
        'create_id',
        'program_name',
        'number_of_days',
        'Program_Fees',
        'CCFRI',
        'ACCB',
        'Parent_Fees',
    ];
    public function centers()
    {
        return $this->belongsTo(CenterManagements::class, 'center_id');
    }
    public function progs()
    {
        return $this->belongsTo(ProgramCreates::class, 'create_id');
    }


}
