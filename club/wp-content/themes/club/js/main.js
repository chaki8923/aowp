$(function () {

  
   //ハンバーガーメニュー
   $('.bar').stop().on('click', function () {
    $(this).find('.bar-top').toggleClass('active');
    $(this).find('.bar-middle').toggleClass('active');
    $(this).find('.bar-bottom').toggleClass('active');
    console.log('click');
    $('.header-menu').toggleClass('slideIn')
   });

   //別のとこクリックでもnavしまう
  $(document).on('click', function (e) {
    if (!$(e.target).closest('.bar').length) {
      $('.bar-top').removeClass('active');
      $('.bar-middle').removeClass('active');
      $('.bar-bottom').removeClass('active');
      $('.header-menu').removeClass('slideIn');
    } else {
      // ターゲット要素をクリックした時の操作
    }
  });
  //=====================================================================

  $('.js-catList').hover(function(){

    $(this).find('.js-thumbnail img').addClass('zoomup');
  },function(){
    $(this).find('.js-thumbnail img').removeClass('zoomup');
  });

  $('.js-news-link').hover(function(){
    $(this).find('.news-inner__img img').addClass('zoomup');
  },function(){
    $(this).find('.news-inner__img img').removeClass('zoomup');
  });


  $('.js-list').find('li').addClass('js-arcivelist p-sidebar_arciveList');
  if($('.js-click-arcive').hasClass('js-arcivelist')){

    
    $('.js-click-arcive').removeClass('js-arcivelist p-sidebar_arciveList');
  }
  $('.js-click-arcive').on('click',function(e){

    $('.js-arrow').toggleClass('role');
    $('.js-arcivelist').slideToggle('fast');
  });
  


  var window_h = $(window).height();

  //スクロールした時の全てのアクション
  $(window).on('scroll', function () {
    var scroll_top = $(window).scrollTop();


    $(".slide").add($(".slide2")).add($(".js-panel")).add($(".manu")).each(function () {
      //各box要素のtopの位置を取得する
      var elem_pos = $(this).offset().top;

      //どのタイミングでフェードインさせるか

      if (scroll_top >= elem_pos - window_h + 200) {

        $(".menu").addClass("fadein");  
      } 


    });


    //TOPに戻るボタンが出たり消えたり
    if ($(window).scrollTop() > 250) {
      $('.js-top').addClass('fadein');
    } else {
      $('.js-top').removeClass('fadein');
    }
  });

    //TOPへ戻る
    var $top = $('.js-top');
    $top.on('click', function () {
  
      $('body,html').animate({ scrollTop: 0 }, 300);
  
    });

  $('.js-panel').hover(function(){
    $(this).find('.js-text').addClass('slideup');
  },function(){
    $(this).find('.js-text').removeClass('slideup');
  })
  //=====================================================


  //==============================================
  //スライダー
  //==============================================
  $('.main-slider').slick({
    autoplay: false,
    autoplaySpeed: 5000,
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1,
		//次へ、前へボタンスタイル編集
    prevArrow: '<button type=”button” class="slick-prev" style="cursor: pointer;outline: none; border: none; z-index: 2; border: none;"></button>',
    nextArrow: '<button type=”button” class="slick-next" style=" cursor: pointer;outline: none;border: none; z-index: 2;"></button>',
    speed:1000,
    dotsClass: 'dots',
    infinite: true,
    centerMode: true,
    centerPadding: '',
    pauseOnFocus: false,
    pauseOnHover: false
  });


　//画像が真ん中に来た時の効果を付与したり外したり
  
  // $('.slick-current').css('background-size',100 + '%');
  $('.slick-current').css('background-size',120 + '%');
  $('.slick-current').stop().animate({'background-size': 150 + '%'},8000);
  $('.slide-inner').addClass('is--active');


$('.main-slider').on('afterChange', function(slick, currentSlide) {
  $('.slick-current').css('background-size',120 + '%');
  $('.slick-current').stop().animate({'background-size': 150 + '%'},8000);
  $('.slide-inner').addClass('is--active');
});
$('.main-slider').on('beforeChange', function(slick, currentSlide) {
  setTimeout(function(){
  $('.slick-current').css('background-size', 120 + '%');
  $('.slide-inner').removeClass('is--active');
  },100);
});


  //=========================================================
  //SPフッター用
  //=========================================================

  $('.js-footer-top').on('click',function(){
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

   //ローディングアイコン
   $(window).on('load', function () { //全ての読み込みが完了したら実行
    $('.loading').delay(1000).fadeOut();
  });

  //3秒たったら強制的にロード画面を非表示
  $(function () {
    setTimeout(stopload, 1000);
  });

  
  function stopload() {
    $('.loading').fadeOut();
  }

  $('.js-footer-top').on('click', function () {

    $('body,html').animate({ scrollTop: 0 }, 300);

  });

  setTimeout(function(){
    $('.wpcf7-response-output').fadeOut();
  },5000);


})