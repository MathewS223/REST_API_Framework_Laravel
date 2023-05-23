<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    //Zwraca wszystkie instancje People przechowywane w bazie.

    public function index()
    {
        $people = People::all();

        return response()->json($people);
    }

    //Zwraca pojedynczą instancję People o żądanym ID.

    public function show($id)
    {
        $person = People::find($id);

        if (!$person) {
            return response()->json(['message' => 'Person not found'], 404);
        }

        return response()->json($person);
    }

    //Aktualizuje pojedynczą instancję People o żądanym ID.

    public function update(Request $request, $id)
    {
        $person = People::find($id);

        if (!$person) {
            return response()->json(['message' => 'Person not found'], 404);
        }

        $person->name = $request->input('name');
        $person->email = $request->input('email');
        $person->phone_number = $request->input('phone_number');
        $person->street = $request->input('street');
        $person->city = $request->input('city');
        $person->country = $request->input('country');

        $person->save();

        return response()->json($person);
    }

    //Usuwa instancję People o żądanym ID.

    public function destroy($id)
    {
        $person = People::find($id);

        if (!$person) {
            return response()->json(['message' => 'Person not found'], 404);
        }

        $person->delete();

        return response()->json(['message' => 'Person deleted']);
    }

//Dodaje pojedyncza instancje People

    public function store(Request $request)
{
    $person = new People();
    $person->name = $request->input('name');
    $person->email = $request->input('email');
    $person->phone_number = $request->input('phone_number');
    $person->street = $request->input('street');
    $person->city = $request->input('city');
    $person->country = $request->input('country');
    $person->save();

    return response()->json($person, 201);
}
};