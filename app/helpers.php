<?php
if(! function_exists('getPrice')){
function getPrice($prix){
    return number_format(floatVal($prix),2,',', ' ')." Fcfa";
}
}
