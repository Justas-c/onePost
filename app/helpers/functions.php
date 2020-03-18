<?php

function printr($param){
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}

//simple page redirect
function redirect($page){
    header('location:' . URLROOT . $page);
}
