<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';

    protected $fillable = [
        'agms_number',
        'registration_date',
        'registration_type',
        'full_name_en',
        'preferred_name_en',
        'sex',
        'date_of_birth',
        'national_id',
        'marital_status',
        'spouse_name_en',
        'number_of_children',
        'upazila',
        'union_name',
        'village',
        'household_number',
        'email',
        'phone_type',
        'own_phone',
        'family_phone',
    ];

    public function patientsDetails()
    {
        return $this->hasOne(PatientDetails::class, 'patient_id', 'id');
    }
}
