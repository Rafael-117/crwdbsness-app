(function ($) {
  "use strict";

  // Spinner

  var spinner = function () {
    setTimeout(function () {
      if ($("#spinner").length > 0) {
        $("#spinner").removeClass("show");
      }

    }, 3000);
  };
  document.onload = spinner();

  // Initiate the wowjs
  new WOW().init();

  // Navbar on scrolling
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".navbar").fadeIn("slow").css("background", "#fff");
      $(".navbar").addClass("shadow");
      $(".nav-link ").addClass("non-top");
    } else {
      $(".navbar").fadeIn("slow").css("background", "rgba(255, 255, 255, 0)");
      $(".navbar").removeClass("shadow");
      $(".nav-link ").removeClass("non-top");
    }
  });

  // Smooth scrolling on the navbar links
  $(".navbar-nav a").on("click", function (event) {
    if (this.hash !== "") {
      event.preventDefault();

      $("html, body").animate(
        {
          scrollTop: $(this.hash).offset().top - 45,
        },
        100,
        "easeInOutExpo"
      );

      if ($(this).parents(".navbar-nav").length) {
        $(".navbar-nav .active").removeClass("active");
        $(this).closest("a").addClass("active");
      }
    }
  });

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 100, "easeInOutExpo");
    return false;
  });

  // Modal Video
  var $videoSrc;
  $(".btn-play").click(function () {
    $videoSrc = $(this).data("src");
  });
  $("#videoModal").on("shown.bs.modal", function (e) {
    $("#video").attr(
      "src",
      $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"
    );
  });
  $("#videoModal").on("hide.bs.modal", function (e) {
    $("#video").attr("src", $videoSrc);
  });

  // Facts counter
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 2000,
  });

  // Skills
  $(".skill").waypoint(
    function () {
      $(".progress .progress-bar").each(function () {
        $(this).css("width", $(this).attr("aria-valuenow") + "%");
      });
    },
    { offset: "80%" }
  );

  // Portfolio isotope and filter
  var portfolioIsotope = $(".portfolio-container").isotope({
    itemSelector: ".portfolio-item",
    layoutMode: "fitRows",
  });
  $("#portfolio-flters li").on("click", function () {
    $("#portfolio-flters li").removeClass("active");
    $(this).addClass("active");

    portfolioIsotope.isotope({ filter: $(this).data("filter") });
  });

  // Testimonials carousel
  $(".testimonial-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1000,
    items: 1,
    dots: true,
    loop: true,
  });

  // Testimonials carousel
  $(".logo-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1000,
    items: 4,
    loop: true,
    margin: 10,
  });

  var counter = function () {
    $(".section-counter").waypoint(
      function (direction) {
        if (
          direction === "down" &&
          !$(this.element).hasClass("ftco-animated")
        ) {
          var comma_separator_number_step =
            $.animateNumber.numberStepFactories.separator(",");
          $(".block-counter-1-number").each(function () {
            var $this = $(this),
              num = $this.data("number");
            $this.animateNumber(
              {
                number: num,
                numberStep: comma_separator_number_step,
              },
              7000
            );
          });
        }
      },
      { offset: "95%" }
    );
  };
  counter();

  // input number

  function ctrls() {
    var _this = this;

    this.counter = 0;
    this.els = {
      decrement: document.querySelector(".ctrl__button--decrement"),
      counter: {
        container: document.querySelector(".ctrl__counter"),
        num: document.querySelector(".ctrl__counter-num"),
        input: document.querySelector(".ctrl__counter-input"),
      },
      increment: document.querySelector(".ctrl__button--increment"),
    };

    this.decrement = function () {
      var counter = _this.getCounter();
      var nextCounter = _this.counter > 0 ? --counter : counter;
      _this.setCounter(nextCounter);
    };

    this.increment = function () {
      var counter = _this.getCounter();
      var nextCounter = counter < 9999999999 ? ++counter : counter;
      _this.setCounter(nextCounter);
    };

    this.getCounter = function () {
      return _this.counter;
    };

    this.setCounter = function (nextCounter) {
      _this.counter = nextCounter;
    };

    this.debounce = function (callback) {
      setTimeout(callback, 100);
    };

    this.render = function (hideClassName, visibleClassName) {
      _this.els.counter.num.classList.add(hideClassName);

      setTimeout(function () {
        _this.els.counter.num.innerText = _this.getCounter();
        _this.els.counter.input.value = _this.getCounter();
        _this.els.counter.num.classList.add(visibleClassName);
      }, 100);

      setTimeout(function () {
        _this.els.counter.num.classList.remove(hideClassName);
        _this.els.counter.num.classList.remove(visibleClassName);
      }, 1100);
    };

    this.ready = function () {
      _this.els.decrement.addEventListener("click", function () {
        _this.debounce(function () {
          _this.decrement();
          _this.render("is-decrement-hide", "is-decrement-visible");
        });
      });

      _this.els.increment.addEventListener("click", function () {
        _this.debounce(function () {
          _this.increment();
          _this.render("is-increment-hide", "is-increment-visible");
        });
      });

      _this.els.counter.input.addEventListener("input", function (e) {
        var parseValue = parseInt(e.target.value);
        if (!isNaN(parseValue) && parseValue >= 0) {
          _this.setCounter(parseValue);
          _this.render();
        }
      });

      _this.els.counter.input.addEventListener("focus", function (e) {
        _this.els.counter.container.classList.add("is-input");
      });

      _this.els.counter.input.addEventListener("blur", function (e) {
        _this.els.counter.container.classList.remove("is-input");
        _this.render();
      });
    };

    
  }

  // init
  var controls = new ctrls();
  document.addEventListener("DOMContentLoaded", controls.ready);

  // Panels
  $("#ex1 a").on("click", function (e) {
    e.preventDefault();
    $(this).tab("show");
  });









  // Typed Initiate
  var TxtType = function (el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = "";
    this.tick();
    this.isDeleting = false;
  };

  TxtType.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + "</span>";

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) {
      delta /= 2;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
    } else if (this.isDeleting && this.txt === "") {
      this.isDeleting = false;
      this.loopNum++;
      delta = 500;
    }

    setTimeout(function () {
      that.tick();
    }, delta);
  };

  window.onload = function () {
    var elements = document.getElementsByClassName("typewrite");
    for (var i = 0; i < elements.length; i++) {
      var toRotate = elements[i].getAttribute("data-type");
      var period = elements[i].getAttribute("data-period");
      if (toRotate) {
        new TxtType(elements[i], JSON.parse(toRotate), period);
      }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML =
      ".typewrite > .wrap { border-right: 0.08em solid transparent}";
    document.body.appendChild(css);
  };


})(jQuery);
