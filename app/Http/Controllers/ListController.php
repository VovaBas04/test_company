<?php

namespace App\Http\Controllers;

use App\Http\Repository\CatalogRepository;
use App\Http\Response\ApiResponse;
use App\Http\Services\ListService;
use App\Models\Catalog;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,ListService $listService,CatalogRepository $catalogRepository)
    {
        //
        $categories = $catalogRepository->handle();
        $data = $listService->convert_to_list($categories);
        return new ApiResponse($data);
    }
}
