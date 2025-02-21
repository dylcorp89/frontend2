<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

 {{--  @vite('resources/css/app.css')  --}}

   <link rel="stylesheet" href="{{ asset('build/assets/app-DiUA3bAc.css') }}">
    <link rel="stylesheet" href="{{ asset('\css/swiper.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css">



</head>
  <body>

        <header>
            <div class=" bg-gradient-to-r from-[#15549a] via-[#15549a] to-[#15549a] border-b border-white/50 shadow-2xl items-center w-full  text-white px-5 py-1">
                <div class="flex items-center justify-between">
                 <a href="{{ route('home') }}">  <img src="{{ asset("img/logo_nsia.png") }}" alt="" class=" h-20">
                 </a>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" class="text-sm font-bold hover:text-[#bc872b]">Accueil</a>
                        <a href="#" class="text-sm font-bold hover:text-[#bc872b]">Aide</a>
                    </div>
                </div>
            </div>
        </header>






        @yield('content')




    <footer class="shadow-lg  bg-dark items-center w-full h-10 text-white px-5 py-3 fixed bottom-0">

        @yield('scripts')
    <script>


        document.addEventListener("DOMContentLoaded", function() {
            const typeVehicules = document.querySelectorAll('input[name="typeVehicule"]');
            const produitAssurance = document.getElementById("produitAssurance");

            // Liste des options disponibles pour chaque type de véhicule
            const assuranceOptions = {
                "201": ["Papillon", "Douyou"],
                "202": ["Douby", "Douyou"],
                "204": ["Toutourisquou"]
            };

            function updateProduitAssurance() {
                const selectedVehicule = document.querySelector('input[name="typeVehicule"]:checked')?.value;
                produitAssurance.innerHTML = ""; // Efface les options actuelles

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

            // Écoute les changements sur les boutons radio
            typeVehicules.forEach(input => {
                input.addEventListener("change", updateProduitAssurance);
            });

            // Initialisation au chargement de la page
            updateProduitAssurance();
        });
    </script>
    <script src="{{ asset('build/assets/app-CqflisoM.js') }}"></script>

        <script src="{{ asset('\js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('\js/swiper-bundle.min.js') }}"></script>
     <script src="{{ asset('\js/main.js') }}"></script>
  </body>
</html>
