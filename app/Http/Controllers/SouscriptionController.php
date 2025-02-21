<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;


class SouscriptionController extends Controller
{

    protected $apiService;
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(){
        return view("backoffice.subscription");
    }

    public function createSouscription(Request $request)
    {
        try {
            // Appel du service pour créer la souscription
          //  dd($request);
            $souscription = $this->apiService->createSubscriptions($request);


            $idSouscription = $souscription['idSubscription']; // Supposons que l'ID est retourné par l'API

            // Génération du lien de téléchargement de l'attestation
            $attestationUrl = route('download.attestation', ['id' => $idSouscription]);

            // Retourner une réponse JSON avec le lien de téléchargement
            return redirect()->route('souscription')->with([
                'success' => 'Souscription créée avec succès !',
                'attestation_url' => $attestationUrl
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Erreur lors de la création de la souscription : ' . $e->getMessage()
            ]);
        }

    }

    public function downloadAttestation($id)
    {
        // Récupérer le PDF depuis l'API
        $response = $this->apiService->getAttestation($id);

        //dd($response);
        // Retourner le fichier PDF
        return response($response->content(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="attestation_'.$id.'.pdf"');
    }

}
