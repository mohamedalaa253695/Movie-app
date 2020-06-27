<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;



class ViewMoviesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function the_main_page_shows_correct_info()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/popular' => $this->fakePopularMovies(),
            'https://api.themoviedb.org/3/movie/top_rated' => $this->fakeTopRatedMovies(),
            'https://api.themoviedb.org/3/genre/movie/list' => $this->fakeGenres(),

        ]);
      $response = $this->get(route('movies.index'));
      $response->assertSuccessful();
      $response->assertSee('Popular Movies');
      $response->assertSee('Fake Movie');

      $response->assertSee('Top Rated Movies');
      $response->assertSee('Fake Movie');
      $response->assertSee('Drama, Science Fiction');      

    }

    public function the_search_dropdown_works_correctly(){

      Http::fake([
        'https://api.themoviedb.org/3/search/movie?query=jumanji' => $this->fakeSearchMovies(),
      ]);

      Livewire::test('search-dropdown')
            ->assertDontsee('jumanji')
            ->set('search'.'jumanji')
            ->assertSee('jumanji');

    }


    
    private function fakeSearchMovies()
    {
        return Http::response([
                'results' => [
                    [
                        "popularity" => 406.677,
                        "vote_count" => 2607,
                        "video" => false,
                        "poster_path" => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
                        "id" => 419704,
                        "adult" => false,
                        "backdrop_path" => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
                        "original_language" => "en",
                        "original_title" => "Jumanji",
                        "genre_ids" => [
                            12,
                            18,
                            9648,
                            878,
                            53,
                        ],
                        "title" => "Jumanji",
                        "vote_average" => 6,
                        "overview" => "Jumanji description. The near future, a time when both hope and hardships drive humanity to look to the stars and beyond. While a mysterious phenomenon menaces to destroy life on planet earth.",
                        "release_date" => "2019-09-17",
                    ]
                ]
            ], 200);
    }



    private function fakePopularMovies()
    {
        return Http::response([
                'results' => [
                    [
                        "popularity" => 482.963,
                        "vote_count" => 3287,
                        "video" => false,
                        "poster_path" => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
                        "id" => 419704,
                        "adult" => false,
                        "backdrop_path" => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
                        "original_language" => "en",
                        "original_title" => "Fake Movie",
                        "genre_ids" =>  [
                          0 => 18,
                          1 => 878,
                          ],
                        "title" => "Fake Movie",
                        "vote_average" => 6,
                        "overview" => "The near future, a time when both hope and hardships drive humanity to look to the stars and beyond. While a mysterious phenomenon menaces to destroy life on pl ",
                        "release_date" => "2019-09-17",
                     ],
                ]
            ], 200);
    }



    private function fakeTopRatedMovies(){

        return  Http::response([

                            [
                    "popularity" => 13.303,
                    "id" => 640344,
                    "video" => false,
                    "vote_count" => 246,
                    "vote_average" => 8.8,
                    "title" => "Fake Movie",
                    "release_date" => "2020-01-17",
                    "original_language" => "it",
                    "original_title" => "Fake Movie",
                    "genre_ids" =>  [
                        0 => 35,
                        1 => 10751,
                    ],
                    "backdrop_path" => "/wooZWiC4NWH0ahCSUOogEmVejHo.jpg",
                    "adult" => false,
                    "overview" => "Luì and Sofì fight the terrible Signor S once again, this time he will be revealed to the public!!!",
                    "poster_path" => "/4XzbcAKdX4n3aWfzBjjeAlm68S3.jpg",
                    ]
        ],200);



    }



    
    public function fakeGenres()
    {
        return Http::response([
                'genres' => [
                    [
                      "id" => 28,
                      "name" => "Action"
                    ],
                    [
                      "id" => 12,
                      "name" => "Adventure"
                    ],
                    [
                      "id" => 16,
                      "name" => "Animation"
                    ],
                    [
                      "id" => 35,
                      "name" => "Comedy"
                    ],
                    [
                      "id" => 80,
                      "name" => "Crime"
                    ],
                    [
                      "id" => 99,
                      "name" => "Documentary"
                    ],
                    [
                      "id" => 18,
                      "name" => "Drama"
                    ],
                    [
                      "id" => 10751,
                      "name" => "Family"
                    ],
                    [
                      "id" => 14,
                      "name" => "Fantasy"
                    ],
                    [
                      "id" => 36,
                      "name" => "History"
                    ],
                    [
                      "id" => 27,
                      "name" => "Horror"
                    ],
                    [
                      "id" => 10402,
                      "name" => "Music"
                    ],
                    [
                      "id" => 9648,
                      "name" => "Mystery"
                    ],
                    [
                      "id" => 10749,
                      "name" => "Romance"
                    ],
                    [
                      "id" => 878,
                      "name" => "Science Fiction"
                    ],
                    [
                      "id" => 10770,
                      "name" => "TV Movie"
                    ],
                    [
                      "id" => 53,
                      "name" => "Thriller"
                    ],
                    [
                      "id" => 10752,
                      "name" => "War"
                    ],
                    [
                      "id" => 37,
                      "name" => "Western"
                    ],
                ]
            ], 200);
    }


}
