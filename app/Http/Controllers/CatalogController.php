<?php

namespace App\Http\Controllers;

use App\Http\Response\ApiResponse;
use App\Http\Services\ListService;
use App\Http\Services\TreeService;
use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TreeService $treeService)
    {
        //
        return new ApiResponse(Catalog::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->input('catalog_id'))
            $catalog = Catalog::create([
                'catalog_id' => $request->input('catalog_id'),
                'title' =>$request->input('title')
            ]);
        else
            $catalog = Catalog::create([
                'title' =>$request->input('title')
            ]);
        return new ApiResponse($catalog);
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
        return new ApiResponse(Catalog::findOrFail($id));
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
        return $request;
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
        $catalog = Catalog::findOrFail($id);
        $catalog->delete();
        return new ApiResponse($catalog);
    }
}
