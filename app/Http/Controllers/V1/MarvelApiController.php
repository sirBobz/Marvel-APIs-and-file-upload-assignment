<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\CharactersViewModel;
use App\ViewModels\CharacterViewModel;
use Illuminate\Support\Facades\Cache;

class MarvelApiController extends Controller
{
    public $timestamp;
    public $privateKey;
    public $publicKey;
    public $hash;

    public function __construct()
    {
        $this->timestamp = time();
        $this->privateKey = config('services.marvelapi.private_key');
        $this->publicKey = config('services.marvelapi.public_key');
        $this->hash = md5($this->timestamp . $this->privateKey . $this->publicKey);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        $offset = ($page - 1) * 10;

        $characters = Http::get('https://gateway.marvel.com/v1/public/characters', [
                'orderBy' => 'name',
                'limit' => '20',
                'offset' => $offset,
                'ts' => $this->timestamp,
                'apikey' => $this->publicKey,
                'hash' => $this->hash,
            ])->json();

        $totalPages = ceil($characters['data']['total']/20);

        abort_if($page > $totalPages, 204);

        $viewModel = new CharactersViewModel(
            $characters['data']['results'],
            $page,
            $totalPages,
        );

        return view('V1.API.index', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $character = Http::get('https://gateway.marvel.com/v1/public/characters/'.$id , [
            'ts' => $this->timestamp,
            'apikey' => $this->publicKey,
            'hash' => $this->hash,
        ])->json();

        $relatedComics = Http::get('https://gateway.marvel.com/v1/public/characters/'.$id.'/comics' , [
            'ts' => $this->timestamp,
            'apikey' => $this->publicKey,
            'hash' => $this->hash,
        ])->json();

        $viewModel = new CharacterViewModel(
            $character['data']['results'][0],
            $relatedComics['data']['results'],
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
