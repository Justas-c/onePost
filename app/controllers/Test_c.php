<?php

class Test_c extends Controller
{
    public function test1(){
        $data = [];
        view('test_v/test_v1', $data);
    }
}