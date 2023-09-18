<?php

require_once 'DB.php';

    class LinkModel
    {
        private $link = '';
        private $token = '';
        private $id_user = '';
        public function __construct()
        {
            $this->_db = DB::getInstence();
        }
        public function setLink($link, $token, $id_user)
        {
            $this->link = $link;
            $this->token = trim($token);
            $this->id_user = $id_user['id'];
        }
        public function getToken() {
            if($this->token != '') {
                $result = $this->_db->query("SELECT * FROM `links` WHERE `token` = '$this->token'");
                return $result->fetch(PDO::FETCH_ASSOC);
            }
        }
        public function validLink() {
            $getToken = $this->getToken();
            if(strlen($this->link) < 3)
                return "Ссылка слишком кароткая !";
            else if(strlen($this->token) < 3)
                return "Ключ слишком короткий !";
            else if($getToken != '')
                return "Такой ключ уже есть !";
            else
                return "OK";
        }
        public function addLink(){
            $sql = 'INSERT INTO links(link, token, id_user) VALUES(:link, :token, :id_user)';
            $query = $this->_db->prepare($sql);

            $query->execute(['link' => $this->link, 'token' => $this->token, 'id_user' => $this->id_user ]);
        }
        public function getAllToken($id_user) {
            if (isset($id_user['id'])) {
                $id = $id_user['id'];
                if ($result = $this->_db->query("SELECT * FROM `links` WHERE `id_user` = '$id'"))
                    return $result->fetchAll(PDO::FETCH_ASSOC);
                else
                    return 'error';
            }
        }
        public function deleteLink($id){
            if($id != ''){
                $sql = "DELETE FROM `links` WHERE `id` = '$id'";
                $query = $this->_db->prepare($sql);
                $query->execute();
                header('Location: /home');
            }else
                exit ('Что то сломалось deleteLink))');
        }
        public function goLink($e = '') {
            if($e != '') {
                $result = $this->_db->query("SELECT * FROM `links` WHERE `token` = '$e'");
                return $result->fetch(PDO::FETCH_ASSOC);
            }else
                exit ('Что то сломалось goLink))');
        }


    }