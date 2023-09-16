<?php

namespace App\Http\Controllers;

use App\Http\Repository\CatalogRepository;
use App\Http\Response\ApiResponse;
use App\Http\Services\ShowService;
use App\Http\Services\TreeService;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,TreeService $treeService,CatalogRepository $catalogRepository,ShowService $showService)
    {
        //
        return new ApiResponse($showService->show($treeService,$catalogRepository));
    }
}
