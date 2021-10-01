<?php

namespace App\View\Components;

use App\Models\Branch;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class stats extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $staff = User::where('role', 'staff')->get()->count();
        $doctor = User::where('role', 'doctor')->get()->count();
        $patient = Patient::select("*")->get()->count();
        $branch = Branch::select("*")->get()->count();
        return view('components.stats', compact('staff', 'doctor', 'patient', 'branch'));
    }
}
