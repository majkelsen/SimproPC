<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SimproPC - zamów komputer bazowy</title>
    <link rel="shortcut icon" href="img/pageIcon.png">
    <link rel="stylesheet" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Jockey+One|Viga&amp;subset=latin-ext" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <script src="//www.google.com/recaptcha/api.js"></script>

</head>

<body>
    <div class="content">
        <div class="compBase">
            <h1> złóż zapytanie na wycenę komputera bazowego </h1>
            <h4 class="center">Dokładne instrukcje uzupełnienia formularza, znajdują się zaraz pod nim.</h4>
            <div class="formBuilds Base">
                <form class="myform" method="POST" action="emailBase.php">

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
                        <label for="phone"><i class="fas fa-edit"></i> Telefon</label>
                        <input type="number" id="phone" name="phone" placeholder="Podaj swój numer.." value="<?php if (isset($_SESSION['f_phone'])) echo $_SESSION['f_phone'];?>">
                    </div>


                    <div class="formElement">
                        <label for="email"><i class="fas fa-edit"></i> E-mail</label>
                        <input type="text" id="email" name="email" placeholder="Podaj swój email.." value="<?php if (isset($_SESSION['f_email'])) echo $_SESSION['f_email'];?>">
                    </div>

                    <div class="formLine"></div>

                    <div class="formElement">
                        <label for="budget"><i class="fas fa-edit"></i> Przewidziany budżet</label>
                        <input type="text" id="budget" name="budget" placeholder="Podaj odpowiadającą Ci kwotę.." value="<?php if (isset($_SESSION['f_budget'])) echo $_SESSION['f_budget'];?>">
                    </div>

                    <div class="formElement">
                        <label for="purpose"><i class="fas fa-edit"></i> Przeznaczenie sprzętu</label>
                        <input type="text" id="purpose" name="purpose" placeholder="Do czego potrzebny jest Ci sprzęt.."
                            value="<?php if (isset($_SESSION['f_purpose'])) echo $_SESSION['f_purpose'];?>">
                    </div>

                    <div class="formText">Dodatkowe informacje: </div>
                    <div class="formElement">
                        <textarea name="message" id="message" placeholder="Podaj wszystkie inne informaje, które będą miały znaczenie przy wycenie sprzętu..."><?php if (isset($_SESSION['f_message'])) echo $_SESSION['f_message'];?></textarea>
                    </div>
                   

                    <!-- <div class="formText">Czy masz jakieś wybrane komponenty?
                        <div class="checkboxFIRST checkboxComponents">
                            <input type="checkbox" id="checkboxComponents" name="checkComponents" />
                            <label for="checkboxComponents"></label>
                        </div>
                    </div> -->

                    <div class="showComponents ">
                        <div class="formElement">
                            <label for="processor">Procesor</label>
                            <input type="text" id="processor" name="processor" placeholder="Podaj numer procesora.."
                                value="<?php if (isset($_SESSION['f_processor'])) echo $_SESSION['f_processor'];?>">
                        </div>
                        <div class="formElement">
                            <label for="graphicCard">Karta graficzna</label>
                            <input type="text" id="graphicCard" name="graphicCard" placeholder="Podaj nazwę i wersję karty graficznej.."
                                value="<?php if (isset($_SESSION['f_graphicCard'])) echo $_SESSION['f_graphicCard'];?>">
                        </div>
                        <div class="formElement">
                            <label for="case">Obudowa</label>
                            <input type="text" id="case" name="case" placeholder="Podaj nazwę obudowy.." value="<?php if (isset($_SESSION['f_case'])) echo $_SESSION['f_case'];?>">
                        </div>
                        <div class="formElement">
                            <label for="cooler">Chłodzenie</label>
                            <input type="text" id="cooler" name="cooler" placeholder="Podaj nazwę i rodzaj chłodzenia.."
                                value="<?php if (isset($_SESSION['f_cooler'])) echo $_SESSION['f_cooler'];?>">
                        </div>
                        <div class="formElement">
                            <label for="hardDrive">Dyski</label>
                            <input type="text" id="hardDrive" name="hardDrive" placeholder="Podaj rodzaje i wielkości dysków.."
                                value="<?php if (isset($_SESSION['f_hardDrive'])) echo $_SESSION['f_hardDrive'];?>">
                        </div>
                        <div class="formElement">
                            <label for="powerSupply">Zasilacz</label>
                            <input type="text" id="powerSupply" name="powerSupply" placeholder="Podaj nazwe i rodzaj zasilacza.."
                                value="<?php if (isset($_SESSION['f_powerSupply'])) echo $_SESSION['f_powerSupply'];?>">
                        </div>
                        <div class="formElement">
                            <label for="memory">RAM</label>
                            <input type="text" id="memory" name="memory" placeholder="Podaj nazwe i parametry RAM'u.."
                                value="<?php if (isset($_SESSION['f_memory'])) echo $_SESSION['f_memory'];?>">
                        </div>
                        <div class="formElement">
                            <label for="colour">Układ kolorystyczny</label>
                            <input type="text" id="colour" name="colour" placeholder="Podaj wybraną kolorystykę.."
                                value="<?php if (isset($_SESSION['f_colour'])) echo $_SESSION['f_colour'];?>">
                        </div>
                        <div class="formElement">
                            <label for="leds">LED'y - brak/kolor/RGB</label>
                            <input type="text" id="leds" name="leds" placeholder="Podaj wybrane świecące elementy.."
                                value="<?php if (isset($_SESSION['f_leds'])) echo $_SESSION['f_leds'];?>">
                        </div>

                        <div class="formText">Inne uwagi co do sprzętu:</div>
                        <div class="formElement">
                            <textarea name="otherParts" id="otherParts" placeholder="Podaj wszystkie inne dane podzespołów, które chciałbyś mieć w swoim komputerze..."><?php if (isset($_SESSION['f_otherParts'])) echo $_SESSION['f_otherParts'];?></textarea>
                        </div>
                    </div>

                    <div class="formLine"></div>

                    <!-- <div class="formElement">
                        <label for="transferCode"><i class="fas fa-edit"></i> Kod z przelewu</label>
                        <input type="text" id="transferCode" name="transferCode" placeholder="Podaj 8-znakowy kod..">
                    </div>
                        
                    <div class="formElement">
                        <label for="transferDate"><i class="fas fa-edit"></i> Data przelewu</label>
                        <input type="date" id="transferDate" name="transferDate">
                    </div> -->

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

                    <div class="returnCheck clearfix">
                        <div class="checkboxSECOND">
                            <input type="checkbox" id="checkboxRETURN" name="returnCheck" />
                            <label for="checkboxRETURN"></label>
                        </div>
                        <div class="checkboxText">
                            Rozumiem iż składając zamówienie budowy komputera jest on wykonywany na moje specjalne
                            zamówienie, w związku z czym rezygnuję z prawa do 14-dniowego odstąpienia od umowy <i class="fas fa-edit"></i>
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
            
            <span>
            <br>
            <h3 class="center">Aby zamówić komputer postępuj według poniższych kroków:</h3>
            <div class="firstParagraph">1. Uzupełnij dokładnie poniższy formularz zapytaniowy:</div>
            <div class="secondParagraph">a) Podaj swoje dane personalne i kontaktowe.</div>
            <div class="secondParagraph">b) Podaj budżet który planujesz wydać na swój PC.</div>
            <div class="secondParagraph">c) Napisz do czego będzie służyć Ci komputer, ma to duże znaczenie przy doborze odpowiednich komponentów.</div>
            <div class="secondParagraph">d) Dopisz istotne dla Ciebie informacje, które dotyczyły by zamówienia.</div>
            <div class="secondParagraph">e) Wypisz dokładnie swoje wybrane komponenty, do odpowiadających im rubryk.</div>
            <div class="secondParagraph">f) Zaakceptuj podane we formularzu zgody.</div>
            <div class="secondParagraph">g) Potwierdź re-captche.</div>
            <div class="secondParagraph">h) Kliknij przycisk WYŚLIJ, jeżeli wszystkie dane były poprawne, wyświetli się adnotacja potwierdzająca wysyłkę.</div><br>
            
            <div class="firstParagraph">2. Zapoznaj się z <a href="serviceDelivery.html">formami Dostawy sprzętu</a>, aby w następnych krokach poinformować nas o wybranej opcji.</div><br>

            <div class="firstParagraph">3. Po otrzymaniu wiadomości z danymi przekazanymi w formularzu, w okresie około 2-ch dni zostanie przygotowana wycena i wysłana na podany adres e-mail. Zawiera ona dokładną specyfikacje komputera, oraz możliwy termin realizacji.</div><br>

            <div class="firstParagraph">4. Po otrzymaniu wyceny ze specyfikacją:</div>
            <div class="secondParagraph">a) Jeżeli wszystko jest zgodne z Twoimi oczekiwaniami, akceptujesz jej warunki i wysyłasz do nas zwrotną informację potwierdzającą. Poinformuj nas także o wybranej formie dostawy gotowego sprzętu. </div>
            <div class="secondParagraph">b) W razie chęci dokonania zmian w specyfikacji, skonsultuj je mailowo.</div><br>
            
            <div class="firstParagraph">5. Po akceptacji wyceny ze specyfikacją, wystawiamy Fakturę Pro-Forma. Następnie dokonujesz opłaty kwoty podanej na otrzymanej fakturze. Jak tylko pieniądze pojawią się na naszym koncie firmowym, rozpoczynamy procedurę kompletowania zamówienia.</div><br>

            <div class="firstParagraph">6. Gdy całe zamówienie jest złożone i gotowe do przekazania, informujemy Cię o tym e-mailowo. Równocześnie nastąpi realizacja dostawy zgodnie z wcześniejszymi ustaleniami. Finalna faktura zostanie dołączona do przesyłki.</div><br>

        </div>
    </div>

    <script src="insertLayout.js"></script>
    <script src="script.js"></script>
</body>

</html>