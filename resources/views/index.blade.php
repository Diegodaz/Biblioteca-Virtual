<x-app-layout>
    <div class=" container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($papers as $paper)
                <div class="p-1 shadow-xl bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 rounded-2xl">
                    <div class="block p-6 bg-white sm:p-8 rounded-xl" href="">

                        <div class="mt-2 sm:pr-8">
                            <h5 class="text-xl font-bold text-gray-900">{{ $paper->name }}</h5>
                            <div>
                                @foreach ($paper->tags as $tag)
                                    <span
                                        class="inline-block px-3 h-6 bg-{{ $tag->color }}-600 text-white rounded-full">{{ $tag->name }}</span>
                                @endforeach
                            </div>

                            <p class="mt-2 text-sm text-gray-500">
                                {{ $paper->extract }}
                            </p>
                        </div>
                        <div class="mt-2 sm:flex sm:items-center sm:gap-2">


                            <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                            <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                                Autores
                                @foreach ($paper->authors as $author)
                                    <span class="font-medium hover:text-gray-700">{{ $author->name }} </span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
