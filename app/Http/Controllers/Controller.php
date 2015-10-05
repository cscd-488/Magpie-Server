<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function createListing(Request $request){

        $data = $request->all();

        $this->validate($request, [
            'price' => 'required|integer',
            'condition' => 'required|integer',
            'title' => 'max:80',
            'description' => 'max:512',
            'lang' => 'required|in:en,es'
        ]);

        $title = $request->get('title');
        $description = $request->get('description');
        $lang = $request->get('lang');

        $listing = Listing::create($data);

        $listing->title()->create(['value' => $title, 'lang' => $lang]);
        $listing->title()->create(['value' => $description, 'lang' => $lang]);

        return $listing->toJson();
    }

    public function index(){

        $listings = Listing::all();

        $listings->load('title');

        return $listings;
    }

}
