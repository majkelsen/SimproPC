<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SimproPC - KONTAKT</title>
    <link rel="shortcut icon" href="img/pageIcon.png">
    <link rel="stylesheet" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Jockey+One|Viga&amp;subset=latin-ext" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="content">
        <div class="contact">
            <h1>KONTAKT</h1>
            <div class="contactFlex">
                <span class="flexLeft">
                    Aby złożyć zapytanie o wycenę zestawu komputerowego, prosimy użyć formularzy z zakładki "ZAMÓW PC", podając pomocnicze dane do rubryk.<br><br>
                    
                    Chcąc skorzystać z naszej ofery lub nawiązać stałą współpracę, proszę śmiało użyć jednej z poniższych form kontaktu: <br><br>
            
                    Wiadomość na adres email:<br>
                    <h2>biuro@simpropc.pl</h2>
                    <br>
                    Numer kontaktowy, aktywny w dni pracujące od 9-16:<br>
                    <h2>888-577-758</h2>
                    <br>                
                    Nasz webowy formularz kontaktowy:
                </span>
                <span class="flexRight">
                    dane firmowe:<br>
                    <h4>SIMPRO Michał Magiera</h4>
                    <h3>NIP: 734-355-29-61</h3>
                    <br>

                    punkty firmowe:<br>
                    <h4>Kraków (30-716)</h4>
                    ul. Przewóz 31<br><br>
                
                    <h4>Nowy Sącz (33-300)</h4>
                    ul. Falkowska 88a<br>

                    <h2 class="media directButton"><a href="RODO">RODO</a></h2>
                </span>
            </div>
            <div class="formContact">
                <form class="myform" method="POST" action="email.php">
                <div class="empty">
    <?php
        if(isset($_SESSION['error'])){
            echo ($_SESSION['error']);
            unset ($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
            echo ($_SESSION['success']);
            unset($_SESSION['success']);
        }
    ?>
                    </div>

                    <div class="formElement">
                        <label for="name"><i class="fas fa-edit"></i> Imię i Nazwisko</label>
                        <input type="text" id="name" name="name" placeholder="Podaj imię i nazwisko.." value="<?php if (isset($_SESSION['f_name'])) echo $_SESSION['f_name'];?>">
                    </div>


                    <div class="formElement">
                        <label for="company">Firma</label>
                        <input type="text" id="company" name="company" placeholder="Nie wymagane! Podaj jeśli reprezentujesz.."
                            value="<?php if (isset($_SESSION['f_company'])) echo $_SESSION['f_company'];?>">
                    </div>


                    <div class="formElement">
                        <label for="phone"><i class="fas fa-edit"></i> Telefon kontaktowy</label>
                        <input type="number" id="phone" name="phone" placeholder="Podaj swój numer.." value="<?php if (isset($_SESSION['f_phone'])) echo $_SESSION['f_phone'];?>">
                    </div>


                    <div class="formElement">
                        <label for="email"><i class="fas fa-edit"></i> E-mail zwrotny</label>
                        <input type="text" id="email" name="email" placeholder="Podaj swój email.." value="<?php if (isset($_SESSION['f_email'])) echo $_SESSION['f_email'];?>">
                    </div>


                    <div class="formElement">
                        <label for="goal"><i class="fas fa-edit"></i> Temat wiadomości</label>
                        <input type="text" id="goal" name="goal" placeholder="Podaj temat wiadomości.." value="<?php if (isset($_SESSION['f_goal'])) echo $_SESSION['f_goal'];?>">
                    </div>


                    <div class="formElement">
                    <i class="fas fa-edit"></i><textarea name="message" id="message" cols="" rows="" placeholder="Treść wiadomości..."><?php if (isset($_SESSION['f_message'])) echo $_SESSION['f_message'];?></textarea>
                    </div>
                    
                    <div class="rodoCheck clearfix">
                        <div class="checkboxSECOND">
                            <input type="checkbox" id="checkboxRODO" name="rodoCheck" />
                            <label for="checkboxRODO"></label>
                        </div>
                        <div class="checkboxText">
                        Zgadzam się na przetwarzanie moich danych osobowych na potrzeby obsługi tego zapytania,
                        <a target="_blank" href="RODO" style="display: inline; text-decoration: underline">zgodnie z polityką RODO</a> <i class="fas fa-edit"></i>
                        </div>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6Ld2JZgUAAAAAEksEynz3hZg3wXGZloszLa0I8X0"></div>
                    <div class="formText"><i class="fas fa-edit"></i> - pola obowiązkowe</div>
                    <div class="submit">
                        <label for=""></label>
                        <input type="submit" value="Wyślij" id="submit" name="submit" />
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="insertLayout.js"></script>
    <script src="script.js"></script>
</body>

</html>