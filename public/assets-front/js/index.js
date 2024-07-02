$(document).ready(() => {
  $(window).scroll(function () {
    let windowScroll = $(window).scrollTop();
    if (windowScroll > 130) {
      $("#backTop").fadeIn(500).css("display", "flex");
    } else {
      $("#backTop").fadeOut(500);
    }
  });
  $("#backTop").click(function () {
    $("html,body").animate({ scrollTop: 0 }, 300);
  });
});


const CreateAccountButtonMain = document.getElementById('RegisterPageMain');

CreateAccountButtonMain.addEventListener("click", function (e) {
  localStorage.setItem("Register", "Register");
  // window.location.replace("Login.html");
});

document.addEventListener("DOMContentLoaded", function () {
  const dropdownLanguage = document.querySelectorAll(".LanguageMenu .lan");
  dropdownLanguage.forEach((item) => {
    item.addEventListener("click", function () {
      const selectedOption = item.textContent.trim();
      localStorage.setItem("Language", selectedOption);
      window.location.reload();
    });
  });
});

// function CheckLanguage(){
//   const Language = localStorage.getItem('Language');
//   if (Language == "English") {
//     document.body.style.direction = "ltr";
//     document.body.classList.remove("arabicVersion");

//   }
//   else if(Language == "العربية"){
//     document.body.style.direction = "rtl";
//     const Language = document.getElementById('LanguageText');
//     Language.textContent = "English" ;
// document.body.classList.add("arabicVersion");

//   }
// }
