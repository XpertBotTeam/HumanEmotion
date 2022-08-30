<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\IncidentType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public const OFFICER = 'Officer';
    public const CITIZEN = 'Citizen';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $role = Role::findOrFail($user->role_id);
        $roleName = $role->roleName;
            
        if ($roleName == HomeController::OFFICER){
            return view('officer');    
        }
        else{
            $types= IncidentType::all();
            return view('home',[
                'types' => $types,
            ]);
        }
    }
}
