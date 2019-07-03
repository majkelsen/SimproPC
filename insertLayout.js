// TUTAJ UMIESZCZONY LAYOUT STRONY:
pageLayout = `<div class="container">
<div class="top"><img src="img/baner.png"></div>
<div class="menu">
  <div class="mainmenu">
    <p id="menuYT"><a href="nasz-profil">Nasz profil</a></p>
    <p id="menuBuilds"><a href="zamow-pc">Zamów PC</a></p>
    <p id="menuServices"><a href="uslugi">Usługi</a></p>
    <p id="menuContact"><a href="kontakt">Kontakt</a></p>
  </div>
  <div class="addmenu">
    <div class="buildsmenu">
      <p id="compBase"><a href="zamow-komputer-bazowy">Komputer bazowy</a></p>
      <p id="compCustom"><a href="zamow-komputer-z-chlodzeniem-ciecza">Komputer modyfikowany</a></p>
      <p id="compLiquid"><a href="zamow-chlodzenie-ciecza">Chłodzenie cieczą</a></p>
    </div>
    <div class="servicemenu">
      <p id="serviceDelivery"><a href="dostawa-zamowien">Dostawa</a></p>
    </div>
  </div>
</div>
<div class="content">
  
</div>

<div class="hamburger">
  <i class="fas fa-list"></i>
</div>
<div class="sidemenu">
  <div class="sidelist"></div>
  <p id="close"> <i class="fas fa-angle-double-left"></i></p>
  <p class="sidemain" id="menuYT"><a href="nasz-profil">Nasz profil</a></p>
  <p class="sidemain" id="menuBuilds"><a href="zamow-pc">Zamów PC</a></p>
  <p class="sidesecond" id="compBase"><a href="zamow-komputer-bazowy">Komputer bazowy</a></p>
  <p class="sidesecond" id="compCustom"><a href="zamow-komputer-z-chlodzeniem-ciecza">Komputer modyfikowany</a></p>
  <p class="sidesecond" id="compLiquid"><a href="zamow-chlodzenie-ciecza">Chłodzenie cieczą</a></p>
  <p class="sidemain" id="menuServices"><a href="uslugi">Usługi</a></p>
  <p class="sidesecond" id="serviceDelivery"><a href="dostawa-zamowien">Dostawa</a></p>
  <p class="sidemain" id="menuContact"><a href="kontakt">Kontakt</a></p>
  <p id="up"><i class="fas fa-level-up-alt"></i></p>
</div>

<div class="footer">Created by SIMPRO © 2019</div>`

// POBIERAMY DOCELOWY KONTENT
const finalContent = document.querySelector(".content");

// CZYŚCIMY CAŁĄ STRONE
document.body.innerHTML = pageLayout;

// WSTAWIAMY LAYOUT STRONY
const emptyContent = document.querySelector(".content");

// WSTAWIAMY DOCELOWY KONTENT
emptyContent.innerHTML = finalContent.innerHTML;

// UKAZUJEMY BODY
document.body.style.display = "block";