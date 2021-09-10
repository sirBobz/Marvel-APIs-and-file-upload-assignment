<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\CharactersViewModel;
use App\ViewModels\CharacterViewModel;

class MarvelApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {

        $timestamp = time();
        $privateKey = config('services.marvelapi.private_key');
        $publicKey = config('services.marvelapi.public_key');

        $hash = md5($timestamp.$privateKey.$publicKey);

        $offset = ($page - 1) * 20;

        $characters = Http::get('https://gateway.marvel.com/v1/public/characters', [
            'orderBy' => 'name',
            'limit' => '20',
            'offset' => $offset,
            'ts' => $timestamp,
            'apikey' => $publicKey,
            'hash' => $hash,
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
        $timestamp = time();
        $privateKey = config('services.marvelapi.private_key');
        $publicKey = config('services.marvelapi.public_key');

        $hash = md5($timestamp.$privateKey.$publicKey);

        $character = Http::get('https://gateway.marvel.com/v1/public/characters/'.$id , [
            'ts' => $timestamp,
            'apikey' => $publicKey,
            'hash' => $hash,
        ])->json();

        $relatedComics = Http::get('https://gateway.marvel.com/v1/public/characters/'.$id.'/comics' , [
            'ts' => $timestamp,
            'apikey' => $publicKey,
            'hash' => $hash,
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
