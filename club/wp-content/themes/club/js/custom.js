jQuery(document).ready(function($) {




  var custom_image = '';
  $('input:button[name=detail]').on('click',function(e){
    console.log('click');
    
    e.preventDefault();
    if (custom_image) {
      custom_image.open();
      return;
    }
    custom_image = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });
    console.log(custom_image);

  
    custom_image.on('select', function () {
      var images = [];
          images = custom_image.state().get('selection');

      images.each(function (file) {
        $(`input:text[name=back-img]`).val('');
        
        $(`#back-view`).empty();
        $(`input:text[name=back-img]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#back-view`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
        
    });
  });

  custom_image.open();

  });
  //クリアボタンを押した時の処理
$(`input:button[name=clear-detail]`).click(function (e) {
  e.preventDefault();
  console.log('clear');
  
  $(`input:text[name=back-img]`).val(""); //テキストフォームをクリア
  $(`#back-view`).empty(); //id mediaタグの中身をクリア
});

//======================================================================
//先輩ゾーン
//======================================================================
  var actor_image = '';
  $('input:button[name=select]').on('click',function(e){
    console.log('click');
    
    e.preventDefault();
    if (actor_image) {
      actor_image.open();
      return;
    }
    actor_image = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });


  
    actor_image.on('select', function () {
      var images = [];
          images = actor_image.state().get('selection');

      images.each(function (file) {
        $(`input:text[name=actor-img]`).val('');
        
        $(`#actor-view`).empty();
        $(`input:text[name=actor-img]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#actor-view`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
        
    });
  });

  actor_image.open();

  });
  //クリアボタンを押した時の処理
$(`input:button[name=clear-select]`).click(function (e) {
  e.preventDefault();
  console.log('clear');
  
  $(`input:text[name=actor-img]`).val(""); //テキストフォームをクリア
  $(`#actor-view`).empty(); //id mediaタグの中身をクリア
});



});