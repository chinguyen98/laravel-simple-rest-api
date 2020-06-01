<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsachcoffee = DB::table('coffees')->orderByDesc('id')->limit(10)->get();
        return response()->json($danhsachcoffee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('coffees')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'image' => 'legendsuc8.jpg',
            'capacity' => 250,
            'info' => 'test',
            'specific' => 'CHua ro',
            'ingredient' => 'Chua ro',
            'expired' => 24,
            "id_brand" => 1,
            "id_type" => 5,
            "id_unit" => 1
        ]);
        $danhsachcoffee = DB::table('coffees')->orderByDesc('id')->limit(10)->get();
        return response()->json($danhsachcoffee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coffee = DB::table('coffees')->where('id', $id)->first();
        return response()->json($coffee);
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
        DB::table('coffees')->where('id', $id)->update(['name' => $request->name, 'price' => $request->price]);
        $danhsachcoffee = DB::table('coffees')->orderByDesc('id')->limit(10)->get();
        return response()->json($danhsachcoffee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('coffees')->delete($id);
        $danhsachcoffee = DB::table('coffees')->orderByDesc('id')->limit(10)->get();
        return response()->json($danhsachcoffee);
    }
}
