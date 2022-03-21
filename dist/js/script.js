"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる
  // ハンバーガー
  $('.js-hamburger').on('click', function () {
    if ($('.js-hamburger').hasClass('is-open')) {
      $('.js-drawer-menu').fadeOut();
      $(this).removeClass('is-open');
    } else {
      $('.js-drawer-menu').fadeIn();
      $(this).addClass('is-open');
    }
  });
  var topBtn = $('.c-to-top');
  topBtn.hide(); // ボタンの表示設定

  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  }); // ボタンをクリックしたらスクロールして上に戻る

  topBtn.click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 300, 'swing');
    return false;
  }); // ヘッダー
  // $(window).on('scroll', function () {
  //   if ($('.slider1').height() < $(this).scrollTop()) {
  //     $('.header').css('background', 'rgba(17,17,17,1)');
  //   } else {
  //     $('.header').css('background', 'rgba(17,17,17,0.5)');
  //   }
  // });
  //ドロワーメニュー

  $('.navbar_toggle').on('click', function () {
    $(this).toggleClass('open');
    $('.menu').toggleClass('open');
  }); // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)

  $(document).on('click', 'a[href*="#"]', function () {
    var time = 400;
    var header = $('header').innerHeight();
    var target = $(this.hash);
    if (!target.length) return;
    var targetY = target.offset().top - header;
    $('html,body').animate({
      scrollTop: targetY
    }, time, 'swing');
    return false;
  }); // スクロール後ヘッダースタイル変更

  $(window).scroll(function () {
    var header = $('.js-header');
    var mv = $('.js-mv').height();
    var top = $(window).scrollTop();

    if (mv < top) {
      $(header).css('background', 'rgba(17,17,17,1)');
    } else {
      $(header).css('background', 'rgba(17,17,17,0.5)');
    }
  });
  var aboPos = $(".js-mv").offset().top;
  aboPos -= -130;
  $(window).scroll(function () {
    if ($(window).scrollTop() > aboPos) {
      $(".js-to-top").addClass("c-to-top__scroll");
    } else {
      $(".js-to-top").removeClass("c-to-top__scroll");
    }
  });
  var mySwiper = new Swiper('.swiper-container', {
    slidesPerView: 1.48,
    //画像を何枚表示するか
    spaceBetween: 20,
    centeredSlides: true,
    //見切らせたい場合メイン画像をセンターにもってくるか
    //自動再生する場合
    autoplay: {
      delay: 3000 //3秒後に次の画像に代わる

    },
    loop: true,
    //最後の画像までいったらループする
    //ページネーションをつける場合
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });
  var swiper = new Swiper('.works-swiper', {
    loop: true,
    effect: 'fade',
    //　自動で画像が切り替わっていく
    autoplay: {
      delay: 4000,
      disableOnInteraction: false
    },
    //画像が切り替わるスピード
    speed: 2000,
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      //ページネーションの種類
      clickable: true //クリックに反応させる

    },
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar'
    }
  }); //メインスライド

  var slider = new Swiper('.js-works-detail-slide', {
    slidesPerView: 1,
    centeredSlides: true,
    loop: true,
    loopedSlides: 8,
    //スライドの枚数と同じ値を指定
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  }); //サムネイルスライド

  var thumbs = new Swiper('.js-works-detail-thumbnail', {
    slidesPerView: 'auto',
    spaceBetween: 24,
    //サムネイルの間隔
    centeredSlides: true,
    loop: true,
    slideToClickedSlide: true
  });
  slider.controller.control = thumbs;
  thumbs.controller.control = slider; //メインスライド PC

  var sliderPC = new Swiper('.js-works-detail-slide-pc', {
    slidesPerView: 1,
    loop: true,
    loopedSlides: 8,
    //スライドの枚数と同じ値を指定
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  }); //サムネイルスライド

  var thumbsPC = new Swiper('.js-works-detail-thumbnail-pc', {
    slidesPerView: 8,
    //スライドの枚数と同じ値を指定
    spaceBetween: 8,
    loop: true,
    slideToClickedSlide: true
  });
  sliderPC.controller.control = thumbsPC;
  thumbsPC.controller.control = sliderPC; // フォーム

  $(function () {
    $('.js-form-val').hide();
    $('.js-submit-btn').click(function () {
      //   名前
      if (!$('.your-name input').val()) {
        $('.js-form-val').show();
        $('.your-name input').addClass('error'); // sendFlag = false; 
      } else {
        $('js-form-val').hide();
        $('.your-name input').removeClass('error');
      } //   ふりがな


      if (!$('.your-subName input').val()) {
        $('.js-form-val').show();
        $('.your-subName input').addClass('error'); // sendFlag = false; 
      } else {
        $('.js-form-val').hide();
        $('.your-subName input').removeClass('error');
      } // 会社名


      if (!$('.your-company input').val()) {
        $('.js-form-val').show();
        $('.your-company input').addClass('error');
      } else {
        $('.js-form-val').hide();
        $('.your-company input').removeClass('error');
      } //  メール


      if (!$('.your-mail input').val()) {
        $('.js-form-val').show();
        $('.your-mail input').addClass('error');
      } else {
        $('.js-form-val input').hide();
        $('.your-mail input').removeClass('error');
      }

      if (!$(".your-text textarea").val()) {
        $(".js-form-val").show();
        $('.your-text textarea').addClass('error');
      } else {
        $(".js-form-val").hide();
        $('.your-text textarea').removeClass('error');
      }
    });
  });
  $(function () {
    document.addEventListener('wpcf7mailsent', function (event) {
      location = 'https://okimaruko.net/contact-complete/';
    }, false);
  });
});