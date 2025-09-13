(function ($) {
  "use strict";
  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    if (scroll < 400) {
      $("#sticky-header").removeClass("sticky");
      $('#back-top').fadeIn(500);
    } else {
      $("#sticky-header").addClass("sticky");
      $('#back-top').fadeIn(500);
    }
  });


  $(document).ready(function () {

    var menu = $('ul#navigation');
    if (menu.length) {
      menu.slicknav({
        prependTo: ".mobile_menu",
        closedSymbol: '+',
        openedSymbol: '-'
      });
    };

    $('.slider_active').owlCarousel({
      loop: true,
      margin: 0,
      items: 1,
      autoplay: true,
      navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
      nav: true,
      dots: false,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      responsive: {
        0: {
          items: 1,
          nav: false,
        },
        767: {
          items: 1,
          nav: false,
        },
        992: {
          items: 1
        }
      }
    });

    $('.about_active').owlCarousel({
      loop: true,
      margin: 0,
      items: 1,
      autoplay: true,
      navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
      nav: true,
      dots: false,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      responsive: {
        0: {
          items: 1,
          nav: false,
        },
        767: {
          items: 1,
          nav: false,
        },
        992: {
          items: 1
        }
      }
    });

    $('.testmonial_active').owlCarousel({
      loop: true,
      margin: 0,
      items: 1,
      autoplay: true,
      navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
      nav: true,
      dots: false,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      responsive: {
        0: {
          items: 1,
          dots: false,
          nav: false,
        },
        767: {
          items: 1,
          dots: false,
          nav: false,
        },
        992: {
          items: 1,
          nav: false
        },
        1200: {
          items: 1,
          nav: false
        },
        1500: {
          items: 1
        }
      }
    });

    var $grid = $('.grid').isotope({
      itemSelector: '.grid-item',
      percentPosition: true,

      masonry: {
        columnWidth: 1,
      },
    });

    $('.portfolio-menu').on('click', 'button', function () {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({ filter: filterValue });
    });

    $('.portfolio-menu button').on('click', function (event) {
      $(this).siblings('.active').removeClass('active');
      $(this).addClass('active');
      event.preventDefault();
    });

    new WOW().init();

    $('.counter').counterUp({
      delay: 10,
      time: 10000
    });

    $('.popup-image').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });

    $('.img-pop-up').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });

    $('.popup-video').magnificPopup({
      type: 'iframe'
    });


    $.scrollIt({
      upKey: 38,
      downKey: 40,
      easing: 'linear',
      scrollTime: 600,
      activeClass: 'active',
      onPageChange: null,
      topOffset: 0
    });

    $.scrollUp({
      scrollName: 'scrollUp',
      topDistance: '4500',
      topSpeed: 300,
      animation: 'fade',
      animationInSpeed: 200,
      animationOutSpeed: 200,
      scrollText: '<i class="fa fa-angle-double-up"></i>',
      activeOverlay: false,
    });


    $('.brand-active').owlCarousel({
      loop: true,
      margin: 30,
      items: 1,
      autoplay: true,
      nav: false,
      dots: false,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      responsive: {
        0: {
          items: 1,
          nav: false

        },
        767: {
          items: 4
        },
        992: {
          items: 7
        }
      }
    });

    $('.project-active').owlCarousel({
      loop: true,
      margin: 30,
      items: 1,
      navText: ['<i class="Flaticon flaticon-left-arrow"></i>', '<i class="Flaticon flaticon-right-arrow"></i>'],
      nav: true,
      dots: false,
      responsive: {
        0: {
          items: 1,
          nav: false

        },
        767: {
          items: 1,
          nav: false
        },
        992: {
          items: 2,
          nav: false
        },
        1200: {
          items: 1,
        },
        1501: {
          items: 2,
        }
      }
    });

    if (document.getElementById('default-select')) {
      $('select').niceSelect();
    }

    $('.details_active').owlCarousel({
      loop: true,
      margin: 0,
      items: 1,
      navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
      nav: true,
      dots: false,
      responsive: {
        0: {
          items: 1,
          nav: false

        },
        767: {
          items: 1,
          nav: false
        },
        992: {
          items: 1,
          nav: false
        },
        1200: {
          items: 1,
        }
      }
    });

  });

  $(document).ready(function () {
    $('.popup-with-form').magnificPopup({
      type: 'inline',
      preloader: false,
      focus: '#name',

      callbacks: {
        beforeOpen: function () {
          if ($(window).width() < 700) {
            this.st.focus = false;
          } else {
            this.st.focus = '#name';
          }
        }
      }
    });
  });

  function mailChimp() {
    $('#mc_embed_signup').find('form').ajaxChimp();
  }
  mailChimp();



  $("#search_input_box").hide();
  $("#search").on("click", function () {
    $("#search_input_box").slideToggle();
    $("#search_input").focus();
  });
  $("#close_search").on("click", function () {
    $('#search_input_box').slideUp(500);
  });
  $("#search_input_box").hide();
  $("#search_1").on("click", function () {
    $("#search_input_box").slideToggle();
    $("#search_input").focus();
  });

})(jQuery);


const orderNowButton1 = document.getElementById('orderNowButton1');
const orderNowButton2 = document.getElementById('orderNowButton2');
const closeButton = document.getElementById('closeButton');
const modal = document.getElementById('modal');

function openModal() {
  modal.style.display = 'block';
}

if (orderNowButton1) {
    orderNowButton1.onclick = function (event) {
        event.preventDefault();
        openModal();
    }
}

if(orderNowButton2) {
    orderNowButton2.onclick = function (event) {
        event.preventDefault();
        openModal();
    }
}

if(closeButton) {
    closeButton.onclick = function () {
        modal.style.display = 'none';
    }
}


window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
    
    if (event.target === document.getElementById('promoModal')) {
        document.getElementById('promoModal').style.display = 'none';
    }

    var promodal = document.getElementById("promodal");
    if (event.target == promodal) {
        promodal.style.display = "none";
        if (document.fullscreenElement) {
            document.exitFullscreen();
        }
    }
}

if(document.getElementById('orderForm')){
    document.getElementById('orderForm').onsubmit = function (event) {
        event.preventDefault();
        alert('Ваш заказ принят!');
        modal.style.display = 'none';
    }
}


setTimeout(function () {
    if(document.getElementById('promoModal')){
        document.getElementById('promoModal').style.display = 'block';
    }
}, 10000); // 10 seconds

if(document.getElementById('closeModal')){
    document.getElementById('closeModal').onclick = function () {
        document.getElementById('promoModal').style.display = 'none';
    }
}


document.addEventListener('DOMContentLoaded', function () {
  const messages = document.querySelectorAll('.text-message');
  if (messages.length > 0) {
    let index = 0;
    setInterval(() => {
        messages[index].style.display = 'none';
        index = (index + 1) % messages.length;
        messages[index].style.display = 'block';
    }, 10000); // 10 seconds
  }
});
let slideIndex = 0;

const regionDisplay = document.getElementById('region');
const phoneInput = document.getElementById('phone');
const flagImage = document.getElementById('flag');
const regions = {
  '+993': { name: 'Туркменистан', flag: 'https://flagcdn.com/w320/tm.png' },
  '+971': { name: 'Объединённые Арабские Эмираты', flag: 'https://flagcdn.com/w320/ae.png' },
  '+994': { name: 'Азербайджан', flag: 'https://flagcdn.com/w320/az.png' },
  '+98': { name: 'Иран', flag: 'https://flagcdn.com/w320/ir.png' },
  '+998': { name: 'Узбекистан', flag: 'https://flagcdn.com/w320/uz.png' },
  '+995': { name: 'Грузия', flag: 'https://flagcdn.com/w320/ge.png' },
  '+7': { name: 'Россия', flag: 'https://flagcdn.com/w320/ru.png' },
  '+62': { name: 'Индонезия', flag: 'https://flagcdn.com/w320/id.png' },
  '+880': { name: 'Бангладеш', flag: 'https://flagcdn.com/w320/bd.png' },
  '+91': { name: 'Индия', flag: 'https://flagcdn.com/w320/in.png' },
  '+63': { name: 'Филиппины', flag: 'https://flagcdn.com/w320/ph.png' },
  '+64': { name: 'Новая Зеландия', flag: 'https://flagcdn.com/w320/nz.png' },
  '+1': { name: 'США', flag: 'https://flagcdn.com/w320/us.png' },
  '+380': { name: 'Украина', flag: 'https://flagcdn.com/w320/ua.png' },
  '+33': { name: 'Франция', flag: 'https://flagcdn.com/w320/fr.png' },
  '+997': { name: 'Казахстан', flag: 'https://flagcdn.com/w320/kz.png' },
  '+964': { name: 'Ирак', flag: 'https://flagcdn.com/w320/iq.png' },
  '+49': { name: 'Германия', flag: 'https://flagcdn.com/w320/de.png' },
  '+44': { name: 'Великобритания', flag: 'https://flagcdn.com/w320/gb.png' },
  '+39': { name: 'Италия', flag: 'https://flagcdn.com/w320/it.png' },
  '+996': { name: 'Кыргызстан', flag: 'https://flagcdn.com/w320/kg.png' },
  '+34': { name: 'Испания', flag: 'https://flagcdn.com/w320/es.png' },
  '+86': { name: 'Китай', flag: 'https://flagcdn.com/w320/cn.png' },
  '+81': { name: 'Япония', flag: 'https://flagcdn.com/w320/jp.png' },
  '+61': { name: 'Австралия', flag: 'https://flagcdn.com/w320/au.png' },
  '+82': { name: 'Южная Корея', flag: 'https://flagcdn.com/w320/kr.png' },
  '+1': { name: 'Канада', flag: 'https://flagcdn.com/w320/ca.png' },
  '+351': { name: 'Португалия', flag: 'https://flagcdn.com/w320/pt.png' },
  '+966': { name: 'Саудовская Аравия', flag: 'https://flagcdn.com/w320/sa.png' },
  '+46': { name: 'Швеция', flag: 'https://flagcdn.com/w320/se.png' },
  '+41': { name: 'Швейцария', flag: 'https://flagcdn.com/w320/ch.png' },
  '+46': { name: 'Норвегия', flag: 'https://flagcdn.com/w320/no.png' },
  '+30': { name: 'Греция', flag: 'https://flagcdn.com/w320/gr.png' },
  '+351': { name: 'Бразилия', flag: 'https://flagcdn.com/w320/br.png' },
  '+32': { name: 'Бельгия', flag: 'https://flagcdn.com/w320/be.png' },
  '+90': { name: 'Турция', flag: 'https://flagcdn.com/w320/tr.png' },
  '+55': { name: 'Бразилия', flag: 'https://flagcdn.com/w320/br.png' },
  '+47': { name: 'Норвегия', flag: 'https://flagcdn.com/w320/no.png' },
  '+45': { name: 'Дания', flag: 'https://flagcdn.com/w320/dk.png' },
  '+353': { name: 'Ирландия', flag: 'https://flagcdn.com/w320/ie.png' },
  '+56': { name: 'Чили', flag: 'https://flagcdn.com/w320/cl.png' },
  '+60': { name: 'Малайзия', flag: 'https://flagcdn.com/w320/my.png' }
};

if(phoneInput){
    phoneInput.addEventListener('input', () => {
        const inputValue = phoneInput.value;
        const countryCode = inputValue.match(/^\+[\d]+/);

        if (countryCode && regions[countryCode[0]]) {
            const regionInfo = regions[countryCode[0]];
            flagImage.src = regionInfo.flag;
            flagImage.style.display = 'inline';
            regionDisplay.children[1].textContent = `Регион: ${regionInfo.name}`;
        } else {
            flagImage.style.display = 'none';
            regionDisplay.children[1].textContent = 'Регион: не найден!';
        }
    });
}


var promodal = document.getElementById("promodal");
if (promodal) {
    var span = promodal.getElementsByClassName("close")[0];
    var video = document.getElementById("adVideo");

    setTimeout(function () {
        promodal.style.display = "block";
        if (video.requestFullscreen) {
            video.requestFullscreen();
        } else if (video.mozRequestFullScreen) {
            video.mozRequestFullScreen();
        } else if (video.webkitRequestFullscreen) {
            video.webkitRequestFullscreen();
        } else if (video.msRequestFullscreen) {
            video.msRequestFullscreen();
        }
        video.play();
    }, 19000); // 19 секунд

    span.onclick = function () {
        promodal.style.display = "none";
        if (document.fullscreenElement) {
            document.exitFullscreen();
        }
    }

    video.onended = function () {
        promodal.style.display = "none";
        if (document.fullscreenElement) {
            document.exitFullscreen();
        }
    }
}