<?php

namespace App\Helpers;

use App\Models\User;
use View;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;

class FrontHelper {

  //Function for build tree structure
  public static function buildtree($src_arr, $parent_id = 0, $tree = array())
  {
      foreach($src_arr as $idx => $row)
      {
          if($row['parent_category'] == $parent_id)
          {
              foreach($row as $k => $v)
              $tree[$row['id']][$k] = $v;
              unset($src_arr[$idx]);
              $tree[$row['id']]['children'] = FrontHelper::buildtree($src_arr, $row['id']);
          }
      }
      ksort($tree);
      return $tree;
  }

  //GET ALL CATEGORY WITH SUB CATEGORY IN HERARCY MODE
  public static function getCategoryWithSubCat($category){
    $acteval = [];
    foreach ($category as $key => $value){
              $acteval[] = ['id'=>$value['id'],'name'=> $value['name']];
              
              if(!empty($value['children'])){
              foreach ($value['children'] as $key1 => $value1) {
                  
                  $acteval[] = ['id'=>$value1['id'], 'name'=>$value['name'] . ' > ' . $value1['name']];

                  if(!empty($value1['children'])){
                  foreach ($value1['children'] as $key2 => $value2) {
                    
                    $acteval[] =  ['id'=>$value2['id'],'name'=> $value['name'] . ' > ' . $value1['name'] . ' > ' . $value2['name']];

                      if(!empty($value2['children'])){
                      foreach ($value2['children'] as $key3 => $value3){
                        
                        $acteval[] = ['id'=>$value3['id'],'name'=> $value['name'] . ' > ' . $value1['name'] . ' > ' . $value2['name'] . ' > ' . $value3['name']];
                          
                          if(!empty($value3['children'])){
                          foreach ($value3['children'] as $key4 => $value4){
                            
                            $acteval[] = ['id'=>$value4['id'],'name'=> $value['name'] . ' > ' . $value1['name'] . ' > ' . $value2['name']  . ' > ' . $value3['name'] . ' > ' . $value4['name']];

                              if(!empty($value4['children'])){
                              foreach ($value4['children'] as $key5 => $value5){
                                
                                $acteval[] = ['id'=>$value5['id'],'name'=> $value['name'] . ' > ' . $value1['name'] . ' > ' . $value2['name']  . ' > ' . $value3['name'] . ' > ' . $value4['name']  . ' > ' . $value5['name']];
                              }
                              }

                          }
                          }

                      }
                      }

                  }
                  }

              }
              }

        }
    //END FORLOOP
    return $acteval;

  }




  //GET SIGLE CATEGORY  IN HERARCY MODE
  public static function getSingleHeararcyofCat($category,$category_id){
    $acteval = '';
    if (!empty($category_id)) {
        foreach ($category as $key => $value){
              if ($value['id']==$category_id) {
                $acteval = $value['name'];
              }
              
              if(!empty($value['children'])){
              foreach ($value['children'] as $key1 => $value1) {
                  if ($value1['id']==$category_id) {
                    $acteval = $value1['name'] . ' , ' . $value['name'];
                  }

                  if(!empty($value1['children'])){
                  foreach ($value1['children'] as $key2 => $value2) {
                    if ($value2['id']==$category_id) {
                      $acteval =  $value2['name'] . ' , ' . $value1['name'] . ' , ' . $value['name'];
                    }

                      if(!empty($value2['children'])){
                      foreach ($value2['children'] as $key3 => $value3){
                        if ($value3['id']==$category_id) {    
                          $acteval = $value3['name'] . ' , ' . $value2['name'] . ' , ' . $value1['name'] . ' , ' . $value['name'];
                        }

                          if(!empty($value3['children'])){
                          foreach ($value3['children'] as $key4 => $value4){
                            if ($value4['id']==$category_id) {    
                              $acteval = $value4['name'] . ' , ' . $value3['name'] . ' , ' . $value2['name']  . ' , ' . $value1['name'] . ' , ' . $value['name'];
                            }
                              if(!empty($value4['children'])){
                              foreach ($value4['children'] as $key5 => $value5){
                                if ($value5['id']==$category_id) {   
                                  $acteval = $value5['name'] . ' , ' . $value4['name'] . ' , ' . $value3['name']  . ' , ' . $value2['name'] . ' , ' . $value1['name']  . ' , ' . $value['name'];
                                }
                              }
                              }

                          }
                          }

                      }
                      }

                  }
                  }

              }
              }

        }

    }
    //END FORLOOP
    return $acteval;

  }

  //GET SIGLE CATEGORY  IN HERARCY MODE
  public static function getSingleHeararcyofCatWithArr($category,$category_id){
    $acteval = '';
    if (!empty($category_id)) {
        foreach ($category as $key => $value){
              if ($value['id']==$category_id) {
                $acteval = $value['name'];
              }
              
              if(!empty($value['children'])){
              foreach ($value['children'] as $key1 => $value1) {
                  if ($value1['id']==$category_id) {
                    $acteval = $value['name'] . ' > ' . $value1['name'];
                  }

                  if(!empty($value1['children'])){
                  foreach ($value1['children'] as $key2 => $value2) {
                    if ($value2['id']==$category_id) {
                      $acteval =  $value['name'] . ' > ' . $value1['name'] . ' > ' . $value2['name'];
                    }

                      if(!empty($value2['children'])){
                      foreach ($value2['children'] as $key3 => $value3){
                        if ($value3['id']==$category_id) {    
                          $acteval = $value['name'] . ' > ' . $value1['name'] . ' > ' . $value2['name'] . ' > ' . $value3['name'];
                        }

                          if(!empty($value3['children'])){
                          foreach ($value3['children'] as $key4 => $value4){
                            if ($value4['id']==$category_id) {    
                              $acteval = $value['name'] . ' > ' . $value1['name'] . ' > ' . $value2['name']  . ' > ' . $value3['name'] . ' > ' . $value4['name'];
                            }
                              if(!empty($value4['children'])){
                              foreach ($value4['children'] as $key5 => $value5){
                                if ($value5['id']==$category_id) {   
                                  $acteval = $value['name'] . ' > ' . $value1['name'] . ' > ' . $value2['name']  . ' > ' . $value3['name'] . ' > ' . $value4['name']  . ' > ' . $value5['name'];
                                }
                              }
                              }

                          }
                          }

                      }
                      }

                  }
                  }

              }
              }

        }

    }
    //END FORLOOP
    return $acteval;

  }


  //GET ALL CATEGORY ID With CHILDREN ID
  public static function getAllChilCategoryId($category,$cateId){
    $cate = [];
    if (!empty($cateId)) {
      foreach ($cateId as $key => $value) {
        foreach ($category as $ckey => $cvalue){
          //CHECK IF ID IS PARENT
          if($value==$cvalue['id']){
            if ($cvalue['id']==$value) {
                $cate[] = $cvalue['id'];
            
                  
            if(!empty($cvalue['children'])){
            foreach ($cvalue['children'] as $key1 => $value1){
                if ($value1['parent_category']==$value) {
                    $cate[] = $value1['id'];
                }
                    if(!empty($value1['children'])){
                    foreach ($value1['children'] as $key2 => $value2) {
                        if ($value2['parent_category']==$value1['id']) {
                            $cate[] = $value2['id'];
                        }
                        if(!empty($value2['children'])){
                        foreach ($value2['children'] as $key3 => $value3){
                            if ($value3['parent_category'] == $value2['id']) {
                                $cate[] = $value3['id'];
                            }

                            if(!empty($value3['children'])){
                            foreach ($value3['children'] as $key4 => $value4){
                                if ($value4['parent_category']==$value3['id']) {
                                    $cate[] = $value4['id'];
                                }

                                if(!empty($value4['children'])){
                                foreach ($value4['children'] as $key5 => $value5){
                                    if ($value5['parent_category']==$value4['id']) {
                                        $cate[] = $value5['id'];
                                    }
                                }
                                }
                            }
                            }

                        }
                        }

                    }
                    }
                
                }
                }
            }
          }else{
          //CHECK IF ID IS NOT PARENT
            if(!empty($cvalue['children'])){
              foreach ($cvalue['children'] as $key1 => $value1){
                if ($value1['id']==$value) {
                    $cate[] = $value1['id'];
                
                    if(!empty($value1['children'])){
                    foreach ($value1['children'] as $key2 => $value2) {
                        if ($value2['parent_category']==$value1['id']) {
                            $cate[] = $value2['id'];
                        }
                        if(!empty($value2['children'])){
                        foreach ($value2['children'] as $key3 => $value3){
                            if ($value3['parent_category'] == $value2['id']) {
                                $cate[] = $value3['id'];
                            }

                            if(!empty($value3['children'])){
                            foreach ($value3['children'] as $key4 => $value4){
                                if ($value4['parent_category']==$value3['id']) {
                                    $cate[] = $value4['id'];
                                }

                                if(!empty($value4['children'])){
                                foreach ($value4['children'] as $key5 => $value5){
                                    if ($value5['parent_category']==$value4['id']) {
                                        $cate[] = $value5['id'];
                                    }
                                }
                                }
                            }
                            }

                        }
                        }

                    }
                    }
                  }
                
                }
                }
          }
        }

      }

    }
    return $cate;

  }


}

?>