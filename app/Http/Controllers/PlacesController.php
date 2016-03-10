<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Place;
use App\Text;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $places = Auth::user()->places()->get();
        return view('places.index', ["places" => $places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $request->all();
        $result['userId'] = Auth::user()->id;
        if (Input::hasFile('mainPhoto')) {
            if (Input::file('mainPhoto')->isValid()) {
                $destinationPath = 'uploads';
                $extension = Input::file('mainPhoto')->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;
                Input::file('mainPhoto')->move($destinationPath, $fileName);
                $result['mainPhoto'] = $fileName;
            }

            Place::create($result);
            return redirect('/places');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::find($id);
        $photos = $place->photos()->get();
        $text = $place->text()->get();

        return view('places.show', ['place' => $place, 'photos' => $photos, 'text' => $text]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showAddText($id){
        $place = Place::find($id);
        return view('texts.create',['place' => $place]);
    }

    public function showAddPhoto($id){
    $place = Place::find($id);
    return view('photo.create',['place' => $place]);
}

    public function addText(Request $request, $id){
        $result = $request->all();
        $result['placeId'] = $id;

        Text::create($result);

        return redirect('places/'.$id);
    }

    public function addPhoto(Request $request, $id){
        $result = $request->all();
        $result['placeId'] = $id;

        Photo::create($result);

        return redirect('places/'.$id);

    }
}
