
jQuery(function ($) {


  var custom_uploader = [];
//==================================================
//ABOUT画像
//==================================================
for(let i = 1;i <= 22;i ++){


  $(`input:button[name=main-view-select${i}]`).on('click', function (e) {
    e.preventDefault();
    if (custom_uploader[i]) {
      custom_uploader[i].open();
      return;
    }

    custom_uploader[i] = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    custom_uploader[i].on('select', function () {
      var images = custom_uploader[i].state().get('selection');

      images.each(function (file) {
        console.log('OK');
        //プレビュー表示されないとこから！その後movie表示させる。oneplateの１００行目
        $(`input:text[name=main-view${i}]`).val('');
        $(`#main-view-preview${i}`).empty();
        console.log('メイン画像');
        $(`input:text[name=main-view${i}]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#main-view-preview${i}`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  custom_uploader[i].open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear-main-view${i}]`).click(function () {
  $(`input:text[name=main-view${i}]`).val(""); //テキストフォームをクリア
  $(`#main-view-preview${i}`).empty(); //id mediaタグの中身をクリア
});
}


var custom_uploader2 = '';
//==================================================
//ABOUT画像
//==================================================



  $(`input:button[name=select]`).on('click', function (e) {
    e.preventDefault();
    if (custom_uploader2) {
      custom_uploader2.open();
      return;
    }

    custom_uploader2 = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    custom_uploader2.on('select', function () {
      var images = custom_uploader2.state().get('selection');

      images.each(function (file) {
        console.log('OK');
   
        $(`input:text[name=back-img]`).val('');
        $(`#actor-view`).empty();
        console.log('メイン画像');
        $(`input:text[name=back-img]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#actor-view`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  custom_uploader2.open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear-select]`).click(function () {
  $(`input:text[name=back-img]`).val(""); //テキストフォームをクリア
  $(`#actor-view`).empty(); //id mediaタグの中身をクリア
});

$('.custom-tab').on('click',function(e){
  $(this).next().slideToggle();
  $(this).children('.js-arrow').toggleClass('active');
});


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