<?php
namespace App\Services;


use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Response;

class ApiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env("API_BASE_URL");
    }

    public function getAllSimulations()
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->get("{$this->baseUrl}/api/v1/simulations")->json();
    }



    public function getUsers()
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->get("{$this->baseUrl}/auth/liste")->json();
    }

    public function createSimulations($data)
    {

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->post("{$this->baseUrl}/api/v1/simulations", $data);
        return $response->json();
    }

    public function getSimulation($id)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->get("{$this->baseUrl}/api/v1/simulations/{id}")->json();
    }


    public function getAllSouscriptions()
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->get("{$this->baseUrl}/api/v1/subscriptions")->json();
    }
    public function getSubscriptions($id)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->get("{$this->baseUrl}/api/v1/subscriptions/{id}")->json();
    }

    public function createSubscriptions($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->post("{$this->baseUrl}/api/v1/subscriptions", $data);
        return $response->json();
    }

    public function getSubscriptionsStatus($id)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->get("{$this->baseUrl}/api/v1/subscriptions/status/{id}")->json();
    }





    public function getAttestation(int $id)
    {
        // Récupération du PDF depuis l'API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->get("{$this->baseUrl}/api/v1/subscriptions/{$id}/attestation");

        // Vérifie si la requête a réussi
        if ($response->successful()) {
            return Response::make($response->body(), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="attestation_'.$id.'.pdf"',
            ]);
        }

        // En cas d'erreur, retourner un message
        return back()->with('error', 'Impossible de récupérer l’attestation.');
    }


    public function getLogin($data)
    {
        $response = Http::post("{$this->baseUrl}/auth/login", $data);

        if ($response->failed()) {
            return ['error' => 'Identifiants invalides ou erreur serveur'];
        }

        $responseData = $response->json();
        session([
            'jwt_token' => $responseData['token'],
            'user_nom' => $responseData['nom'],
            'user_prenom' => $responseData['prenoms'],
            'user_role' => $responseData['role'],
            'user_login' => $responseData['login'],
        ]);

        return $responseData;
    }

    private function getToken()
{
    return session('jwt_token', null);
}

public function getUserInfo()
{
    return [
        'nom' => session('user_nom'),
        'prenom' => session('user_prenom'),
        'role' => session('user_role'),
        'login' => session('user_login'),
    ];
}


}

