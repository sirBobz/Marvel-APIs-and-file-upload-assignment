@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-16">
        <div class="characters">
            <h2 class="uppercase tracking-wider text-white-500 text-lg font-semibold">Characters</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($characters as $character)
                    <div class="character mt-8">
                        <a href="{{ url("/apis/".$character['id'] ) }}"><img src="{{ $character['thumbnail'] }}" alt="{{ $character['name'].' avatar' }}" class="hover:opacity-75 transition ease-in-out duration-150"></a>
                        <div class="mt-2">
                            <a href="{{ url("/apis/".$character['id'] ) }}" class="text-lg mt-2 hover:text-gray-300">{{ $character['name'] }}</a>
                            <div class="text-sm truncate text-gray-400">{{ $character['comics'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="scroller-status my-8">
            <div class="flex justify-center">
                <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
            </div>
            <div class="infinite-scroll-last">
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
                    <p>End of content.</p>
                </div>
            </div>
            <p class="infinite-scroll-error">Error</p>
      </div>
    </div>

@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

    <script>
        var elem = document.querySelector('.grid');
        var infScroll = new InfiniteScroll( elem, {
        // options
        path: '/apis/page/@{{#}}',
        append: '.character',
        status: '.scroller-status',
        });
    </script>
@endsection
