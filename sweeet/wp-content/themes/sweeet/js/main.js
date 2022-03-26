$(function () {


  var slideCurrent = 0;
  var lastslide = $('.sweet').length - 1;

  $('.sweet').css('display', 'none');
  $('.sweet').eq(slideCurrent).fadeIn();

  function changeSlide() {

    $('.sweet').fadeOut(3500);
    $('.sweet').eq(slideCurrent).fadeIn(3500);

  }

   //ローディングアイコン
   $(window).on('load', function () { //全ての読み込みが完了したら実行
    $('.loading').delay(400).fadeOut('fast');
  });

  //3秒たったら強制的にロード画面を非表示
  $(function () {
    setTimeout(stopload, 400);
  });

  function stopload() {
    $('.loading').fadeOut();
  }

  $('.js-footer-top').on('click', function () {

    $('body,html').animate({ scrollTop: 0 }, 300);

  });

  function startSlide() {

    setInterval(function () {

      if (slideCurrent == lastslide) {
        slideCurrent = 0;
        changeSlide();
      } else {

        slideCurrent++;
        changeSlide();
      }
    }, 5000);
  }

  startSlide();



  $('.header').add($('.bar')).on('click', function () {
    $('.header').toggleClass('wide');
    $('.header').find('ul').toggleClass('active');
    $('.header').find('ul').fadeToggle();
    $('.bar').toggleClass('active');
    $('.bar-top').toggleClass('active');
    $('.bar-bottom').toggleClass('active');
    $('.menu').fadeToggle(0);
    $('.close').fadeToggle(0);
  })


  var window_h = $(window).height();

  //スクロールイベント
  $(window).on("scroll", function () {


    var scroll_top = $(window).scrollTop();

    $('.product-title').add($('.news-title')).add($('.map-title')).each(function () {
      //各box要素のtopの位置を取得する
      var elem_pos = $(this).offset().top;

      //どのタイミングでフェードインさせるか
      if (scroll_top >= elem_pos - window_h + 200) {
        $(this).addClass("active");
      } else {
        $(this).removeClass("active"); //そうでない場合はクラスを削除
      }
    });

  });
  //===========================================
  //newsエリアホバーアニメーション
  //===========================================
  $('.news-box').hover(function (e) {
    $(this).find('p').css('color', '#fff');
    $(this).find('span').css('color', '#fff');
    $(this).find('.news-svg').css('color', 'rgb(247, 119, 158)');
    $(this).find('.news-box__text').css('background', 'rgb(247, 119, 158)');
    $(this).find('.news-box__leftImg').addClass('scale');
    $(this).find('.detail-arrow').addClass('active');
    
  }, function (e) {
    $(this).find('p').css('color', '#333');
    $(this).find('span').css('color', '#333');
    $(this).find('.news-svg').css('color','#fff');
    $(this).find('.news-box__text').css('background','#fff');
    $(this).find('.news-box__leftImg').removeClass('scale');
    $(this).find('.detail-arrow').removeClass('active');
    
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


setTimeout(function(){
  $('.wpcf7-response-output').fadeOut();
},5000);


$(function () {
  var parallaxContent = $(".paralla");
  var parallaxNum = parallaxContent.offset().top;
  var parallaxFactor = 0.3;
  var windowHeight = $(window).height();
  var scrollYStart = parallaxNum - windowHeight;
  $(window).on('scroll', function () {
      var scrollY = $(this).scrollTop();
      if (scrollY > scrollYStart) {
          parallaxContent.css('background-position-y', (scrollY - parallaxNum) * parallaxFactor + 'px');
      } 
  });
});

$(function () {
  var parallaxContent = $(".paralla2");
  var parallaxNum = parallaxContent.offset().top;
  var parallaxFactor = 0.3;
  var windowHeight = $(window).height();
  var scrollYStart = parallaxNum - windowHeight;
  $(window).on('scroll', function () {
      var scrollY = $(this).scrollTop();
      if (scrollY > scrollYStart) {
          parallaxContent.css('background-position-y', (scrollY - parallaxNum) * parallaxFactor + 'px');
      } 
  });
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