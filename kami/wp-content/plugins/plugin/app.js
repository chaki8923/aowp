
jQuery(function ($) {


  var custom_uploaders = [];
  //==================================================
  //MENU画像
  //==================================================
  for (let i = 1; i <= 12; i++) {

    $(`input:button[name=about${i}]`).on('click', function (e) {

      console.log('click');
      e.preventDefault();
      if (custom_uploaders[i]) {
        custom_uploaders[i].open();
        return;
      }

      custom_uploaders[i] = wp.media({
        title: "画像を選択", //タイトルのテキストラベル
        button: {
          text: "画像を設定" //ボタンのテキストラベル
        },
        library: {
          type: "image" //imageにしておく。
        },
        multiple: false //選択できる画像を1つだけにする。
      });

      custom_uploaders[i].on('select', function () {
        var images = custom_uploaders[i].state().get('selection');

        images.each(function (file) {
          console.log('OK');
          $(`input:text[name=about-view${i}]`).val('');
          $(`#about-sample${i}`).empty();
          console.log('メイン画像');
          $(`input:text[name=about-view${i}]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
          $(`#about-sample${i}`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
        });
      });

      custom_uploaders[i].open();
    });
    //クリアボタンを押した時の処理
    $(`input:button[name=clear-about${i}]`).click(function () {
      $(`input:text[name=about-view${i}]`).val(""); //テキストフォームをクリア
      $(`#about-sample${i}`).empty(); //id mediaタグの中身をクリア
    });
  }



  var icon_uploader = [];
  //==================================================
  //アイコン画像
  //==================================================
  for (let i = 1; i <= 7; i++) {


    $(`input:button[name=icon${i}]`).on('click', function (e) {
      e.preventDefault();
      if (icon_uploader[i]) {
        icon_uploader[i].open();
        return;
      }

      icon_uploader[i] = wp.media({
        title: "画像を選択", //タイトルのテキストラベル
        button: {
          text: "画像を設定" //ボタンのテキストラベル
        },
        library: {
          type: "image" //imageにしておく。
        },
        multiple: false //選択できる画像を1つだけにする。
      });

      icon_uploader[i].on('select', function () {
        var images = icon_uploader[i].state().get('selection');

        images.each(function (file) {

          $(`input:text[name=icon-view${i}]`).val('');
          $(`#icon-sample${i}`).empty();

          $(`input:text[name=icon-view${i}]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
          $(`#icon-sample${i}`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
        });
      });

      icon_uploader[i].open();
    });
    //クリアボタンを押した時の処理
    $(`input:button[name=clear-icon${i}]`).click(function () {
      $(`input:text[name=icon-view${i}]`).val(""); //テキストフォームをクリア
      $(`#icon-sample${i}`).empty(); //id mediaタグの中身をクリア
    });
  }


  var custom_uploader = '';

  $('input:button[name=media]').on('click', function (e) {
    console.log('click');

    e.preventDefault();
    if (custom_uploader) {
      custom_uploader.open();
      return;
    }

    custom_uploader = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    custom_uploader.on('select', function () {
      var images = custom_uploader.state().get('selection');

      images.each(function (file) {

        $('input:text[name=sampleMedia]').val('');
        $('#media').empty();
        $('input:text[name=sampleMedia]').val(file.attributes.url); //テキストフォームに選択したURLを追加
        $("#media").append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
      });
    });

    custom_uploader.open();
  });

  //クリアボタンを押した時の処理
  $("input:button[name=clear]").click(function () {
    $("input:text[name=sampleMedia]").val(""); //テキストフォームをクリア
    $("#media").empty(); //id mediaタグの中身をクリア
  });



  $('.custom-tab').on('click',function(e){
    $(this).next().slideToggle();
    $(this).children('.js-arrow').toggleClass('active');
  });
  


  var custom_uploader3 = [];
  //==================================================
  //ABOUT画像
  //==================================================
  for(let i = 1;i <= 20;i ++){
  
  
    $(`input:button[name=main-view-select${i}]`).on('click', function (e) {
      e.preventDefault();
      
      if (custom_uploader3[i]) {
        custom_uploader3[i].open();
        return;
      }
  
      custom_uploader3[i] = wp.media({
        title: "画像を選択", //タイトルのテキストラベル
        button: {
          text: "画像を設定" //ボタンのテキストラベル
        },
        library: {
          type: "image" //imageにしておく。
        },
        multiple: false //選択できる画像を1つだけにする。
      });
  
      custom_uploader3[i].on('select', function () {
        var images = custom_uploader3[i].state().get('selection');
  
        images.each(function (file) {
  
          //プレビュー表示されないとこから！その後movie表示させる。oneplateの１００行目
          $(`input:text[name=main-view${i}]`).val('');
          $(`#main-view-preview${i}`).empty();

          $(`input:text[name=main-view${i}]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
          $(`#main-view-preview${i}`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
      });
    });
  
    custom_uploader3[i].open();
  });
  //クリアボタンを押した時の処理
  $(`input:button[name=clear-main-view${i}]`).click(function () {
    $(`input:text[name=main-view${i}]`).val(""); //テキストフォームをクリア
    $(`#main-view-preview${i}`).empty(); //id mediaタグの中身をクリア
  });
  }

  const limit = 50;
  let start_num = $('.js-count-area').val().replace(/[\n\s　]/g, "").length;
  $('.js-count').text(start_num);

$('.js-count-area').on('keyup',function(){
 let count =  $(this).val().replace(/[\n\s　]/g, "").length;
$('.js-count').text(count);
if(count > limit){
  $('.over-text').addClass('err');
  $(this).addClass('err');
  $('.editor-post-publish-button__button').prop('disabled',true);
  $('#publish').prop('disabled',true);
}else{
  $('.err').removeClass('err');
  $(this).removeClass('err');
  $('.editor-post-publish-button__button').prop('disabled',false);
  $('#publish').prop('disabled',false);
}
 
  
});

});