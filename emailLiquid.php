<?php
session_start();



if (!empty($_POST['submit'])) {
    $odbiorca = "biuro@simpropc.pl";

    $name = htmlspecialchars(trim($_POST['name']));
    $phone =  htmlspecialchars(trim($_POST['phone']));
    $email =  htmlspecialchars(trim($_POST['email']));

    $budget =  htmlspecialchars(trim($_POST['budget']));
    
    $processor = htmlspecialchars(trim($_POST['processor']));
    $graphicCard = htmlspecialchars(trim($_POST['graphicCard']));
    $case = htmlspecialchars(trim($_POST['case']));
    $cooler = htmlspecialchars(trim($_POST['cooler']));
    $hardDrive = htmlspecialchars(trim($_POST['hardDrive']));
    $powerSupply = htmlspecialchars(trim($_POST['powerSupply']));
    $memory = htmlspecialchars(trim($_POST['memory']));
    $colour = htmlspecialchars(trim($_POST['colour']));
    $otherParts = htmlspecialchars(trim($_POST['otherParts'])); 

    if (isset($_POST['coolingProcessor'])){
        $coolingProcessor = ($_POST['coolingProcessor']);
    } else $coolingProcessor = "";
    if (isset($_POST['coolingGraphics'])){
        $coolingGraphics = ($_POST['coolingGraphics']);
    } else $coolingGraphics = "";
    if (isset($_POST['coolingRAM'])){
        $coolingRAM = ($_POST['coolingRAM']);
    } else $coolingRAM = "";
    if (isset($_POST['coolingPowerSection'])){
        $coolingPowerSection = ($_POST['coolingPowerSection']);
    } else $coolingPowerSection = "";

    $tubing = ($_POST['tubing']);
    $pricing = ($_POST['pricing']);

    $fluidColor = htmlspecialchars(trim($_POST['fluidColor']));
    $cableMod = htmlspecialchars(trim($_POST['cableMod']));
    $coolingMessage = htmlspecialchars(trim($_POST['coolingMessage'])); 

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
            header('Location: zamow-chlodzenie-ciecza');
        }
        elseif (strlen($name) > 40){
            $_SESSION['error'] = '<div class="error">Za długie imię i nazwisko - max. 40 znaków </div>';
            header('Location: zamow-chlodzenie-ciecza');
        }
       
    // $phone check
        if (empty($phone)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola z numerem telefonu!</div>';
            header('Location: zamow-chlodzenie-ciecza');
        }
        elseif (strlen($phone) < 9 || strlen($phone) > 9){
            $_SESSION['error'] = '<div class="error">Niepoprawny numer telefonu! </div>';
            header('Location: zamow-chlodzenie-ciecza');
        }    

    // $email check
        if (empty($email)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola E-mail!</div>';
            header('Location: zamow-chlodzenie-ciecza');
        }
        else{
            $testemail = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (filter_var($testemail, FILTER_VALIDATE_EMAIL) == false){            
                $_SESSION['error'] = '<div class="error">Niepoprawny adres E-mail!</div>';
                header('Location: zamow-chlodzenie-ciecza');
            }  
        }
        if (strlen($email) > 30){
            $_SESSION['error'] = '<div class="error">Za długi e-mail - max. 30 znaków !</div>';
            header('Location: zamow-chlodzenie-ciecza');
        }

    // $budget check
        if (empty($budget)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola Przewidzianego budżetu!</div>';
            header('Location: zamow-chlodzenie-ciecza');
        }
        elseif (strlen($budget) > 40){
            $_SESSION['error'] = '<div class="error">Przewidziany budżet - za dużo liter- max. 40 znaków </div>';
            header('Location: zamow-chlodzenie-ciecza');
        }
     
    // checkConponents check
        if (isset($_POST['checkConponents'])){
            if (strlen($processor) > 40){
                $_SESSION['error'] = '<div class="error">Za długa treść RUBRYKI PROCESORA -max. 40 znaków </div>';
                header('Location: zamow-chlodzenie-ciecza');
            }
            if (strlen($graphicCard) > 40){
                $_SESSION['error'] = '<div class="error">Za długa treść RUBRYKI KRATY GRAFICZNEJ -max. 40 znaków </div>';
                header('Location: zamow-chlodzenie-ciecza');
            }
            if (strlen($case) > 40){
                $_SESSION['error'] = '<div class="error">Za długa treść RUBRYKI OBUDOWA -max. 40 znaków </div>';
                header('Location: zamow-chlodzenie-ciecza');
            }
            if (strlen($cooler) > 40){
                $_SESSION['error'] = '<div class="error">Za długa treść RUBRYKI CHŁODZENIE -max. 40 znaków </div>';
                header('Location: zamow-chlodzenie-ciecza');
            }
            if (strlen($hardDrive) > 40){
                $_SESSION['error'] = '<div class="error">Za długa treść RUBRYKI DYSKI -max. 40 znaków </div>';
                header('Location: zamow-chlodzenie-ciecza');
            }
            if (strlen($powerSupply) > 40){
                $_SESSION['error'] = '<div class="error">Za długa treść RUBRYKI ZASILACZ -max. 40 znaków </div>';
                header('Location: zamow-chlodzenie-ciecza');
            }
            if (strlen($memory) > 40){
                $_SESSION['error'] = '<div class="error">Za długa treść RUBRYKI RAM -max. 40 znaków </div>';
                header('Location: zamow-chlodzenie-ciecza');
            }
            if (strlen($colour) > 40){
                $_SESSION['error'] = '<div class="error">Za długa treść RUBRYKI KOLORÓW -max. 40 znaków </div>';
                header('Location: zamow-chlodzenie-ciecza');
            }
            if (strlen($otherParts) > 1000){
                $_SESSION['error'] = '<div class="error">Za długa treść UWAG DO SPRZĘTU - max. 1000 znaków </div>';
                header('Location: zamow-chlodzenie-ciecza');
            }
        }
       
    // cooling parts check
        if(($coolingProcessor)=="" && ($coolingGraphics)=="" && ($coolingRAM)=="" && ($coolingPowerSection)==""){
            $_SESSION['error'] = '<div class="error">Nie wybrano podzespołów chłodzenia wodnego! </div>';
            header('Location: zamow-chlodzenie-ciecza');
        }

    // $fluidColor check
        if (strlen($fluidColor) > 40){
            $_SESSION['error'] = '<div class="error">Za długa treść RUBRYKI KOLOR CIECZY -max. 40 znaków </div>';
            header('Location: zamow-chlodzenie-ciecza');
        }

    // $cableMod check
        if (strlen($cableMod) > 40){
            $_SESSION['error'] = '<div class="error">Za długa treść RUBRYKI MODYFIKACJI KABLI -max. 40 znaków </div>';
            header('Location: zamow-chlodzenie-ciecza');
        }
    // $coolingMessage check
        if (strlen($coolingMessage) > 1000){
            $_SESSION['error'] = '<div class="error">Za długa treść UWAG DO CHŁODZENIA WODNEGO - max. 1000 znaków </div>';
            header('Location: zamow-chlodzenie-ciecza');
        }

    // $transferCode check
        if (empty($transferCode)){
            $_SESSION['error'] = '<div class="error">Nie wypełniłeś pola z kodem z przelewu!</div>';
            header('Location: zamow-chlodzenie-ciecza');
        }
        elseif (strlen($transferCode) < 8 || strlen($transferCode) > 8){
            $_SESSION['error'] = '<div class="error">Kod musi zawierać dokładnie 8 znaków! </div>';
            header('Location: zamow-chlodzenie-ciecza');
        }   
        
    
     // $transferDate check
        if (empty($transferDate)){
            $_SESSION['error'] = '<div class="error">Nie wybrałeś daty przelewu!</div>';
            header('Location: zamow-chlodzenie-ciecza');
        }

    // $rodoCheck check
        if (!isset($rodoCheck)){
            $_SESSION['error'] = '<div class="error">Nie zaakceptowałeś polityki RODO!</div>';
            header('Location: zamow-chlodzenie-ciecza');
        }

    // $returnCheck check
        if (!isset($returnCheck)){
            $_SESSION['error'] = '<div class="error">Nie zaakceptowałeś polityki RODO!</div>';
            header('Location: zamow-chlodzenie-ciecza');
        }

        

    // RECAPTCHA
        $secretCode = "6Ld2JZgUAAAAAAlvET4amHDW16n8kNCh_Lo6Rn6g";

        $checkCaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretCode.'&response='.$_POST['g-recaptcha-response']);

        $answer = json_decode($checkCaptcha);

        if ($answer->success==false){
            $_SESSION['error'] = '<div class="error">Potwierdź że nie jestes botem!</div>';
            header('Location: zamow-chlodzenie-ciecza');
        }

        

    // data save
        {$_SESSION['f_name'] = $name;}
        {$_SESSION['f_phone'] = $phone;}
        {$_SESSION['f_email'] = $email;}
        {$_SESSION['f_budget'] = $budget;}

        {$_SESSION['f_processor'] = $processor;}
        {$_SESSION['f_graphicCard'] = $graphicCard;}
        {$_SESSION['f_case'] = $case;}
        {$_SESSION['f_cooler'] = $cooler;}
        {$_SESSION['f_hardDrive'] = $hardDrive;}
        {$_SESSION['f_powerSupply'] = $powerSupply;}
        {$_SESSION['f_memory'] = $memory;}
        {$_SESSION['f_colour'] = $colour;}
        {$_SESSION['f_otherParts'] = $otherParts;}


        {$_SESSION['f_coolingProcessor'] = $coolingProcessor;}
        {$_SESSION['f_coolingGraphics'] = $coolingGraphics;}
        {$_SESSION['f_coolingRAM'] = $coolingRAM;}
        {$_SESSION['f_coolingPowerSection'] = $coolingPowerSection;}
        
        {$_SESSION['f_tubing'] = $tubing;}
        {$_SESSION['f_pricing'] = $pricing;}
        {$_SESSION['f_fluidColor'] = $fluidColor;}
        {$_SESSION['f_cableMod'] = $cableMod;}
        {$_SESSION['f_coolingMessage'] = $coolingMessage;}
        
            
                  
    //Sprawdzam czy są błędy i wysyłam wiadomość
        if (empty($_SESSION['error'])){
            $mailSender = "Zapytanie przysłał: $name";
            $mailContact = "Email zwrotny: $email<br> Telefon: $phone";
            $mailComponents ="PODZESPOŁY KOMPUTERA:<br> Procesor: $processor<br> Karta graficzna: $graphicCard<br> Obudowa: $case<br> Chłodzenie: $cooler<br> Dyski twarde: $hardDrive<br> Zasilacz: $powerSupply<br> Pamięć: $memory<br> Kolorystyka: $colour<br> Inne uwagi: $otherParts<br>";

            $mailText ="ZAPYTANIE OFERTOWE NA CHŁODZENIE CIECZĄ:<br> 
            Kod przelewu: $transferCode<br> Data przelewu: $transferDate<br> Budżet na układ chłodzenia: $budget zł<br><br> 
            $mailComponents<br><br>
            UKŁAD CHŁODZENIA CIECZĄ:<br>
            Co będzie chłodzone: $coolingProcessor, $coolingGraphics, $coolingRAM, $coolingPowerSection<br>
            Typ rurek: $tubing<br>
            Wariant wartościowy: $pricing<br>
            Kolor cieczy: $fluidColor<br>
            Modyfikowane kable: $cableMod<br>
            Uwagi dodatkowe do chłodzenia:<br>$coolingMessage<br><br>
            ($ip, $host)";

            $letter = $mailSender."<br> ".$mailContact."<br><br> ".$mailText."<br> ";    
               
            // $temat = "WYCENA INDYWIDUALNEGO CHŁODZENIA CIECZĄ - $name";
            $temat = "=?utf-8?B?".base64_encode("WYCENA INDYWIDUALNEGO CHŁODZENIA CIECZĄ - $name")."?=";
            $header = "Content-type: text/html; charset=utf-8; \r\n";  
    
            if (@mail($odbiorca, $temat , $letter, $header)){
                setcookie("send", time()+60, time()+60);
                session_unset();    
                $_SESSION['success'] = '<div class="success">Twoja wiadomość została wysłana.</div>';
                header('Location: zamow-chlodzenie-ciecza');
            }
            else{
                $_SESSION['error'] = '<div class="error" >Błąd wysyłania wiadomości, spróbuj ponownie później.</div>';
                header('Location: zamow-chlodzenie-ciecza');
            }
        }
    }
    else{
        $_SESSION['error'] = '<div class="error">Odczekaj: '.($_COOKIE['send']-time()).' sekund, przed wysłaniem kolejnej wiadomości</div>';
        header('Location: zamow-chlodzenie-ciecza');
    }
}
?>