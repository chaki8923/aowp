$(function() {

  
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
   $top.on('click',function(){

     $('body,html').animate({scrollTop: 0},300);
     
   });
  //=====================================================================

    //ハンバーガーメニュー
    $('.bar').on('click',function(){
      $(this).find('.bar-top').toggleClass('active');
      $(this).find('.bar-middle').toggleClass('active');
      $(this).find('.bar-bottom').toggleClass('active');
      $('.top-menu').toggleClass('active');
      $('.sp-header').toggleClass('active');
    });

    $(document).on('click', function (e) {
      if (!$(e.target).closest('.bar').length) {
        $('.bar-top').removeClass('active');
        $('.bar-middle').removeClass('active');
        $('.bar-bottom').removeClass('active');
        $('.sp-header').removeClass('active');
      } else {
        // ターゲット要素をクリックした時の操作
      }
    });
  

  var window_h = $(window).height();

  //スクロールした時の全てのアクション
  $(window).on('scroll',function(){

    $(".about").add($(".feature")).add($('.feature-merit__inner')).add($('.option')).add($('.option-box')).add($('.theme')).add($('.news')).add($('.voice')).each(function() {
      //各box要素のtopの位置を取得する
      var elem_pos = $(this).offset().top;
      var scroll_top = $(window).scrollTop();
      //どのタイミングでフェードインさせるか
      
      if (scroll_top >= elem_pos - window_h + 250) {

        $(this).addClass("fadein");
      } else {
        $(this).removeClass("fadein"); //そうでない場合はクラスを削除
      }

      
    });
    $('.news').add($('.voice')).each(function() {
      //各box要素のtopの位置を取得する
      var elem_pos = $(this).offset().top;
      var scroll_top = $(window).scrollTop();
      //どのタイミングでフェードインさせるか
      
      if (scroll_top >= elem_pos - window_h + 250) {

        $(this).addClass("fadein");
      } else {
        $(this).removeClass("fadein"); //そうでない場合はクラスを削除
      }

      
    });
    //TOPに戻るボタンが出たり消えたり
    var scroll_top = $(window).scrollTop();
    if(scroll_top > 220){
      $('.top-return').addClass('fadein');
    }else{
      $('.top-return').removeClass('fadein');
    }
    var docHeight = $(document).innerHeight(), //ドキュメントの高さ
      windowHeight = $(window).innerHeight(), //ウィンドウの高さ
      pageBottom = docHeight - windowHeight; //ドキュメントの高さ - ウィンドウの高さ

  if(pageBottom <= $(window).scrollTop() + 190) {
    
    // $top.addClass('bottom');  
  }else{
    // $top.removeClass('bottom');
   
  }
  });
//=====================================================
  //利用規約に同意がなければ購入ボタンを押せない
  $('[name="check"]').change(function(){
    if( $(this).prop('checked') ){
        $('.plice-btn__buy').removeClass('noclick')
      }else{
        $('.plice-btn__buy').addClass('noclick')
    }
});
//===================================================
//ページ下部購入ボタン
  $('[name="checkbottom"]').change(function(){
    if( $(this).prop('checked') ){
        $('.bottom-btn__buy').removeClass('noclick')
      }else{
        $('.bottom-btn__buy').addClass('noclick')
    }
});
//===================================================
//オプション購入ボタン
  $('[name="check-option"]').change(function(){
    if( $(this).prop('checked') ){
        $(this).parent('.bottom-kiyakuarea').prev('.bottom-btn').children('.option-btn').removeClass('noclick');
      }else{
        $(this).parent('.bottom-kiyakuarea').prev('.bottom-btn').children('.option-btn').addClass('noclick');
    }
});
//===================================================
//フッター固定
// var $footer = $('.js-footer');
// if(window.innerHeight > $footer.offset().top + $footer.outerHeight() ) {
//   $footer.attr({'style': 'position:fixed; top:' + (window.innerHeight - $footer.outerHeight()) + 'px;' });
//   }

  //月選択
$('.js-list').find('li').addClass('js-arcivelist p-sidebar_arciveList');
if($('.js-click-arcive').hasClass('js-arcivelist')){

  $('.js-click-arcive').removeClass('js-arcivelist p-sidebar_arciveList');
}
$('.js-click-arcive').on('click',function(e){

  $('.js-arrow').toggleClass('role');
  $('.js-arcivelist').slideToggle('fast');
});


$('.js-voice-panel').hover(function(){
  
  $(this).find('.person-img').addClass('zoom');
},function(){
  
  $(this).find('.person-img').removeClass('zoom');
});


setTimeout(function(){
  $('.wpcf7-response-output').fadeOut();
},5000);


});