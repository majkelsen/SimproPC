<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SimproPC - zamów chłodzenie cieczą</title>
    <link rel="shortcut icon" href="img/pageIcon.png">
    <link rel="stylesheet" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Jockey+One|Viga&amp;subset=latin-ext" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <script src="//www.google.com/recaptcha/api.js"></script>
</head>

<body>
    <div class="content">
        <div class="compLiquid">
            <h1>złóż zapytanie na wycenę chłodzenia cieczą</h1>
            <h4 class="center">Dokładne instrukcje uzupełnienia formularza, znajdują się zaraz pod nim.</h4>
            <div class="formBuilds Base">
                <form class="myform" method="POST" action="emailLiquid.php">

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
                        <input type="text" id="budget" name="budget" placeholder="Podaj przewidywaną kwotę.." value="<?php if (isset($_SESSION['f_budget'])) echo $_SESSION['f_budget'];?>">
                    </div>
                    
                    <div class="showComponents addDisplay">
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
                            <label for="colour">Kolorystyka</label>
                            <input type="text" id="colour" name="colour" placeholder="Podaj wybraną kolorystykę.."
                                value="<?php if (isset($_SESSION['f_colour'])) echo $_SESSION['f_colour'];?>">
                        </div>

                        <div class="formText">Inne uwagi co do sprzętu:</div>
                        <div class="formElement">
                            <textarea name="otherParts" id="otherParts" placeholder="Podaj wszystkie inne dane podzespołów, które chciałbyś mieć w swoim komputerze..."><?php if (isset($_SESSION['f_otherParts'])) echo $_SESSION['f_otherParts'];?></textarea>
                        </div>
                    </div>

                    <div class="formLine"></div>
                    <div class="formText"><i class="fas fa-edit"></i>Które podzespoły chciałbyś, aby były chłodzone cieczą:</div>
                    <div class="coolingContainer">
                        <div class="coolingOption">    
                            <div class="checkboxSECOND">
                                <input type="checkbox" id="coolingProcessor" name="coolingProcessor" value="procesor" <?php 
                                if (isset($_SESSION['f_coolingProcessor'])){
                                    if (($_SESSION['f_coolingProcessor'])=="procesor") echo "checked";}?>>/>                                    
                                <label for="coolingProcessor"></label>
                            </div>
                            <div class="optionText">PROCESOR</div>
                        </div>
                        
                        <div class="coolingOption"> 
                            <div class="checkboxSECOND">
                                <input type="checkbox" id="coolingGraphics" name="coolingGraphics" value="karta graficzna" <?php 
                                if (isset($_SESSION['f_coolingGraphics'])){
                                    if (($_SESSION['f_coolingGraphics'])=="karta graficzna") echo "checked";}?>>/>                
                                <label for="coolingGraphics"></label>
                            </div>
                            <div class="optionText">KARTA GRAFICZNA</div>
                        </div>

                        <div class="coolingOption"> 
                            <div class="checkboxSECOND">
                                <input type="checkbox" id="coolingRAM" name="coolingRAM" value="RAM" <?php 
                                if (isset($_SESSION['f_coolingRAM'])){
                                    if (($_SESSION['f_coolingRAM'])=="RAM") echo "checked";}?>>/>
                                <label for="coolingRAM"></label>
                            </div>
                            <div class="optionText">RAM</div>
                        </div>

                        <div class="coolingOption"> 
                            <div class="checkboxSECOND">
                                <input type="checkbox" id="coolingPowerSection" name="coolingPowerSection" value="sekcja zasilania" <?php 
                                if (isset($_SESSION['f_coolingPowerSection'])){
                                    if (($_SESSION['f_coolingPowerSection'])=="sekcja zasilania") echo "checked";}?>>/>                
                                <label for="coolingPowerSection"></label>
                            </div>
                            <div class="optionText">SEKCJA ZASILANIA</div>
                        </div>
                    </div>

                    <div class="formText">Rodzaj rurek łączących:</div>
                    <div class="tubingContainer">
                        
                        <div class="coolingOption">
                            <div class="checkboxRADIO">
                                <input type="radio" name="tubing" id="soft" value="soft" 
                                <?php 
                                if (isset($_SESSION['f_tubing'])){
                                    if (($_SESSION['f_tubing'])=="soft") echo "checked";
                                }else echo "checked";?> />
                                <label for="soft"></label>
                            </div>
                            <div class="optionText">MIĘKKIE</div>  
                        </div>    
                        
                        <div class="coolingOption">
                            <div class="checkboxRADIO">
                                <input type="radio" name="tubing" id="hard" value="hard" <?php 
                                if (isset($_SESSION['f_tubing'])){
                                    if (($_SESSION['f_tubing'])=="hard") echo "checked";
                                }?> />
                                <label for="hard">
                            </div>
                            <div class="optionText">SZTYWNE</div>              
                        </div> 
                    </div>

                    <div class="formText">Wariant cenowy układu chłodzenia:</div>
                    <div class="pricingContainer">
                        
                        <div class="coolingOption">
                            <div class="checkboxRADIO">
                                <input type="radio" name="pricing" id="basic" value="basic" 
                                <?php 
                                if (isset($_SESSION['f_pricing'])){
                                    if (($_SESSION['f_pricing'])=="basic") echo "checked";
                                }else echo "checked";?>/>
                                <label for="basic"></label>
                            </div>
                            <div class="optionText">PODSTAWOWY</div>  
                        </div>    
                        
                        <div class="coolingOption">
                            <div class="checkboxRADIO">
                                <input type="radio" name="pricing" id="high" value="high" <?php 
                                if (isset($_SESSION['f_pricing'])){
                                    if (($_SESSION['f_pricing'])=="high") echo "checked";
                                }?>/>
                                <label for="high">
                            </div>
                            <div class="optionText">WYŻSZY</div>              
                        </div> 

                        <div class="coolingOption">
                            <div class="checkboxRADIO">
                                <input type="radio" name="pricing" id="premium" value="premium" <?php 
                                if (isset($_SESSION['f_pricing'])){
                                    if (($_SESSION['f_pricing'])=="premium") echo "checked";
                                }?>/>
                                <label for="premium">
                            </div>
                            <div class="optionText">PREMIUM</div>              
                        </div> 
                    </div>
                    
                    <div class="formElement">
                            <label for="fluidColor">Kolor cieczy:</label>
                            <input type="text" id="fluidColor" name="fluidColor" placeholder="Podaj wybraną kolorystykę.."
                                value="<?php if (isset($_SESSION['f_fluidColor'])) echo $_SESSION['f_fluidColor'];?>">
                    </div>

                    <div class="formElement">
                            <label for="cableMod">Modyfikacja kabli:</label>
                            <input type="text" id="cableMod" name="cableMod" placeholder="Czy chcesz zmodyfikowane kable, jakie?.."
                                value="<?php if (isset($_SESSION['f_cableMod'])) echo $_SESSION['f_cableMod'];?>">
                    </div>

                    <div class="formText">Uwagi odnośnie chłodzenia cieczą: </div>
                    <div class="formElement">
                        <textarea name="coolingMessage" id="coolingMessage" placeholder="Podaj wszystkie inne informaje, które będą miały znaczenie przy dobieraniu chłodzenia cieczą..."><?php if (isset($_SESSION['f_coolingMessage'])) echo $_SESSION['f_coolingMessage'];?></textarea>
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
                            <a target="_blank" href="RODO" style="display: inline; text-decoration: underline">zgodnie z polityką RODO</a>
                            <i class="fas fa-edit"></i>
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
            <h3 class="center">Aby zamówić chłodzenie cieczą postępuj według poniższych kroków:</h3>
            <div class="firstParagraph">1. Uzupełnij dokładnie poniższy formularz:</div>
            <div class="secondParagraph">a) Podaj swoje dane personalne i kontaktowe.</div>
            <div class="secondParagraph">b) Podaj budżet który planujesz wydać na swoje chłodzenie cieczą.</div>
            <div class="secondParagraph">c) Podaj dokładną specyfikację swojego komputera.</div>
            <div class="secondParagraph">d) Wybierz konkretne podzespoły, które chciałbyś zmodyfikować na chłodzenie cieczą.</div>
            <div class="secondParagraph">e) Wybierz rodzaj rurek którymi łączone będą elementy układu chłodzenia cieczą.</div>
            <div class="secondParagraph">f) Wybierz wariant cenowy układu chłodzenia cieczą.</div>
            <div class="secondParagraph">g) Opcjonalnie podaj wybrany kolor cieczy, modyfikacje kabli oraz dodatkowe uwagi odnośnie układu chłodzenia cieczą.</div>
            <div class="secondParagraph">h) Zaakceptuj podane we formularzu zgody.</div>
            <div class="secondParagraph">i) Potwierdź re-captche.</div>
            <div class="secondParagraph">j) Kliknij przycisk WYŚLIJ, jeżeli wszystkie dane były poprawne, wyświetli się adnotacja potwierdzająca wysyłkę.</div><br>
            
            <div class="firstParagraph">2. Zapoznaj się z <a href="serviceDelivery.html">formami Dostawy sprzętu</a>, aby w następnych krokach poinformować nas o wybranej opcji.</div><br>

            <div class="firstParagraph">3. Po otrzymaniu wiadomości z danymi przekazanymi w formularzu, w okresie około 2-ch dni zostanie przygotowana wycena i wysłana na podany adres e-mail. Zawiera ona dokładną specyfikacje chłodzenia cieczą, oraz możliwy termin realizacji.</div><br>

            <div class="firstParagraph">4. Po otrzymaniu wyceny ze specyfikacją:</div>
            <div class="secondParagraph">a) Jeżeli wszystko jest zgodne z Twoimi oczekiwaniami, akceptujesz jej warunki i wysyłasz do nas zwrotną informację potwierdzającą. Poinformuj nas także o wybranej formie dostawy gotowego sprzętu. </div>
            <div class="secondParagraph">b) W razie chęci dokonania zmian w specyfikacji, skonsultuj je mailowo.</div><br>
            
            <div class="firstParagraph">5. Po akceptacji wyceny ze specyfikacją, wystawiamy Fakturę Pro-Forma. Następnie dokonujesz opłaty kwoty podanej na otrzymanej fakturze. Jak tylko pieniądze pojawią się na naszym koncie firmowym, rozpoczynamy procedurę kompletowania zamówienia.</div><br>

            <div class="firstParagraph">6. Dostarczasz do nas swój sprzęt w dowolny sposób. Przynosisz go osobiście, lub wysyłasz go kurierem. Pamiętaj jednak aby był on odpowiednio zabezpieczony, a także wykonaj dodatkowe zdjęcia całego sprzętu zaraz przed zapakowaniem do wysyłki. Jak tylko otrzymamy sprzęt spisujemy dokładny protokół zgodności i przeprowadzamy testy jego funcjonowania.</div><br>

            <div class="firstParagraph">7. Zgodnie z ustaleniamy modyfikujemy sprzęt, a na koniec wykonujemy 24 godzinne testy szczelności i stabilności całego układu. Następnie ciecz jest wypompowywana z układu i napełniana ponownie do butelek które zostaną wysłane z całym sprzętem. Instrukcje finalnego napełnienia układu zostaną załączone do przesyłki.</div><br>

            <div class="firstParagraph">7. Gdy wszystkie modyfikacje są wykonane, testy wypadły pozytywnie, a sprzęt jest gotowy do przekazania, informujemy Cię o tym e-mailowo. Równocześnie nastąpi realizacja dostawy zgodnie z wcześniejszymi ustaleniami. Finalna faktura zostanie dołączona do przesyłki.</div><br>

            </span>

        </div>
    </div>

    <script src="insertLayout.js"></script>
    <script src="script.js"></script>
</body>

</html>