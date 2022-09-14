<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Role;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

class IncidentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function add()
    {
        $data=request()->all();
        $user = Auth::user();
        $role = Role::findOrFail($user->role_id);
        $roleName = $role->roleName;      
        if ($roleName == HomeController::CITIZEN){
            Incident::create([
                'incidentType_id' => $data['type'],                                    
                'priority' => $data['options'],
                'details' => $data['details'],
                'lat' => $data['lat'],
                'lng' => $data['lng']
            ]);

            return view('thanks');
        }else{
            abort(404, 'Page not found');
        }
    }

    protected function delete($incident){

        $user = Auth::user();
        $role = Role::findOrFail($user->role_id);
        $roleName = $role->roleName;      
        if ($roleName == HomeController::OFFICER){
            
            $incidentObj=Incident::findOrFail($incident);
            $incidentObj->delete();

            $incidents = Incident::all(); 
            return view('officer',[
                'incidents' => $incidents,
            ]);    

        }else{
            abort(404, 'Page not found');
        }

    }

    protected function load($incident){
        $user = Auth::user();
        $role = Role::findOrFail($user->role_id);
        $roleName = $role->roleName;      
        if ($roleName == HomeController::OFFICER){
            $incidentObj = Incident::findOrFail($incident);
            return view ('incident-load',[
                'incident' => $incidentObj
            ]);
        }
        else{
            abort(404, 'Page not found');
        }
    }

    protected function update($incident){
        $user = Auth::user();
        $role = Role::findOrFail($user->role_id);
        $roleName = $role->roleName;
        $data=request()->all();      
        if ($roleName == HomeController::OFFICER){
            $incidentObj = Incident::findOrFail($incident);
            $incidentObj->update(['treated' => $data['treated']]); //how to update field in table database
            
            $incidents = Incident::all(); 
            return view('officer',[
                'incidents' => $incidents,
            ]);
            
        }
        else{
            abort(404, 'Page not found');
        }
    }

}
