<?php

    class L extends Controller {
        public function index($token){
            $link = $this->model('LinkModel');
            $goLink = $link -> goLink($token);
            header("Location:".$goLink['link']);
        }
    }