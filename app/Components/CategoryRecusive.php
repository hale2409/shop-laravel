<?php

namespace App\Components;

use App\Category;

class  CategoryRecusive {
    private  $html;
    public function __construct()
    {
        $this->html = '';
    }

    public function categoryRecusiveAdd($parent_id = 0, $subMake = '') {
        $data = Category::where('parent_id', $parent_id)->get();
        foreach ($data as $dataItem) {
            $this->html .= '<option value="'.$dataItem->id.'">'.$subMake.$dataItem->name.'</option>';
            $this->categoryRecusiveAdd($dataItem->id, $subMake . '--');
        }
        return $this->html;
    }

    public function categoryRecusiveEdit($parentIdCateEdit, $parentId = 0, $subMark = '')
    {
        $data = Category::where('parent_id',$parentId)->get();
        foreach ($data as $dataItem) {
            if ($parentIdCateEdit == $dataItem->id) {
                $this->html .= '<option selected value="'.$dataItem->id.'">'.$subMark. $dataItem->name.'</option>';
            } else{
                $this->html .= '<option value="'.$dataItem->id.'">'.$subMark. $dataItem->name.'</option>';
            }
            $this->categoryRecusiveEdit($parentIdCateEdit, $dataItem->id, $subMark . '--');
        }
        return $this->html;
    }
}
