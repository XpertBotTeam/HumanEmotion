<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\IncidentType;
use App\Models\Incident;

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
           $incidents = Incident::all(); 
            return view('officer',[
                'incidents' => $incidents,
            ]);    
        }
        else{
            $types= IncidentType::all();
            $inc=Incident::first();
            return view('home',[
                'types' => $types,
                'inc' => $inc
            ]);
        }
    }
}
