const youtubebutton = document.querySelector("#menuYT");
const buildsbutton = document.querySelector("#menuBuilds");
const servicebutton = document.querySelector("#menuServices");
const contactbutton = document.querySelector("#menuContact");
const mainmenu = document.querySelector(".mainmenu");
const addmenu = document.querySelector(".addmenu");
const buildsmenu = document.querySelector(".buildsmenu");
const servicemenu = document.querySelector(".servicemenu");


let flag = 0;
let timerflag = 0;
[buildsbutton, servicebutton, buildsmenu, servicemenu].forEach(function (id) {
  id.addEventListener("mouseover", function () {
    if (flag == 0) {
      flag = 1;
      showMenu(addmenu, 0, 45, "top");
    }
    if (timerflag == 1) {
      clearTimeout(timer);
    }
  });

  id.addEventListener("mouseout", function () {
    timerflag = 1;
    timer = setTimeout(function () {
      if (flag == 1) {
        hideMenu(addmenu, 45, 0, "top");
        flag = 0;
      }
    }, 1000);
  });
});

buildsbutton.addEventListener("mouseover", function () {
  buildsmenu.style.display = "flex";
  servicemenu.style.display = "none";
});

servicebutton.addEventListener("mouseover", function () {
  buildsmenu.style.display = "none";
  servicemenu.style.display = "flex";
});

[youtubebutton, contactbutton].forEach(function (id) {
  id.addEventListener("mouseover", function () {
    if (flag == 1) {
      hideMenu(addmenu, 45, 0, "top");
      flag = 0;
    }
  });
});

function showMenu(id, posStart, posFinal, borderAction, speed = 1) {
  var pos = posStart;
  var showInterval = setInterval(frame, 5);

  function frame() {
    if (pos == posFinal) {
      clearInterval(showInterval);
    } else {
      pos += speed;
      if (borderAction == "top")
        id.style.top = pos + "px";
      else if (borderAction == "left")
        id.style.left = pos + "px";
    }
  }
}

function hideMenu(id, posStart, posFinal, borderAction, speed = 1) {
  var pos = posStart;
  var hideInterval = setInterval(frame, 5);

  function frame() {
    if (pos == posFinal) {
      clearInterval(hideInterval);
    } else {
      pos -= speed;
      if (borderAction == "top")
        id.style.top = pos + "px";
      else if (borderAction == "left")
        id.style.left = pos + "px";
    }
  }
}

// OBSŁUGA BOCZNEGO MENU

const hamburger = document.querySelector(".hamburger");
const sidemenu = document.querySelector(".sidemenu");
const close = document.querySelector("#close");
const up = document.querySelector("#up");
mainBottomPosition = mainmenu.getBoundingClientRect().bottom + window.scrollY;


var hamburgerFlag = 0;
var hamburgerClickFlag = 0;
var sideFlag = 0;

setInterval(function () {
  if (window.pageYOffset > mainBottomPosition) {
    if (hamburgerFlag == 0 && hamburgerClickFlag == 0) {
      showMenu(hamburger, -50, 30, "left", 2);
      hamburgerFlag = 1;
    }

  } else {
    hamburgerClickFlag = 0;
    if (hamburgerFlag == 1) {
      hideMenu(hamburger, 30, -50, "left", 5);
      hamburgerFlag = 0;
    }
    if (sideFlag == 1) {
      hideMenu(sidemenu, 0, -250, "left", 10);
      sideFlag = 0;
    }
  }
}, 100);

hamburger.addEventListener("click", function () {
  if (sideFlag == 0) {
    showMenu(sidemenu, -250, 0, "left", 10);
    sideFlag = 1;
  }
  if (hamburgerFlag == 1) {
    hideMenu(hamburger, 30, -50, "left", 5);
    hamburgerFlag = 0;
    hamburgerClickFlag = 1;
  }
})

close.addEventListener("click", function () {
  if (sideFlag == 1) {
    hideMenu(sidemenu, 0, -250, "left", 10);
    sideFlag = 0;
  }
  if (hamburgerFlag == 0) {
    showMenu(hamburger, -50, 30, "left", 2);
    hamburgerFlag = 1;
    hamburgerClickFlag == 0
  }
})

up.addEventListener("click", function () {
  if (sideFlag == 1) {
    hideMenu(sidemenu, 0, -250, "left", 10);
    sideFlag = 0;
  }
  if (hamburgerFlag == 1) {
    hideMenu(hamburger, 30, -50, "left", 5);
    hamburgerFlag = 0;
    hamburgerClickFlag = 0;
  }

  // window.scrollTo({ top: 0, behavior: 'smooth' });

  smoothscroll();

})

function smoothscroll() {
  var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
  if (currentScroll > 0) {
    window.requestAnimationFrame(smoothscroll);
    window.scrollTo(0, currentScroll - (currentScroll / 10));
  }
};


// SKRYPT DO FORMULARZA
// const checkboxComponents = document.querySelector(".checkboxComponents label");
// const showComponents = document.querySelector(".showComponents");

// if (checkboxComponents !== null) {
//   checkboxComponents.addEventListener("click", function () {
//     showComponents.classList.toggle("addDisplay");
//   });
// }