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
      //========================================================
      //保存用
      //========================================================
      $main_view = [];
      $slide_text = [];
      $sns_link = [];

      for ($i = 1; $i <= 20; $i++) {

        $main_view[$i] = $_POST['main-view' . $i];
        $slide_text[$i] = $_POST['slide_text' . $i];
        $sns_link[$i] = $_POST['sns_link' . $i];
        $sns_link[$i] = $_POST['sns_link' . $i];


        update_option('main_view' . $i, $main_view[$i]);
        update_option('slide_text' . $i, $slide_text[$i]);
        update_option('sns_link' . $i, $sns_link[$i]);
      }
      //==================================================
      //postされた値をwp_optionに保存
      //==================================================

      $tell_number = $_POST['tell_number'];
      $shop_name = $_POST['shop_name'];
      $company_name = $_POST['company_name'];
      $address_map = stripslashes($_POST['address_map']);
      $address_name = $_POST['address_name'];
      $loading = $_POST['loading'];



      $fes_info = [];
      for ($i = 0; $i <= 6; $i++) {

        $fes_info[$i] = $_POST['fes_info' . $i];
        update_option('fes_info' . $i, $fes_info[$i]);
      }



      update_option('shop_name', $shop_name);
      update_option('company_name', $company_name);
      update_option('address_map', $address_map);
      update_option('address_name', $address_name);
      update_option('tell_number', $tell_number);
      update_option('loading', $loading);
    }




    //============================================
    //入力保持用
    //============================================
    $Main_img = [];
    $Slide_text = [];
    $Sns_link = [];
    for ($i = 1; $i <= 20; $i++) {

      $Main_img[$i] =  get_option('main_view' . $i);
      $Slide_text[$i] = get_option('slide_text' . $i);
      $Sns_link[$i] = get_option('sns_link' . $i);
      $Shop_title[$i] = get_option('shop_title' . $i);
      $Shop_url[$i] = get_option('shop_url' . $i);
    }
    $Fes_info = [];
    for ($i = 0; $i <= 6; $i++) {

      $Fes_info[$i] = get_option('fes_info' . $i);
    }

    $Tell_number = get_option('tell_number');

    $Shop_name = get_option('shop_name');
    $Company_name = get_option('company_name');
    $Address_map = get_option('address_map');
    $Address_name = get_option('address_name');
    $Loading = get_option('loading');


?>
    <form action="" method="POST" class="custom-form">
      <!--============== メインのビジュアル設定 =====================-->
      <div class="custom-tab">ロゴ登録<span class="js-arrow"></span></div>
      <div class="custom-area">
        <div class="culnm-flex">
          <?php for ($i = 4; $i <= 4; $i++) : ?>
            <div class="panel">
              <div class="media-area-flex">
                <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
                <div id="main-view-preview<?php echo $i; ?>" class="media-preview ">
                  <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 100%;">
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>

      </div>
      <div class="custom-tab">サイドバーTOP画像<span class="js-arrow"></span></div>
      <div class="custom-area">
        <div class="culnm-flex">
          <?php for ($i = 20; $i <= 20; $i++) : ?>
            <div class="panel">
              <div class="media-area-flex">
                <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
                <div id="main-view-preview<?php echo $i; ?>" class="media-preview ">
                  <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 100%;">
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>

      </div>

      <div class="custom-tab">ローディング中背景色<span class="js-arrow"></span></div>
      <div class="custom-area center">
        <label for="">背景色</label>
        <input type="color" name="loading" value="<?php if (isset($Loading))  echo $Loading; ?>" class="main-color">
      </div>



      <div class="custom-tab">TOPページスライドショー<span class="js-arrow"></span></div>
      <div class="custom-area">
        <div class="culnm-flex">
          <?php for ($i = 1; $i <= 3; $i++) : ?>
            <div class="panel">
              <p>スライドショー画像選択<?php echo $i; ?></p>
              <div class="media-area-flex">
                <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
                <div id="main-view-preview<?php echo $i; ?>" class="h ">
                  <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 100%;">
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>


      </div>



      <div class="custom-tab">スライドショー左のテキスト<span class="js-arrow"></span></div>
      <table class="custom-area">
        <tbody>
          <?php for ($i = 1; $i <= 4; $i++) : ?>
            <tr>
              <th>
                <label for="slide-text" class="label">テキスト<?php echo $i; ?>段目</label>
              </th>
              <td>
                <input id="slide-text" type="text" name="slide_text<?php echo $i ?>" class="input-style" value="<?php echo $Slide_text[$i]; ?>">
              </td>
            </tr>
          <?php endfor; ?>

        </tbody>
      </table>




      <div class="custom-tab">住所エリア設定<span class="js-arrow"></span></div>
      <table class="custom-area">
        <tbody>

          <tr>
            <th>店舗名
            </th>
            <td>
              <input type="text" name="shop_name" id="about" class="input-style" value="<?php echo $Shop_name; ?>">

            </td>
          </tr>
          <tr>
            <th>会社名</th>
            <td>
              <input type="text" name="company_name" id="about" class="input-style" value="<?php echo $Company_name; ?>">
            </td>
          </tr>
          <tr>
            <th>MAP URL</th>
            <td>
              <textarea name="address_map" id="" cols="80" rows="5"><?php echo $Address_map; ?></textarea>
            </td>
          </tr>
          <tr>
            <th>住所</th>
            <td>
              <input type="text" name="address_name" id="about" class="input-style" value="<?php echo $Address_name; ?>">
            </td>
          </tr>
          <tr>
            <th>電話番号(ハイフンなし)</th>
            <td>
              <input type="text" name="tell_number" id="about" class="input-style" value="<?php echo $Tell_number; ?>" placeholder="例:08012343214">
            </td>
          </tr>
        </tbody>
      </table>

      <div class="custom-tab">SNSアイコン設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        <div class="culnm-flex">

          <?php for ($i = 11; $i <= 13; $i++) : ?>
            <div class="panel">
              <p><?php
                  switch ($i) {
                    case 11:
                      echo 'FaceBook';
                      break;
                    case 12:
                      echo 'Twitter';
                      break;
                    case 13:
                      echo 'LINE';
                      break;
                  }
                  ?></p>
              <div class="media-area-flex icon">
                <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
                <div id="main-view-preview<?php echo $i; ?>" class="media-preview icon-preview">
                  <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 120px;">
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>
        <div class="culnm-flex">
          <?php for ($i = 14; $i <= 16; $i++) : ?>
            <div class="panel">
              <p><?php
                  switch ($i) {
                    case 14:
                      echo 'Pocket';
                      break;
                    case 15:
                      echo 'RSS';
                      break;
                    case 16:
                      echo 'はてブ';
                      break;
                  }
                  ?></p>
              <div class="media-area-flex icon">
                <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
                <div id="main-view-preview<?php echo $i; ?>" class="media-preview icon-preview">
                  <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 120px;">
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>
        <div class="culnm-flex">
          <?php for ($i = 17; $i <= 19; $i++) : ?>
            <div class="panel">
              <p><?php
                  switch ($i) {
                    case 17:
                      echo 'Fleedly';
                      break;
                    case 18:
                      echo 'Youtube';
                      break;
                    case 19:
                      echo 'Instagram';
                      break;
                  }
                  ?></p>
              <div class="media-area-flex icon">
                <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
                <div id="main-view-preview<?php echo $i; ?>" class="media-preview icon-preview">
                  <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 120px;">
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>

      </div>

      <div class="custom-tab">SNSリンク<span class="js-arrow"></span></div>
      <table class="custom-area">
        <?php for ($i = 11; $i <= 19; $i++) : ?>
          <tbody>
            <tr>
              <th for="slide-text" class="label"><?php switch ($i) {
                                                    case 11:
                                                      echo 'FaceBook';
                                                      break;
                                                    case 12:
                                                      echo 'Twitter';
                                                      break;
                                                    case 13:
                                                      echo 'LINE';
                                                      break;
                                                    case 14:
                                                      echo 'Pocket';
                                                      break;
                                                    case 15:
                                                      echo 'RSS';
                                                      break;
                                                    case 16:
                                                      echo 'はてブ';
                                                      break;
                                                    case 17:
                                                      echo 'Fleedly';
                                                      break;
                                                    case 18:
                                                      echo 'Youtube';
                                                      break;
                                                    case 19:
                                                      echo 'Instagram';
                                                      break;
                                                  } ?></th>
              <td>
                <input id="slide-text" type="text" name="sns_link<?php echo $i ?>" class="input-style" value="<?php echo $Sns_link[$i]; ?>">
              </td>
            </tr>
          </tbody>
        <?php endfor; ?>
      </table>
      <!-- //ここでプラグインの中身終了 -->



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