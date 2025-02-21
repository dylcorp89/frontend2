@extends('backoffice.index')

@section("content")
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-700">Gestion des Utilisateurs</h2>
        <a href="{{ route('utilisateur.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
            <i class="ri-user-add-line mr-2"></i> Ajouter un utilisateur
        </a>
    </div>

    <!-- Table des souscriptions -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Identifiant</th>

                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Nom & Prenoms</th>
                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Rôle</th>
                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($liste as $souscription)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-4 px-4 text-sm text-gray-700">{{ $souscription['idUtilisateur'] }}</td>

                    <td class="py-4 px-4 text-sm text-gray-700">{{ $souscription['prenoms'] }} {{ $souscription['nom'] }}</td>
                    <td class="py-4 px-4 text-sm text-gray-700">{{ $souscription['libelle'] }}</td>

                    <td class="py-4 px-4 text-sm text-gray-700">
                        <a href="" class="text-blue-500 hover:text-blue-700 flex items-center">
                            <i class="ri-pencil-line mr-2"></i> Modifier
                        </a>
                        <a href="" class="text-red-500 hover:text-red-700 ml-4 flex items-center">
                            <i class="ri-delete-bin-5-line mr-2"></i> Supprimer
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
