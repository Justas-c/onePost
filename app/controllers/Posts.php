<?php

class Posts extends Controller
{
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
    $this->postModel = $this->model('Post');
    $this->usertModel = $this->model('User');
    }

    public function index(){
        //Get posts
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];

        // printr($data);
        // die('post data above');
        $this->view('posts/index', $data);
    }

    public function myposts(){
        $data =[
            'data_value_1' => 'hello',
            'data_value_2' => 'world'
        ];
        $this->view('posts/myposts', $data);
    }

    public function addform(){
        $data = [];
        $this->view('posts/postForm', $data);
    }

    public function addPost(){
        $data = [];
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form
            //Sanatize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data=[
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];
            //printr($data);
           //Sanitize post data

          //Validate title
            if(empty($data['title'])){
                $data['title_err'] = 'title can\'t be empty';
            }elseif(strlen($data['title']) > 25 ){
                $data['title_err'] = 'title can be max 25 chars long';
            }

            //Validate body
            if(empty($data['body'])){
                $data['body_err'] = 'body can\'t be empty';
            }elseif(strlen($data['body']) < 5 ){
                $data['body_err'] = 'body needs to be at least 5 chars long';
            }elseif(strlen($data['body']) > 500 ){
                $data['body_err'] = 'body is 500 max chars long';
            }

            //Make sure errors are empty
            if (empty($data['title_err']) && empty($data['body_err'])) {
                if ($this->postModel->addPost($data)){
                    flash('post_message', 'Post Added');
                    redirect('posts');
                }
            }else{
                //Load view with errors
                $this->view('posts/addpost', $data);
            }


        }else{
            $data = [
                'title' => '',
                'body' => ''
            ];

        }
        $this->view('posts/addpost', $data);
    }

    public function edit($id){
        $post = $this->postModel->getPostById($id);
        //$user = $this->userModel->getUserById($post->user_id);
        $data = [
            'post' => $post
        ];

        $this->view('posts/edit', $data);
    }


    public function editPost($id){
        $data = [];
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form
            //Sanatize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data=[
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'title_err' => '',
                'body_err' => ''
            ];
            //Sanitize post data

            //Validate title
            if(empty($data['title'])){
                $data['title_err'] = 'title can\'t be empty';
            }elseif(strlen($data['title']) > 25 ){
                $data['title_err'] = 'title can be max 25 chars long';
            }

            //Validate body
            if(empty($data['body'])){
                $data['body_err'] = 'body can\'t be empty';
            }elseif(strlen($data['body']) < 5 ){
                $data['body_err'] = 'body needs to be at least 5 chars long';
            }elseif(strlen($data['body']) > 500 ){
                $data['body_err'] = 'body is 500 max chars long';
            }

            //Make sure errors are empty
            if (empty($data['title_err']) && empty($data['body_err'])) {
                if ($this->postModel->editPost($data)){
                    flash('post_message', 'Post Edited');
                    redirect('posts');
                }
            }else{

                $post = $this->postModel->getPostById($id);
                $data['post'] = $post;
                $this->view('posts/edit', $data);
            }

        }else{
            $data = [];
        }
    }

}
