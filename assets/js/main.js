// On load
document.addEventListener("DOMContentLoaded", function () {
  // General - Set/Update variables
  function updateVariables() {
    document.querySelector(':root').style.setProperty('--viewport-height', window.innerHeight + 'px');
    document.querySelector(':root').style.setProperty('--header-height', document.querySelector("#header").offsetHeight + 'px');
  }
  window.addEventListener('resize', function () {
    updateVariables();
  });
  updateVariables();

  // General - Insert quote in the console
  console.log("This theme was made by Thomas Pericoi - https://thomaspericoi.com/");

  // General - Enable ASCII Printer on random
  printRandomAscii();

  // General - Enable OpenDyslexic toggle
  function enableDyslexicMode() {
    document.querySelector(':root').style.setProperty('--body', "OpenDyslexic, sans-serif");
    document.querySelector(':root').style.setProperty('--bold', "OpenDyslexic, sans-serif");
    sessionStorage.setItem("dyslexicMode", true);
    console.log("OpenDyslexic est activé");
  }
  function disableDyslexicMode() {
    document.querySelector(':root').style.setProperty('--body', "Titillium Web, sans-serif");
    document.querySelector(':root').style.setProperty('--bold', "Titillium Web, sans-serif");
    sessionStorage.setItem("dyslexicMode", false);
    console.log("OpenDyslexic est désactivé");
  }
  if (sessionStorage.getItem("dyslexicMode") == "true") {
    enableDyslexicMode();
    document.getElementById("open-dyslexic").checked = true;
  } else {
    disableDyslexicMode();
    document.getElementById("open-dyslexic").checked = false;
  };
  document.getElementById("open-dyslexic").addEventListener('change', function () {
    if (this.checked) {
      enableDyslexicMode();
    } else {
      disableDyslexicMode();
    }
  });

  // General - Elements is in view
  function toggleClassOnScroll(trigger, target) {
    if (trigger && target) {
      var elementTop = trigger.getBoundingClientRect().top;
      if (elementTop > window.innerHeight * 0.15 && elementTop < window.innerHeight * 0.85) {
        target.classList.add("js-inView");
      } else {
        target.classList.remove("js-inView");
      }
    }
  }
  function markAsViewed(trigger, target) {
    if (trigger && target) {
      if (trigger && target) {
        var elementTop = trigger.getBoundingClientRect().top;
        if (elementTop > window.innerHeight * 0.15 && elementTop < window.innerHeight * 0.85) {
          target.classList.add("js-viewed");
        }
      }
    }
  }
  window.addEventListener("scroll", () => {
    document.querySelectorAll(".js-toBeTriggered").forEach(function (item, index) {
      toggleClassOnScroll(item, item);
    });
    document.querySelectorAll("main section").forEach(function (item, index) {
      markAsViewed(item, item);
    });
  });
  document.querySelectorAll(".js-toBeTriggered").forEach(function (item, index) {
    toggleClassOnScroll(item, item);
  });
  document.querySelectorAll("main section").forEach(function (item, index) {
    markAsViewed(item, item);
  });

  // Header - Menu
  document.querySelectorAll("header .menu-header>li>a").forEach(function (item) {
    item.tabIndex = 0;
  });
}); 