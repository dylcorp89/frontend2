@extends('backoffice.index')
@section("content")
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Résultat de la Simulation</h2>

    <div class="bg-gray-100 p-4 rounded-lg mb-4">
        <p class="text-2xl my-2 "><strong>Référence :</strong> {{ $simulation['quoteReference'] }}</p>
        <p class="text-2xl my-2"><strong>Date d'expiration :</strong> {{ $simulation['endDate'] }}</p>
        <p class="text-2xl my-2 "><strong>Prime:</strong> {{ number_format($simulation['price'], 0, ',', ' ') }} FCFA</p>
    </div>

    <a href="{{ route('souscription') }}"
       class="block text-center bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700">
        Souscrire
    </a>
</div>
@endsection
