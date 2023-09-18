<?php
require_once 'DB.php';

    class UserModel{
        private $login;
        private $email;
        private $pass;
        private $_db = null;


        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($login, $email, $pass){
            $this->login = $login;
            $this->email = $email;
            $this->pass = $pass;
        }
        public function validGetUser($i,$e){
            $result = $this->_db->query("SELECT * FROM `users` WHERE `$i` = '$e'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        public function validForm() {
            if(strlen($this->login) < 3)
                return "Имя слишком короткое";
            else if($this->validGetUser('login', $this->login) != '')
                return "Такой логин уже есть";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if($this->validGetUser('email', $this->email) != '')
                return "Такой email уже есть";
            else if(strlen($this->pass) < 3)
                return "Пороль не менее 3 символов";
            else
                return "Верно";
        }
        public function addUser(){
            $sql = 'INSERT INTO users(login, email, pass) VALUES(:login, :email, :pass)';
            $query = $this->_db->prepare($sql);

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute(['login' => $this->login, 'email' => $this->email, 'pass' => $pass]);
        }
        public function getUser() {
            if(isset($_COOKIE['login'])) {
                $login = $_COOKIE['login'];
                $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
                return $result->fetch(PDO::FETCH_ASSOC);
            }
        }
        public function setAuth($login) {
            setcookie('login', $login, time() + 3600, '/');
            header('Location: /user/dashboard');
        }
        public function logOut(){
            setcookie('login', $this->login, time() - 3600, '/');
            unset($_COOKIE['login']);
            header('Location: /user/dashboard');
        }
        public function auth($login, $pass) {
            if($login == ''){
                return 'Неверный логин !';
            }
            elseif ($pass <= 3)
                return 'Неверный пароль !';
            else {
                $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
                $user = $result->fetch(PDO::FETCH_ASSOC);

                if (password_verify($pass, $user['pass']))
                    $this->setAuth($login);
                else
                    return'Неверный пароль !';
            }
        }
    }