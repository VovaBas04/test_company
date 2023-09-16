<?php

namespace App\Http\Services;

final class TreeService
{
    public function convert_to_tree($database_array,$id =1){
        if ($database_array->isEmpty())
            return [];
        $root = $database_array->sole('id',$id);
        $node = $root;
        $queue = collect([$root]);
        while ($queue->isNotEmpty()){
                $len_node_child =$node->catalogs->count();
                for ($i=0;$i<$len_node_child;$i++){
                    $node->catalogs[$i] = $database_array->sole('id',$node->catalogs[$i]->id);
                    $queue->push($node->catalogs[$i]);
                }
            $node = $queue->shift();
        }
        return $root;
    }

}
