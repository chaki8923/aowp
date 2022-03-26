$(function () {


  
  //ローディングアイコン
  $(window).on('load', function () { //全ての読み込みが完了したら実行
    $('.loading').delay(600).fadeOut('fast');
  });

  $(function () {
    setTimeout(stopload, 400);
  });

  function stopload() {
    $('.js-loading').fadeOut();
  }

  //TOPへ戻る
  var $top = $('.top');
  $top.on('click', function () {

    $('body,html').animate({ scrollTop: 0 }, 300);
    
  });
  

  
   //ハンバーガーメニュー
   $('.bar').stop().on('click', function () {
    $(this).find('.bar-top').toggleClass('active');
    $(this).find('.bar-middle').toggleClass('active');
    $(this).find('.bar-bottom').toggleClass('active');
    console.log('click');
    $('.header-menu').fadeToggle(400);
    $slide.toggleClass('opacity');

    if($('.bar-top').hasClass('active')){
      stopSlide();
    }else{

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

  $('.bar').on('click',function(){
    $('.sp-header').toggleClass('slidein');
  })

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
//=========================================================
//商品画像パネル切り替え
//=========================================================
var $mainImg = $('.single-product-right_inner');
var $subImg = $('.js-single_img');

$subImg.on('click',function(e){
 $mainImg.find('img').css('opacity',0);
 var src = $(this).find('img').attr('src');
 if(src){

   $mainImg.find('img').attr('src',src).animate({'opacity':1},500);
 }else{
   return;
 }

});

//=========================================================
  var window_h = $(window).height();

  //スクロールした時の全てのアクション
  $(window).on('scroll', function () {
    var scroll_top = $(window).scrollTop();
    if(scroll_top > 100){
      $('.header').add($('.header-cover')).stop().animate({'height':50},300);
    }else{
      $('.header').add($('.header-cover')).stop().animate({'height':80},300);
    }

    $('.carten').each(function(){
      var elem_pos = $(this).offset().top;
      if (scroll_top >= elem_pos - window_h + 200) {

        $(this).addClass("slide");  

      } 

    });


    $(".slide").add($(".js-panel")).add($(".manu")).each(function () {
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

  $('.js-panel').hover(function(){
    $(this).find('.js-text').addClass('slideup');
  },function(){
    $(this).find('.js-text').removeClass('slideup');
  })
  //=====================================================

  var $footer = $('.footer');
  if(window.innerHeight > $footer.offset().top + $footer.outerHeight() ) {
      $footer.attr({'style': 'position:fixed; top:' + (window.innerHeight - $footer.outerHeight()) + 'px;' });
  }



  //==========================================================
  //フェードスライダー
  //==========================================================

  var $slide = $('.js-slide');
  var slideLength = $slide.length - 1;
  var currentSlide = 0;
  const duration = 3500;

  // 一旦全部消して今のスライドだけ表示
  $slide.addClass('slideout');
  $slide.eq(currentSlide).removeClass('slideout').addClass('slidein');
  
  //スライドチェンジ
  function slideChange() {
    

    $slide.removeClass('slidein');
    $slide.addClass('slideout');
    $slide.eq(currentSlide).removeClass('slideout').addClass('slidein');

    
  }
  
  //スライダースタート
  function startSlide() {
    timer = setInterval(function () {
      if (currentSlide == slideLength) {
        currentSlide = 0;
        $slide.addClass('slideout');
        $slide.eq(currentSlide).removeClass('slideout').addClass('slidein');
        slideChange();
      } else {
        currentSlide++;
        slideChange();
      }
    },6000);
  }
  //ストップスライド
  function stopSlide() {
    clearInterval(timer);
  }

  //スライダ関係の関数をスタート
  startSlide();

 

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


  $('.js-card').hover(function(){
    $(this).find('.js-card-image').addClass('zoom');
    console.log('hover');
    
  },function(){
    
    $(this).find('.js-card-image').removeClass('zoom');
  });

  setTimeout(function(){
    $('.wpcf7-response-output').fadeOut();
  },5000);

  //月選択
$('.js-list').find('li').addClass('js-arcivelist p-sidebar_arciveList');
if($('.js-click-arcive').hasClass('js-arcivelist')){

  $('.js-click-arcive').removeClass('js-arcivelist p-sidebar_arciveList');
}
$('.js-click-arcive').on('click',function(e){

  $('.js-arrow').toggleClass('role');
  $('.js-arcivelist').slideToggle('fast');
});


})