<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use App\Models\Post;
use App\Models\User;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $users     = User::all();
        $posts     = Post::all();
    
        return view('countries.index', compact('countries', 'users', 'posts'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  CountryStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStoreRequest $request)
    {
        $country = Country::create([
            'name' => $request->name
        ]);
        
        factory(User::class)->create(['country_id' => $country->id])->each(function ($u) {
            $u->posts()->save(factory(Post::class)->create());
        });
    
        return redirect()->route('countries.index');
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country $country
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
    
        return redirect()->route('countries.index');
    }
}
