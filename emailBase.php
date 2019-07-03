<?php
session_start();



if (!empty($_POST['submit'])) {
    $odbiorca = "biuro@simpropc.pl";

    $name = htmlspecialchars(trim($_POST['name']));
    $phone =  htmlspecialchars(trim($_POST['phone']));
    $email =  htmlspecialchars(trim($_POST['email']));

    $budget =  htmlspecialchars(trim($_POST['budget']));
    $purpose =  htmlspecialchars(trim($_POST['purpose']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    if (isset($_POST['checkConponents'])){
        $checkConponents = ($_POST['checkConponents']);
    }

    if (isset($_POST['checkConponents'])){
        $processor = htmlspecialchars(trim($_POST['processor']));
        $graphicCard = htmlspecialchars(trim($_POST['graphicCard']));
        $case = htmlspecialchars(trim($_POST['case']));
        $cooler = htmlspecialchars(trim($_POST['cooler']));
        $hardDrive = htmlspecialchars(trim($_POST['hardDrive']));
        $powerSupply = htmlspecialchars(trim($_POST['powerSupply']));
        $memory = htmlspecialchars(trim($_POST['memory']));
        $colour = htmlspecialchars(trim($_POST['colour']));
        $leds = htmlspecialchars(trim($_POST['leds']));
        $otherParts = htmlspecialchars(trim($_POST['otherParts'])); 
    }
    
    $transferCode =  htmlspecialchars(trim($_POST['transferCode']));
    $transferDate =  htmlspecialchars(trim($_POST['transferDate']));

    $rodoCheck = ($_POST['rodoCheck']);
    $returnCheck = ($_POST['returnCheck']);

    $submit = $_POST['submit'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    
    if (!isset($_COOKIE['send'])){
               
    // $name check
        if (empty($name)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola Imię i Nazwisko!</div>';
            header('Location: zamow-komputer-bazowy');
        }
        elseif (strlen($name) > 40){
            $_SESSION['error'] = '<div class="error">Za długie imię i nazwisko - max. 40 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
       
    // $phone check
        if (empty($phone)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola z numerem telefonu!</div>';
            header('Location: zamow-komputer-bazowy');
        }
        elseif (strlen($phone) < 9 || strlen($phone) > 9){
            $_SESSION['error'] = '<div class="error">Niepoprawny numer telefonu! </div>';
            header('Location: zamow-komputer-bazowy');
        }    

    // $email check
        if (empty($email)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola E-mail!</div>';
            header('Location: zamow-komputer-bazowy');
        }
        else{
            $testemail = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (filter_var($testemail, FILTER_VALIDATE_EMAIL) == false){            
                $_SESSION['error'] = '<div class="error">Niepoprawny adres E-mail!</div>';
                header('Location: zamow-komputer-bazowy');
            }  
        }
        if (strlen($email) > 30){
            $_SESSION['error'] = '<div class="error">Za długi e-mail - max. 30 znaków !</div>';
            header('Location: zamow-komputer-bazowy');
        }

    // $budget check
        if (empty($budget)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola Przewidzianego budżetu!</div>';
            header('Location: zamow-komputer-bazowy');
        }
        elseif (strlen($budget) > 40){
            $_SESSION['error'] = '<div class="error">Przewidziany budżet - za dużo liter- max. 40 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
    
    // $purpose check
        if (empty($purpose)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola Przeznaczenia sprzętu!</div>';
            header('Location: zamow-komputer-bazowy');
        }
        elseif (strlen($purpose) > 50){
            $_SESSION['error'] = '<div class="error">Przeznaczenie sprzętu - za dużo liter- max. 50 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }

    // $message check
        if (strlen($message) > 1000){
            $_SESSION['error'] = '<div class="error">Za długa treść wiadomości - max. 1000 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }

    // checkConponents check
    if (isset($_POST['checkConponents'])){
        if (strlen($processor) > 40){
            $_SESSION['error'] = '<div class="error">Za długa treść rubryki PROCSORA -max. 40 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
        if (strlen($graphicCard) > 40){
            $_SESSION['error'] = '<div class="error">Za długa treść rubryki KRATY GRAFICZNEJ -max. 40 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
        if (strlen($case) > 40){
            $_SESSION['error'] = '<div class="error">Za długa treść rubryki OBUDOWA -max. 40 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
        if (strlen($cooler) > 40){
            $_SESSION['error'] = '<div class="error">Za długa treść rubryki CHŁODZENIE -max. 40 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
        if (strlen($hardDrive) > 40){
            $_SESSION['error'] = '<div class="error">Za długa treść rubryki DYSKI -max. 40 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
        if (strlen($powerSupply) > 40){
            $_SESSION['error'] = '<div class="error">Za długa treść rubryki ZASILACZ -max. 40 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
        if (strlen($memory) > 40){
            $_SESSION['error'] = '<div class="error">Za długa treść rubryki RAM -max. 40 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
        if (strlen($colour) > 40){
            $_SESSION['error'] = '<div class="error">Za długa treść rubryki KOLORÓW -max. 40 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
        if (strlen($leds) > 40){
            $_SESSION['error'] = '<div class="error">Za długa treść rubryki LED -max. 40 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
        if (strlen($otherParts) > 1000){
            $_SESSION['error'] = '<div class="error">Za długa treść UWAG DO SPRZĘTU - max. 1000 znaków </div>';
            header('Location: zamow-komputer-bazowy');
        }
    }
       
    
    // $transferCode check
        if (empty($transferCode)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola z kodem z przelewu!</div>';
            header('Location: zamow-komputer-bazowy');
        }
        elseif (strlen($transferCode) < 8 || strlen($transferCode) > 8){
            $_SESSION['error'] = '<div class="error">Kod musi zawierać dokładnie 8 znaków! </div>';
            header('Location: zamow-komputer-bazowy');
        }   
        
    
     // $transferDate check
        if (empty($transferDate)){
            $_SESSION['error'] = '<div class="error">Nie wybrałeś daty przelewu!</div>';
            header('Location: zamow-komputer-bazowy');
        }

    // $rodoCheck check
        if (!isset($rodoCheck)){
            $_SESSION['error'] = '<div class="error">Nie zaakceptowałeś polityki RODO!</div>';
            header('Location: zamow-komputer-bazowy');
        }

    // $returnCheck check
        if (!isset($returnCheck)){
            $_SESSION['error'] = '<div class="error">Nie zaakceptowałeś polityki RODO!</div>';
            header('Location: zamow-komputer-bazowy');
        }

        

    // RECAPTCHA
        $secretCode = "6Ld2JZgUAAAAAAlvET4amHDW16n8kNCh_Lo6Rn6g";

        $checkCaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretCode.'&response='.$_POST['g-recaptcha-response']);

        $answer = json_decode($checkCaptcha);

        if ($answer->success==false){
            $_SESSION['error'] = '<div class="error">Potwierdź że nie jestes botem!</div>';
            header('Location: zamow-komputer-bazowy');
        }

        

    // data save
        {$_SESSION['f_name'] = $name;}
        {$_SESSION['f_phone'] = $phone;}
        {$_SESSION['f_email'] = $email;}
        {$_SESSION['f_budget'] = $budget;}
        {$_SESSION['f_purpose'] = $purpose;}
        {$_SESSION['f_message'] = $message;}
        if (isset($_POST['checkConponents'])){
            {$_SESSION['f_processor'] = $processor;}
            {$_SESSION['f_graphicCard'] = $graphicCard;}
            {$_SESSION['f_case'] = $case;}
            {$_SESSION['f_cooler'] = $cooler;}
            {$_SESSION['f_hardDrive'] = $hardDrive;}
            {$_SESSION['f_powerSupply'] = $powerSupply;}
            {$_SESSION['f_memory'] = $memory;}
            {$_SESSION['f_colour'] = $colour;}
            {$_SESSION['f_leds'] = $leds;}
            {$_SESSION['f_otherParts'] = $otherParts;}
        }
                  
    //Sprawdzam czy są błędy i wysyłam wiadomość
        if (empty($_SESSION['error'])){
            $mailSender = "Zapytanie przysłał: $name";
            $mailContact = "Email zwrotny: $email<br> Telefon: $phone";
            if (isset($_POST['checkConponents'])){
                $mailComponents =" Procesor: $processor<br> Karta graficzna: $graphicCard<br> Obudowa: $case<br> Chłodzenie: $cooler<br> Dyski twarde: $hardDrive<br> Zasilacz: $powerSupply<br> Pamięć: $memory<br><br> Kolorystyka: $colour<br> LED'y: $leds<br><br> Inne uwagi: $otherParts<br>";
            }
            $mailText = 
            "ZAPYTANIE OFERTOWE O WYCENĘ KOMPUTERA:<br>
            Kod przelewu: $transferCode<br> Data przelewu: $transferDate<br>
            Przeznaczenie: $purpose<br>Budżet: $budget zł<br>Dodatkowe informacje: $message<br><br>
            $mailComponents<br><br>($ip, $host)";

            $letter = $mailSender."<br> ".$mailContact."<br><br> ".$mailText."<br> ";    
               
            // $temat = "WYCENA KOMPUTERA - $name";
            $temat = "=?utf-8?B?".base64_encode("WYCENA KOMPUTERA BAZOWEGO - $name")."?=";    
            $header = "Content-type: text/html; charset=utf-8; \r\n";  
    
            if (@mail($odbiorca, $temat , $letter, $header)){
                setcookie("send", time()+60, time()+60);
                session_unset();    
                $_SESSION['success'] = '<div class="success">Twoja wiadomość została wysłana.</div>';
                header('Location: zamow-komputer-bazowy');
            }
            else{
                $_SESSION['error'] = '<div class="error" >Błąd wysyłania wiadomości, spróbuj ponownie później.</div>';
                header('Location: zamow-komputer-bazowy');
            }
        }
    }
    else{
        $_SESSION['error'] = '<div class="error">Odczekaj: '.($_COOKIE['send']-time()).' sekund, przed wysłaniem kolejnej wiadomości</div>';
        header('Location: zamow-komputer-bazowy');
    }
}
?>