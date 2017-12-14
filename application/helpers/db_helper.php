<?php
    // Get field array to array
    if(!function_exists('get_field')){
        function get_field($param1,$param2 = null){
            $arrResult  = null;
            foreach ($param2 as $key => $value) {
                $arrResult[] = $value[$param1];
            }
            return $arrResult;
        }
    }
?>