@extends('../welcome')
@section("content")
<div class="container mx-auto py-10 flex flex-col md:flex-row items-center justify-between">
    <div class="w-full md:w-1/2 px-5">
        <h1 class="text-3xl font-bold text-[#bc872b]">Simulez la prime NSIAGO'ASSUR - AMAZONES </h1>
        <p class="text-gray-600 mt-2">Désormais, en tout lieu et à tout instant, obtenez une estimation de votre prime en quelques clics.</p>
    </div>
    <div class="w-full md:w-1/2 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold text-gray-700">SIMULATEUR <span class="text-[rgb(188,135,43)]"> auto </span>  </h2>
        <form id="simulationForm" class="mt-4" method="POST" action="{{ route('simulate') }}">
            @csrf

            <div id="step1">


                <fieldset class="p-4">
                    <legend>

                        <h2 class="text-xl font-bold text-gray-700">Choisissez un type de:<span class="text-[rgb(188,135,43)]"> véhicule </span>  </h2>
                    </legend>



                    <label class="flex items-center">
                        <input type="checkbox" name="vehicle_type" value="promenade_affaire">
                        <span class="ml-2">Promenade et Affaire (Usage personnel)</span>
                    </label>

                    <label class="flex items-center mt-2">
                        <input type="checkbox" name="vehicle_type" value="moto_tricycle">
                        <span class="ml-2">Véhicules Motorisés à 2 ou 3 roues (Moto, tricycles)</span>
                    </label>

                    <label class="flex items-center mt-2">
                        <input type="checkbox" name="vehicle_type" value="transport_public">
                        <span class="ml-2">Transport public de voyage (Véhicule transport de personnes)</span>
                    </label>

                    <label class="flex items-center mt-2">
                        <input type="checkbox" name="vehicle_type" value="taxi">
                        <span class="ml-2">Véhicule de transport avec taximètres (Taxis)</span>
                    </label>

                    <button type="button" onclick="nextStep(2)" class="mt-4 w-full bg-[#15549a] text-white py-2 rounded-md">Suivant</button>
                </fieldset>


            </div>

            <div id="step2" class="hidden">


                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label class="font-semibold block mb-2">Déterminer la puissance du véhicule</label>
                        <select class="w-full border border-gray-300 p-2 rounded-lg">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3" selected>3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="w-1/2">
                        <label class="font-semibold block mb-2">Date de mise en circulation du véhicule</label>
                        <input type="date" class="w-full border border-gray-300 p-2 rounded-lg">
                    </div>
                </div>



                <div class="flex gap-4 my-4">
                <div class="w-1/2">
                    <label class="font-semibold block mb-2">Valeur du véhicule neuf</label>
                    <input type="text" placeholder="FCFA" class="w-full border border-gray-300 p-2 rounded-lg">
                </div>
                <div class="w-1/2">
                    <label class="font-semibold block mb-2">Valeur vénale du véhicule</label>
                    <input type="text" placeholder="FCFA" class="w-full border border-red-500 p-2 rounded-lg">
                    <p class="text-red-500 text-sm mt-1">Ce champ est obligatoire.</p>
                </div>
            </div>

                <button type="button" onclick="prevStep(1)" class="mt-4 w-full text-[#15549a]">Précédent</button>
                <button type="button" onclick="nextStep(3)" class="mt-4 w-full bg-[#15549a] text-white py-2 rounded-md">Suivant</button>
            </div>

            <div id="step3" class="hidden">

                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label class="font-semibold block mb-2">Produit d'assurance</label>
                        <select class="w-full border border-gray-300 p-2 rounded-lg">
                            <option value="Papillon" selected>Papillon</option>
                            <option value="Douby">Douby</option>
                            <option value="Douyou" >Douyou</option>
                            <option value="Toutourisquou ">Toutourisquou</option>
                        </select>
                    </div>

                    <div class="w-1/2">
                        <label class="font-semibold block mb-2">Date de mise en circulation du véhicule</label>
                        <input type="date" class="w-full border border-gray-300 p-2 rounded-lg">
                    </div>
                </div>

                <button type="button" onclick="prevStep(2)" class="mt-4 w-full text-[#15549a]">Précédent</button>

                <button type="submit" class="mt-4 w-full bg-[#ff0419] text-white py-2 rounded-md">SIMULER</button>

                {{--
                calculer le montant de la souscription en fonction de la prime
                mettre un bouton souscrire

                <button type="reset" class="mt-2 w-full text-[#15549a]">RÉINITIALISER</button> --}}
            </div>
        </form>
    </div>
</div>

<script>

let power = 3; // Valeur initiale

function changePower(delta) {
    power += delta;
    if (power < 1) power = 1;  // Minimum 1
    if (power > 24) power = 24; // Maximum 24
    document.getElementById("powerValue").innerText = power;
}

    function nextStep(step) {
        document.getElementById('step' + (step - 1)).classList.add('hidden');
        document.getElementById('step' + step).classList.remove('hidden');
    }

    function prevStep(step) {
        document.getElementById('step' + (step + 1)).classList.add('hidden');
        document.getElementById('step' + step).classList.remove('hidden');
    }
</script>
@endsection
