<?php error_reporting(0); ?>
<?php require_once(LIB_PATH_INC."config_env.php"); ?>
<?php use PHPMailer\PHPMailer\PHPMailer; ?>
<?php use PHPMailer\PHPMailer\Exception; ?>
<?php require_once __DIR__ .'/vendor/phpmailer/phpmailer/src/Exception.php'; ?>
<?php require_once __DIR__ .'/vendor/phpmailer/phpmailer/src/PHPMailer.php'; ?>
<?php require_once __DIR__ .'/vendor/phpmailer/phpmailer/src/SMTP.php'; ?>
<?php
class smtp_connection  {
  private $mail;

  public function __construct() {
    $this->smtpSetUp();
  }

  public function smtpSetUp() {
    $this->mail = new PHPMailer();
    $this->mail->IsSMTP();
    $this->mail->Mailer = "smtp";
    $this->mail->SMTPDebug  = 0;
    $this->mail->SMTPAuth   = TRUE;
    $this->mail->SMTPSecure = "tls";
    $this->mail->Port       = SMTP_PORT;
    $this->mail->Host       = SMTP_HOST;
    $this->mail->Username   = SMTP_USER_MAIL;
    $this->mail->Password   = SMTP_PASSWORD; //your app password
    $this->mail->IsHTML(true);
  }

  public function send_mail($send_mail_address,
                            $full_name,
                            $subject,
                            $content) {
    $this->mail->AddAddress($send_mail_address);
    $this->mail->SetFrom(SMTP_USER_MAIL, "CESLICAM Portal");
    $this->mail->Subject = "[CESLICAM] ".$subject;
    $this->mail->MsgHTML($content);
    if (!$this->mail->Send()) {
      // $status = ["status" => "failed"];

      // header("Access-Control-Allow-Origin: *");
      // header('Access-Control-Allow-Methods: GET , POST');
      // header('Content-Type: application/json; charset=utf-8');
      // echo json_encode($status, true);
      return false;
    } else {
      // $status = ["status" => "success"];

      // header("Access-Control-Allow-Origin: *");
      // header('Access-Control-Allow-Methods: GET , POST');
      // header('Content-Type: application/json; charset=utf-8');
      // echo json_encode($status, true);
      return true;
    }
  }

}
$mail = new smtp_connection();
?>
