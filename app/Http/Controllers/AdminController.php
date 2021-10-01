<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {

        $con = new DoctorController();
        return    $con->index();
    }

    public function admin()
    {
        $role = 'admin';
        return view('admin.users', compact('role'));
    }
    public function doctors()
    {
        $role = 'doctor';
        return view('admin.users', compact('role'));
    }
    public function staffs()
    {
        $role = 'staff';
        return view('admin.users', compact('role'));
    }


    public function saveusers(Request $r)
    {
        // dd($r->all());
        $this->validate($r, [
            "name" => "required|string|max:255",
            "email" => "required|email|max:255|unique:users,email",
            "username" => "required|string|max:255|unique:users,username",
            "mobile" => "required|numeric|digits:10|unique:users,mobile",
            "password" => "required|string|max:255|min:8",
            "role" => ['required', 'string', Rule::in(['admin', 'doctor', 'staff'])],
        ]);

        User::create([
            "name" =>    $r->name,
            "email" =>     $r->email,
            "username" =>   $r->username,
            "mobile" =>    $r->mobile,
            "password" =>  Hash::make($r->password),
            "role" =>  $r->role,
        ]);

        return new JsonResponse(['success' => 1]);
    }

    public function getusers(Request $r)
    {
        $roles = ['admin', 'doctor', 'staff'];
        $res = array();
        if (in_array($r->role, $roles)) {

            $res = User::where('role', $r->role)->get()->toArray();
        }
        return ['data' => $res];
    }

    public function deleteuser(User $user)
    {
        $user->delete();
    }
    public function branches()
    {
        return view("admin.branches");
    }
    public function savebranches(Request $req)
    {
        $this->validate($req, [
            "name" => "required|string|max:255|unique:branches,name",
            "amount" => "required|numeric",
        ]);


        Branch::create([
            "name" => $req->name,
            "amount" => $req->amount,
        ]);

        return new JsonResponse(['success' => 1]);
    }
    public function getBranches()
    {
        $rs = Branch::all()->toArray();
        return ['data' => $rs];
    }
    public function deletepetient(Branch $del)
    {
        $del->delete();
    }
}
