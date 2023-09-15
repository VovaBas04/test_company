<?php

namespace App\Http\Services;

final class TreeService
{
    public function convert_to_tree($database_array){
        $root = $database_array[0];
        $queue = collect([$root]);
        while ($queue->isNotEmpty()){
                for ($i=0;$i<$root->catalogs->count();$i++){
                    $root->catalogs[$i] = $database_array[$root->catalogs[$i]->id-1];
                    $queue->push($root->catalogs[$i]);
                }
            $root = $queue->pop();
        }
        return $database_array[0];
    }
}
