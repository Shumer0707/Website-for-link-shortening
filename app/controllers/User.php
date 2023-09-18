<?php
    class User extends Controller {
    protected $data = ['message' => ''];
    protected $data_user = [''];
    protected $value = ['login'=>'', 'pass'=>''];
        public function dashboard()
        {
            $user = $this->model('UserModel');
            $this->data_user=$user->getUser();
            if(isset($_POST['exit_btn'])) {
                $user->logOut();
                exit();
            }
            if(isset($_POST['login'])) {
                $user = $this->model('UserModel');
                $this->data['message'] = $user->auth($_POST['login'], $_POST['pass']);
                $this->value['login'] = $_POST['login'];
                $this->value['pass'] = $_POST['pass'];
            }


            $this->view('user/dashboard',$this->data,$this->value);
        }
    }