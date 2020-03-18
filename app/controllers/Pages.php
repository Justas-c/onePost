<?php
//Controller Pages
class Pages extends Controller{

    public function __construct(){
    }

    public function index(){
        $data = [
            'title' => 'Onepost',
            'description' => 'simple post wall'
        ];
        $this->view('pages/index', $data);
    }


    public function about($id = ''){
        $data = [
            'title' => 'About us',
            'description' => 'app to share posts withs other users'

        ];
        $this->view('pages/about', $data);
    }

    public function test1(){
        $data = [
            'test' => 'testing, testing, 123...',
            'test2' => 'another data variable',
            '3' => '33333333333333'
            ];

            $this->view('pages/test1', $data);
    }

    public function pictures(){
        $data = [
            'picture1' => 'empty picture for now<br>',
            'picture2' => 'empty pic for now.<br>'
        ];
        $this->view('pages/pictures', $data);

    }

}
