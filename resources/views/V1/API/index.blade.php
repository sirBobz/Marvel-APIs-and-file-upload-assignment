@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-right"><a href="{{ url('') }}"> <i class="fa fa-home"> Home</i></a> <i
                class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-file"> Marvel characters</i>
        </div>

    </div>

    <div class="card-body">

    <div class="container mx-auto px-4 py-16">
    <div class="characters">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($characters as $character)
                <div class="character mt-8">
                    <img src="{{ $character['thumbnail'] }}" alt="{{ $character['name'].' avatar' }}" class="hover:opacity-75 transition ease-in-out duration-150">
                    <div class="mt-2">
                        <div class="text-sm text-black-600 font-bold">{{ $character['name'] }}</div>
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
