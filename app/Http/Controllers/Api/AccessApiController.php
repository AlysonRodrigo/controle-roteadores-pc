<?php

namespace App\Http\Controllers\Api;

use App\Models\RouteAccess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RouteAccess::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $access = RouteAccess::create($request->all());
        return response()->json($access,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return RouteAccess::find($id);
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

        $access = RouteAccess::find($id);
        $access->fill($request->all());
        $access->save();

        return response()->json($access,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $access = RouteAccess::find($id);
        $deleted = $access->delete();

        if($deleted){
            return response()->json([],204);
        }else{
            return response()->json([
                'error' => 'Resource can not be deleted'
            ],500);
        }
    }
}
