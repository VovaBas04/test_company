<?php

namespace App\Http\Services;


use Illuminate\Database\Eloquent\Collection;

final class ListService
{
    public function convert_to_list($database_array){
        if ($database_array->isEmpty())
            return [];
        $list_array = collect(["1"=>null]);
        foreach ($database_array as $parent_catalog){
            foreach ($parent_catalog->catalogs as $child_catalog)
                $list_array->put($child_catalog->id,$parent_catalog->title);
        }
        return $list_array;
    }

}
