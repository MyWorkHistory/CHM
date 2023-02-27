<?php

namespace App\Http\Controllers;

use App\Models\listing;
use App\Models\images;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use PhpParser\Node\Expr\New_;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Inertia::render('listings/New_Listing');
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
        $request->validate([
            'english_skill' => '',
            'location' => 'required',
            'height' => '',
            'phone' => '',
            'contract_signed' => '',
            'available_start_date' => '',
            'warranty' => '',
            'years_of_experience' => '',
            'gender' => 'required',
            'price' => '',
            'note' => '',
            'image' => '',


        ]);
        $image = $request->file('image');
        
        $random = rand(10000,50000);

        foreach($image as $img) {
        $img_name = $img->getClientOriginalName();
         $save_img_Name = $random.$img_name;
           $img->move(public_path('storage/models'), $save_img_Name);
        }

        $DB_img_Name = $random.$img_name;

        $NewListing = new listing([
            'english_skill' => $request->input('english_skill'),
            'location' => $request->input('location'),
            'height' => $request->input('height'),
            'phone' => $request->input('phone'),
            'contract_signed' => $request->input('contract_signed'),
            'available_start_date' => $request->input('available_start_date'),
            'warranty' => $request->input('warranty'),
            'years_of_experience' => $request->input('years_of_experience'),
            'gender' => $request->input('gender'),
            'price' => $request->input('price'),
            'image' => $DB_img_Name ,
            'note' => $request->input('note'),

        ]);
        $NewListing->save();
        //$NewListing->User()->attach();
        /**  $listing_id = $NewListing->id;
         *  if(!$image)
         *   {
         *      
         *  }
         *  else
         * {
         *      foreach($image as $img)
         *      $img_name = $img->getClientOriginalName();
         *     $DB_img_Name = $NewListing->id.$img_name;
         *   $img->move(public_path('storage/models'), $DB_img_Name);
         *   $IMG_eloquent = new images([
         *      'listing_id' => $listing_id,
         *        'name' => $DB_img_Name,
         *   ]);
         *  $IMG_eloquent->save();
         *  }
         */

        return redirect()->route('home');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
