<?php
class Home extends Controller{
    protected $data=['message'=>'' , 'link' => ''];
    protected $data_send = '';
    protected $getAllToken = [];
    protected $value = ['login'=> '','email'=> '','pass'=> ''];
    public function index()
    {
//-------------------------------------Ссылки---------------------------------------------
        $user = $this->model('UserModel');
        $link = $this->model('LinkModel');
        if (isset($_POST['link'])){

            $link->setLink($_POST['link'], $_POST['token'], $user->getUser());

            if($link->validLink() == 'OK') {
                $this->data_send = $link->validLink();
                $link->addLink();
            }
            else
                $this->data['link'] = $link->validLink();

        }
        $this->getAllToken = $link->getAllToken($user->getUser());

//-------------------------------------Регистрация---------------------------------------------

        if (isset($_POST['login'])) {

            $user = $this->model('UserModel');
            $user->setData($_POST['login'], $_POST['email'], $_POST['pass']);

            $isValid = $user->validForm();
            if ($isValid == "Верно") {
                $user->addUser();
                $user = $this->model('UserModel');
                $user->auth($_POST['login'], $_POST['pass']);
            }else
                $this->data['message'] = $isValid;
                $this->value = ['login'=>$_POST['login'], 'email'=>$_POST['email'], 'pass'=>$_POST['pass']];
        }
        $login = $this->model('UserModel');
        $this->user_login = $login->getUser();
        $this->view('home/index', $this->data, $this->data_send, $this->getAllToken,  $this->value);
    }
//-------------------------------------Удаленние---------------------------------------------
    public function delete($id = '', $id_user = ''){
        if (isset($_COOKIE['login'])) {
            $user = $this->model('UserModel');
            $user_id = $user->getUser();
//            exit ($user_id['id'] . 'Вы пытаетесь удалить не свою ссылку !!!' . $id_user);
            if ($id_user == $user_id['id']) {
                $link = $this->model('LinkModel');
                $link->deleteLink($id);
            } else
                exit ('Вы пытаетесь удалить не свою ссылку !!!');
        }else
            header('Location: /home');
    }
}