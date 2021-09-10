<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class CharactersViewModel extends ViewModel
{
    public $characters;
    public $page;
    public $totalPages;

    public function __construct($characters, $page, $totalPages)
    {
        $this->characters = $characters;
        $this->page = $page;
        $this->totalPages = $totalPages;
    }

    public function characters()
    {
        return collect($this->characters)->map(function($character){
            return collect($character)->merge([
                'thumbnail' => $character['thumbnail']['path'].'/portrait_uncanny.'.$character['thumbnail']['extension'],
                'comics' => collect($character['comics']['items'])->pluck('name')->implode(', '),
            ])->only([
                'id', 'name', 'thumbnail', 'comics',
            ]);
        });
    }

    public function previous()
    {
        return $this->page > 1 ? $this->page - 1 :  null;
    }

    public function next()
    {
        return $this->page < $this->totalPages ? $this->page + 1 :  null;
    }
}
