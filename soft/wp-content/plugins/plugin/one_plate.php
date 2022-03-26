<?php
/*
Plugin Name: One Plate
Description: 画面編集プラグイン
Version: 2.0
Author: Chaki

*/


function get_current_link()
{
  return (is_ssl() ? 'https' : 'http') . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
}


function add_init()
{
  // 参照url::https://www.tailtension.com/wordpress/1743/
  wp_register_style('chaki-css', plugins_url('plugin.css', __FILE__));
  wp_enqueue_style('chaki-css');
  wp_register_script('chaki-js', plugins_url('app.js', __FILE__));
  wp_enqueue_script('chaki-js');
}
add_action('admin_init', 'add_init');


class top_page_setting
{

  /* 初期化処理でメニューを追加 */
  function __construct()
  {
    add_action('admin_menu', array($this, 'add_pages'));
  }

  function add_pages()
  {
    //第一引数　ページタイトル
    //第二引数　管理画面に表示される名前
    //第三引数　管理者
    //第四引数　スラッグ名
    //第五引数　プラグイン開いた時のページの中身
    //アイコン　https://developer.wordpress.org/resource/dashicons/　こん中にまとまってる
    //表示場所
    add_menu_page(
      'TOPメニュー編集',
      'TOPページ編集',
      'level_8',
      __FILE__,
      array($this, 'show_option_page'),
      '',
      25,
    );
  }

  /* 画面に表示する内容 */
  function show_option_page()
  {


    /* 値が POST されたら wp_options に保存する */
    if (!empty($_POST)) {

      // check_admin_referer('plugin-option-update');
      //変数にpostの値代入
      //========================================================
      //保存用
      //========================================================
      $main_color = $_POST['main-color'];
      $font_color = $_POST['font_color'];
      $bc_color = $_POST['bc-color'];
      $main_image = $_POST['sampleMedia'];
      $main_text = $_POST['main-text'];
      //ABOUTエリア
      $abou_title = $_POST['about-title'];
      $about_subtitle = $_POST['about-subtitle'];
      $about_image1 = $_POST['about-image1'];
      $about_image2 = $_POST['about-image2'];
      $about_textTop = $_POST['about-textTop'];
      $about_textMiddle = $_POST['about-textMiddle'];
      $about_textBottom = $_POST['about-textBottom'];
      $logo = $_POST['logo'];
      $logo2 = $_POST['logo2'];
      //FEATUREタイトル保存用
      $feature_title = $_POST['feature-title'];
      $feature_subtitle = $_POST['feature-subtitle'];
      //オプションタイトル
      $option_title = $_POST['option-title'];
      $option_subtitle = $_POST['option-subtitle'];
      //voiceタイトル
      $voice_title = $_POST['voice-title'];
      $voice_subtitle = $_POST['voice-subtitle'];
      //productタイトル
      $product_title = $_POST['product-title'];
      $product_subtitle = $_POST['product-subtitle'];
      //ニュースタイトル
      $news_title = $_POST['news-title'];
      $news_subtitle = $_POST['news-subtitle'];
      //MAPエリア
      $schedule = $_POST['schedule'];
      $time1 = $_POST['time1'];
      $time2 = $_POST['time2'];
      $post = $_POST['post'];
      $add = $_POST['add'];
      $tell = $_POST['tell'];
      $map = stripslashes($_POST['my-map']);
      $loading = stripslashes($_POST['loading']);
        //予定表の○✖️
    for($i = 1;$i <= 14 ; $i ++){

      $okno[$i] = $_POST['okno'.$i];
      update_option('okno'.$i,$okno[$i]);
    
  }


      //==================================================
      //postされた値をwp_optionに保存
      //==================================================
      update_option('main_color', $main_color);
      update_option('bc_color', $bc_color);
      update_option('main_bc', $main_image);
      update_option('main_text', $main_text);
      update_option('font_color', $font_color);

      update_option('about_title', $abou_title);
      update_option('about_subtitle', $about_subtitle);
      update_option('about_img1', $about_image1);
      update_option('about_img2', $about_image2);
      update_option('about_textTop', $about_textTop);
      update_option('about_textMiddle', $about_textMiddle);
      update_option('about_textBottom', $about_textBottom);
      //FEATUREタイトル
      update_option('feature_title', $feature_title);
      update_option('feature_subtitle', $feature_subtitle);

      //OPTIONtたいと
      update_option('option_title', $option_title);
      update_option('option_subtitle', $option_subtitle);
      //voiceタイトル
      update_option('voice_title', $voice_title);
      update_option('voice_subtitle', $voice_subtitle);
      //productタイトル
      update_option('product_title', $product_title);
      update_option('product_subtitle', $product_subtitle);
      //newsタイトル
      update_option('news_title', $news_title);
      update_option('news_subtitle', $news_subtitle);

      //スケジュールエリア
      update_option('schedule',$schedule);
      update_option('time1',$time1);
      update_option('time2',$time2);
      update_option('post',$post);
      update_option('add',$add);
      update_option('tell',$tell);
      update_option('my-map',$map);
      update_option('logo',$logo);
      update_option('logo2',$logo2);
      update_option('loading',$loading);


    }
   



    //============================================
    //入力保持用
    //============================================
    $color = get_option('main_color');
    $bccolor = get_option('bc_color');
    $image = get_option('main_bc');
    $mainText = get_option('main_text');
    $Font_color = get_option('font_color');

    $aboutTitle = get_option('about_title');
    $aboutSubTitle = get_option('about_subtitle');

    $aboutImg1 = get_option('about_img1');
    $aboutImg2 = get_option('about_img2');
    $abouText_t = get_option('about_textTop');
    $abouText_m = get_option('about_textMiddle');
    $abouText_b = get_option('about_textBottom');

    $featureTitle = get_option('feature_title');
    $featureSubTitle = get_option('feature_subtitle');

    $optionTitle = get_option('option_title');
    $optionSubTitle = get_option('option_subtitle');
    
    $voiceTitle = get_option('voice_title');
    $voiceSubTitle = get_option('voice_subtitle');

    $productTitle = get_option('product_title');
    $productSubTitle = get_option('product_subtitle');

    $newsTitle = get_option('news_title');
    $newsSubTitle = get_option('news_subtitle');

    for($i = 1;$i <= 14 ; $i ++){

      $Okno[$i] = get_option('okno'.$i);
    }

    $Schedule = get_option('schedule');
    $Time1 = get_option('time1');
    $Time2 = get_option('time2');
    $Post = get_option('post');
    $Add = get_option('add');
    $Tell = get_option('tell');
    $Map = get_option('my-map');
    $Logo = get_option('logo');
    $Logo2 = get_option('logo2');
    $Loading = get_option('loading');

?>
    <form action="" method="POST" class="custom-form">
      <!--============== メインのビジュアル設定 =====================-->
      <div class="custom">
        <div class="custom-box">
          <h1 class="section-title">メイン設定</h1>
          <div class="custom-area">
            <label for="">ロゴ設定</label>
            <div class="media-area">
              <input type="button" name="media4" style="width: 150px;" value="画像選択" class="media-select">
              <input type="button" name="clear4" style="width: 150px;" value="画像削除" class="media-clear">
              <input type="text" name="logo" style="visibility: hidden;" value="<?php  echo $Logo; ?>" class="sample-media main-bc">
            </div>
            <div id="media4" style="width: 350px;">
              <img src="<?php echo $Logo; ?>" alt="" style="width: 350px;">
            </div>
          </div>

          <div class="custom-area">
            <label for="">サイドバーTOP画像</label>
            <div class="media-area">
              <input type="button" name="media5" style="width: 150px;" value="画像選択" class="media-select">
              <input type="button" name="clear5" style="width: 150px;" value="画像削除" class="media-clear">
              <input type="text" name="logo2" style="visibility: hidden;" value="<?php  echo $Logo2; ?>" class="sample-media main-bc">
            </div>
            <div id="media5" style="width: 350px;">
              <img src="<?php echo $Logo2; ?>" alt="" style="width: 350px;">
            </div>
          </div>


          <div class="custom-area">
            <label for="">ヘッダー&フッターカラー</label>
            <input type="color" name="main-color" value="<?php if (isset($color))  echo $color; ?>" class="main-color">
          </div>
          <div class="custom-area">
            <label for="">TOPへ戻るボタンカラー</label>
            <input type="color" name="bc-color" value="<?php if (isset($bccolor))  echo $bccolor; ?>" class="main-color">
          </div>
          <div class="custom-area">
            <label for="">ローディング中背景色</label>
            <input type="color" name="loading" value="<?php if (isset($Loading))  echo $Loading; ?>" class="main-color">
          </div>
          
          <div class="custom-area">
            <label for="">背景画像</label>
            <div class="media-area">
              <input type="button" name="media" style="width: 150px;" value="画像選択" class="media-select">
              <input type="button" name="clear" style="width: 150px;" value="画像削除" class="media-clear">
              <input type="text" name="sampleMedia" style="visibility: hidden;" value="<?php if (!empty($image)) echo $image; ?>" class="sample-media main-bc">
            </div>
            <div id="media" style="width: 350px;">
              <img src="<?php echo $image; ?>" alt="" style="width: 350px;">
            </div>
          </div>
          <div class="custom-area">
            <label for="">背景画像と重なるテキスト</label>
            <input type="text" name="main-text" style="width: 350px;" value="<?php if (isset($mainText))  echo $mainText; ?>">
          </div>
        </div>
        <div class="schreenshot">
          <p class="preview">プレビュー</p>
          <div class="main-kyatch">
            <img src="<?php echo $image; ?>" alt="">
            <h1><?php echo $mainText; ?><h1>
          </div>
        </div>
      </div>
      <!--=============================================================-->
      <!--===========================ABOUTエリア==================================-->
      <section class="about-area">
        <div class="custom-box">
          <h1 class="section-title">アバウト設定</h1>
          <div class="custom-area">
            <label for="">メインタイトル</label>
            <input type="text" name="about-title" value="<?php if (isset($aboutTitle))  echo $aboutTitle; ?>" class="about-title">
            <label for="">サブタイトル（ラインの下のタイトル）</label>
            <input type="text" name="about-subtitle" value="<?php if (isset($aboutSubTitle))  echo $aboutSubTitle; ?>" class="about-subtitle">
          </div>
          <div class="custom-area">
            <label for="">左の画像２枚</label>
            <div class="media-area">
              <input type="button" name="media2" style="width: 150px;" value="画像選択" class="media-select about-img1">
              <input type="button" name="clear-media2" style="width: 150px;" value="画像削除" class="media-clear">
              <input type="text" name="about-image1" style="visibility: hidden;" value="<?php if (!empty($aboutImg1)) echo $aboutImg1 ?>" class="sample-media">
              <div id="media2" style="width: 125px;" class="media">
                <img src="<?php echo $aboutImg1 ?>" alt="" style="max-width: 125px;">
              </div>
            </div>
            <div class="media-area">
              <input type="button" name="media3" style="width: 150px;" value="画像選択" class="media-select about-img2">
              <input type="button" name="clear-media3" style="width: 150px;" value="画像削除" class="media-clear ">
              <input type="text" name="about-image2" style="visibility: hidden;" value="<?php if (!empty($aboutImg2)) echo $aboutImg2 ?>" class="sample-media">
              <div id="media3" style="width: 125px;" class="media">
                <img src="<?php echo $aboutImg2 ?>" alt="" style="max-width: 125px;">
              </div>
            </div>
            <div class="media-flex">
            </div>

          </div>

          <div class="custom-area">
            <h2>右の文章エリアです。全て入力する必要はなく、デザインを見ながら調節してください。</h2>
            <label for="">文章上部</label>
            <textarea name="about-textTop" id="" cols="30" rows="10" class="about_textarea"><?php if (!empty($abouText_t)) echo $abouText_t; ?></textarea>
            <label for="">文章中部</label>
            <textarea name="about-textMiddle" id="" cols="30" rows="10" class="about_textarea"><?php if (!empty($abouText_m)) echo $abouText_m; ?></textarea>
            <label for="">文章下部</label>
            <textarea name="about-textBottom" id="" cols="30" rows="10" class="about_textarea"><?php if (!empty($abouText_b)) echo $abouText_b; ?></textarea>
          </div>
        </div>
        <div class="schreenshot">
          <p class="preview">プレビュー</p>
          <section class="about" id="about">
            <div class="about-title">
              <h1 class="preview-title"><?php echo $aboutTitle; ?></h1>
              <p class="row-title"><?php echo $aboutSubTitle; ?></p>
            </div>
            <div class="about-inner">
              <div class="about-inner__imgarea">
                <div class="about-inner__img about-inner__img1">
                  <img src="<?php echo $aboutImg1 ?>" alt="">
                </div>
                <div class="about-inner__img about-inner__img2">
                  <img src="<?php echo $aboutImg2 ?>" alt="">
                </div>
              </div>
              <div class="about-inner__textarea">
                <p class="txt-t"><?php echo $abouText_t; ?></p>
                <p class="txt-m">
                  <?php echo $abouText_m; ?>
                </p>
                <p class="txt-b"><?php echo $abouText_b; ?></p>
              </div>
            </div>
        </div>
      </section>
      <!--=============================================================-->
      <!--===========================FEATUREエリア==================================-->
      <div class="custom">
        <div class="custom-box">
          <h1 class="section-title">FEATURE設定</h1>
          <label for="">メインタイトル</label>
          <input type="text" name="feature-title" value="<?php if (isset($featureTitle))  echo $featureTitle; ?>" class="about-title">
          <label for="">サブタイトル（ラインの下のタイトル）</label>
          <input type="text" name="feature-subtitle" value="<?php if (isset($featureSubTitle))  echo $featureSubTitle; ?>" class="about-subtitle">
        </div>
        <div class="schreenshot">
          <p class="preview">プレビュー</p>
          <section class="feature" id="feature">
            <div class="feature-title">
              <h1 class="preview-title"><?php echo $featureTitle; ?></h1>
              <p class="row-title"><?php echo $featureSubTitle; ?></p>
            </div>
          </section>

        </div>
      </div>
      <!--===========================OPTIONエリア==================================-->

      <div class="custom">
        <div class="custom-box">
          <h1 class="section-title">OPTION設定</h1>
          <label for="">メインタイトル</label>
          <input type="text" name="option-title" value="<?php if (isset($optionTitle))  echo $optionTitle; ?>" class="about-title">
          <label for="">サブタイトル（ラインの下のタイトル）</label>
          <input type="text" name="option-subtitle" value="<?php if (isset($optionSubTitle))  echo $optionSubTitle; ?>" class="about-subtitle">

        </div>
        <div class="schreenshot">
          <p class="preview">プレビュー</p>
          <section class="option" id="option">
            <div class="option-title">
              <h1 class="preview-title"><?php echo $optionTitle; ?></h1>
              <p class="row-title"><?php echo $optionSubTitle; ?></p>
            </div>


          </section>

        </div>
      </div>
      <!--===========================OPTIONエリア==================================-->

      <div class="custom">
        <div class="custom-box">
          <h1 class="section-title">voice設定</h1>
          <label for="">メインタイトル</label>
          <input type="text" name="voice-title" value="<?php if (isset($voiceTitle))  echo $voiceTitle; ?>" class="about-title">
          <label for="">サブタイトル（ラインの下のタイトル）</label>
          <input type="text" name="voice-subtitle" value="<?php if (isset($voiceSubTitle))  echo $voiceSubTitle; ?>" class="about-subtitle">

        </div>
        <div class="schreenshot">
          <p class="preview">プレビュー</p>
          <section class="option" id="voice">
            <div class="voice-title">
              <h1 class="preview-title"><?php echo $voiceTitle; ?></h1>
              <p class="row-title"><?php echo $voiceSubTitle; ?></p>
            </div>


          </section>

        </div>
      </div>
      <!--===========================PRODUCTエリア==================================-->

      <div class="custom">
        <div class="custom-box">
          <h1 class="section-title">PRODUCT設定</h1>
          <label for="">メインタイトル</label>
          <input type="text" name="product-title" value="<?php if (isset($productTitle))  echo $productTitle; ?>" class="about-title">
          <label for="">サブタイトル（ラインの下のタイトル）</label>
          <input type="text" name="product-subtitle" value="<?php if (isset($productSubTitle))  echo $productSubTitle; ?>" class="about-subtitle">
        </div>
        <div class="schreenshot">
          <p class="preview">プレビュー</p>
          <section class="theme" id="theme">
            <div class="option-title">
              <h1 class="preview-title"><?php echo $productTitle; ?></h1>
              <p class="row-title"><?php echo $productSubTitle; ?></p>
            </div>
          </section>

        </div>
      </div>
      <!--===========================NEWSエリア==================================-->
      <div class="custom">
        <div class="custom-box">
          <h1 class="section-title">NEWS設定</h1>
          <label for="">メインタイトル</label>
          <input type="text" name="news-title" value="<?php if (isset($newsTitle))  echo $newsTitle; ?>" class="about-title">
          <label for="">サブタイトル（ラインの下のタイトル）</label>
          <input type="text" name="news-subtitle" value="<?php if (isset($newsSubTitle))  echo $newsSubTitle; ?>" class="about-subtitle">
        </div>
        <div class="schreenshot">
          <p class="preview">プレビュー</p>
          <section class="news" id="news">
            <div class="option-title">
              <h1 class="preview-title"><?php echo $newsTitle; ?></h1>
              <p class="row-title"><?php echo $newsSubTitle; ?></p>
            </div>
          </section>
        </div>
      </div>
      <!--===========================MaPエリア==================================-->
      <h2 style="text-align: center;">MAP & 予定表</h2>
      <section class="map">
        <div class="map-area">
          <p>googleマップのコードを貼り付け</p>
          <div>
            <textarea name="my-map" id="" cols="40" rows="20">
              <?php if(!empty($Map)) echo $Map; ?>
            </textarea>
          </div>
        </div>
        <div class="time-area">
          <table>
            <tbody>
              <tr>
                <th class="table-title" colspan="3"><input type="text" name="schedule" value="<?php if(!empty($Schedule))echo $Schedule; ?>"></th>
              </tr>
              <tr>
                <th></th>
                <td><input type="text" name="time1" value="<?php if(!empty($Time1))echo $Time1; ?>"></td>
                <td><input type="text" name="time2" value="<?php if(!empty($Time2))echo $Time2; ?>"></td>

              </tr>

              <tr>
                <th>月</th>
                <?php for($i = 1;$i <= 2;$i++): ?>
                <td>
                  <input type="text" name="okno<?php echo $i; ?>" id="" value="<?php if (!empty($Okno[$i])) echo $Okno[$i]; ?>">
                </td>
                <?php endfor; ?>
                
              </tr>
              <tr>
                <th>火</th>
                <?php for($i = 3;$i <= 4;$i++): ?>
                <td>
                  <input type="text" name="okno<?php echo $i; ?>" id="" value="<?php if (!empty($Okno[$i])) echo $Okno[$i]; ?>">
                </td>
                <?php endfor; ?>
              </tr>
              <tr>
                <th>水</th>
                <?php for($i = 5;$i <= 6;$i++): ?>
                <td>
                  <input type="text" name="okno<?php echo $i; ?>" id="" value="<?php if (!empty($Okno[$i])) echo $Okno[$i]; ?>">
                </td>
                <?php endfor; ?>
              </tr>
              <tr>
                <th>木</th>
                <?php for($i = 7;$i <= 8;$i++): ?>
                <td>
                  <input type="text" name="okno<?php echo $i; ?>" id="" value="<?php if (!empty($Okno[$i])) echo $Okno[$i]; ?>">
                </td>
                <?php endfor; ?>
              </tr>
              <tr>
                <th>金</th>
                <?php for($i = 9;$i <= 10;$i++): ?>
                <td>
                  <input type="text" name="okno<?php echo $i; ?>" id="" value="<?php if (!empty($Okno[$i])) echo $Okno[$i]; ?>">
                </td>
                <?php endfor; ?>
              </tr>
              <tr>
              <th>土</th>
              <?php for($i = 11;$i <= 12;$i++): ?>
                <td>
                  <input type="text" name="okno<?php echo $i; ?>" id="" value="<?php if (!empty($Okno[$i])) echo $Okno[$i]; ?>">
                </td>
                <?php endfor; ?>
              </tr>
              <tr>
                <th>日</th>
                <?php for($i = 13;$i <= 14;$i++): ?>
                <td>
                  <input type="text" name="okno<?php echo $i; ?>" id="" value="<?php if (!empty($Okno[$i])) echo $Okno[$i]; ?>">
                </td>
                <?php endfor; ?>
              </tr>

            </tbody>
          </table>
          <table class="address">
            <tbody>
              <tr>
                <th>郵便番号入力</th>
                <td>
                  <input type="text" name="post" id="" value="<?php if(!empty($Post)) echo $Post; ?>">
                </td>
              </tr>
              <tr>
                <th>住所入力</th>
                <td>
                  <input type="text" name="add" id="" value="<?php if(!empty($Add)) echo $Add; ?>">
                </td>
              </tr>
              <tr>
                <th>電話番号入力</th>
                <td>
                  <input type="text" name="tell" value="<?php if(!empty($Tell)) echo $Tell; ?>" placeholder="ハイフンなし">
                </td>
              </tr>
             
            </tbody>
          </table>
        </div>
      </section>
          
      <input type="submit" class="plug-save" name="" id="" value="設定保存">

    </form>

<?php
  }
}

//プラグインが有効かされた時のフック
register_activation_hook(__FILE__, 'chaki_install');
//プラグインが削除された時のフック
register_uninstall_hook(__FILE__, 'chaki_delete_data');

function chaki_delete_data()
{

  delete_option('main_color');
  delete_option('main_bc');
  delete_option('about_title');
  delete_option('about_text');
  delete_option('about_subtitle');
  delete_option('about_img1');
  delete_option('about_img2');
  delete_option('about_textTop');

  delete_option('about_textMiddle');
  delete_option('about_textBottom');

  delete_option('feature_title');
  delete_option('feature_subtitle');
  delete_option('option_title');
  delete_option('option_subtitle');
  delete_option('product_title');
  delete_option('product_subtitle');
  delete_option('news_title');
  delete_option('news_subtitle');
}

function chaki_install()
{

  $compress = get_option('compress_options');

  /* 'compress_options' が存在しない場合は初期値を追加 */
  if (!$compress) {
    update_option('compress_options', 50);
  }
}


$imc = new top_page_setting();
?>