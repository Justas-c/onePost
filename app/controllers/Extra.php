<?php
class Extra extends Controller
{

    //TEST
    public function index(){
        $data = [
            'title' => 'index title',
            'description' => 'index description'
        ];

        $this->view('pages/index', $data);
    }
}
