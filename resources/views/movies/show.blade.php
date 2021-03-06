@extends('layouts.main')




@section('content')


    <div class="movie-info border-b border-gray-800 ">

        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{'https://image.tmdb.org/t/p/w500/'.$moviedetails['poster_path']}}" alt="parasite" class="w-64 mx-auto my-auto lg:w-96" >

            <div class="md:ml-24">

                <h2 class="text-4xl font-semibold">{{$moviedetails['title']}} {{ \Carbon\Carbon::parse($moviedetails['release_date'])->format("Y")}}</h2> 
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg id="color" enable-background="new 0 0 24 24" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107"/></svg>
                <span class="ml-1">{{ $moviedetails['vote_average'] *10 ."%"  }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($moviedetails['release_date'])->format("M d ,Y")}}</span>
                    <span class="mx-2">|</span>
                    <span> @foreach($moviedetails['genres'] as  $genre ) 
    
                        {{$genre['name']}}@if (!$loop->last) , @endif
                    
                        
                        
                        @endforeach</span>
                  </div>

                  <div class="text-gray-300 mt-8 ">

                    <p>
                      {{$moviedetails['overview']}}
    
                    </p>
    
                </div>
                <div class="mt-12">

                    <h4 class="text-white font-semibold"> Featured Cast </h4>

                    <div class="flex mt-4">
                        @foreach($moviedetails['credits']['crew'] as $crew )
                            @if($loop->index  < 2)
                                <div class="mr-8">
                                <div>{{$crew['name']}}</div>
                                <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                                </div>
                            @endif
                       @endforeach
                    </div>
                    
                    <div x-data = "{isOpen : false}">
                    @if(count($moviedetails['videos']['results']) > 0 )
                    <div class="mt-12">

                        <button  
                            @click = "isOpen = true"
                            href="https://youtube.com/watch?v={{$moviedetails['videos']['results']["0"]['key'] }}"  target="blank"class="flex inline-flex itmes-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transiton ease-in-out duration-150">
                            <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                            <span class="ml-2">Play Trailer</span>
                        </button>

                    </div>
                   
                        <div 
                            style="background-color: rgba(0, 0, 0, .5);"
                            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            x-show.transtion.opacity ="isOpen"
                        >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button
                                            @click= "isOpen= false" 
                                            class="text-3xl leading-none hover:text-gray-300">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                            <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $moviedetails['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    

                </div>

            </div>

           


        </div>


    </div><!------end movie info---------->

        <div class="movie-cast border-b border-gray-800">

            <div class="container mx-auto px-4 py-16">

                    <h2 class="text-4xl font-semibold">Cast</h2>


                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                     @foreach($moviedetails['credits']['cast'] as $cast) 
                       @if ($loop -> index < 5)

                       <div class="mt-8">
            

            
                       <a href="{{route('actors.show',$cast['id'])}}">
                              <img src="{{'https://image.tmdb.org/t/p/w300/'.$cast['profile_path']}}" alt="parasie" class="hover:opacity-75 transition ease-in-out duration-150">    
                       </a>   
                       <div class="mt-2">
                       <a href="#" class="text-lg mt-2 hover:text-gray:300">{{$cast['name']}}</a>
                    
                       </div>
          
                       <div class="tex-gray-400 text-sm opacity-75">
                            {{$cast['character']}}
                       </div>
                      </div>
                       
                       
                           
                       @endif
                   @endforeach
                        
            
                          
                                
            
            
                    </div>

            </div>



            
        </div>


        <div class="movie-cast border-b border-gray-800"  x-data="{isOpen : false , image:''}" >

            <div class="container mx-auto px-4 py-16">

                    <h2 class="text-4xl font-semibold">Images</h2>


                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                        @foreach($moviedetails['images']['backdrops'] as $image)
                        

                        @if ($loop->index < 6)
                        <div class="mt-8">
            
                            <a 
                             
                              @click.prevent="
                              isOpen = true
                              image='{{'https://image.tmdb.org/t/p/original/'.$image['file_path']}}'
                              "
                              href="#"
                            >
                                  <img src="{{'https://image.tmdb.org/t/p/w400/'.$image['file_path']}}" alt="parasie" class="hover:opacity-75 transition ease-in-out duration-150">    
                           </a>   
                         
              
                          </div>
            
                            
                        @endif
                    

                @endforeach
                                        
            
            
                    </div>

                    <div 
                        style="background-color: rgba(0, 0, 0, .5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        x-show ="isOpen"
                    >
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button
                                            @click= "isOpen= false" 
                                            @keydown.escape.window= "isOpen= false" 
                                            class="text-3xl leading-none hover:text-gray-300">&times;
                             </button>
                            </div>
                            <div class="modal-body px-8 py-8">
                              <img :src="image" alt="poster" class="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            
        </div>

@endsection