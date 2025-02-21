<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Services\ApiService;
use Illuminate\Http\Request;

class SimulateController extends Controller
{
    protected $apiService;
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(){
        return view("backoffice.simulateur");
    }

    public function createSimulation(Request $request)
    {

        $dateMaintenant = Carbon::now()->format('d/m/Y');
        $data = [
            "startDate" => $dateMaintenant,
            "typeVehicule" => $request->input("typeVehicule"),
            "produitAssurance" => $request->input("produitAssurance"),
            "puissance" => $request->input("puissance"),
            "dateCirculation" => $request->input("dateCirculation"),
            "valeurNeuf" => $request->input("valeurNeuf"),
            "valeurVenal" => $request->input("valeurVenal"),
        ];
        // 🔹 s,sStocker `$data` dans la session
        session(['simulation_data' => $data]);
        
        //il faut valider le formulaire
        $simulation = $this->apiService->CreateSimulations($data);
        session(['simulation_data_price' => $simulation]);

        return view('backoffice.resultatsimulation', compact('simulation'));;
    }
}
