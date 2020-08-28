<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\ActorsViewModel;
use Illuminate\Support\Facades\Http;
use App\ViewModels\ActorViewModel;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page=1)
    {
          //poular Movies section
          $popularActors = Http::get('https://api.themoviedb.org/3/person/popular?page='.$page.'&api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')
          ->json()['results'];
          $viewModel = new ActorsViewModel($popularActors,$page);
          

        return view('actors.index',$viewModel);
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
        $actor = Http::get('https://api.themoviedb.org/3/person/'.$id.'?api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')->json();
        $social = Http::get('https://api.themoviedb.org/3/person/'.$id.'/external_ids/?api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')->json();
        $credits = Http::get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits/?api_key=b326a28c7e2b236e9fb9b0f7d2b3d2c5')->json();

        
        $viewModel = new ActorviewModel($actor,$social,$credits);

        return view('actors.show', $viewModel);
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
