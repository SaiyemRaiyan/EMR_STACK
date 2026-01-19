<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientDetails;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function patientList()
    {
        return view('web.patient-list');
    }


    public function patientListData()
    {
        $getPatients = Patient::with('patientsDetails')->get();
        $patients = [];
        foreach ($getPatients as $patient) {
            $patients[] = [
                'id'                => $patient->id,
                'recordNo'          => 'EMR-'.$patient->id,
                'name'              => $patient->full_name_en,
                'fatherHusbandName' => $patient->patientsDetails->father_name ?? '',
                'district'          => $patient->upazila,
            ];
        }

        return response()->json($patients);
    }

    public function patientRegister(Request $request)
    {
        $this->validate($request, [
            'agms_number'            => 'required|string|max:150|unique:patients,agms_number',
            'registration_date'      => 'required|date',
            'registration_type'      => 'required|in:new,follow-up',

            'full_name_en'           => 'required|string|max:150',
            'preferred_name_en'      => 'required|string|max:150',

            'sex'                    => 'required|in:male,female,others',
            'date_of_birth'          => 'required|date',

            'national_id'            => 'required|string|max:20|unique:patients,national_id',
            'marital_status'         => 'required|in:married,never-married,single,widow,divorced,separated',

            'spouse_name_en'         => 'nullable|string|max:150',
            'number_of_children'     => 'nullable|integer|min:0|max:20',

            'upazila'                => 'required|string|max:50',
            'union_name'             => 'required|string|max:50',
            'village'                => 'required|string|max:150',
            'household_number'       => 'required|string|max:150',

            'email'                  => 'nullable|email|max:150',

            'phone_type'             => 'nullable|in:own,family,both',
            'own_phone'              => 'nullable|string|max:20',
            'family_phone'           => 'nullable|string|max:20',

            'father_name'            => 'required|string|max:150',
            'mother_name'            => 'required|string|max:150',

            'closest_family_member'  => 'nullable|string|max:150',
            'closest_family_phone'   => 'nullable|string|max:20',
            'family_member_phone'    => 'nullable|string|max:20',
        ]);

        try {
            $patientData = [
                'agms_number'           => $request->agms_number,
                'registration_date'     => $request->registration_date,
                'registration_type'     => $request->registration_type,
                'full_name_en'          => $request->full_name_en,
                'preferred_name_en'     => $request->preferred_name_en,
                'sex'                   => $request->sex,
                'date_of_birth'         => $request->date_of_birth,
                'national_id'           => $request->national_id,
                'marital_status'        => $request->marital_status,
                'spouse_name_en'        => $request->spouse_name_en,
                'number_of_children'    => $request->number_of_children,
                'upazila'               => $request->upazila,
                'union_name'            => $request->union_name,
                'village'               => $request->village,
                'household_number'      => $request->household_number,
                'email'                 => $request->email,
                'phone_type'            => $request->phone_type,
                'own_phone'             => $request->own_phone,
                'family_phone'          => $request->family_phone,
            ];

            $patient = Patient::create($patientData);

            if ($patient) {
                $patientDetails = [
                    'patient_id' => $patient->id,
                    'father_name' => $request->father_name,
                    'mother_name' => $request->mother_name,
                    'closest_family_member' => $request->closest_family_member,
                    'closest_family_phone' => $request->closest_family_phone,
                    'family_member_phone' => $request->family_member_phone,
                ];
                PatientDetails::create($patientDetails);

                return redirect()->back()->with('success', 'Patient registered successfully!');
            } else {
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
