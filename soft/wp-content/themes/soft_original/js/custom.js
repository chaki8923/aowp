jQuery(function($) {



for(let i = 1;i <= 5; i ++){
  var custom_image = [];
  $(`input:button[name=detail${i}]`).on('click',function(e){

    e.preventDefault();
    if (custom_image[i]) {
      custom_image[i].open();
      return;
    }
    custom_image[i] = wp.media({
      title: "画像を選択", //タイトルのテキストラベル
      button: {
        text: "画像を設定" //ボタンのテキストラベル
      },
      library: {
        type: "image" //imageにしておく。
      },
      multiple: false //選択できる画像を1つだけにする。
    });
    console.log(custom_image[i]);

  
    custom_image[i].on('select', function () {
      var images = [];
          images[i] = custom_image[i].state().get('selection');

      images[i].each(function (file) {
//検証ツールで見た時にtextタグのvalue属性変わってないから保存しても画像が変わらない。
        $(`input:text[name=detail-img${i}]`).val('');
        console.log(`#detail-view${i}` + 'の画像最初　' + $(`input:text[name=detail-img${i}]`).val());
        $(`#detail-view${i}`).empty();
        $(`input:text[name=detail-img${i}]`).val(file.attributes.url); //テキストフォームに選択したURLを追加
        $(`#detail-view${i}`).append('<img src="' + file.attributes.url + '" />');//プレビュー用にメディアアップローダーで選択した画像を表示させる
        console.log(`#detail-view${i}` + 'の画像次　' + $(`input:text[name=detail-img${i}]`).val());
    });
  });

  custom_image[i].open();

  });
  //クリアボタンを押した時の処理
$(`input:button[name=clear-detail${i}]`).click(function (e) {
  e.preventDefault();
  console.log('clear');
  
  $(`input:text[name=about-image${i}]`).val(""); //テキストフォームをクリア
  $(`#detail-view${i}`).empty(); //id mediaタグの中身をクリア
});

}


});