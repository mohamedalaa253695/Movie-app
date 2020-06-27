<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class SearchDropdown extends Component
{
    public $search = '';
    public function render()
    {
        $searchResults=[];
        if(strlen($this->search) > 2  )
        {

            $searchResults = Http::get('https://api.themoviedb.org/3/search/movie?query='.$this->search.'&api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')
            ->json()['results'];
    
            
        }
        //dump($searchResults);
        return view('livewire.search-dropdown',
        [
            'searchResults' => collect($searchResults)->take(7),
        ]);
    }
}
