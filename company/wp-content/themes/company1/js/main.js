jQuery(function ($) {


  //TOPへ戻る
  var $top = $('.js-top');
  $top.on('click', function () {

    $('body,html').animate({ scrollTop: 0 }, 300);

  });
  //=====================================================================
  $(window).on('scroll', function () {
    var docHeight = $(document).innerHeight(), //ドキュメントの高さ
      windowHeight = $(window).innerHeight(), //ウィンドウの高さ
      pageBottom = docHeight - windowHeight; //ドキュメントの高さ - ウィンドウの高さ

    if (pageBottom <= $(window).scrollTop() + 190) {

      $top.addClass('bottom');
    } else {
      $top.removeClass('bottom');

    }
  });


  //ハンバーガーメニュー
  $('.bar').on('click', function () {
    $(this).find('.bar-top').toggleClass('active');
    $(this).find('.bar-middle').toggleClass('active');
    $(this).find('.bar-bottom').toggleClass('active');
    $('.header-sp').toggleClass('active');
  })


  var window_h = $(window).height();

  //スクロールした時の全てのアクション
  $(window).on('scroll', function () {

    $('.about-right').each(function () {
      //各box要素のtopの位置を取得する
      var elem_pos = $(this).offset().top;
      var scroll_top = $(window).scrollTop();

      //どのタイミングでフェードインさせるか

      if (scroll_top >= elem_pos - window_h + 200) {

        $(this).addClass("slidein");
      } else {
        $(this).removeClass("slidein"); //そうでない場合はクラスを削除
      }


    });
    //TOPに戻るボタンが出たり消えたり
    if ($(window).scrollTop() > 250) {
      $('.js-top').addClass('fadein');
    } else {
      $('.js-top').removeClass('fadein');
    }
  });
  //=====================================================

  var $footer = $('.footer');
  if (window.innerHeight > $footer.offset().top + $footer.outerHeight()) {
    $footer.attr({ 'style': 'position:fixed; top:' + (window.innerHeight - $footer.outerHeight()) + 'px;' });
  }
  var $copy = $('.copy-right');
  if (window.innerHeight > $copy.offset().top + $copy.outerHeight()) {
    $copy.attr({ 'style': 'position:fixed; top:' + (window.innerHeight - $copy.outerHeight()) + 'px;' });
  }

  $(document).on('click', function (e) {
    if (!$(e.target).closest('.header-sp').length && !$(e.target).closest('.bar').length) {
      $('.bar-top').removeClass('active');
      $('.bar-middle').removeClass('active');
      $('.bar-bottom').removeClass('active');
      $('.header-sp').removeClass('active');
    } else {
      // ターゲット要素をクリックした時の操作
    }
  });
  //==========================================================
  //スライダー
  //==========================================================

  $('.slider').slick({
    arrows: true,
    autoplay: true,
    dots: true,
    /* ポイントここから～ */
    autoplaySpeed: 4000,
    // cssEase: 'linear',
    speed: 1000,
    prevArrow: '<button type=”button” class="slick-prev" style="cursor: pointer;outline: none; border: none;z-index: 20; border: none;"></button>',
    nextArrow: '<button type=”button” class="slick-next" style="cursor: pointer;outline: none;border: none; z-index: 20;"></button>',
    dotsClass: 'dots',
    /* ～ここまで */
    slidesToShow: 3,
    slidesToScroll: 1,
  });

  $('.slider-sp').slick({
    arrows: true,
    autoplay: true,
    dots: true,
    /* ポイントここから～ */
    autoplaySpeed: 4000,
    // cssEase: 'linear',
    speed: 1000,
    prevArrow: '<button type=”button” class="slick-prev" style="cursor: pointer;outline: none; border: none;z-index: 20; border: none;"></button>',
    nextArrow: '<button type=”button” class="slick-next" style="cursor: pointer;outline: none;border: none; z-index: 20;"></button>',
    dotsClass: 'dots',
    /* ～ここまで */
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  //==========================================================
  //フェードスライダー
  //==========================================================

  var $slide = $('.js-slide');
  var slideLength = $slide.length - 1;
  var currentSlide = 0;
  const duration = 2500;

  // 一旦全部消して今のスライドだけ表示
  $slide.css('display', 'none');
  $slide.eq(currentSlide).css('display', 'block');

  //スライドチェンジ
  function slideChange() {

    $slide.fadeOut(2000);
    $slide.eq(currentSlide).fadeIn(duration);

  }

  //スライダースタート
  function startSlide() {
    timer = setInterval(function () {
      if (currentSlide == slideLength) {
        currentSlide = 0;
        slideChange();
      } else {
        currentSlide++;
        slideChange();
      }
    }, 5000);
  }
 

  //スライダ関係の関数をスタート
  startSlide();

  $('.icon-select').css('display','none');

  $(window).on('load',function () { //全ての読み込みが完了したら実行
    
    $('.loading').fadeOut('slow');
  });
});


document.addEventListener("DOMContentLoaded", function () {

  const elem = document.querySelector(".js-target-parallax");
  if (elem !== null) { //クラス名js-target-parallaxがあるか判定
    let target = document.getElementsByClassName("js-target-parallax"); //クラス名js-target-parallaxがある要素をすべて取得

    let parallaxConfig = { //simpleParallaxの設定
      delay: 0,
      orientation: "down",
      scale: 1.8,
      //overflow: true, //必要なら
      //maxTransition : 50 //必要なら
    };

   const parallax_instance = new simpleParallax(target, parallaxConfig);

  }
});