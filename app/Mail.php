<?php
/**
 * Created by PhpStorm.
 * User: antonije
 * Date: 2/24/19
 * Time: 5:43 PM
 */

namespace App;


use App\models\Error;
use PHPMailer\PHPMailer\PHPMailer;
use Prophecy\Exception\Exception;
use \App\models\User;
class Mail
{
    private $mail;
    private $code;
    private $user;

    public function __construct() {
        $this->mail = new PHPMailer();
        try {
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'tokoricnickoimejezauzeto@gmail.com';
            $this->mail->Password = '';
            $this->mail->SMTPSecure = 'tls';
            $this->mail->Port = 587;

        } catch (Exception $e) {
            echo http_response_code(500);
        }

    }

    function register($token,$email){
        try{
            $this->mail->setFrom('tokoricnickoimejezauzeto@gmail.com', 'Antonije Pavlovic');
            $this->mail->addAddress($email);
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Registration';
            $this->mail->Body = 'Click on the following link: <a href="http://127.0.0.1:8000/verification/'.$token.'">LINK</a>               to activate your account';
            $this->mail->send();
            $this->code = 200;
            return $this->code;
        }catch (\PHPMailer\PHPMailer\Exception $e){
            Error::insertError($this->mail->ErrorInfo);
            return $e;
        }
    }

    function support($email,$username,$subject,$text){
       try{
           $this->mail->setFrom('tokoricnickoimejezauzeto@gmail.com', $username);
           $this->mail->addAddress('antonijepavlovic1@gmail.com');
           $this->mail->addReplyTo($email, $username);
           $this->mail->isHTML(true);
           $this->mail->Subject = $subject;
           $this->mail->Body  = $text;

           if($this->mail->send()){
               $this->code = 200;
              return $this->code;
           }
           else{
               $this->code = 500;
               return $this->code;
           }
       }catch (\PHPMailer\PHPMailer\Exception $e){
           Error::insertError($this->mail->ErrorInfo);
           return $e;
        }
    }

    function confirmationMail($userID){
        $this->user = new User();
        $res = $this->user->getUser($userID);
        $email = $res->email;
        try{
            $this->mail->setFrom('tokoricnickoimejezauzeto@gmail.com', 'Library - online book shop');
            $this->mail->addAddress($email);
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Confirmation mail';
            $this->mail->Body = 'Your order has been accepted';
            if($this->mail->send()){
                $this->code = 200;
                return $this->code;
            }else{
                $this->code = 400;
                return $this->code;
            }
        }catch (\PHPMailer\PHPMailer\Exception $e){
            Error::insertError($this->mail->ErrorInfo);
            return $e;
        }
    }
}
