// On load
document.addEventListener("DOMContentLoaded", function () {
  // General - Set/Update variables
  function updateVariables() {
    document
      .querySelector(":root")
      .style.setProperty("--viewport-height", window.innerHeight + "px");
    document
      .querySelector(":root")
      .style.setProperty(
        "--header-height",
        document.querySelector("#header").offsetHeight + "px"
      );
  }
  window.addEventListener("resize", function () {
    updateVariables();
  });
  updateVariables();

  // General - Insert quote in the console
  console.log(
    "This theme was made by Thomas Pericoi - https://thomaspericoi.com/"
  );

  // General - Enable ASCII Printer on random
  printRandomAscii();

  // General - Change tab name on blur
  if (!isMobile()) {
    originalTitle = document.title;

    window.addEventListener("focus", () => {
      document.title = originalTitle;
    });

    window.addEventListener("blur", () => {
      document.title = "🎵🎵🎵";

      setTimeout(function () {
        document.title = originalTitle;
      }, 450);
    });
  }

  // General - Enable OpenDyslexic toggle
  function enableDyslexicMode() {
    document
      .querySelector(":root")
      .style.setProperty("--body", "'OpenDyslexic', sans-serif");
    document
      .querySelector(":root")
      .style.setProperty("--bold", "'OpenDyslexic', sans-serif");
    sessionStorage.setItem("dyslexicMode", true);
    console.log("OpenDyslexic is enabled");
  }
  function disableDyslexicMode() {
    document
      .querySelector(":root")
      .style.setProperty("--body", "'Baloo 2', sans-serif");
    document
      .querySelector(":root")
      .style.setProperty("--bold", "'Baloo 2', sans-serif");
    sessionStorage.setItem("dyslexicMode", false);
    console.log("OpenDyslexic is disabled");
  }
  if (sessionStorage.getItem("dyslexicMode") == "true") {
    enableDyslexicMode();
    document.getElementById("open-dyslexic").checked = true;
  } else {
    disableDyslexicMode();
    document.getElementById("open-dyslexic").checked = false;
  }
  document
    .getElementById("open-dyslexic")
    .addEventListener("change", function () {
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
      var elementBottom = trigger.getBoundingClientRect().bottom;
      if (
        (elementTop > window.innerHeight * 0.1 &&
          elementTop < window.innerHeight * 0.6) ||
        (elementBottom > window.innerHeight * 0.4 &&
          elementBottom < window.innerHeight * 0.9)
      ) {
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
        var elementBottom = trigger.getBoundingClientRect().bottom;
        if (
          (elementTop > window.innerHeight * 0.1 &&
            elementTop < window.innerHeight * 0.6) ||
          (elementBottom > window.innerHeight * 0.4 &&
            elementBottom < window.innerHeight * 0.9)
        ) {
          target.classList.add("js-viewed");
        }
      }
    }
  }
  window.addEventListener("scroll", () => {
    document
      .querySelectorAll(".js-toBeTriggered")
      .forEach(function (item, index) {
        toggleClassOnScroll(item, item);
      });
    document.querySelectorAll("main section").forEach(function (item, index) {
      markAsViewed(item, item);
    });
  });
  document
    .querySelectorAll(".js-toBeTriggered")
    .forEach(function (item, index) {
      toggleClassOnScroll(item, item);
    });
  document.querySelectorAll("main section").forEach(function (item, index) {
    markAsViewed(item, item);
  });

  // Element - Vidéo
  document.querySelectorAll("video").forEach(function (item, index) {
    item.addEventListener("click", function () {
      item.nextElementSibling.style.display = "none";
      item.setAttribute("controls", "");
    });

    item.addEventListener("keydown", (event) => {
      if (event.code === "Enter") {
        item.nextElementSibling.style.display = "none";
        item.setAttribute("controls", "");
      }
    });
  });

  // Header - Menu
  document
    .querySelectorAll("header .menu-header>li>a")
    .forEach(function (item) {
      item.tabIndex = 0;
    });

  document.querySelectorAll(".menu-toggle").forEach(function (item) {
    item.addEventListener("click", function () {
      document.querySelector("body").classList.toggle("js-menuOpened");
      document.querySelector("main").toggleAttribute("inert");
      document
        .querySelector("main")
        .setAttribute(
          "aria-hidden",
          !(document.querySelector("main").getAttribute("aria-hidden") == "true"
            ? true
            : false)
        );
      document.querySelector(".super-menu").toggleAttribute("inert");
      document
        .querySelector(".super-menu")
        .setAttribute(
          "aria-hidden",
          !(document.querySelector(".super-menu").getAttribute("aria-hidden") ==
            "true"
            ? true
            : false)
        );
      document.querySelector("footer").toggleAttribute("inert");
      document
        .querySelector("footer")
        .setAttribute(
          "aria-hidden",
          !(document.querySelector("footer").getAttribute("aria-hidden") ==
            "true"
            ? true
            : false)
        );
    });
  });

  document.querySelectorAll("#menu-toggle").forEach(function (item) {
    item.addEventListener("keydown", (event) => {
      if (event.code === "Enter") {
        item.click();
      }
    });
  });

  // Block - Pricing
  function togglePrice() {
    if (document.querySelector("#price-toggle").getAttribute('data-toggle') === "month") {
      document.querySelector("#price-toggle").setAttribute('data-toggle', 'year');
    } else {
      document.querySelector("#price-toggle").setAttribute('data-toggle', 'month');
    }
  }

  document.querySelector("#price-toggle").addEventListener("click", function () {
    togglePrice();
  });

  // Block - Tabs
  function show_content(index) {
    $(".tabs .content.visible").removeClass("visible");
    $(".tabs .content:nth-of-type(" + (index + 1) + ")").addClass("visible");
    $(".tabs nav a.selected").removeClass("selected");
    $(".tabs nav a:nth-of-type(" + (index + 1) + ")").addClass("selected");
  }
  $(".tabs nav a").on("click", function () {
    show_content($(this).index());
  });
  $(".tabs nav a").on("keypress", function (e) {
    if ((e.keyCode || e.which) == 13) {
      show_content($(this).index());
    }
  });
  show_content(0);
});
