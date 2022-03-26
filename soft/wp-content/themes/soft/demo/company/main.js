$(function(){


  //TOPへ戻る
  var $top = $('.js-top');
  $top.on('click',function(){

    $('body,html').animate({scrollTop: 0},300);
    
  });
 //=====================================================================
$(window).on('scroll', function(){
 var docHeight = $(document).innerHeight(), //ドキュメントの高さ
     windowHeight = $(window).innerHeight(), //ウィンドウの高さ
     pageBottom = docHeight - windowHeight; //ドキュメントの高さ - ウィンドウの高さ

 if(pageBottom <= $(window).scrollTop() + 190) {
   
   $top.addClass('bottom');  
 }else{
   $top.removeClass('bottom');
  
 }
});
  

   //ハンバーガーメニュー
   $('.bar').on('click',function(){
     $(this).find('.bar-top').toggleClass('active');
     $(this).find('.bar-middle').toggleClass('active');
     $(this).find('.bar-bottom').toggleClass('active');
     $('.header-sp').toggleClass('active');
   })
 

 var window_h = $(window).height();

 //スクロールした時の全てのアクション
 $(window).on('scroll',function(){

   $(".r-01").add($(".r-02")).add($(".r-03")).add($(".r-04")).each(function() {
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
    if( $(window).scrollTop() > 250){
      $('.js-top').addClass('fadein');
    }else{
      $('.js-top').removeClass('fadein');
    }
 });
//=====================================================
 
var $footer = $('.footer');
if(window.innerHeight > $footer.offset().top + $footer.outerHeight() ) {
    $footer.attr({'style': 'position:fixed; top:' + (window.innerHeight - $footer.outerHeight()) + 'px;' });
}
var $copy = $('.copy-right');
if(window.innerHeight > $copy.offset().top + $copy.outerHeight() ) {
    $copy.attr({'style': 'position:fixed; top:' + (window.innerHeight - $copy.outerHeight()) + 'px;' });
}

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
  prevArrow: '<button type=”button” class=slick-prev style="background: none; cursor: pointer;outline: none; border: none;z-index: 20; border: none;"><img src=img/arrow-l.png style="width: 30px;" class = "slick-next"></button>',
  nextArrow: '<button type=”button” class=slick-next style="background: none; cursor: pointer;outline: none;border: none; z-index: 20;"><img src=img/arrow-r.png style="width: 30px;"></button>',
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
  prevArrow: '<button type=”button” class=slick-prev style="background: none; cursor: pointer;outline: none; border: none;z-index: 20; border: none;"><img src=img/arrow-l.png style="width: 30px;" class = "slick-next"></button>',
  nextArrow: '<button type=”button” class=slick-next style="background: none; cursor: pointer;outline: none;border: none; z-index: 20;"><img src=img/arrow-r.png style="width: 30px;"></button>',
  dotsClass: 'dots',
  /* ～ここまで */
  slidesToShow: 1,
  slidesToScroll: 1,
});
 
})