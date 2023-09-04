jQuery(document).ready(function ($) {
  let listSpec = $('.team_field__spec')
  let listDoc = $('.team_field__doc')
  listSpec.each(function () {
    $(this).appendTo($('select[name="select-spec"]'))
  })
  listDoc.each(function () {
    $(this).appendTo($('select[name="select-doctor"]'))
  })

});

jQuery(document).ready(function ($) {
  let btnHeader = $('.btn_pink_main');
  let btnSubmit1 = $('.services_section_item_btn');
  let btnSubmit2 = $('.doctor_tabs_item_card_btn');
  btnHeader.on("mouseenter", function () {
    $(this).text('Заповнити форму')
  })
  btnHeader.on("mouseleave", function () {
    $(this).text('Записатись')
  })
  btnSubmit1.on("mouseenter", function () {
    $(this).text('Заповнити форму')
  })
  btnSubmit1.on("mouseleave", function () {
    $(this).text('Записатись на прийом')
  })
  btnSubmit2.on("mouseenter", function () {
    $(this).text('Заповнити форму')
  })
  btnSubmit2.on("mouseleave", function () {
    $(this).text('Записатись на прийом')
  })
})

// Burger menu

jQuery(document).ready(function ($) {
  if ($(window).width() <= '765') {
    let burger = $('.header_burger');
    let menu = $('.header_bottom');
    let menuList = $('.header_menu_list>li>ul.sub-menu');
    let mobileArrow = $('<div class="mobile_menu_arrow"></div>');
    let filialsArrow = $('.header_filials_arrow');
    let docBody = $('body');
    burger.on('click', function () {
      burger.toggleClass('active');
      docBody.toggleClass('overflow')
      menu.slideToggle()
    })
    menuList.before(mobileArrow);

    $('.mobile_menu_arrow').on('click', function () {
      $(this).next(menuList).slideToggle()
    })
    console.log(filialsArrow.parent())
    filialsArrow.on('click', function () {
      filialsArrow.parent().children('.header_filials_item:nth-child(3)').toggleClass('active');
      filialsArrow.toggleClass('active');
      docBody.removeClass('overflow')
    })
  }
})

// Burger menu END
// jQuery(document).ready(function ($) {
//   let benefitsBtn = $('.section_benefits_card_btn');
//   benefitsBtn.on('click', function(){
//     $('.section_benefits_arrows-next').trigger('click')
//   })
// })

// Show 3 Block
jQuery(document).ready(function ($) {

  let collapsedBtn = $('.services_section_btn_outline');
  collapsedBtn.click(function () {
    let expanded = $('.block_collapsed').slice(0, 3);
    expanded.show();
    expanded.removeClass('block_collapsed');
    if ($('.block_collapsed').length == 0) {
      $(this).hide();
    }
  });

  if ($(window).width() <= 765) {
    collapsedBtn.click(function () {
      let expanded = $('.block_collapsed').slice(0, 6);
      expanded.show();
      expanded.removeClass('block_collapsed');
      if ($('.block_collapsed').length == 0) {
        $(this).hide();
      }
    });
  };
});
// Show 3 Block END
// Counter'
jQuery(document).ready(function ($) {
  $('.count').each(function () {
    $(this).prop('Counter', 0).animate({
      Counter: $(this).text()
    }, {
      duration: 4000,
      easing: 'swing',
      step: function (now) {
        $(this).text(Math.ceil(now));
      }
    });
  });
})
// Counter END

jQuery(document).ready(function ($) {
  //Swiper Main
  const swiper = new Swiper('.section_slider_swiper', {
    slidesPerView: 1,
    loop: true,
    autoplay: true,
    // If we need pagination
    pagination: {
      el: '.section_slider_pagination',
    },
    // Navigation arrows
    navigation: {
      nextEl: '.section_slider_arrows-next',
      prevEl: '.section_slider_arrows-prev',
    },

  });
  //Swiper Main END

  //Swiper CTA

  const ctaTamSlider = new Swiper('.team_cta__swiper', {
    slidesPerView: 1,
    loop: true,
    autoplay: true,
    // If we need pagination
    pagination: {
      el: '.team_cta__pagination',
    },
  });
  //Swiper CTA END

  //Slide Services Team
  const servicesTamSlider = new Swiper('.team_servives__swiper', {
    slidesPerView: 1,
    // If we need pagination
    pagination: {
      el: '.team_servives__swiper__pagination',
    },
  });
  //Slide Services Team END

  //Swiper Benefits
  const swiperBenefits = new Swiper('.section_benefits_slider', {
    slidesPerView: 1,
    loop: true,
    autoplay: true,
    // If we need pagination
    pagination: {
      el: '.section_benefits_pagination',
      type: 'fraction'
    },
    // Navigation arrows
    navigation: {
      nextEl: '.section_benefits_arrows-next',
      prevEl: '.section_benefits_arrows-prev',
    },

  });

  //Swiper Benefits END

  //Swiper Directions
  const swiperDirections = new Swiper('.section_directions_items_mibile', {
    // If we need pagination
    slidesPerView: 'auto',
    spaceBetween: 10,
    pagination: {
      el: '.section_directions_items_pagination',
    },

  });

  //Swiper Directions END




  //Tabs
  const tabBtn = document.querySelectorAll(".tab__btn");
  const tabContents = document.querySelectorAll(".tab__item");

  tabBtn.forEach(function (element) {
    element.addEventListener("click", openTabs);
  });

  function openTabs(evt) {
    const btnTarget = evt.currentTarget;
    const item = btnTarget.dataset.item;

    tabContents.forEach(function (item) {
      item.classList.remove("tab__item--active");
    });

    tabBtn.forEach(function (item) {
      item.classList.remove("tab__btn--active");
    });

    document.querySelector(`#${item}`).classList.add("tab__item--active");

    btnTarget.classList.add("tab__btn--active");
  }
  //Tabs END

  //Swiper Benefits
  const swiperDoctors_1 = new Swiper('.doctor_tabs_swiper_1', {
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetween: 10,
        loop: true,
        autoplay: true,
      },
      // when window width is >= 765px
      765: {
        slidesPerView: 'auto',
        spaceBetween: 10,
      },
      // when window width is >= 980px
      980: {
        slidesPerView: 4,
        spaceBetween: 20,
      }
    },
    // Navigation arrows
    navigation: {
      nextEl: '.green_arrows_next_1',
      prevEl: '.green_arrows_prev_1',
    },
    pagination: {
      el: '.doctor_tabs_slider_pagination_1',
    },

  });
  const swiperDoctors_2 = new Swiper('.doctor_tabs_swiper_2', {
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetween: 10,
        loop: true,
        autoplay: true,
      },
      // when window width is >= 765px
      765: {
        slidesPerView: 'auto',
        spaceBetween: 10,
      },
      // when window width is >= 980px
      980: {
        slidesPerView: 4,
        spaceBetween: 20,
      }
    },
    // Navigation arrows
    navigation: {
      nextEl: '.green_arrows_next_2',
      prevEl: '.green_arrows_prev_2',
    },
    pagination: {
      el: '.doctor_tabs_slider_pagination_2',
    },

  });
  const swiperDoctors_3 = new Swiper('.doctor_tabs_swiper_3', {
    breakpoints: {
      // when window width is >= 320px
      320: {
        loop: true,
        autoplay: true,
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetween: 10,
      },
      // when window width is >= 765px
      765: {
        slidesPerView: 'auto',
        spaceBetween: 10,
      },
      // when window width is >= 980px
      980: {
        slidesPerView: 4,
        spaceBetween: 20,
      }
    },
    // Navigation arrows
    navigation: {
      nextEl: '.green_arrows_next_3',
      prevEl: '.green_arrows_prev_3',
    },
    pagination: {
      el: '.doctor_tabs_slider_pagination_3',
    },

  });
  //Swiper Benefits END

  //Swiper Testimoniasl
  const swiperTestimoniaslLeft = new Swiper('.section_testimonials_swiper_left', {
    // If we need pagination
    slidesPerView: 'auto',
    spaceBetween: 0,
  });
  const swiperTestimoniaslRight = new Swiper('.section_testimonials_swiper_right', {
    // If we need pagination
    slidesPerView: 'auto',
    spaceBetween: 0,
    pagination: {
      el: '.section_testimonials_swiper_right_pagination',
      type: 'fraction',
    },
    // Navigation arrows
    navigation: {
      nextEl: '.testimonials_arrow_next',
      prevEl: '.testimonials_arrow_prev',
    },

  });

  swiperTestimoniaslLeft.controller.control = swiperTestimoniaslRight;
  swiperTestimoniaslRight.controller.control = swiperTestimoniaslLeft;
  //Swiper Testimoniasl END
})

jQuery(document).ready(function ($) {
  //Swiper Testimoniasls PopUp
  const swiperDTestimoniaslsPopop = new Swiper('.page_testimonials_popup_swiper', {
    // If we need pagination
    slidesPerView: 1,
    navigation: {
      nextEl: '.page_testimonials_popup_arrows-next',
      prevEl: '.page_testimonials_popup_arrows-prev',
    },
  });
  //Swiper Testimoniasls PopUp END

  // PopUp Testimonials

  let popUpTestimonials = $('.page_testimonials_popup');
  let testimoniasl = $('.page_testimonials_card');
  let closePopUp = $('.page_testimonials_popup_close');
  let popUpContent = $('.page_testimonials_popup_wapper');
  let docBody = $('body')
  testimoniasl.on('click', function () {
    popUpTestimonials.addClass('active').fadeIn(300);
    docBody.addClass('overflow')
  })
  closePopUp.on('click', function () {
    popUpTestimonials.removeClass('active').fadeOut(300)
    docBody.removeClass('overflow')
  })

  $('.page_testimonials_popup').mouseup(function (e) { // событие клика по веб-документу
    if (!popUpContent.is(e.target) // если клик был не по нашему блоку
      && popUpContent.has(e.target).length === 0) { // и не по его дочерним элементам
      popUpTestimonials.removeClass('active').fadeOut(300);
      docBody.removeClass('overflow')
    }
  });
  testimoniasl.on('click', function () {
    index = $(this).data('item')
    swiperDTestimoniaslsPopop.slideTo(index)
  })
})
// PopUp Testimonials END

// // PopUp Appointment

jQuery(document).ready(function ($) {
  let popUpappointment = $('.popup_appointment');
  let appointment = $('.pop_up_btn');
  let closePopUp = $('.popup_appointment_close_btn');
  let popUpContent = $('.popup_appointment_wrapper');
  let docBody = $('body')
  appointment.on('click', function (e) {
    e.preventDefault();
    popUpappointment.addClass('active').fadeIn(300);
    docBody.addClass('overflow')
  })
  closePopUp.on('click', function () {
    popUpappointment.removeClass('active').fadeOut(300)
    docBody.removeClass('overflow')
  })

  $('.popup_appointment').mouseup(function (e) { // событие клика по веб-документу
    if (!popUpContent.is(e.target) // если клик был не по нашему блоку
      && popUpContent.has(e.target).length === 0) { // и не по его дочерним элементам
      popUpappointment.removeClass('active').fadeOut(300);
      docBody.removeClass('overflow')
    }
  });

})
// PopUp Appointment END

jQuery(document).ready(function ($) {
  var wpcf7 = document.querySelectorAll('#wpcf7-f7301-o3');
  function wpcf7submit_event() {
    $('.popup_appointment_success').show();
    $('#wpcf7-f7301-o3 .wpcf7-response-output').hide();
  }

  for (var j = 0; j < wpcf7.length; j++) {
    wpcf7[j].addEventListener('wpcf7mailsent', wpcf7submit_event, false);
  }
});

jQuery(document).ready(function ($) {
  if ($('.blog_mobile').length) {
    $('.blog_hero__btn').on('click', function () {
      $('.blog_mobile').addClass('active')
    })
    $('.blog_mobile__close').on('click', function () {
      $('.blog_mobile').removeClass('active')
    })
  }
});
jQuery(document).ready(function ($) {
  const prof = new Swiper('.proffesion_right__items', {
    slidesPerView: 2,
    spaceBetween: 20,
    navigation: {
      nextEl: '.proffesion_arrow_next',
      prevEl: '.proffesion_arrow_prev',
    },
    pagination: {
      el: '.proffesion__pagination',
    },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetween: 10,
      },
      // when window width is >= 765px
      765: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      // when window width is >= 980px
      980: {
        slidesPerView: 2,
        spaceBetween: 20,
      }
    },
  }
  );
});
jQuery(document).ready(function ($) {
  const relative_doc__slider = new Swiper('.relative_doc__slider', {
    slidesPerView: 4,
    spaceBetween: 20,
    navigation: {
      nextEl: '.relative_arrow_next',
      prevEl: '.relative_arrow_prev',
    },
    pagination: {
      el: '.relative__pagination',
      clickable: true,
    },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetween: 10,
      },
      // when window width is >= 765px
      765: {
        slidesPerView: 3,
        spaceBetween: 10,
      },
      // when window width is >= 980px
      980: {
        slidesPerView: 4,
        spaceBetween: 20,
      }
    },
  }
  );
});
jQuery(document).ready(function ($) {
  const docRev = new Swiper('.section_reviews__slider', {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: '.reviews__arrow_next',
      prevEl: '.reviews__arrow_prev',
    },
    pagination: {
      el: '.reviews_slider__pagination',
      type: 'fraction'
    },
  }
  );
});
jQuery(document).ready(function ($) {
  const services_tab__swiper = new Swiper('.services_tab__swiper', {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: '.services_tab__pagination',
    },
  }
  );
});
jQuery(document).ready(function ($) {
  var $tabButtonItem = $('#tab-button li'),
    $tabContents = $('.tab-contents'),
    activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function (e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });
});

// DocPopup
jQuery(document).ready(function ($) {
  let docBtn = $('.relative_doc__btn');
  let docBtnClose = $('.centers_pop__close');
  docBtn.on('click', function () {
    let title = $(this).prev().children('.doctor_tabs_item_card_title').text();
    let clinics = $(this).prev().children('.doctor_tabs_item_clinic').children('.doctor_tabs_item_clinic_items')
    let clonItem = clinics.clone()
    clonItem.each(function () {
      $(this).appendTo($('select[name="clinic"]'))
    })
    $('.centers__title span').text(title)
    $('input[name="hidden_field"]').val(title)
    $('.centers_pop').fadeIn()

  })
  docBtnClose.on('click', function () {
    $('select[name="clinic"] option:not(:first-child)').remove()
    $('.centers_pop').fadeOut()
  })
  $('.centers_pop').mouseup(function (e) { // событие клика по веб-документу
    if (!$('.centers_pop__wraper').is(e.target) // если клик был не по нашему блоку
      && $('.centers_pop__wraper').has(e.target).length === 0) { // и не по его дочерним элементам
      $('.centers_pop').fadeOut();
      $('select[name="clinic"] option:not(:first-child)').remove()
    }
  });
});

// DocPageForm

jQuery(document).ready(function ($) {
  let doctitle = $('.doctor_hero__title').text()
  let singeForItems = $('.doctors_form__hide_item')
  singeForItems.each(function () {
    $(this).appendTo($('select[name="clinic"]'))
  })
  $('input[name="hidden_field"]').val(doctitle)
})
jQuery(document).ready(function ($) {
  //Check to see if the window is top if not then display button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 400) {
      $('#toTop').addClass('active');
    } else {
      $('#toTop').removeClass('active');
    }
  });
  $('#toTop').click(function () {
    $("html, body").animate({ scrollTop: 0 }, 0);
    return false;
  });

});

// Doctor Posts
jQuery(document).ready(function ($) {
  if ( $('.doctors_articles .blog_items__item').length < 3) {
    $('.btn_article__doc').css('display', ' none')
  }
  let collapsedBtn = $('.btn_article__doc');
  collapsedBtn.click(function () {
    let expanded = $('.block_collapsed').slice(0, 3);

    expanded.show();
    expanded.removeClass('block_collapsed');
    if ($('.block_collapsed').length == 0) {
      $(this).hide();
    }
  });
});
// Doctor Posts END