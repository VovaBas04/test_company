<?php

namespace App\Http\Repository;

use App\Models\Catalog;

class CatalogRepository
{
    public function handle(){
        return Catalog::with("catalogs")->get();
    }

}
