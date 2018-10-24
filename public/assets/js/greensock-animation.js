/*jshint esversion: 6 */

// introduction page menu rolldown
$(".arrow--down").on("click", function () {

  TweenMax.to(".arrow--down", 0.75, {
      y: -100,
      opacity: 0
  });

  TweenMax.to(".title", 1.4, {
      y: -400,
      opacity: 0,
      ease: Power2.easeInOut,
      delay: 0.7
  });

  TweenMax.from(".overlay--1", 1.4, {
      ease: Power2.easeInOut
  });

  TweenMax.to(".overlay--1", 1.4, {
      delay: 1,
      top: "-110%",
      ease: Expo.easeInOut
  });

  TweenMax.to(".overlay--2", 1.4, {
      delay: 1.4,
      top: "-110%",
      ease: Expo.easeInOut
  });

  TweenMax.from("nav", 1.4, {
      delay: 1.4,
      opacity: 0,
      ease: Power2.easeInOut
  });

  TweenMax.to("nav", 1.4, {
      opacity: 1,
      delay: 1.4,
      ease: Power2.easeInOut
  });
});

// menu animation

var t1 = new TimelineMax({paused: true});

t1.to(".nav__toggle .one", 0.4, {
     y: 6,
     rotation: 45,
     ease: Expo.easeInOut
});
t1.to(".nav__toggle .two", 0.4, {
     y: -6,
     rotation: -45,
     ease: Expo.easeInOut,
     delay: -0.4
});

t1.to(".nav--absolute", 0.6, {
     top: "0",
     ease: Expo.easeInOut,
     delay: -0.4
});

t1.staggerFrom(".nav--absolute ul li", 0.8, {x: -200, opacity: 0, ease:Expo.easeOut}, 0.15);

t1.reverse();
$(document).on("click", ".nav__toggle, .nav--absolute", function() {
     t1.reversed(!t1.reversed());
});
