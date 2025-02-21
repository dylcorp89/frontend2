@extends('../welcome')
@section("content")
<div class="container mx-auto max-w-md mt-10 p-6  ">
    <div class="shadow-lg rounded-lg  p-4 ">
        <h2 class="text-2xl font-bold mb-4 text-center">Connexion</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Nom d'utilisateur</label>
                <input type="text" name="login" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Mot de passe</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div class="mb-4 flex justify-between items-center">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox text-blue-600">
                    <span class="ml-2 text-gray-700">Se souvenir de moi</span>
                </label>
                <a href="" class="text-[#15549a] hover:underline">Mot de passe oublié ?</a>
            </div>
            <button type="submit" class="w-full bg-[#15549a] hover:bg-[#15549a] text-white font-bold py-2 px-4 rounded-lg">Se connecter</button>
        </form>
    </div>

</div>
@endsection
