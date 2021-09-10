@extends('layouts.admin')

@section('content')
    <!-- start comic info -->
    <div class="comic-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $character['thumbnail'] }}" alt="{{ $character['name'].' profile' }}" class="w-70 md:w-96">
            </div>
            <div class="md:ml-20">
                <h2 class="text-4xl font-semibold">{{ $character['name'] }}</h2>

                <p class="text-gray-300 mt-8">
                    @if ($character['description'])
                        {!! $character['description'] !!}
                    @else
                        <p>Description not available</p>
                    @endif
                </p>

                <div class="mt-16">
                        @if($character['urls']['detail'])
                        <a href="{{ $character['urls']['detail'] }}" class="flex inline-flex items-center bg-red-600 text-white-900 rounded font-semibold px-5 py-4 hover:bg-red-700 transition ease-in-out duration-150">
                            <i class="fas fa-info-circle"></i> <span class="ml-2">More information in marvel.com</span>
                        </a>
                        @endif
                </div>

            </div>
        </div>
    </div>
    <!-- end comic info -->

    <div class="related-comics border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Related comics</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @if (count($relatedComics) > 0)
                    @foreach ($relatedComics as $comic)
                    <div class="mt-8">
                        <a href="{{ url("/comics/".$comic['id'] ) }}">
                            <img src="{{ $comic['thumbnail'] }}" alt="{{ $comic['title'].' cover' }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ url("/comics/".$comic['id'] ) }}" class="text-lg mt-2 hover:text-gray-300">{{ $comic['title'] }}</a>
                        </div>
                    </div>
                    @endforeach
                @else
                    Data not available
                @endif
            </div>
        </div>
    </div>

@endsection
