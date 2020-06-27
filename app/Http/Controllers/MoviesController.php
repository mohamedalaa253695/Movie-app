<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;






class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //poular Movies section
        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')
            ->json()['results'];


        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')
        ->json()['genres'];
        
        $genres= collect($genresArray)->mapWithKeys(function($genre){

            return [$genre['id'] =>$genre['name'] ];
        } );

       
            
        // NowPlaying Section
        $topRatedMovies = Http::get('https://api.themoviedb.org/3/movie/top_rated?api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')
        ->json()['results'];

        //dd($topRatedMovies);
        
        return view('index',[

            
            'popularMovies'     =>  $popularMovies,
            'genres'            =>  $genres,
            'topRatedMovies'  =>  $topRatedMovies,

        


        ]);

        
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


        
        // Movie Details

        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images&api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')
        ->json();

        


       //dump($movie);

        return view('show',[

            "moviedetails"=>$movie,
            


        ]);
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
