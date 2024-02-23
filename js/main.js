/**
 * Main JS file for LHXC
 *
 * @param {*} init
 */
function ready(init) {
  if (document.readyState !== "loading") {
    init();
  } else {
    document.addEventListener("DOMContentLoaded", init);
  }
}

function sidebarSearchActionToggle() {
  const searchForm = document.getElementById("searchForm");
  const searchOptions = document.querySelectorAll("#searchForm label");
  const searchInput = document.getElementById("searchBox1");

  searchOptions.forEach((label) => {
    label.addEventListener("click", () => {
      const actionKey = document
        .querySelector('input[name="SearchSelections"]:checked')
        .getAttribute("data-action-path");
      const actionName = document
        .querySelector('input[name="SearchSelections"]:checked')
        .getAttribute("data-action-name");

      searchInput.setAttribute("name", actionName);
      searchForm.setAttribute("action", actionKey);
    });
  });
}

function mobileNavToggle() {
  const menuToggle = document.getElementsByClassName("menu-toggle")[0];
  const menuWrapper = document.getElementsByClassName("main-nav")[0];
  const navMenu = document.querySelectorAll(".main-nav ul")[0];

  menuToggle.addEventListener("click", function () {
    closeSubMenus();

    if (window.innerWidth <= 768) {
      document.body.classList.toggle("active-mobile-nav");
      menuToggle.classList.toggle("animate");
      menuWrapper.classList.toggle("active");
      navMenu.classList.toggle("active-nav");
    }
  });
}

function navDropDownToggle() {
  const dropdown = document.querySelectorAll('.menu-item-has-children');

  Array.from(dropdown).forEach(function(element) {
    const link = element.querySelector('a');
    link.addEventListener('click', function(e){
      e.preventDefault();
      let openOnClick = e.target.matches(".menu-item-has-children > a") && e.target.parentElement.classList.contains("active-menu");

      for (let item of dropdown) item.classList.toggle("active-menu", false);

      if (!openOnClick && e.target.matches(".menu-item-has-children > a")) {
        e.target.parentElement.classList.toggle("active-menu");
      }
    });
  });

  function navToggle(e){
    e.preventDefault();
    let wasOpen = e.target.matches(".menu-item-has-children a") &&
    e.target.parentElement.classList.contains("active-menu");

    for (let item of dd) item.parentElement.classList.toggle("active-menu", false);

    if (!wasOpen && e.target.matches(".mb-menu a")) {
      e.target.parentElement.classList.toggle("active-menu");
    }
  }
}

function closeSubMenus(){
  for (item of document.getElementsByClassName("active-menu")) {
    item.classList.remove("active-menu");
  }
}

function toTopLink(){
  const scrollTopBtn = document.getElementById("scrolltop");
  const fromTop = 200;

  // When the user scrolls down 200px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > fromTop || document.documentElement.scrollTop > fromTop) {
      scrollTopBtn.classList.add('fade-in');
      scrollTopBtn.style.display = "inline-block";
    } else {
      scrollTopBtn.classList.remove('fade-in');
      scrollTopBtn.style.display = "none";
    }
  }

  scrollTopBtn.addEventListener("click", topFunction);

  function topFunction(event) {
    event.preventDefault();
    window.scrollTo({top: 0, behavior: 'smooth'});
    scrollFunction();
  }
}

function init(){
  sidebarSearchActionToggle();
  mobileNavToggle();
  navDropDownToggle();
  toTopLink();
}

ready(init);