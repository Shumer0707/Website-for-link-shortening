<?php
require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
    class ContactModel{
        private $name = '';
        private $email;
        private $anons;
        private $message;

        public function setData($name, $email, $anons, $message)
        {
            $this->name = $name;
            $this->email = $email;
            $this->anons = $anons;
            $this->message = $message;
        }
        public function validForm() {
            if(strlen($this->name) < 3)
                return "Имя слишком короткое";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(strlen($this->anons) < 3)
                return "Введите тему";
            else if(strlen($this->message) < 5)
                return "Сообщение слишком короткое";
            else
                return "Верно";
        }

        public function mail()
        {
            $mail = new PHPMailer();
            try {
                $mail->SMTPDebug = SMTP::DEBUG_OFF;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'shumer0707@gmail.com';
                $mail->Password = 'nqgcaroerludkrix';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->CharSet = 'UTF-8';

                $mail->setFrom($this->email, $this->name);
                $mail->addAddress($this->email);

                $mail->isHTML(true);
                $mail->Subject = $this->anons;
                $mail->Body = $this->message;
                $mail->send();
            } catch (Exception $e) {
                echo 'false: ' . $e;
            }
//            $to = "shumer0707@gmail.com";
//            $message = 'Имя: ' . $this->name . '. Возраст: ' . $this->age . '. Сообщение: ' . $this->message;
//
//            $subject = "=?utf-8?B?".base64_encode("Сообщение с сайта")."?=";
//            $headers = "From: $this->email\r\nReply-to: $this->email\r\nContent-type: text/html; charset=utf-8\r\n";
//            $success = mail ($to, $subject, $message, $headers);
//
//            if(!$success)
//                return "Сообщение не было отправлено";
//            else
//                return true;

        }
    }
