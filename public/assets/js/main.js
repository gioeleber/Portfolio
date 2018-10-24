/*jshint esversion: 6 */

// pseudo element dupicate content from the parent element
let text = $(".title--background").text();

$('<style>.title--background::before{content:"'+text+'"}</style>').appendTo('.title--background');

// navigator: hide on scroll

let prevSrollPos = window.pageYOffset;
window.onscroll = function() {
  let currenScrollpos = window.pageYOffset;
  let barTop = document.getElementsByClassName("bar--top");
  let navToggle = document.getElementsByClassName("nav__toggle");
  if(prevSrollPos > currenScrollpos) {
    barTop[0].style.top = "0";
    navToggle[0].style.top = "0";
  } else {
    barTop[0].style.top = "-3rem";
    navToggle[0].style.top = "-3rem";
  }
  prevSrollPos = currenScrollpos;
};


// form validation - jQuery validation
$("form").validate();

jQuery.extend(jQuery.validator.messages, {
	required: "Campo obbligatorio",
	email: "Inserisci un indirizzo email valido",
	maxlength: $.validator.format( "Non inserire pi&ugrave; di {0} caratteri" ),
	minlength: $.validator.format( "Inserisci almeno {0} caratteri" ),
	rangelength: $.validator.format( "Inserisci un valore compreso tra {0} e {1} caratteri" ),
});

// AJAX form validation
$("form").submit(function(e) {
  e.preventDefault();
  let email = $("#email").val();
  let message = $("#message").val();
  $(".form-message").load("/assets/inc/phpmailer.php",
  {
    email: email,
    message: message
  },
  // anonymous callback function
  function () {
    // clear error message on the click of any input
    $("form input, form textarea").on("click",function() {
      $(".form-message").html("");
    });

    // AJAX form validation
    $("form").submit(function(e) {
      e.preventDefault();
      let email = $("#email").val();
      let message = $("#message").val();
      $(".form-message").load("/assets/inc/phpmailer.php",
      {
        email: email,
        message: message
      },
      // anonymous callback function
      function () {
        // clear error message on the click of any input
        $("form input, form textarea").on("click",function() {
          $(".form-message").html("");
        });
      });
    });
  });
});

// arrow item collapse
$(document).ready(function(){
  $('div').filter(function() {
    if ($(this).hasClass("front-end") || $(this).hasClass("back-end") || $(this).hasClass("marketing")|| $(this).hasClass("other") || $(this).hasClass("item__text")) {
      return $(this);
    }
  }).slideToggle(500);
});


$('.arrow--white, .arrow').on('click', function() {
  // find out the class of the section
  let section_title = $(this).parent().attr('class');
  // toggle the filtered section
  $('div').filter(function() {
    return $(this).hasClass(section_title);
  }).slideToggle(500);
});
