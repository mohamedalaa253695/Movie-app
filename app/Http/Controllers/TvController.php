<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\TvViewModel;
use App\ViewModels\TvShowViewModel;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $popularTv = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')
        ->json()['results'];


        $genres = Http::get('https://api.themoviedb.org/3/genre/tv/list?api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')
        ->json()['genres'];
        
        // $genres= collect($genresArray)->mapWithKeys(function($genre){

        //     return [$genre['id'] =>$genre['name'] ];
        // } );

       
            
        // NowPlaying Section
        $topRatedTv = Http::get('https://api.themoviedb.org/3/tv/top_rated?api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')
        ->json()['results'];


        $viewModel = new TvViewModel(
            $popularTv,
            $topRatedTv,
            $genres,
        );

        return view('tv.index', $viewModel);
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
        $tvshow = Http::get('https://api.themoviedb.org/3/tv/'.$id.'?api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5&append_to_response=credits,videos,images')
            ->json();

        $viewModel = new TvShowViewModel($tvshow);

        return view('tv.show', $viewModel);
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
