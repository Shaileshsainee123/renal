<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $con = new DoctorController();
        return    $con->index();
    }
    public function patient()
    {
        return view('staff.petient');
    }
    public function savepetients(Request $r)
    {
        $this->validate($r, [
            "name" => "required|string|max:255",
            "age" => "required|numeric",
            "mobile" => "required|numeric|digits:10",
        ]);
        Patient::create([
            "name" => $r->name,
            "age" => $r->age,
            "mobile" => $r->mobile,

        ]);
        return new JsonResponse(['success' => 1]);
    }
    public function getPetients()
    {
        $rs = Patient::all()->toArray();
        return ['data' => $rs];
    }
    public function deletepetient(Patient $del)
    {
        $del->delete();
    }
}
