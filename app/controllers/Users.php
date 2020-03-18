<?php

class Users extends Controller
{
    public function __construct(){
        $this->userModel = $this->model('User');
    }
    public function register(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form
            //Sanatize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data=[
                'name' => trim($_POST['name']),
                'email' =>trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter your email';
            } else {
                //check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'This email already taken';
                }
            }

            //Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter your name';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please fill in the password';
            } elseif (strlen($data['password']) < 6 ) {
                $data['password_err'] = 'Password must be at least 6 chars long';
            }
            //Validate confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please fill in the password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'passwords doesn\'t match';
                }
            }

            //Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) & empty($data['password_err']) && empty($data['confirm_password_err'])){
                //Validate

                //hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user
                if ($this->userModel->register($data)){
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                } else {
                    die('user registration failed');
                }
            } else {
                //Load view with errors
                $this->view('users/register', $data);
            }



        }else{
            //Init data
            $data=[
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            //Load view
            $this->view('users/register', $data);
        }
    }

    public function login(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Sanatize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' =>trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];
            //Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter your email';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter your password';
            }

            //check for user email
            if ($this->userModel->findUserByEmail($data['email'])) {
                //user found
            } else {
                $data['email_err'] = 'No user found';
            }

            //validate if errors are empty
            if (empty($data['email_err']) && empty($data['password_err']))  {
                //check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser) {
                    //Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'password incorrect';

                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }


        }else{
            //Init data
            $data=[
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            //Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        redirect('posts');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();
        redirect('users/login');
    }
}
