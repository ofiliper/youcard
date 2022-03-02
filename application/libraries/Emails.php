<?php
defined('BASEPATH') or exit('No direct script access allowed');

// $destinatarios é um array com os contatos de email dos destinatários
// O método enviar() retorna true (enviado) ou false (aconteceu algum erro no envio)

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Emails
{

    public $MAIL_HOST       = '';
    public $MAIL_PORT       =  465;
    public $MAIL_USERNAME   = '';
    public $MAILS_PASSWORD  = '';
    public $MAIL_FROM       = '';
    public $MAIL_REMETENTE  = '';
    public $DEBUG_MODE      = 0;
    public $DESTINATARIO    = '';

    public function enviar($assunto, $mensagem, $destinatario, $destinatarios = [])
    {

        require 'assets/phpmailer/src/Exception.php';
        require 'assets/phpmailer/src/PHPMailer.php';
        require 'assets/phpmailer/src/SMTP.php';

        $mail = new PHPMailer(true);
        $enviada = false;

        try {
            $mail->SMTPDebug = $this->DEBUG_MODE;
            $mail->isSMTP();
            $mail->Host = $this->MAIL_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = $this->MAIL_USERNAME;
            $mail->Password = $this->MAILS_PASSWORD;
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $this->MAIL_PORT;
            $mail->CharSet = "utf-8";

            $mail->Host = gethostbyname('smtp.titan.email');


            // $mail->Host = "smtp.gmail.com";
            // $mail->SMTPDebug = 1;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Contas
            $mail->setFrom($this->MAIL_FROM, $this->MAIL_REMETENTE);

            //Adicionar o destinatário principal
            $mail->addAddress($destinatario);

            //Adiciona destinatários adicionais, se estiverem indicados
            foreach ($destinatarios as $destinatario) {
                $mail->addAddress($destinatario);
            }

            //Conteudo
            $mail->isHTML(true);
            $mail->Subject  = $assunto;
            $mail->Body     = $mensagem;

            $enviada = $mail->send();
            // echo $mail->ErrorInfo;
        } catch (Exception $e) {
            $enviada = false;
        }
        return $enviada;
    }
}
