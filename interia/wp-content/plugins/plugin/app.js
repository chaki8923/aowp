
jQuery(function ($) {


  var custom_uploader = [];
//==================================================
//ABOUT画像
//==================================================
for(let i = 1;i <= 20;i ++){


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


var custom_uploader2 = [];
//==================================================
//ABOUT画像
//==================================================


for(let i = 1;i <= 6;i ++){
  $(`input:button[name=select${i}]`).on('click', function (e) {
    e.preventDefault();
    if (custom_uploader2[i]) {
      custom_uploader2[i].open();
      return;
    }

    custom_uploader2[i] = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    custom_uploader2[i].on('select', function () {
      var images = custom_uploader2[i].state().get('selection');

      images.each(function (file) {
 
   
        $(`input:text[name=back-img${i}]`).val('');
        $(`#product-view${i}`).empty();
        console.log('メイン画像');
        $(`input:text[name=back-img${i}]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#product-view${i}`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  custom_uploader2[i].open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear-select${i}]`).click(function () {
  $(`input:text[name=back-img${i}]`).val(""); //テキストフォームをクリア
  $(`#product-view${i}`).empty(); //id mediaタグの中身をクリア
});

}
$('.custom-tab').on('click',function(e){
  $(this).next().slideToggle();
  $(this).children('.js-arrow').toggleClass('active');
});


});