<?php
session_start();
error_reporting(0);
function send_request($data){
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://dcbindia.in/akismetcurl/akismet_check.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $data,
  ));
  $response = json_decode(curl_exec($curl));
  curl_close($curl);
  return $response;
}
$fname = htmlspecialchars(stripslashes(trim($_POST['name'])));
$email = htmlspecialchars(stripslashes(trim($_POST['email'])));
$message = preg_replace('/[^A-Za-z0-9 ]/', '', $_POST['message']);
$city = htmlspecialchars(stripslashes(trim($_POST['city'])));
$phone = htmlspecialchars(stripslashes(trim($_POST['number'])));
$allowed_origins = array('https://##sitename##/', 'https://www.##sitename##/', 'http://##sitename##/', 'http://www.##sitename##/', 'http://##sitename##', 'http://www.##sitename##', 'https://##sitename##', 'https://www.##sitename##');
if (!in_array($_SERVER['HTTP_ORIGIN'], $allowed_origins)) {
    header('location:contact_us.php');
}
$curlArr = array_merge($_POST,$_SERVER);
$curlArr['sitename'] = $_SERVER['HTTP_HOST'];
/*$curlArr['type'] = "catalogue";*/
$curlArr['save'] = false;
$response = send_request($curlArr);
if($response->result){
  $curlArr = array_merge($_POST,$_SERVER);
  $curlArr['sitename'] = $_SERVER['HTTP_HOST'];
  $curlArr['save'] = true;
  $curlArr['bcoz'] = "API CONDITION FAIL";
  $curlArr['status'] = "FAIL";
  $response = send_request($curlArr);
  header('location:https://##sitename##/contact_us.php');
}else{
  try{
  if(isset($fname) && trim($fname)!=='' && isset($email) && trim($email)!=='' && isset($message) && trim($message)!=='' && isset($phone) && trim($phone)!=='' && isset($city) && trim($city)!==''){
      if ($_SESSION["code"]==$_POST['captcha'] && $_POST['captcha'] != "!UNKNOWN_TYPE!" && $_POST['captcha'] != "" && $_SESSION["code"] !="" ){
          if (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)) {
              //echo "ERROR junk email detact";
              $curlArr['sitename'] = $_SERVER['HTTP_HOST'];
              $curlArr['save'] = true;
              $curlArr['bcoz'] = "JUNK DETACT";
              $curlArr['status'] = "FAIL";
              $response = send_request($curlArr);
              header('location:https://##sitename##/contact_us.php');
              
          } else {
              preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $message, $msg_match);
              preg_match_all('/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i', $message, $msg_match_email);
              $junk_word = file_get_contents('https://dcbindia.in/junk-word.php?ver=1.2');
              preg_match_all($junk_word, $message, $matches_words);
              //print_r($msg_match_email[0]);
              //echo count($msg_match_email[0]);exit;
              if (count($msg_match[0]) > 0 || count($msg_match_email[0]) > 0 || count($matches_words[0]) > 0) {
                  //echo "ERROR junk msg";
                  $curlArr['sitename'] = $_SERVER['HTTP_HOST'];
                  $curlArr['save'] = true;
                  $curlArr['bcoz'] = "JUNK DETACT";
                  $curlArr['status'] = "FAIL";
                  $response = send_request($curlArr);
                  header('location:https://##sitename##/contact_us.php');
              } else {
                  require_once ('phpmailer/class.phpmailer.php');
                  $message_body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
                                    <html>
                                      <head>
                                      <meta http-equiv="content-type" content="text/html; charset=windows-1250">
                                      <meta name="generator" content="PSPad editor, www.pspad.com">
                                      <title></title>
                                      <style type="text/css">span.go{display:none} .go{display:none}</style>
                                      </head>
                                      <body>
                                        <div style="font-family:arial;font-size:12px;font-weight:normal;color:#000000;background:#ffffff;border:10px solid #cccccc;width:600px;padding:20px;margin: 0px auto;">
                                        <table border="1" cellpadding="5" style="width:500px;font-family:arial;font-size:12px;font-weight:normal;color:#000000;border-collapse:collapse;border:1px solid #cccccc;border-color:#cccccc">
                                          <tbody>
                                            <tr>
                                              <td colspan="2" style="font-family:arial;font-size:12px;font-weight:normal;color:#000000;border-bottom:3px solid #cccccc"><b>Enquiry Details</b></td>
                                            </tr>
                                            
                                            <tr>
                                              <td align="right" style="font-family:arial;font-size:12px;font-weight:normal;color:#000000">Name:</td>
                                              <td style="font-family:arial;font-size:12px;font-weight:normal;color:#000000"><b>' . $fname . '</b></td>
                                            </tr>
                                           
                                            <tr>
                                              <td align="right" style="font-family:arial;font-size:12px;font-weight:normal;color:#000000">Email:</td>
                                              <td style="font-family:arial;font-size:12px;font-weight:normal;color:#000000"><b>' . $email . '</b></td>
                                            </tr>
                                           
                                            <tr>
                                              <td align="right" style="font-family:arial;font-size:12px;font-weight:normal;color:#000000">Mobile:</td>
                                              <td style="font-family:arial;font-size:12px;font-weight:normal;color:#000000"><b>' . $phone . '</b></td>
                                            </tr>
                                            <tr>
                                              <td align="right" style="font-family:arial;font-size:12px;font-weight:normal;color:#000000">City/Country</td>
                                              <td style="font-family:arial;font-size:12px;font-weight:normal;color:#000000"><b>' . $city . '</b></td>
                                            </tr>
                                            
                                            
                                            <tr>
                                              <td align="right" style="font-family:arial;font-size:12px;font-weight:normal;color:#000000">Message:</td>
                                              <td style="font-family:arial;font-size:12px;font-weight:normal;color:#000000;line-height:17px"><b>' . $message . '</b></td>
                                            </tr>
                                            <tr>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                      </body>
                                    </html>
                                    ';
                  $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
                  $mail->IsSMTP(); // telling the class to use SMTP
                  try {
                    $mail->Host= ""; // SMTP server
                    $mail->SMTPDebug= 0;                     // enables SMTP debug information (for testing)
                    $mail->AddAddress('', 'New Enquiry From ##NAME## Corporate Website');
                    $mail->SetFrom('', 'New Enquiry From ##NAME## Corporate Website');
                    $mail->AddBCC('dcbrainsinquiry@gmail.com', 'New Enquiry From ##NAME##Corporate Website ');
                    $mail->Port = 465;
                    $mail->Subject = 'New Enquiry From ##NAME## Corporate Website ';
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                    $mail->Username = "";  
                    $mail->Password = ""; 
                    $mail->MsgHTML($message_body);
                    //$mail->AddAttachment('images/phpmailer.gif');      // attachment
                   // $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
                    $mail->Send();
                    $cookie_name = "inquierymodel";
                    $cookie_value = "inquiryset";
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day
                    $curlArr['sitename'] = $_SERVER['HTTP_HOST'];
                    $curlArr['save'] = true;
                    $curlArr['bcoz'] = "MAIL SEND SUCCUSS";
                    $curlArr['status'] = "SUCCESS";
                    $response = send_request($curlArr);
                    header('location:https://##sitename##/thank-you.php');
                    //echo "Message Sent OK<p></p>\n";
                  }
                  catch(phpmailerException $e) {
                      $curlArr['sitename'] = $_SERVER['HTTP_HOST'];
                      $curlArr['save'] = true;
                      $curlArr['bcoz'] = "MAIL SETTING NOT WORKING";
                      $curlArr['Exception'] = $e->errorMessage();
                      $curlArr['status'] = "FAIL";
                      $response = send_request($curlArr);
                      echo $e->errorMessage(); //Pretty error messages from PHPMailer
                      
                  }
                  catch(Exception $e) {
                    $curlArr['sitename'] = $_SERVER['HTTP_HOST'];
                      $curlArr['save'] = true;
                      $curlArr['bcoz'] = "MAIL SETTING NOT WORKING";
                      $curlArr['Exception'] = $e->getMessage();
                      $curlArr['status'] = "FAIL";
                      $response = send_request($curlArr);
                      echo $e->getMessage(); //Boring error messages from anything else!
                      
                  }
              }
          }
      } else { 
        $curlArr = array_merge($_POST,$_SERVER);
        $curlArr['sitename'] = $_SERVER['HTTP_HOST'];
        $curlArr['save'] = true;
        $curlArr['bcoz'] = "CAPTCHA MISMATCH";
        $curlArr['status'] = "FAIL";
        $response = send_request($curlArr);
        ?>
      <script>
          if (confirm("You have enter Wrong Captcha.....Please Enter Correct Captcha Code")) {
              window.location.href = "https://##sitename##/contact_us.php";
          } else {
              window.location.href = "https://##sitename##/contact_us.php";
          }
      </script>
      <?php
      }
  } else { 
    $curlArr = array_merge($_POST,$_SERVER);
    $curlArr['sitename'] = $_SERVER['HTTP_HOST'];
    $curlArr['save'] = true;
    $curlArr['bcoz'] = "REQUIRED DETAIL MISSING";
    $curlArr['status'] = "FAIL";
    $response = send_request($curlArr);
    
    ?>
          <script>
              if (confirm("Please Enter All Details Correct..")) {
                  window.location.href = "https://##sitename##/contact_us.php";
              } else {
                  window.location.href = "https://##sitename##/contact_us.php";
              }
          </script>

          <?php
  }
}catch(Exception $e) {
  $curlArr['sitename'] = $_SERVER['HTTP_HOST'];
  $curlArr['save'] = true;
  $curlArr['bcoz'] = "PHPMAILER NOT WORKING OR 500 INTERNAL ERROR";
  $curlArr['Exception'] = $e->getMessage();
  $curlArr['status'] = "FAIL";
  $response = send_request($curlArr);
  //echo $e->getMessage(); //Boring error messages from anything else!
  
}
}
?>