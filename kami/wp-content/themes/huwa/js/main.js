$(function () {

  //ローディングアイコン
  $(window).on('load', function () { //全ての読み込みが完了したら実行
    $('.loading').delay(800).fadeOut('fast');
  });

  //3秒たったら強制的にロード画面を非表示
  $(function () {
    setTimeout(stopload, 800);
  });

  function stopload() {
    $('.js-loading').fadeOut();
  }

  //TOPへ戻る
  var $top = $('.js-top');
  $top.on('click', function () {

    $('body,html').animate({ scrollTop: 0 }, 300);

  });

  //ハンバーガーメニュー
  $('.bar').stop().on('click', function () {
    $(this).find('.bar-top').toggleClass('active');
    $(this).find('.bar-middle').toggleClass('active');
    $(this).find('.bar-bottom').toggleClass('active');
    $('.header-menu').fadeToggle(400);
    $slide.toggleClass('opacity');

    if ($('.bar-top').hasClass('active')) {
      stopSlide();
    } else {

      //再度最初から処理を動かす。こうしないとずれる
      stopSlide();
      startSlide();
      if (currentSlide == slideLength) {

        currentSlide = 0;
        slideChange();
      } else {

        currentSlide++;
        slideChange();
      }

    }

  });
  $(document).on('click', function (e) {
    if (!$(e.target).closest('.bar').length) {
      $('.bar-top').removeClass('active');
      $('.bar-middle').removeClass('active');
      $('.bar-bottom').removeClass('active');
      $('.header-menu').fadeOut(400);
    } else {
      // ターゲット要素をクリックした時の操作
    }
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





  var window_h = $(window).height();

  //スクロールした時の全てのアクション
  $(window).on('scroll', function () {
    var scroll_top = $(window).scrollTop();


    $(".slide").add($(".slide2")).add($(".js-panel")).add($(".manu")).each(function () {
      //各box要素のtopの位置を取得する
      var elem_pos = $(this).offset().top;

      //どのタイミングでフェードインさせるか

      if (scroll_top >= elem_pos - window_h + 980) {

        $(".menu").addClass("fadein");
      }


    });
    //TOPに戻るボタンが出たり消えたり
    if ($(window).scrollTop() > 450) {
      $('.js-top').addClass('fadein');
    } else {
      $('.js-top').removeClass('fadein');
    }
  });

  $('.js-panel').hover(function () {
    $(this).find('.js-text').addClass('slideup');
  }, function () {
    $(this).find('.js-text').removeClass('slideup');
  });
  //======================================================================
  //snsリンク挙動
  //======================================================================
  $('.sns-area ul li a').click(function () {
    window.open(this.href, 'popup', 'width=600,height=300');
    return false;
  });
  $('.sns-link').click(function () {
    window.open(this.href, 'popup', 'width=600,height=300');
    return false;
  });



  //=====================================================


  //==========================================================
  //スライダー
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
  //ストップスライド
  function stopSlide() {
    clearInterval(timer);
  }

  //スライダ関係の関数をスタート
  startSlide();



  //==============================================
  //スライダー
  //==============================================
  $('.slider').add($('.slider2')).slick({
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    //次へ、前へボタンスタイル編集
    prevArrow: '<button type=”button” class=slick-prev style=" cursor: pointer;outline: none; border: none; z-index: 2; border: none;"></button>',
    nextArrow: '<button type=”button” class=slick-next style=" cursor: pointer;outline: none;border: none; z-index: 2;"></button>',
    speed: 1000,
    dotsClass: 'dots',
    infinite: true,
    centerMode: true,
    centerPadding: ''
  });

  $('.sns-link').click(function () {
    window.open(this.href, 'popup', 'width=600,height=300');
    return false;
  });

  //=========================================================
  //SPフッター用
  //=========================================================

  $('.js-footer-top').on('click', function () {
    $('body,html').animate({ scrollTop: 0 }, 300);

  });

  let click = true;
  $('.js-sns-btn').stop().on('click',function(){
    if(click){
      click = false;
      $('.sns-area').not(":animated").slideToggle();
      $('.js-sns-open').toggle();
      $('.js-sns-close').toggle();
      setTimeout(function(){
        click = true;
      },500)
    }
  });


  //月選択
$('.js-list').find('li').addClass('js-arcivelist p-sidebar_arciveList');
if($('.js-click-arcive').hasClass('js-arcivelist')){

  $('.js-click-arcive').removeClass('js-arcivelist p-sidebar_arciveList');
}
$('.js-click-arcive').on('click',function(e){

  $('.js-arrow').toggleClass('role');
  $('.js-arcivelist').slideToggle('fast');
});

  //==============================================
  //スタッフスライダー
  //==============================================
  $('.staff-inner').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    //次へ、前へボタンスタイル編集
    prevArrow: '<button type=”button” class=staff-prev style="cursor: pointer;outline: none; border: none; z-index: 2; border: none;"></button>',
    nextArrow: '<button type=”button” class=staff-next style="cursor: pointer;outline: none;border: none; z-index: 2;"></button>',
    speed: 1000,
    dotsClass: 'staff-dots',
    infinite: true,
    centerMode: true,
    centerPadding: '',
    responsive: [{
      breakpoint: 420,
      settings: {
        slidesToShow: 1, // 表示スライド数 2つ
        slidesToScroll: 1,
      }
    }]
  });


$('.js-panel').hover(function(){
    $(this).find('.description').addClass('fadein');
    $(this).find('.panel-wraper').addClass('fadein');
  },function(){
    $(this).find('.description').removeClass('fadein');
    $(this).find('.panel-wraper').removeClass('fadein');

  })

})