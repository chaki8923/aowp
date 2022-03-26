
jQuery(function ($) {


  var custom_uploader = [];
//==================================================
//メイン画像
//==================================================
for(let i = 1;i <= 3;i ++){


  $(`input:button[name=media${i}]`).on('click', function (e) {
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
    
        
        //プレビュー表示されないとこから！その後movie表示させる。oneplateの１００行目
        $(`input:text[name=sampleMedia${i}]`).val('');
        $(`#media${i}`).empty();
        console.log('メイン画像');
        $(`input:text[name=sampleMedia${i}]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#media${i}`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  custom_uploader[i].open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear${i}]`).click(function () {
  $(`input:text[name=sampleMedia${i}]`).val(""); //テキストフォームをクリア
  $(`#media${i}`).empty(); //id mediaタグの中身をクリア
});
}

  var icon_uploader = [];
//==================================================
//メイン画像
//==================================================
for(let i = 1;i <= 5;i ++){


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

        //プレビュー表示されないとこから！その後movie表示させる。oneplateの１００行目
        $(`input:text[name=icon-view${i}]`).val('');
        $(`#media-icon${i}`).empty();
        console.log('メイン画像');
        $(`input:text[name=icon-view${i}]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#media-icon${i}`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  icon_uploader[i].open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear-icon${i}]`).click(function () {
  $(`input:text[name=icon-view${i}]`).val(""); //テキストフォームをクリア
  $(`#media-icon${i}`).empty(); //id mediaタグの中身をクリア
});
}

//==================================================
//業務内容画像
//==================================================
var work_bc = '';

  $(`input:button[name=work-bc]`).on('click', function (e) {
    e.preventDefault();
    if (work_bc) {
      work_bc.open();
      return;
    }

    work_bc = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    work_bc.on('select', function () {
      var images = work_bc.state().get('selection');

      images.each(function (file) {
        console.log('OK');
        //プレビュー表示されないとこから！その後movie表示させる。oneplateの１００行目
        $(`input:text[name=sampleWork]`).val('');
        $(`#work-bc-view`).empty();
        console.log('メイン画像');
        $(`input:text[name=sampleWork]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#work-bc-view`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  work_bc.open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear-icon]`).click(function () {
  $(`input:text[name=sampleWork]`).val(""); //テキストフォームをクリア
  $(`#work-bc-view`).empty(); //id mediaタグの中身をクリア
});

//==================================================
//その他内容画像
//==================================================
var another_bc = [];
for(let i = 4;i <= 5;i ++){
  $(`input:button[name=another-bc${i}]`).on('click', function (e) {
    e.preventDefault();
    if (another_bc[i]) {
      another_bc[i].open();
      return;
    }

    another_bc[i] = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    another_bc[i].on('select', function () {
      var images = another_bc[i].state().get('selection');

      images.each(function (file) {
        console.log('OK');
        //プレビュー表示されないとこから！その後movie表示させる。oneplateの１００行目
        $(`input:text[name=sampleanother${i}]`).val('');
        $(`#another-bc-view${i}`).empty();
        console.log('メイン画像');
        $(`input:text[name=sampleanother${i}]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#another-bc-view${i}`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  another_bc[i].open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear-another${i}]`).click(function () {
  $(`input:text[name=sampleanother${i}]`).val(""); //テキストフォームをクリア
  $(`#another-bc-view${i}`).empty(); //id mediaタグの中身をクリア
});
}

//==================================================
//ロゴ画像
//==================================================
var logo = '';

  $(`input:button[name=logo-select]`).on('click', function (e) {
    e.preventDefault();
    if (logo) {
      logo.open();
      return;
    }

    logo = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    logo.on('select', function () {
      var images = logo.state().get('selection');

      images.each(function (file) {
        console.log('OK');
        //プレビュー表示されないとこから！その後movie表示させる。oneplateの１００行目
        $(`input:text[name=samplelogo]`).val('');
        $(`#logo`).empty();
        console.log('メイン画像');
        $(`input:text[name=samplelogo]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#logo`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  logo.open();
});
//クリアボタンを押した時の処理
$(`input:button[name=logo-delete]`).click(function () {
  $(`input:text[name=samplelogo]`).val(""); //テキストフォームをクリア
  $(`#logo`).empty(); //id mediaタグの中身をクリア
});

$('.custom-tab').on('click',function(e){
  $(this).next().slideToggle();
  $(this).children('.js-arrow').toggleClass('active');
});


});