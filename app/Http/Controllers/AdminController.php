<?php
namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    protected $apiService;
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }



    public function listUtilisateur(){
        $liste = $this->apiService->getUsers();
        return view("backoffice.utilisateur" , compact('liste'));
    }
    public function createUtilisateur(Request $request)
    {
        try {
            // Appel du service pour créer la souscription
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

    public function listSouscription(){
        $liste = $this->apiService->getAllSouscriptions();
        return view("backoffice.list_souscription", compact('liste'));
    }


}
