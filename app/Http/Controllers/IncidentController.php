<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;

class IncidentController extends Controller
{

    protected function add()
    {
        $data=request()->all();
        //dd($data);
        Incident::create([
            'incidentType_id' => $data['type'],
            'priority' => $data['options'],//all the radio buttons named options
            'details' => $data['details'],
            'lat' => $data['lat'],
            'lng' => $data['lng']
        ]);

         
        echo '<script type="text/JavaScript"> 
            alert("New Incident");
            </script>';

        //after adding new incident you should view the list of incidents
    }
}
