@extends('backoffice.index')
@section("content")
<style>
    .step {
        display: none;
        opacity: 0;
        transform: translateX(100%);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    .active {
        display: block;
        opacity: 1;
        transform: translateX(0);
    }


    .message { color: green; font-size: 18px; margin-bottom: 20px; }
    .error { color: red; font-size: 18px; }
    .btn { background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
    .btn:hover { background-color: #218838; }
</style>
<div class="container p-5 mx-auto my-5 grid ">






        <!-- Barre de progression -->
        <div class="mb-6">
            <div class="relative w-full bg-gray-300 h-2 rounded-full">
                <div id="progress-bar" class="absolute h-2 bg-blue-500 rounded-full" style="width: 0%; transition: width 0.3s ease;"></div>
            </div>
            <div class="flex justify-between mt-2 text-sm text-gray-600">
                <span> Informations véhicule</span>
                <span>Informations assuré</span>
                <span>Récapitulatif et validation</span>
            </div>
        </div>

        @if(session('success'))
        <p class="message my-4 mx-auto">{{ session('success') }}</p>

        <a href="{{ session('attestation_url') }}" class="btn my-4 mx-auto" target="_blank">Télécharger l'attestation</a>
    @endif

    @if(session('error'))
        <p class="error my-4">{{ session('error') }}</p>
    @endif

        <!-- Formulaire -->
        <form id="multi-step-form" action="{{ route('souscription') }}" method="POST">
            @csrf
            <!-- Étape 1 -->
            <div id="step-1" class="step active">
                <fieldset class="mb-6 bg-white p-4 shadow rounded">
                    <legend class="text-lg font-semibold">Étape 1 : Informations véhicule</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <input type="hidden"  name="dateCirculation"  placeholder="Date de mise en circulation" class="border p-2 rounded w-full" value="{{ session('simulation_data.dateCirculation') }}" required>
                        <input type="text"  name="numeroImmat"   placeholder="Numéro d'immatriculation" class="border p-2 rounded w-full" required>
                        <input type="text"  name="couleur"  placeholder="Couleur" class="border p-2 rounded w-full" required>
                        <input type="number"   name="nbreSiege" placeholder="Nombre de sièges" min="1" class="border p-2 rounded w-full" required>
                        <input type="number"  name="nbrePorte"   placeholder="Nombre de portes" min="1" class="border p-2 rounded w-full" required>
                        <input type="hidden" name="typeVehicule"   placeholder="Catégorie de véhicule" class="border p-2 rounded w-full" value="{{ session('simulation_data.typeVehicule') }}" required>

                    </div>
                </fieldset>
                <button type="button" onclick="nextStep(2)" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Suivant</button>
            </div>

            <!-- Étape 2 -->
            <div id="step-2" class="step">
                <fieldset class="mb-6 bg-white p-4 shadow rounded">
                    <legend class="text-lg font-semibold">Étape 2 : Informations assuré</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <input type="text" name="adresseAssure" placeholder="Adresse" class="border p-2 rounded w-full"  required>
                        <input type="tel" name="telAssure"  placeholder="Téléphone" class="border p-2 rounded w-full" required>
                        <input type="text" name="nomAssure"  placeholder="Nom" class="border p-2 rounded w-full" required>
                        <input type="text" name="prenomAssure"  placeholder="Prénom"  class="border p-2 rounded w-full" required>
                        <input type="text" name="numCniAssure"  placeholder="Numéro de carte d'identité" class="border p-2 rounded w-full" required>
                        <input type="text" name="villeAssure"  placeholder="Ville" class="border p-2 rounded w-full" required>
                    </div>
                </fieldset>
                <button type="button" onclick="nextStep(1)" class="bg-gray-400 text-white py-2 px-4 rounded hover:bg-gray-500">Précédent</button>
                <button type="button" onclick="nextStep(3)" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Suivant</button>
            </div>

            <!-- Étape 3 -->
            <div id="step-3" class="step">
                <fieldset class="mb-6 bg-white p-4 shadow rounded">
                    <legend class="text-lg font-semibold">Étape 3 : Récapitulatif et validation</legend>


                    <input type="hidden" name="reference" value="{{ session('simulation_data_price.quoteReference') }}">
                    <input type="hidden" name="expiration_date" value="{{ session('simulation_data_price.endDate') }}">
                    <input type="hidden" name="prime" value="{{ session('simulation_data_price.price') }}">
                    <input type="hidden" name="startDate" value="{{ session('simulation_data.startDate') }}">
                    <input type="hidden" name="valeurNeuf" value="{{ session('simulation_data.valeurNeuf') }}">
                    <input type="hidden" name="valeurVenal" value="{{ session('simulation_data.valeurVenal') }}">
                    <input type="hidden" name="produitAssurance" value="{{ session('simulation_data.produitAssurance') }}">
                    <!-- Informations véhicule -->
                    <div class="mb-4 p-4 bg-gray-100 rounded">
                        <h3 class="font-semibold">Informations véhicule</h3>
                        <p><strong>Catégorie :</strong> {{ session('simulation_data.typeVehicule', 'N/A') }}</p>
                        <p><strong>Date de mise en circulation :</strong> {{ session('simulation_data.dateCirculation', 'N/A') }}</p>
                        <p><strong>Puissance :</strong> {{ session('simulation_data.puissance', 'N/A') }}</p>
                        <p><strong>Valeur neuf :</strong> {{ session('simulation_data.valeurNeuf', 'N/A') }}</p>
                        <p><strong>Valeur vénale :</strong> {{ session('simulation_data.valeurVenal', 'N/A') }}</p>
                    </div>

                    <!-- Informations assuré -->
                    <div class="mb-4 p-4 bg-gray-100 rounded">
                        <h3 class="font-semibold">Informations assuré</h3>
                        <p><strong>Nom :</strong> <span id="nomAssureRecap"></span></p>
                        <p><strong>Prénom :</strong> <span id="prenomAssureRecap"></span></p>
                        <p><strong>Adresse :</strong> <span id="adresseAssureRecap"></span></p>
                        <p><strong>Ville :</strong> <span id="villeAssureRecap"></span></p>
                        <p><strong>Téléphone :</strong> <span id="telAssureRecap"></span></p>
                        <p><strong>Numéro CNI :</strong> <span id="numCniAssureRecap"></span></p>
                    </div>


                </fieldset>
                <button type="button" onclick="nextStep(2)" class="bg-gray-400 text-white py-2 px-4 rounded hover:bg-gray-500">Précédent</button>
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Valider la souscription</button>

            </div>
        </form>




</div>
@endsection

@section("scripts")
<script>
    let currentStep = 1;

    function nextStep(step) {
        document.getElementById(`step-${currentStep}`).classList.remove("active");
        document.getElementById(`step-${step}`).classList.add("active");
        currentStep = step;
        updateProgress();

        if (step === 3) {
            // Récupérer les valeurs des champs et les afficher dans le récapitulatif
            document.getElementById("nomAssureRecap").innerText = document.querySelector("input[name='nomAssure']").value;
            document.getElementById("prenomAssureRecap").innerText = document.querySelector("input[name='prenomAssure']").value;
            document.getElementById("adresseAssureRecap").innerText = document.querySelector("input[name='adresseAssure']").value;
            document.getElementById("villeAssureRecap").innerText = document.querySelector("input[name='villeAssure']").value;
            document.getElementById("telAssureRecap").innerText = document.querySelector("input[name='telAssure']").value;
            document.getElementById("numCniAssureRecap").innerText = document.querySelector("input[name='numCniAssure']").value;
        }
    }

    function updateProgress() {
        const progress = (currentStep - 1) * 50;
        document.getElementById("progress-bar").style.width = `${progress}%`;
    }



</script>
@endsection
