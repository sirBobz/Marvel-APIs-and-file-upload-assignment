<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class CharacterViewModel extends ViewModel
{
    public $character;
    public $relatedComics;

    public function __construct($character, $relatedComics)
    {
        $this->character = $character;
        $this->relatedComics = $relatedComics;
    }

    public function character()
    {
        return collect($this->character)->merge([
            'thumbnail' => $this->character['thumbnail']['path'].'/portrait_uncanny.'.$this->character['thumbnail']['extension'],
            'urls' => $this->urls($this->character['urls']),
        ])->only([
            'id', 'name', 'dates', 'thumbnail', 'description', 'urls',
        ]);
    }

    public function relatedComics()
    {
        return collect($this->relatedComics)->take(10)->map(function($comic){
            return collect($comic)->merge([
                'thumbnail' => $comic['thumbnail']['path'].'/portrait_uncanny.'.$comic['thumbnail']['extension']
            ])->only([
                'id', 'title', 'thumbnail',
            ]);
        });
    }

    public function urls($urls)
    {
        return collect($urls)->mapWithKeys(function($url){
            return [$url['type'] => $url['url']];
        });
    }
}
