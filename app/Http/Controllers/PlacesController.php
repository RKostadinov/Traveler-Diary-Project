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
use Illuminate\Support\Facades\Validator;


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
    public function store(Requests\StorePlaceRequest $request)
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
        }

       $placeId =  Place::create($result);
        Text::create([
            'placeId' => $placeId,
            'text' => " "
        ]);

        return redirect('/places');
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
        $user = $place->user;

        return view('places.show', ['place' => $place, 'photos' => $photos, 'text' => $text, 'user' => $user]);

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
        Place::destroy($id);
        return redirect("places");
    }

    public function showAddText($id)
    {
        $place = Place::find($id);
        $desc = $place->text();

        return view('texts.create', ['place' => $place, 'text' => $desc]);
    }

    public function showAddPhoto($id)
    {
        $place = Place::find($id);

        return view('photo.create', ['place' => $place]);
    }

    public function addText(Request $request, $id)
    {
        $result = $request->all();
        $result['placeId'] = $id;

        Text::create($result);

        return redirect('places/' . $id);
    }

    public function addPhoto(Request $request, $id)
    {
        $result = $request->all();
        $result['placeId'] = $id;

        $rules = array(
            'file' => 'image|max:3000',
        );

        $validation = Validator::make($result, $rules);

        if ($validation->fails()) {
            return \Response::make($validation->errors->first(), 400);
        }

        $destinationPath = 'uploads'; // upload path
        $extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
        $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
        $upload_success = Input::file('file')->move($destinationPath, $fileName); // uploading file to given path

        $result['photoUrl'] = $destinationPath . '\\' . $fileName;
        if ($upload_success) {
            Photo::create($result);
            return \Response::json('success', 200);
        } else {
            return \Response::json('error', 400);
        }

    }

    public function toggleVisibility($id){
        $place = Place::find($id);
        $place->public = !$place->public;
        $place->save();
        return redirect()->back();
    }
}
