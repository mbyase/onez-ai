<?php

/* ========================================================================
 * $Id: ai.output.image.php 732 2016-09-09 05:25:24Z onez $
 * http://ai.onez.cn/
 * Email: www@onez.cn
 * QQ: 6200103
 * ========================================================================
 * Copyright 2016-2016 佳蓝科技.
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ======================================================================== */


!defined('IN_ONEZ') && exit('Access Denied');
class onezphp_ai_output_image extends onezphp{
  function __construct(){
    
  }
  function options_ai(){
    $options=array();
    $options['value']=array('label'=>'您要发出的图片','type'=>'upload','key'=>'value','hint'=>'','notempty'=>'');
    return $options;
  }
  function doit(&$result,$option,$person=false){
    if($option['value']){
      $msg=array(
        'type'=>'image',
        'pos'=>'you',
        'time'=>time(),
        'message'=>$option['value'],
      );
      if(!$person){
        onez('ai')->push(onez('ai')->person('udid'),$msg,'',array(),'reply');
      }else{
        onez('ai')->push($person->udid,$msg,'',array(),'reply');
      }
    }
  }
}