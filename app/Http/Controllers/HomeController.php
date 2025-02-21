<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    //
    protected $apiService;
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function index(){
        return view('front.home');
    }

    public function login(){
        return view("front.login");
    }

    public function login_post(Request $request)
{
    // 🔹 Validation des entrées
    $request->validate([
        'login' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = [
        "username" => $request->input("login"),
        "password" => $request->input("password"),
    ];

    // 🔹 Appel à l'API d'authentification
    $response = $this->apiService->getLogin($credentials);



    // 🔹 Vérification de la réponse
    if (isset($response['error'])) {
        return back()->withErrors(['login' => $response['error']]);
    }

    // 🔹 Stocker les informations de l'utilisateur en session
    session(['user' => $response]);

    // 🔹 Rediriger vers le back-office
    return redirect()->route("dashboard");
}

public function dashboard(){
    $userNom = session('user_nom');
    $userPrenom = session('user_prenom');
    $userRole = session('user_role');

    return view('backoffice.simulateur', compact('userNom', 'userPrenom', 'userRole'));
}

}
