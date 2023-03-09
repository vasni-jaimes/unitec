<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\EducatioLevel;
use App\Models\User;
use DB;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware("no.auth");
    }

    public function index()
    {
        $genders         = Gender::all();
        $maritalStatuses = MaritalStatus::all();
        $educationLevels = EducatioLevel::all();

        return view('register', compact( 'genders', 'maritalStatuses', 'educationLevels' ));
    }


    public function store(RegisterRequest $request)
    {
        DB::beginTransaction();

        $user                     = new User();
        $user->name               = $request->name;
        $user->mother_last_name   = $request->mother_last_name;
        $user->last_name          = $request->last_name;
        $user->gener_id           = $request->gender;
        $user->age                = $request->age;
        $user->marital_status_id  = $request->marital_status;
        $user->email              = $request->email;
        $user->education_level_id = $request->education_level;
        $user->password           = Hash::make($request->password);

        if ( $request->education_level != 1 ) {
            $user->career_id = $request->career;
        }

        if ( $user->save() ) {
            DB::commit();
            auth()->login($user);
            return redirect()->route('home');
        }

        DB::rollback();
        return redirect()->back('home')->withInput($request)->with('error_register', true);
    }
}
