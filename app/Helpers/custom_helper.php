<?php
use App\Models\Category;
use App\Models\admin;
function getCategoryName( $category_ids ){

    $category_names = '';
    $category_ids = explode(',', $category_ids);
    if ( isset ( $category_ids ) && count ( $category_ids) > 0 ) {
        foreach($category_ids as $category_id){
            $category_name = '';
           $category = Category::where('id', $category_id)->first();
           if ( $category ) {
            $category_name = $category->category;
            $category_names .= $category_name . ',';
           }
        }
    }
    $category_names = rtrim($category_names, ',');
    return $category_names;
}
function getWriterName( $writers_ids ){

    $writers_names = '';
    $writers_ids = explode(',', $writers_ids);
    if ( isset ( $writers_ids ) && count ( $writers_ids) > 0 ) {
        foreach($writers_ids as $writer_id){
            $writer_name = '';
           $category = admin::where('id', $writer_id)->first();
           if ( $category ) {
            $writer_name = $category->user_name;
            $writers_names .= $writer_name . ',';
           }
        }
    }
    $writers_names = rtrim($writers_names, ',');
    return $writers_names;
}
