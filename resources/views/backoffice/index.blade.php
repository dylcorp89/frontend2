<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('build/assets/app-DiUA3bAc.css') }}">
    <link rel="stylesheet" href="{{ asset('\css/swiper.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css">
  </head>
  <body>
    <header>
        <div class="bg-gradient-to-r from-[#15549a] via-[#15549a] to-[#15549a] border-b border-white/50 shadow-2xl items-center w-full text-white px-5 py-1">
            <div class="flex items-center justify-between">
                <a href="#">
                    <img src="{{ asset('img/logo_nsia.png') }}" alt="" class="h-20">
                </a>
                <div class="flex items-center space-x-4">
                    @if(session()->has('user_role') && session('user_role') === 'Admin')
                        <!-- Menu pour Admin -->
                        <a href="{{ route('utilisateur') }}" class="text-sm font-bold hover:text-[#bc872b]">Gestion des Utilisateurs</a>
                        <a href="{{ route('listes') }} " class="text-sm font-bold hover:text-[#bc872b]">Gestion des souscriptions</a>
                        <!-- Menu pour les autres utilisateurs -->
                        <a href="{{ route('simulate') }}" class="text-sm font-bold hover:text-[#bc872b]">Simulateur</a>
                        @else
                        <!-- Menu pour les autres utilisateurs -->
                        <a href="{{ route('simulate') }}" class="text-sm font-bold hover:text-[#bc872b]">Simulateur</a>
                    @endif

                    <a href="{{ url('/logout') }}" class="text-sm font-bold hover:text-[#bc872b]">Deconnexion</a>
                </div>
            </div>
        </div>

        <div class="ml-4 my-4 bg-amber-400 mx-auto">
            @if(session()->has('user_nom'))
                <h1>Bienvenue, {{ session('user_nom') }} {{ session('user_prenom') }}</h1>
                <p>Votre rôle : {{ session('user_role') }}</p>
            @else
                <p>Vous devez vous connecter pour accéder à cette page.</p>
                <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Se connecter</a>
            @endif
        </div>

    @yield('content')

    <footer class="shadow-lg bg-dark items-center w-full h-10 text-white px-5 py-3 fixed bottom-0">
        @yield('scripts')
        <script src="{{ asset('build/assets/app-CqflisoM.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const typeVehicules = document.querySelectorAll('input[name="typeVehicule"]');
                const produitAssurance = document.getElementById("produitAssurance");

                const assuranceOptions = {
                    "201": ["Papillon", "Douyou"],
                    "202": ["Douby", "Douyou"],
                    "204": ["Toutourisquou"]
                };

                function updateProduitAssurance() {
                    const selectedVehicule = document.querySelector('input[name="typeVehicule"]:checked')?.value;
                    produitAssurance.innerHTML = "";

                    if (selectedVehicule && assuranceOptions[selectedVehicule]) {
                        assuranceOptions[selectedVehicule].forEach(option => {
                            const opt = document.createElement("option");
                            opt.value = option;
                            opt.textContent = option;
                            produitAssurance.appendChild(opt);
                        });
                    } else {
                        produitAssurance.innerHTML = '<option value="">Aucun produit disponible</option>';
                    }
                }

                typeVehicules.forEach(input => {
                    input.addEventListener("change", updateProduitAssurance);
                });

                updateProduitAssurance();
            });
        </script>
        <script src="{{ asset('\js/scrollreveal.min.js') }}"></script>
        <script src="{{ asset('\js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('\js/main.js') }}"></script>
    </footer>
  </body>
</html>
