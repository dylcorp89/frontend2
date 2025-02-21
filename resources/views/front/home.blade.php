@extends('../welcome')
@section('content')


<section class="hero relative bg-[url('../../public/img/amazone.png')] bg-cover  w-full h-screen">
    <!-- Overlay avec un dégradé et une opacité -->
    <div class="absolute inset-0   bg-gradient-to-r from-[#15549a]/90 via-[#15549a]/90 to-[#fff]/90 flex items-center">

        <div class="container p-5 mx-auto my-5 grid grid-cols-2   md:gap-90">
            <!-- Colonne 1 -->
            <div class="">
                <h1 class="mb-6 text-4xl font-bold text-white">
                    NSIAGO'ASSUR - AMAZONES
                </h1>

                <p class="mb-6 text-white">
                    Générez des revenus complémentaires via la vente de produits
                    d'assurance automobile de NSIAGO'ASSUR
                </p>

            <a href="{{  route("login") }}" class="cursor-pointer" style="cursor: pointer;"  > <button class="px-6 py-3 bg-[#bc872b] hover:bg-[#bc872b] text-white font-semibold rounded-lg shadow-md hover:opacity-90 transition duration-300">
                 J'en profite
                </button></a>
            </div>

            <!-- Colonne 2 -->
            <div class=" rounded-lg  h-full ">
                <div class="relative w-full ">
                    <!-- Bannière rouge -->
                    <div class=" h-full absolute -top-15     text-white font-bold text-xl
                     px-4 py-8 text-center/2 ">

                    </div>

                    <!-- Contenu principal -->
                    <div class="mt-6 text-center">
                      <p class="text-gray-500 text-xs">   &nbsp;</p>
                      <p class=" text-gray-800 font-bold text-sm px-2 py-1 rounded mt-2 inline-block">
                       &nbsp;
                      </p>
                      <div class=" py-3 px-4 rounded-md mt-4">
                        <p class="text-gray-500 text-xs">   &nbsp;</p>
                        <p class="text-black font-bold text-2xl">   &nbsp;</p>
                      </div>
                    </div>

                    <!-- Icônes de pièces -->
                    <div class="absolute -bottom-5 right-4 flex items-center space-x-1">
                      <img src="{{ asset('img/voiture.png') }}" alt="Pièce" class=" w-full">

                    </div>

                  </div>

            </div>
        </div>
    </div>

</section>





@endsection
