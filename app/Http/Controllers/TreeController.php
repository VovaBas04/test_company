<?php

namespace App\Http\Controllers;

use App\Http\Repository\CatalogRepository;
use App\Http\Response\ApiResponse;
use App\Http\Services\TreeService;
use App\Models\Catalog;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,TreeService $treeService,CatalogRepository $catalogRepository)
    {
        //
        $categories = $catalogRepository->handle();
        $data = $treeService->convert_to_tree($categories);
        return new ApiResponse($data);
    }
}
