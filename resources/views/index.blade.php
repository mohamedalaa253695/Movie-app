@extends('layouts.main')


@section('content')
  <div class="container mx-auto px-4 pt-16">
    <div class="popular-moveies">

        <h2 class="uppercase trackint-wider text-orange-500 text-lg font-semiboled">Popular Movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

          @foreach($popularMovies as $movie)
         
          {{-- component representing a Movie card and it`s details --}}
          <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
           

                  


        </div>

    </div>
    <div class="now-playing-moveies py-24">

        <h2 class="uppercase trackint-wider text-orange-500 text-lg font-semiboled">Top Rated Movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

          @foreach ($topRatedMovies as $movie)
          
          
          <x-movie-card :movie="$movie" :genres="$genres" />
          
          
          
          
          @endforeach
  
              
                    


        </div>

    </div>


  </div>

@endsection