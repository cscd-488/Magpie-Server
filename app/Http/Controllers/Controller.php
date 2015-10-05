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
            'description' => 'max:512'
        ]);

        $title = $request->get('title');
        $description = $request->get('description');

        $listing = Listing::create($data);

        $listing->title()->create(['value' => $title]);

        return $listing->toJson();
    }

    public function index(){

        $listings = Listing::all();

        $listings->load('title');

//        var_dump($listings->toArray());
        return $listings;
    }

}
