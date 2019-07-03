<?php
session_start();



if (!empty($_POST['submit'])) {

    $odbiorca = "biuro@simpropc.pl";

    $name = htmlspecialchars(trim($_POST['name']));
    $company = htmlspecialchars(trim($_POST['company']));
    $phone =  htmlspecialchars(trim($_POST['phone']));
    $email =  htmlspecialchars(trim($_POST['email']));
    $goal =  htmlspecialchars(trim($_POST['goal']));
    $message = htmlspecialchars(trim($_POST['message']));
    $rodo = ($_POST['rodoCheck']);
    $submit = $_POST['submit'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

    if (!isset($_COOKIE['send'])){
    // $name check
        if (empty($name)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola Imię i Nazwisko!</div>';
            header('Location: kontakt');
        }
        elseif (strlen($name) > 40){
            $_SESSION['error'] = '<div class="error">Za długie imię i nazwisko - max. 40 znaków </div>';
            header('Location: kontakt');
        }

    // $company check
        elseif (strlen($company) > 40){
            $_SESSION['error'] = '<div class="error">Za długa nazwa - max. 40 znaków </div>';
            header('Location: kontakt');
        }

    // $phone check
        if (empty($phone)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola z numerem telefonu!</div>';
            header('Location: kontakt');
        }
        elseif (strlen($phone) < 9 || strlen($phone) > 9){
            $_SESSION['error'] = '<div class="error">Niepoprawny numer telefonu! </div>';
            header('Location: kontakt');
        }    

    // $email check
        if (empty($email)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola E-mail!</div>';
            header('Location: kontakt');
        }
        else{
            $testemail = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (filter_var($testemail, FILTER_VALIDATE_EMAIL) == false){            
                $_SESSION['error'] = '<div class="error">Niepoprawny adres E-mail!</div>';
                header('Location: kontakt');
            }  
        }
        if (strlen($email) > 30){
            $_SESSION['error'] = '<div class="error">Za długi e-mail - max. 30 znaków !</div>';
            header('Location: kontakt');
        }

    // $goal check
        if (empty($goal)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola z tematem wiadomości!</div>';
            header('Location: kontakt');
        }
        elseif (strlen($goal) > 40){
            $_SESSION['error'] = '<div class="error">Za długi temat wiadomości - max. 40 znaków </div>';
            header('Location: kontakt');
        }
    
    // $message check
        if (empty($message)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola z zawartościa wiadomości!</div>';
            header('Location: kontakt');
        }
        elseif (strlen($message) > 1000){
            $_SESSION['error'] = '<div class="error">Za długa treść wiadomości - max. 1000 znaków </div>';
            header('Location: kontakt');
        }

    // $rodo check
        if (!isset($rodo)){
            $_SESSION['error'] = '<div class="error">Nie zaakceptowałeś polityki RODO!</div>';
            header('Location: kontakt');
        }

    // RECAPTCHA
        $secretCode = "6Ld2JZgUAAAAAAlvET4amHDW16n8kNCh_Lo6Rn6g";

        $checkCaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretCode.'&response='.$_POST['g-recaptcha-response']);

        $answer = json_decode($checkCaptcha);

        if ($answer->success==false){
            $_SESSION['error'] = '<div class="error">Potwierdź że nie jestes botem!</div>';
            header('Location: kontakt');
        }


    // data save
        {$_SESSION['f_name'] = $name;}
        {$_SESSION['f_company'] = $company;}
        {$_SESSION['f_phone'] = $phone;}
        {$_SESSION['f_email'] = $email;}
        {$_SESSION['f_goal'] = $goal;}
        {$_SESSION['f_message'] = $message;}
          
    //Sprawdzam czy są błędy i wysyłam wiadomość
        if (empty($_SESSION['error'])){
            $mailSender = "Wiadomość przysłał: $name ($company)";
            $mailContact = "Email zwrotny: $email<br> Telefon: $phone";
            $mailText = "Treść wiadomości:<br>  $message <br><br> ($ip, $host)";
            $letter = $mailSender."<br><br> ".$mailContact."<br><br> ".$mailText."<br> ";    
               
            // $temat = "$goal - $name ($company)";                
            $temat = "=?utf-8?B?".base64_encode("$goal - $name ($company)")."?=";
            $header = "Content-type: text/html; charset=utf-8; \r\n";  
    
            if (@mail($odbiorca, $temat , $letter, $header)){
                setcookie("send", time()+60, time()+60);
                session_unset();    
                $_SESSION['success'] = '<div class="success">Twoja wiadomość została wysłana.</div>';
                header('Location: kontakt');
            }
            else{
                $_SESSION['error'] = '<div class="error" >Błąd wysyłania wiadomości, spróbuj ponownie później.</div>';
                header('Location: kontakt');
            }
        }
    }
    else{
        $_SESSION['error'] = '<div class="error">Odczekaj: '.($_COOKIE['send']-time()).' sekund, przed wysłaniem kolejnej wiadomości</div>';
        header('Location: kontakt');
    }
}
?>