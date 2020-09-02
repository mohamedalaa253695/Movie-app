@extends('layouts.main')


@section('content')
  <div class="container mx-auto px-4 pt-16">
    <div class="popular-tv">

        <h2 class="uppercase trackint-wider text-orange-500 text-lg font-semiboled">Popular Tv Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

          @foreach($popularTv as $tvshow)
         
          {{-- component representing a Movie card and it`s details --}}
          <x-tv-card :tvshow="$tvshow"  />
            @endforeach
           

                  


        </div>

    </div>
    <div class="now-playing-moveies py-24">

        <h2 class="uppercase trackint-wider text-orange-500 text-lg font-semiboled">Top Rated Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

        
  
        @foreach ($topRatedTv as $tvshow)
                    <x-tv-card :tvshow="$tvshow" />
               @endforeach
                    


        </div>

    </div>


  </div>

@endsection