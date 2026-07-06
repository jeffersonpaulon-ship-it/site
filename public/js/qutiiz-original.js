(function ($) {
  "use strict";

  if ($(".listing-details__contact-info-phone").length) {
    $(".listing-details__contact-info-phone").on("click", function (e) {
      e.preventDefault();
      var textElement = $(this).find(".text h5");
      var mainText = textElement.data("number");
      var toggleText = textElement.data("toggle-number");
      if (textElement.text() == mainText) {
        textElement.text(toggleText);
      } else {
        textElement.text(mainText);
      }
    });
  }

  if ($(".listing-top__map-show-hide").length) {
    $(".listing-top__map-show-hide").on("click", function () {
      $(this).toggleClass("hidden");
      var textElement = $(this).find(".listing-top__map-show-hide-text span");
      if (textElement.text() == textElement.data("text")) {
        textElement.text(textElement.data("toggle-text"));
      } else {
        textElement.text(textElement.data("text"));
      }
      $(".listing__map").toggleClass("hidden");
      $(".listing__content").toggleClass("hidden");
    });
  }

  if ($("#datepicker").length) {
    $("#datepicker").datepicker();
  }

  if ($("#datepicker2").length) {
    $("#datepicker2").datepicker();
  }

  if ($("#datepicker-inline").length) {
    $("#datepicker-inline").datepicker();
  }

  $('input[name="time"]').ptTimeSelect();

  if ($(".banner-bg-slide").length) {
    $(".banner-bg-slide").each(function () {
      var Self = $(this);
      var bgSlideOptions = Self.data("options");
      var bannerTwoSlides = Self.vegas(bgSlideOptions);
    });
  }

  //Pricing Tabs
  if ($(".pricing-tabs").length) {
    $(".pricing-tabs .tab-btns .tab-btn").on("click", function (e) {
      e.preventDefault();
      var target = $($(this).attr("data-tab"));

      if ($(target).hasClass("actve-tab")) {
        return false;
      } else {
        $(".pricing-tabs .tab-btns .tab-btn").removeClass("active-btn");
        $(this).addClass("active-btn");
        $(".pricing-tabs .pr-content .pr-tab").removeClass("active-tab");
        $(target).addClass("active-tab");
      }
    });
  }

  // Type Effect
  if ($(".typed-effect").length) {
    $(".typed-effect").each(function () {
      var typedStrings = $(this).data("strings");
      var typedTag = $(this).attr("id");
      var typed = new Typed("#" + typedTag, {
        typeSpeed: 100,
        backSpeed: 100,
        fadeOut: true,
        loop: true,
        strings: typedStrings.split(",")
      });
    });
  }

  // Popular Causes Progress Bar
  if ($(".count-bar").length) {
    $(".count-bar").appear(
      function () {
        var el = $(this);
        var percent = el.data("percent");
        $(el).css("width", percent).addClass("counted");
      },
      {
        accY: -50
      }
    );
  }

  //Progress Bar / Levels
  if ($(".progress-levels .progress-box .bar-fill").length) {
    $(".progress-box .bar-fill").each(
      function () {
        $(".progress-box .bar-fill").appear(function () {
          var progressWidth = $(this).attr("data-percent");
          $(this).css("width", progressWidth + "%");
        });
      },
      {
        accY: 0
      }
    );
  }

  //Fact Counter + Text Count
  if ($(".count-box").length) {
    $(".count-box").appear(
      function () {
        var $t = $(this),
          n = $t.find(".count-text").attr("data-stop"),
          r = parseInt($t.find(".count-text").attr("data-speed"), 10);

        if (!$t.hasClass("counted")) {
          $t.addClass("counted");
          $({
            countNum: $t.find(".count-text").text()
          }).animate(
            {
              countNum: n
            },
            {
              duration: r,
              easing: "linear",
              step: function () {
                $t.find(".count-text").text(Math.floor(this.countNum));
              },
              complete: function () {
                $t.find(".count-text").text(this.countNum);
              }
            }
          );
        }
      },
      {
        accY: 0
      }
    );
  }

  // Accrodion
  if ($(".accrodion-grp").length) {
    var accrodionGrp = $(".accrodion-grp");
    accrodionGrp.each(function () {
      var accrodionName = $(this).data("grp-name");
      var Self = $(this);
      var accordion = Self.find(".accrodion");
      Self.addClass(accrodionName);
      Self.find(".accrodion .accrodion-content").hide();
      Self.find(".accrodion.active").find(".accrodion-content").show();
      accordion.each(function () {
        $(this)
          .find(".accrodion-title")
          .on("click", function () {
            if ($(this).parent().hasClass("active") === false) {
              $(".accrodion-grp." + accrodionName)
                .find(".accrodion")
                .removeClass("active");
              $(".accrodion-grp." + accrodionName)
                .find(".accrodion")
                .find(".accrodion-content")
                .slideUp();
              $(this).parent().addClass("active");
              $(this).parent().find(".accrodion-content").slideDown();
            }
          });
      });
    });
  }

  // Team One Carousel
  if ($(".team-one__carousel").length) {
    $(".team-one__carousel").owlCarousel({
      loop: true,
      margin: 30,
      nav: false,
      smartSpeed: 500,
      autoHeight: false,
      autoplay: true,
      dots: true,
      autoplayTimeout: 10000,
      navText: [
        '<span class="icon-left-arrow"></span>',
        '<span class="icon-right-arrow"></span>'
      ],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        800: {
          items: 2
        },
        1024: {
          items: 4
        },
        1200: {
          items: 4
        }
      }
    });
  }

  // Testimonial One Carousel
  if ($(".testimonial-one__carousel").length) {
    $(".testimonial-one__carousel").owlCarousel({
      loop: true,
      margin: 30,
      nav: true,
      smartSpeed: 500,
      autoHeight: false,
      autoplay: true,
      dots: false,

      navContainer: ".testimonial-one .custom-nav",

      autoplayTimeout: 10000,
      navText: [
        '<span class="icon-right-arrow left"></span>',
        '<span class="icon-right-arrow"></span>'
      ],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        800: {
          items: 2
        },
        1024: {
          items: 2
        },
        1200: {
          items: 2
        },
        1541: {
          items: 3
        }
      }
    });
  }

  // Project Two Carousel
  if ($(".project-two__carousel").length) {
    $(".project-two__carousel").owlCarousel({
      loop: true,
      margin: 30,
      nav: false,
      smartSpeed: 500,
      autoHeight: false,
      autoplay: true,
      dots: true,
      autoplayTimeout: 10000,
      navText: [
        '<span class="icon-left-arrow"></span>',
        '<span class="icon-right-arrow"></span>'
      ],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        800: {
          items: 2
        },
        1024: {
          items: 3
        },
        1200: {
          items: 4
        }
      }
    });
  }

  // Team One Carousel
  if ($(".testimonial-two__carousel").length) {
    $(".testimonial-two__carousel").owlCarousel({
      loop: true,
      margin: 30,
      nav: false,
      smartSpeed: 500,
      autoHeight: false,
      autoplay: true,
      dots: false,
      autoplayTimeout: 10000,
      navText: [
        '<span class="icon-left-arrow"></span>',
        '<span class="icon-right-arrow"></span>'
      ],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        800: {
          items: 2
        },
        1024: {
          items: 2
        },
        1200: {
          items: 3
        }
      }
    });
  }

  // Blog Three Carousel
  if ($(".blog-three__carousel").length) {
    $(".blog-three__carousel").owlCarousel({
      loop: true,
      margin: 30,
      nav: true,
      smartSpeed: 500,
      autoHeight: false,
      autoplay: true,
      dots: false,

      navContainer: ".blog-three .custom-nav",

      autoplayTimeout: 10000,
      navText: [
        '<span class="icon-right-arrow left"></span>',
        '<span class="icon-right-arrow"></span>'
      ],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        768: {
          items: 2
        },
        992: {
          items: 3
        },
        1200: {
          items: 3
        },
        1541: {
          items: 3
        }
      }
    });
  }

  if ($(".scroll-to-target").length) {
    $(".scroll-to-target").on("click", function () {
      var target = $(this).attr("data-target");
      // animate
      $("html, body").animate(
        {
          scrollTop: $(target).offset().top
        },
        1000
      );

      return false;
    });
  }

  if ($(".contact-form-validated").length) {
    // Adicionando método customizado para validar letras
    $.validator.addMethod("lettersonly", function (value, element) {
      return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
    }, "O nome deve conter apenas letras e espaços.");

    // Adicionando método customizado para regex
    $.validator.addMethod("regex", function (value, element, param) {
      return this.optional(element) || param.test(value);
    }, "Formato inválido.");

    // Inicializando a validação do formulário
    $(".contact-form-validated").validate({
      rules: {
        nome: {
          required: true,
          minlength: 3,
          lettersonly: true
        },
        email: {
          required: true,
          email: true
        },
        empresa: {
          required: true,
          minlength: 3
        },
        cargo: {
          required: true,
          minlength: 3,
          regex: /^[\p{L}. ]+$/u
        },
        telefone: {
          required: true,
          regex: /^\(?\d{2}\)?[\s-]?[\d\s-]{8,9}$/
        },
        site: {
          required: true
        },
        mensagem: {
          required: true,
          minlength: 20,
          maxlength: 2000
        }
      },
      messages: {
        nome: {
          required: "O campo nome é obrigatório.",
          minlength: "O nome deve ter pelo menos 3 caracteres.",
          lettersonly: "O nome deve conter apenas letras."
        },
        email: {
          required: "O campo email é obrigatório.",
          email: "Por favor, forneça um e-mail válido."
        },
        empresa: {
          required: "O campo empresa é obrigatório.",
          minlength: "A empresa deve ter pelo menos 3 caracteres."
        },
        cargo: {
          required: "O campo cargo é obrigatório.",
          minlength: "O cargo deve ter pelo menos 3 caracteres.",
          regex: "O cargo deve conter apenas letras, pontos e espaços."
        },
        telefone: {
          required: "O campo telefone é obrigatório.",
          regex: "O telefone deve seguir o formato correto (DDD+Telefone)."
        },
        site: {
          required: "O campo site é obrigatório."
        },
        mensagem: {
          required: "O campo detalhes do evento é obrigatório.",
          minlength: "A mensagem deve conter pelo menos 20 caracteres.",
          maxlength: "A mensagem pode conter no máximo 2000 caracteres."
        }
      },
      submitHandler: function (form) {
        // Envio via AJAX
        $.ajax({
          url: $(form).attr("action"),
          method: "POST",
          data: $(form).serialize(),
          dataType: "json",
          success: function (response) {
            if (response.success) {
              // Sucesso: exibe a mensagem de sucesso
              alert("Mensagem enviada com sucesso!");
              $(form).find('input, textarea').val(''); // Limpar formulário
            } else {
              // Erros de validação do servidor
              var errorMessages = '';
              $.each(response.errors, function (key, value) {
                errorMessages += value + "\n";
              });
              alert(errorMessages); // Exibe os erros detalhados
            }
          },
          error: function () {
            alert("Ocorreu um erro ao processar sua solicitação.");
          }
        });
        return false; // Impede o envio tradicional do formulário
      }
    });
  }

  if ($(".trabalheconosco-form-validated").length) {
    $(".trabalheconosco-form-validated").validate({
      rules: {
        mei: {
          required: true
        },
        cpf: {
          required: true,
          minlength: 11,
          maxlength: 11
        },
        nome: {
          required: true,
          minlength: 3
        },
        sobrenome: {
          required: true,
          minlength: 3
        },
        celular: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        senha: {
          required: true,
          minlength: 6
        },
        data_nascimento: {
          required: true
        },
        cep: {
          required: true,
          minlength: 8
        },
        endereco: {
          required: true,
          minlength: 4
        },
        numero: {
          required: true
        },
        bairro: {
          required: true,
          minlength: 4
        },
        cidade: {
          required: true,
          minlength: 3
        },
        uf: {
          required: true,
          minlength: 2,
          maxlength: 2
        },
        possui_veiculo: {
          required: true
        },
        idiomas: {
          required: true
        },
        funcao_pretendida: {
          required: true
        },
        'foto_perfil_1': {
          required: true,
          extension: "jpg|jpeg|png",
          filesize: 2097152 // Limite de tamanho: 2MB
        },
        'foto_corpo_inteiro_1': {
          required: true,
          extension: "jpg|jpeg|png",
          filesize: 2097152 // Limite de tamanho: 2MB
        }
      },
      messages: {
        mei: {
          required: "Selecione se você é ou não MEI"
        },
        cpf: {
          required: "O CPF é obrigatório.",
          minlength: "O CPF deve ter 11 dígitos.",
          maxlength: "O CPF deve ter 11 dígitos."
        },
        nome: {
          required: "O campo nome é obrigatório.",
          minlength: "O nome deve ter no mínimo 3 caracteres."
        },
        sobrenome: {
          required: "O campo sobrenome é obrigatório.",
          minlength: "O sobrenome deve ter no mínimo 3 caracteres."
        },
        celular: {
          required: "O campo celular é obrigatório.",
          minlength: "O celular deve ter no 11 caracteres.",
          maxlength: "O celular deve ter 11 dígitos."
        },
        email: {
          required: "O campo email é obrigatório.",
          email: "Por favor, insira um email válido."
        },
        senha: {
          required: "O campo senha é obrigatório.",
          minlength: "A senha deve ter no mínimo 6 caracteres."
        },
        data_nascimento: {
          required: "A data de nascimento é obrigatório."
        },
        cep: {
          required: "O CEP é obrigatório.",
          minlength: "O cep deve ter no 9 dígitos.",
          maxlength: "O cep deve ter 9 dígitos."
        },
        endereco: {
          required: "O endereço é obrigatório."
        },
        numero: {
          required: "O Número é obrigatório."
        },
        bairro: {
          required: "O bairro é obrigatório.",
          minlength: "O nome bairro ter no mínimo 4 caracteres."
        },
        cidade: {
          required: "A cidade é obrigatório.",
          minlength: "A cidade precisa ter no mínimo 4 caracteres."
        },
        uf: {
          required: "O UF é obrigatório.",
          minlength: "O UF precisa ter 2 caracteres.",
          maxlength: "O UF precisa ter 2 caracteres."
        },
        possui_veiculo: {
          required: "Selecione se você tem ou não veículo"
        },
        idiomas: {
          required: "Selecione os idiomas que fala"
        },
        funcao_pretendida: {
          required: "Selecione a função pretendida"
        },
        foto_perfil_1: {
          required: "Envie uma foto de perfil"
        },
        foto_corpo_inteiro_1: {
          required: "Envie uma foto de corpo inteiro, de preferência trabalhando"
        },

        // Outras mensagens personalizadas
      },
      submitHandler: function (form) {
        grecaptcha.ready(function () {
          grecaptcha.execute('6LfPy04qAAAAAGrvrHz8YOxqy-hd6HMcozzQxQsv', { action: 'submit' }).then(function (token) {
            $('#g-recaptcha-response').val(token); // Definir o token no formulário

            // Enviar o formulário via AJAX
            $.ajax({
              url: $(form).attr("action"),
              method: "POST",
              data: new FormData(form),
              processData: false,
              contentType: false,
              dataType: "json",
              success: function (response) {
                if (response.success) {
                  // Sucesso: exibir mensagem e limpar o formulário
                  $(".trabalheconosco-form-validated")[0].reset(); // Resetar formulário
                  $(".alert-success").text(response.message).fadeIn(); // Mostrar mensagem de sucesso
                } else {
                  // Exibir os erros de validação
                  var errorMessages = '';
                  $.each(response.errors, function (key, value) {
                    errorMessages += value + '\n';
                  });
                  alert(errorMessages); // Mostrar os erros
                }
              },
              error: function (jqXHR, textStatus, errorThrown) {
                console.log("Error details: ", textStatus, errorThrown, jqXHR.responseText);
                alert("Houve um erro ao enviar o formulário. Detalhes: " + jqXHR.responseText);
              }
            });
          });
        });
        return false; // Evita o envio normal do formulário
      }
    });

    // Adicionar métodos de validação personalizados
    $.validator.addMethod("filesize", function (value, element, param) {
      return this.optional(element) || (element.files[0].size <= param);
    }, "O arquivo deve ter no máximo 2MB.");

    $.validator.addMethod("extension", function (value, element, param) {
      return this.optional(element) || value.match(new RegExp("\\.(" + param + ")$", "i"));
    }, "Extensão de arquivo inválida.");
  }

  // mailchimp form
  if ($(".mc-form").length) {
    $(".mc-form").each(function () {
      var Self = $(this);
      var mcURL = Self.data("url");
      var mcResp = Self.parent().find(".mc-form__response");

      Self.ajaxChimp({
        url: mcURL,
        callback: function (resp) {
          // appending response
          mcResp.append(function () {
            return '<p class="mc-message">' + resp.msg + "</p>";
          });
          // making things based on response
          if (resp.result === "success") {
            // Do stuff
            Self.removeClass("errored").addClass("successed");
            mcResp.removeClass("errored").addClass("successed");
            Self.find("input").val("");

            mcResp.find("p").fadeOut(10000);
          }
          if (resp.result === "error") {
            Self.removeClass("successed").addClass("errored");
            mcResp.removeClass("successed").addClass("errored");
            Self.find("input").val("");

            mcResp.find("p").fadeOut(10000);
          }
        }
      });
    });
  }

  if ($(".video-popup").length) {
    $(".video-popup").magnificPopup({
      type: "iframe",
      mainClass: "mfp-fade",
      removalDelay: 160,
      preloader: true,

      fixedContentPos: false
    });
  }

  if ($(".img-popup").length) {
    var groups = {};
    $(".img-popup").each(function () {
      var id = parseInt($(this).attr("data-group"), 10);

      if (!groups[id]) {
        groups[id] = [];
      }

      groups[id].push(this);
    });

    $.each(groups, function () {
      $(this).magnificPopup({
        type: "image",
        closeOnContentClick: true,
        closeBtnInside: false,
        gallery: {
          enabled: true
        }
      });
    });
  }

  function dynamicCurrentMenuClass(selector) {
    let FileName = window.location.href.split("/").reverse()[0];

    selector.find("li").each(function () {
      let anchor = $(this).find("a");
      if ($(anchor).attr("href") == FileName) {
        $(this).addClass("current");
      }
    });
    // if any li has .current elmnt add class
    selector.children("li").each(function () {
      if ($(this).find(".current").length) {
        $(this).addClass("current");
      }
    });
    // if no file name return
    if ("" == FileName) {
      selector.find("li").eq(0).addClass("current");
    }
  }

  if ($(".main-menu__list").length) {
    // dynamic current class
    let mainNavUL = $(".main-menu__list");
    dynamicCurrentMenuClass(mainNavUL);
  }
  if ($(".service-details__sidebar-service-list").length) {
    // dynamic current class
    let mainNavUL = $(".service-details__sidebar-service-list");
    dynamicCurrentMenuClass(mainNavUL);
  }

  if ($(".main-menu__list").length && $(".mobile-nav__container").length) {
    let navContent = document.querySelector(".main-menu__list").outerHTML;
    let mobileNavContainer = document.querySelector(".mobile-nav__container");
    mobileNavContainer.innerHTML = navContent;
  }
  if ($(".sticky-header__content").length) {
    let navContent = document.querySelector(".main-menu").innerHTML;
    let mobileNavContainer = document.querySelector(".sticky-header__content");
    mobileNavContainer.innerHTML = navContent;
  }

  if ($(".mobile-nav__container .main-menu__list").length) {
    let dropdownAnchor = $(
      ".mobile-nav__container .main-menu__list .dropdown > a"
    );
    dropdownAnchor.each(function () {
      let self = $(this);
      let toggleBtn = document.createElement("BUTTON");
      toggleBtn.setAttribute("aria-label", "dropdown toggler");
      toggleBtn.innerHTML = "<i class='fa fa-angle-down'></i>";
      self.append(function () {
        return toggleBtn;
      });
      self.find("button").on("click", function (e) {
        e.preventDefault();
        let self = $(this);
        self.toggleClass("expanded");
        self.parent().toggleClass("expanded");
        self.parent().parent().children("ul").slideToggle();
      });
    });
  }

  if ($(".mobile-nav__toggler").length) {
    $(".mobile-nav__toggler").on("click", function (e) {
      e.preventDefault();
      $(".mobile-nav__wrapper").toggleClass("expanded");
      $("body").toggleClass("locked");
    });
  }

  if ($(".search-toggler").length) {
    $(".search-toggler").on("click", function (e) {
      e.preventDefault();
      $(".search-popup").toggleClass("active");
      $(".mobile-nav__wrapper").removeClass("expanded");
      $("body").toggleClass("locked");
    });
  }

  if ($(".odometer").length) {
    var odo = $(".odometer");
    odo.each(function () {
      $(this).appear(function () {
        var countNumber = $(this).attr("data-count");
        $(this).html(countNumber);
      });
    });
  }

  if ($(".dynamic-year").length) {
    let date = new Date();
    $(".dynamic-year").html(date.getFullYear());
  }

  if ($(".wow").length) {
    var wow = new WOW({
      boxClass: "wow", // animated element css class (default is wow)
      animateClass: "animated", // animation css class (default is animated)
      mobile: true, // trigger animations on mobile devices (default is true)
      live: true // act on asynchronously loaded content (default is true)
    });
    wow.init();
  }

  if ($("#donate-amount__predefined").length) {
    let donateInput = $("#donate-amount");
    $("#donate-amount__predefined")
      .find("li")
      .on("click", function (e) {
        e.preventDefault();
        let amount = $(this).find("a").text();
        donateInput.val(amount);
        $("#donate-amount__predefined").find("li").removeClass("active");
        $(this).addClass("active");
      });
  }

  if ($(".thm-accordion").length) {
    let accordionWrapper = $(".thm-accordion");
    accordionWrapper.each(function () {
      let $this = $(this);
      let accordionID = $this.attr("id");
      let accordionTitle = $this.find(".thm-accordion__title");
      $this.addClass(accordionID);
      // default hide
      let mainAccordionContent = $this.find(".thm-accordion__content").hide();
      $this.find(".active-item .thm-accordion__content").show();
      // on title click
      accordionTitle.on("click", function (e) {
        e.preventDefault();
        let $this = $(this);
        let accordionItem = $(this).parent();
        if (false === accordionItem.hasClass("active-item")) {
          $("#" + accordionID)
            .find(".thm-accordion__item")
            .removeClass("active-item");
          accordionItem.addClass("active-item");
          mainAccordionContent.slideUp();
          accordionItem.find(".thm-accordion__content").slideDown();
        }
      });
    });
  }

  $(".add").on("click", function () {
    if ($(this).prev().val() < 999) {
      $(this)
        .prev()
        .val(+$(this).prev().val() + 1);
    }
  });
  $(".sub").on("click", function () {
    if ($(this).next().val() > 1) {
      if ($(this).next().val() > 1)
        $(this)
          .next()
          .val(+$(this).next().val() - 1);
    }
  });

  if ($(".tabs-box").length) {
    $(".tabs-box .tab-buttons .tab-btn").on("click", function (e) {
      e.preventDefault();
      var target = $($(this).attr("data-tab"));

      if ($(target).is(":visible")) {
        return false;
      } else {
        target
          .parents(".tabs-box")
          .find(".tab-buttons")
          .find(".tab-btn")
          .removeClass("active-btn");
        $(this).addClass("active-btn");
        target
          .parents(".tabs-box")
          .find(".tabs-content")
          .find(".tab")
          .fadeOut(0);
        target
          .parents(".tabs-box")
          .find(".tabs-content")
          .find(".tab")
          .removeClass("active-tab");
        $(target).fadeIn(300);
        $(target).addClass("active-tab");
      }
    });
  }

  if ($(".range-slider-price").length) {
    var priceRange = document.getElementById("range-slider-price");

    noUiSlider.create(priceRange, {
      start: [50, 500],
      limit: 500,
      behaviour: "drag",
      connect: true,
      range: {
        min: 50,
        max: 500
      }
    });

    var limitFieldMin = document.getElementById("min-value-rangeslider");
    var limitFieldMax = document.getElementById("max-value-rangeslider");

    priceRange.noUiSlider.on("update", function (values, handle) {
      (handle ? $(limitFieldMax) : $(limitFieldMin)).text(values[handle]);
    });
  }

  function thmSwiperInit() {
    // swiper slider
    const swiperElm = document.querySelectorAll(".thm-swiper__slider");
    swiperElm.forEach(function (swiperelm) {
      const swiperOptions = JSON.parse(swiperelm.dataset.swiperOptions);
      let thmSwiperSlider = new Swiper(swiperelm, swiperOptions);
    });
  }

  function thmTinyInit() {
    // tiny slider
    const tinyElm = document.querySelectorAll(".thm-tiny__slider");
    tinyElm.forEach(function (tinyElm) {
      const tinyOptions = JSON.parse(tinyElm.dataset.tinyOptions);
      let thmTinySlider = tns(tinyOptions);
    });
  }

  function thmTestimonialsThumbCarousel() {
    if ($("#testimonials-one__thumb").length) {
      let testimonialsThumb = new Swiper("#testimonials-one__thumb", {
        slidesPerView: 3,
        spaceBetween: 0,
        speed: 1400,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        autoplay: {
          delay: 5000
        }
      });

      let testimonialsCarousel = new Swiper("#testimonials-one__carousel", {
        observer: true,
        observeParents: true,
        speed: 1400,
        mousewheel: true,
        slidesPerView: 1,
        autoplay: {
          delay: 5000
        },
        thumbs: {
          swiper: testimonialsThumb
        }
      });
    }
  }

  // ===Portfolio===
  function projectMasonaryLayout() {
    if ($(".masonary-layout").length) {
      $(".masonary-layout").isotope({
        layoutMode: "masonry"
      });
    }
    if ($(".post-filter").length) {
      $(".post-filter li")
        .children(".filter-text")
        .on("click", function () {
          var Self = $(this);
          var selector = Self.parent().attr("data-filter");
          $(".post-filter li").removeClass("active");
          Self.parent().addClass("active");
          $(".filter-layout").isotope({
            filter: selector,
            animationOptions: {
              duration: 500,
              easing: "linear",
              queue: false
            }
          });
          return false;
        });
    }

    if ($(".post-filter.has-dynamic-filters-counter").length) {
      // var allItem = $('.single-filter-item').length;
      var activeFilterItem = $(".post-filter.has-dynamic-filters-counter").find(
        "li"
      );
      activeFilterItem.each(function () {
        var filterElement = $(this).data("filter");
        var count = $(".filter-layout").find(filterElement).length;
        $(this)
          .children(".filter-text")
          .append('<span class="count">(' + count + ")</span>");
      });
    }
  }

  // ===Checkout Payment===
  if ($(".checkout__payment__title").length) {
    $(".checkout__payment__item").find(".checkout__payment__content").hide();
    $(".checkout__payment__item--active")
      .find(".checkout__payment__content")
      .show();

    $(".checkout__payment__title").on("click", function (e) {
      e.preventDefault();

      $(this)
        .parents(".checkout__payment")
        .find(".checkout__payment__item")
        .removeClass("checkout__payment__item--active");
      $(this)
        .parents(".checkout__payment")
        .find(".checkout__payment__content")
        .slideUp();

      $(this).parent().addClass("checkout__payment__item--active");
      $(this).parent().find(".checkout__payment__content").slideDown();
    });
  }

  function SmoothMenuScroll() {
    var anchor = $(".scrollToLink");
    if (anchor.length) {
      anchor.children("a").bind("click", function (event) {
        if ($(window).scrollTop() > 10) {
          var headerH = "90";
        } else {
          var headerH = "90";
        }
        var target = $(this);
        $("html, body")
          .stop()
          .animate(
            {
              scrollTop: $(target.attr("href")).offset().top - headerH + "px"
            },
            1200,
            "easeInOutExpo"
          );
        anchor.removeClass("current");
        anchor.removeClass("current-menu-ancestor");
        anchor.removeClass("current_page_item");
        anchor.removeClass("current-menu-parent");
        target.parent().addClass("current");
        event.preventDefault();
      });
    }
  }
  SmoothMenuScroll();

  function OnePageMenuScroll() {
    var windscroll = $(window).scrollTop();
    if (windscroll >= 117) {
      var menuAnchor = $(".one-page-scroll-menu .scrollToLink").children("a");
      menuAnchor.each(function () {
        var sections = $(this).attr("href");
        $(sections).each(function () {
          if ($(this).offset().top <= windscroll + 100) {
            var Sectionid = $(sections).attr("id");
            $(".one-page-scroll-menu").find("li").removeClass("current");
            $(".one-page-scroll-menu")
              .find("li")
              .removeClass("current-menu-ancestor");
            $(".one-page-scroll-menu")
              .find("li")
              .removeClass("current_page_item");
            $(".one-page-scroll-menu")
              .find("li")
              .removeClass("current-menu-parent");
            $(".one-page-scroll-menu")
              .find("a[href*=\\#" + Sectionid + "]")
              .parent()
              .addClass("current");
          }
        });
      });
    } else {
      $(".one-page-scroll-menu li.current").removeClass("current");
      $(".one-page-scroll-menu li:first").addClass("current");
    }
  }

  // window load event

  $(window).on("load", function () {
    if ($(".preloader").length) {
      $(".preloader").fadeOut();
    }
    thmSwiperInit();
    thmTinyInit();
    thmTestimonialsThumbCarousel();
    projectMasonaryLayout();

    if ($(".circle-progress").length) {
      $(".circle-progress").appear(function () {
        let circleProgress = $(".circle-progress");
        circleProgress.each(function () {
          let progress = $(this);
          let progressOptions = progress.data("options");
          progress.circleProgress(progressOptions);
        });
      });
    }
    if ($(".post-filter").length) {
      var postFilterList = $(".post-filter li");
      // for first init
      $(".filter-layout").isotope({
        filter: ".filter-item",
        animationOptions: {
          duration: 500,
          easing: "linear",
          queue: false
        }
      });
      // on click filter links
      postFilterList.on("click", function () {
        var Self = $(this);
        var selector = Self.attr("data-filter");
        postFilterList.removeClass("active");
        Self.addClass("active");

        $(".filter-layout").isotope({
          filter: selector,
          animationOptions: {
            duration: 500,
            easing: "linear",
            queue: false
          }
        });
        return false;
      });
    }

    if ($(".post-filter.has-dynamic-filter-counter").length) {
      // var allItem = $('.single-filter-item').length;

      var activeFilterItem = $(".post-filter.has-dynamic-filter-counter").find(
        "li"
      );

      activeFilterItem.each(function () {
        var filterElement = $(this).data("filter");
        var count = $(".filter-layout").find(filterElement).length;
        $(this).append("<sup>[" + count + "]</sup>");
      });
    }

    //Testimonials Two
    if ($(".listing-details__gallery .bxslider").length) {
      $(".listing-details__gallery .bxslider").bxSlider({
        nextSelector: ".listing-details__gallery #slider-next",
        prevSelector: ".listing-details__gallery #slider-prev",
        nextText: '<i class="icon-right-arrow1"></i>',
        prevText: '<i class="icon-right-arrow1 icon-prev"></i>',
        mode: "horizontal",
        auto: "true",
        speed: "1000",
        pagerCustom:
          ".listing-details__gallery .slider-pager .listing-details__thumb-box"
      });
    }
  });

  // window scroll event

  $(window).on("scroll", function () {
    if ($(".stricked-menu").length) {
      var headerScrollPos = 130;
      var stricky = $(".stricked-menu");
      if ($(window).scrollTop() > headerScrollPos) {
        stricky.addClass("stricky-fixed");
      } else if ($(this).scrollTop() <= headerScrollPos) {
        stricky.removeClass("stricky-fixed");
      }
    }
    if ($(".scroll-to-top").length) {
      var strickyScrollPos = 100;
      if ($(window).scrollTop() > strickyScrollPos) {
        $(".scroll-to-top").fadeIn(500);
      } else if ($(this).scrollTop() <= strickyScrollPos) {
        $(".scroll-to-top").fadeOut(500);
      }
    }
    OnePageMenuScroll();
  });

  if ($(".before-after-twentytwenty").length) {
    $(".before-after-twentytwenty").each(function () {
      var Self = $(this);
      var objName = Self.attr("id");
      $("#" + objName).twentytwenty();

      // hack for bs tab
      $(document).on("shown.bs.tab", 'a[data-toggle="tab"]', function (e) {
        var paneTarget = $(e.target).attr("data-target");
        var $thePane = $(".tab-pane" + paneTarget);
        var twentyTwentyContainer = "#" + objName;
        var twentyTwentyHeight = $thePane.find(twentyTwentyContainer).height();
        if (0 === twentyTwentyHeight) {
          $thePane.find(twentyTwentyContainer).trigger("resize");
        }
      });
    });
  }

  if ($("select:not(.ignore)").length) {
    $("select:not(.ignore)").niceSelect();
  }
})(jQuery);
