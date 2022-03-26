
jQuery(function ($) {

  var custom_uploader;
//==================================================
//メイン画像
//==================================================

  $('input:button[name=media]').on('click', function (e) {
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
        console.log('メイン画像');
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

var custom_uploader2;
//==================================================
//アバウト画像1
//==================================================
  $('input:button[name=media2]').on('click', function (e) {
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

        $('input:text[name=about-image1]').val('');
        $('#media2').empty();
        console.log('アバウト画像1');
        $('input:text[name=about-image1]').val(file.attributes.url); //テキストフォームに選択したURLを追加
        $("#media2").append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  custom_uploader2.open();
});
//クリアボタンを押した時の処理
$("input:button[name=clear-media2]").click(function () {
  $("input:text[name=about-image1]").val(""); //テキストフォームをクリア
  $("#media2").empty(); //id mediaタグの中身をクリア
});


//==================================================
//アバウト画像2
//==================================================
var custom_uploader3;
  $('input:button[name=media3]').on('click', function (e) {

    e.preventDefault();

    if (custom_uploader3) {
      custom_uploader3.open();
      return;
    }

    custom_uploader3 = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    custom_uploader3.on('select', function () {
      var images = custom_uploader3.state().get('selection');

      images.each(function (file) {

        $('input:text[name=about-image2]').val('');
        $('#media3').empty();
        console.log('アバウト画像2');
        $('input:text[name=about-image2]').val(file.attributes.url); //テキストフォームに選択したURLを追加
        $("#media3").append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  custom_uploader3.open();
});
//クリアボタンを押した時の処理
$("input:button[name=clear-media3]").click(function () {
  $("input:text[name=about-image2]").val(""); //テキストフォームをクリア
  $("#media3").empty(); //id mediaタグの中身をクリア
});


var custom_uploader4;
  $('input:button[name=media4]').on('click', function (e) {

    e.preventDefault();

    if (custom_uploader4) {
      custom_uploader4.open();
      return;
    }

    custom_uploader4 = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    custom_uploader4.on('select', function () {
      var images = custom_uploader4.state().get('selection');

      images.each(function (file) {

        $('input:text[name=logo]').val('');
        $('#media4').empty();
       
        $('input:text[name=logo]').val(file.attributes.url); //テキストフォームに選択したURLを追加
        $("#media4").append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  custom_uploader4.open();
});
//クリアボタンを押した時の処理
$("input:button[name=clear4]").click(function () {
  $("input:text[name=logo]").val(""); //テキストフォームをクリア
  $("#media4").empty(); //id mediaタグの中身をクリア
});

var custom_uploader5;
  $('input:button[name=media5]').on('click', function (e) {

    e.preventDefault();

    if (custom_uploader5) {
      custom_uploader5.open();
      return;
    }

    custom_uploader5 = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });

    custom_uploader5.on('select', function () {
      var images = custom_uploader5.state().get('selection');

      images.each(function (file) {

        $('input:text[name=logo2]').val('');
        $('#media5').empty();
       
        $('input:text[name=logo2]').val(file.attributes.url); //テキストフォームに選択したURLを追加
        $("#media5").append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
    });
  });

  custom_uploader5.open();
});
//クリアボタンを押した時の処理
$("input:button[name=clear5]").click(function () {
  $("input:text[name=logo2]").val(""); //テキストフォームをクリア
  $("#media5").empty(); //id mediaタグの中身をクリア
});


});