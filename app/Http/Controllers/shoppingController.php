<?php

namespace App\Http\Controllers;

use App\Models\shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class shoppingController extends Controller
{
    public function index(Request $request) {
        $validateData = $request->validate([
            'CreatedDate' => 'required',
            'Name' => 'required'
        ]);

        shopping::create($validateData);

        return response()->json([
            'CreatedDate' => $request->CreatedDate,
            'id' => Auth::user()->id,
            'Name' => Auth::user()->name
        ]);
    }

    public function all() {
        $shopping = shopping::all();

        return response()->json([
            $shopping
        ]);
    }

    public function show ($id) {
        $shopping = shopping::all()->where('id', $id);

        return response()->json([
            $shopping
        ]);
    }

    public function update(Request $request, $id) {

        DB::table('shopping')->where('id', $id)->update([
            'CreatedDate' => $request->CreatedDate,
            'Name' => $request->Name
        ]);

        return response()->json([
            'massage' => 'Updated Success'
        ]);
    }

    public function delete ($id) {
        DB::table('shopping')->where('id', $id)->delete();

        return response()->json([
            'massage' => 'Deleted Success'
        ]);
    }
}
