
jQuery(function ($) {


  var custom_uploader = [];
//==================================================
//ABOUT画像
//==================================================
for(let i = 1;i <= 7;i ++){


  $(`input:button[name=about${i}]`).on('click', function (e) {
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
        $(`input:text[name=about-view${i}]`).val('');
        $(`#about-sample${i}`).empty();
        console.log('メイン画像');
        $(`input:text[name=about-view${i}]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#about-sample${i}`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  custom_uploader[i].open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear-about${i}]`).click(function () {
  $(`input:text[name=about-view${i}]`).val(""); //テキストフォームをクリア
  $(`#about-sample${i}`).empty(); //id mediaタグの中身をクリア
});
}

//==================================================
//BLOG背景画像
//==================================================
var blog_bc = '';

  $(`input:button[name=blog-bc]`).on('click', function (e) {
    e.preventDefault();
    if (blog_bc) {
      blog_bc.open();
      return;
    }

    blog_bc = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    blog_bc.on('select', function () {
      var images = blog_bc.state().get('selection');

      images.each(function (file) {
        console.log('OK');
        //プレビュー表示されないとこから！その後movie表示させる。oneplateの１００行目
        $(`input:text[name=sampleBlog]`).val('');
        $(`#blog-bc-view`).empty();
        console.log('メイン画像');
        $(`input:text[name=sampleBlog]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#blog-bc-view`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  blog_bc.open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear-blog]`).click(function () {
  $(`input:text[name=sampleBlog]`).val(""); //テキストフォームをクリア
  $(`#blog-bc-view`).empty(); //id mediaタグの中身をクリア
});

//==================================================
//スケジュール背景画像
//==================================================
var schedule_bc = '';

  $(`input:button[name=schedule-bc]`).on('click', function (e) {
    e.preventDefault();
    if (schedule_bc) {
      schedule_bc.open();
      return;
    }

    schedule_bc = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    schedule_bc.on('select', function () {
      var images = schedule_bc.state().get('selection');

      images.each(function (file) {
        console.log('OK');
        //プレビュー表示されないとこから！その後movie表示させる。oneplateの１００行目
        $(`input:text[name=sampleSchedule]`).val('');
        $(`#schedule-bc-view`).empty();
        console.log('メイン画像');
        $(`input:text[name=sampleSchedule]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#schedule-bc-view`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  schedule_bc.open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear-icon]`).click(function () {
  $(`input:text[name=sampleSchedule]`).val(""); //テキストフォームをクリア
  $(`#schedule-bc-view`).empty(); //id mediaタグの中身をクリア
});


//==================================================
//SEARCH背景画像
//==================================================
var search_bc = '';

  $(`input:button[name=search-bc]`).on('click', function (e) {
    e.preventDefault();
    if (search_bc) {
      search_bc.open();
      return;
    }

    search_bc = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    search_bc.on('select', function () {
      var images = search_bc.state().get('selection');

      images.each(function (file) {
        console.log('OK');
        //プレビュー表示されないとこから！その後movie表示させる。oneplateの１００行目
        $(`input:text[name=sampleSearch]`).val('');
        $(`#search-bc-view`).empty();
        console.log('メイン画像');
        $(`input:text[name=sampleSearch]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#search-bc-view`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  search_bc.open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear-icon]`).click(function () {
  $(`input:text[name=sampleSearch]`).val(""); //テキストフォームをクリア
  $(`#search-bc-view`).empty(); //id mediaタグの中身をクリア
});



var icon_uploader = [];
//==================================================
//アイコン画像
//==================================================
for(let i = 1;i <= 7;i ++){


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


$('.custom-tab').on('click',function(e){
  $(this).next().slideToggle();
  $(this).children('.js-arrow').toggleClass('active');
});

var custom_uploaders = [];
//==================================================
//ABOUT画像
//==================================================
for(let i = 1;i <= 21;i ++){


  $(`input:button[name=main-view-select${i}]`).on('click', function (e) {
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
        //プレビュー表示されないとこから！その後movie表示させる。oneplateの１００行目
        $(`input:text[name=main-view${i}]`).val('');
        $(`#main-view-preview${i}`).empty();
        console.log('メイン画像');
        $(`input:text[name=main-view${i}]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#main-view-preview${i}`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  custom_uploaders[i].open();
});
//クリアボタンを押した時の処理
$(`input:button[name=clear-main-view${i}]`).click(function () {
  $(`input:text[name=main-view${i}]`).val(""); //テキストフォームをクリア
  $(`#main-view-preview${i}`).empty(); //id mediaタグの中身をクリア
});
}


});