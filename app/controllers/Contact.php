<?php



class Contact extends Controller{

    public $some;
    protected $data = ['message' => ''];
    protected $data_send = ['message' => ''];
    protected $name = '';
    protected $email = '';
    protected $anons = '';
    protected $message = '';
    public function index(){


        if(isset($_POST['name'])) {
            $mail = $this->model('ContactModel');
            $mail->setData($_POST['name'], $_POST['email'], $_POST['anons'], $_POST['message']);


            $isValid = $mail->validForm();
            if($isValid == "Верно") {
                $mail->mail();
                $this->data_send['message'] = 'Отправленно';
            }
            else
                $this->data['message'] = $isValid;

            $this->name = $_POST['name'];
            $this->email = $_POST['email'];
            $this->anons = $_POST['anons'];
            $this->message = $_POST['message'];
        }




        $this->view("contact/index", $this->data,$this->data_send,$this->email,$this->name,$this->anons,$this->message);

    }

    public function about($first=''){
        $this->some = $first;
        $this->view("contact/about", $this->some);
    }

}