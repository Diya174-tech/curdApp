<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CenterMangements;
use App\Models\ProgramMasters;
use App\Models\FeesMasters;

class ChildMasters extends Model
{
    use HasFactory;
    protected $table = 'child_masters';
    protected $primaryKey = 'child_id';

    protected $fillable = [
        'center_id',
        'Program_id',
        'CHild_First_Name',
        'Child_Last_Name',
        'PArent_First_Name',
        'Parent_Last_Name',
        'child_dob',
        'Child_parent_email',
        'Child_parent_mobno',
        'Child_Institution_number',
        'child_transit_number',
        'child_account_number',
        'Child_Emergency_Contact_Name',
        'Child_Emergency_Contact_Number	',
        'adminition_date',
        'active_status',
        'end_date',
        'Special_Notes',
        'Registration_Fees_Paid',
        'number_of_days'
    ];
    public function center()
    {
        return $this->belongsTo(CenterManagements::class, 'center_id');
    }

    public function program()
    {
         return $this->belongsTo(ProgramMasters::class, 'Program_id');
    }
    public function fee()
    {
        return $this->hasOne(FeesMasters::class, 'child_id', 'child_id');
    }


}
