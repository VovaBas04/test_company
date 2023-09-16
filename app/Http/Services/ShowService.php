<?php

namespace App\Http\Services;

use App\Http\Repository\CatalogRepository;

class ShowService
{
    public function show(TreeService $treeService,CatalogRepository $catalogRepository,$id = 1){
        $data = $catalogRepository->handle();
        if ($data->isEmpty())
            return [];
        $root = $treeService->convert_to_tree($data,$id);
        $show_list = collect(["Уровень 1",$root->title]);
        $level = 1;
        $queue  = collect([[$root,1]]);
        while ($queue->isNotEmpty()){
            [$root,$level_element] = $queue->shift();
            if ($level_element===$level) {
                $level++;
                $show_list->push("Уровень $level");
            }
            foreach ($root->catalogs as $elem) {
                $show_list->push($elem->title);
                $queue->push([$elem, $level]);
            }
        }
        $show_list->pop();
        return $show_list;
    }
}
