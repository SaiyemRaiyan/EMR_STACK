<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientDetails extends Model
{
    protected $table = 'patient_details';
    protected $fillable = [
        'patient_id',
        'father_name',
        'mother_name',
        'closest_family_member',
        'closest_family_phone',
        'family_member_phone',
    ];
}
