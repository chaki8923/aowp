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

      $slide_img = [];

      for ($i = 1; $i <= 18; $i++) {
        $slide_img[$i] = $_POST['about-view' . $i];
        update_option('about-img' . $i, $slide_img[$i]);
      }

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


      $menu_name = [];
      for ($i = 1; $i <= 3; $i++) {

        $menu_name[$i] = $_POST['menu' . $i];
        update_option('menu' . $i, $menu_name[$i]);
      }


      $icon_img = []; //アイコン


      for ($i = 1; $i <= 5; $i++) {
        $icon_img[$i] = $_POST['icon-view' . $i];
        $icon_link[$i] = $_POST['icon-link' . $i];
        update_option('icon-img' . $i, $icon_img[$i]);
      }



      $about_title = $_POST['about-title'];
      $about_text = $_POST['about-text'];
      $add_text = $_POST['add-text'];
      $add_map = stripslashes($_POST['add-map']);
      $add_name = $_POST['add-name'];
      $add_place = $_POST['add-place'];
      $add_station = $_POST['add-station'];
      $add_time = $_POST['add-time'];
      $add_tell = $_POST['add-tell'];
      $footer_text = $_POST['footer-text'];
      $main_image = $_POST['sampleMedia'];
      $url_link = $_POST['url_link'];
      $load = $_POST['load'];

      //==================================================
      //postされた値をwp_optionに保存
      //==================================================
      update_option('about_title', $about_title);
      update_option('about_text', $about_text);
      update_option('add_text', $add_text);
      update_option('add_map', $add_map);
      update_option('add_name', $add_name);
      update_option('add_place', $add_place);
      update_option('add_station', $add_station);
      update_option('add_time', $add_time);
      update_option('add_tell', $add_tell);
      update_option('add_tell', $add_tell);
      update_option('footer_text', $footer_text);
      update_option('main_bc', $main_image);
      update_option('url_link', $url_link);
      update_option('load', $load);
    }




    //============================================
    //入力保持用
    //============================================


    $Slide_img = [];
    for ($i = 1; $i <= 18; $i++) {

      $Slide_img[$i] = get_option('about-img' . $i);
    }

    $Menu_name = [];
    for ($i = 1; $i <= 3; $i++) {

      $Menu_name[$i] = get_option('menu' . $i);
    }



    $About_title = get_option('about_title');
    $About_text = get_option('about_text');
    $Add_text = get_option('add_text');
    $Add_map = get_option('add_map');
    $cut_name = get_option('add_name');
    $Add_place = get_option('add_place');
    $perma = get_option('add_station');
    $Add_time = get_option('add_time');
    $Add_tell = get_option('add_tell');
    $Footer_text = get_option('footer_text');
    $image = get_option('main_bc');
    $Url_link = get_option('url_link');
    $Load = get_option('Load');




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

?>
    <form action="" method="POST" class="custom-form">
      <!--============== メインのビジュアル設定 =====================-->
      <div class="custom">

        <div class="custom-box">


          <!-- ============================================================== -->
          <div class="custom-tab">スライドショーのテキスト<span class="js-arrow"></span></div>
          <table class="custom-area">
            <tbody class="inner">
              <tr>
                <th>
                  スライドショー上テキスト
                </th>
                <td>
                  <input type="text" style="width: 50%;" name="about-title" class="another-title" value="<?php if (!empty($About_title)) echo $About_title; ?>">
                </td>
              </tr>
              <tr>
                <th>縦テキスト</th>
                <td>
                  <input type="text" style="width: 50%;" name="about-text" class="another-title" value="<?php if (!empty($About_text)) echo $About_text; ?>">
                </td>
              </tr>
            </tbody>


          </table>

          <div class="custom-tab">TOPページスライドショー設定<span class="js-arrow"></span></div>
          <div class="custom-area">
            <div class="culnm-flex">
              <?php for ($i = 1; $i <= 3; $i++) : ?>
                <div class="panel">
                  <p>使用画像選択<?php echo $i; ?></p>
                  <div class="media-area-flex">
                    <input type="button" name="about<?php echo $i ?>"  value="画像選択" class="media-select">
                    <input type="button" name="clear-about<?php echo $i ?>"  value="画像削除" class="media-clear">
                    <input type="text" name="about-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Slide_img[$i])) echo $Slide_img[$i]; ?>" class="sample-media main-bc">
                    <div id="about-sample<?php echo $i; ?>" class="media-preview">
                      <img src="<?php echo $Slide_img[$i]; ?>" alt="" style="width: 100%;">
                    </div>
                  </div>

                </div>
              <?php endfor; ?>
            </div>
          </div>

          <div class="custom-tab">MENU1画像選定<span class="js-arrow"></span></div>
          <div class="custom-area">
            <p>メニュー名</p>
            <input type="text" name="menu1" style="width: 200px;" value="<?php if (!empty($Menu_name[1])) echo $Menu_name[1]; ?>">
            <div class="culnm-flex">
              <?php for ($i = 4; $i <= 6; $i++) : ?>
                <div class="panel">
                  <p>MENU上部使用画像選択<?php echo ($i - 3); ?></p>
                  <div class="media-area-flex">
                    <input type="button" name="about<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                    <input type="button" name="clear-about<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                    <input type="text" name="about-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Slide_img[$i])) echo $Slide_img[$i]; ?>" class="sample-media main-bc">
                    <div id="about-sample<?php echo $i; ?>" class="media-preview">
                      <img src="<?php echo $Slide_img[$i]; ?>" alt="" style="width: 100%;">
                    </div>
                  </div>
                </div>
              <?php endfor; ?>
            </div>

          </div>



          <div class="custom-tab">MENU2画像選定<span class="js-arrow"></span></div>
          <div class="custom-area">
            <p>メニュー名</p>
            <input type="text" name="menu2" style="width: 200px;" value="<?php if (!empty($Menu_name[2])) echo $Menu_name[2]; ?>">
            <div class="culnm-flex">
              <?php for ($i = 7; $i <= 9; $i++) : ?>
                <div class="panel">
                  <p>MENU使用画像選択<?php echo ($i - 6); ?></p>
                  <div class="media-area-flex">
                    <input type="button" name="about<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                    <input type="button" name="clear-about<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                    <input type="text" name="about-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Slide_img[$i])) echo $Slide_img[$i]; ?>" class="sample-media main-bc">
                    <div id="about-sample<?php echo $i; ?>" class="media-preview">
                      <img src="<?php echo $Slide_img[$i]; ?>" alt="" style="width: 100%;">
                    </div>
                  </div>

                </div>
              <?php endfor; ?>
            </div>
          </div>


          <div class="custom-tab">MENU3画像選定<span class="js-arrow"></span></div>
          <div class="custom-area">
            <p>メニュー名</p>
            <input type="text" name="menu3" style="width: 200px;" value="<?php if (!empty($Menu_name[3])) echo $Menu_name[3]; ?>">
            <div class="culnm-flex">
              <?php for ($i = 10; $i <= 12; $i++) : ?>
                <div class="panel">
                  <p>MENU使用画像選択<?php echo ($i - 9); ?></p>
                  <div class="media-area-flex">
                    <input type="button" name="about<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                    <input type="button" name="clear-about<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                    <input type="text" name="about-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Slide_img[$i])) echo $Slide_img[$i]; ?>" class="sample-media main-bc">
                    <div id="about-sample<?php echo $i; ?>" class="media-preview">
                      <img src="<?php echo $Slide_img[$i]; ?>" alt="" style="width: 100%;">
                    </div>
                  </div>

                </div>
              <?php endfor; ?>
            </div>
          </div>

          <!-- //======================================================================
          //その他エリア
          //====================================================================== -->
          <div class="custom-tab">住所登録<span class="js-arrow"></span></div>
          <table class="custom-area">
            <tbody>
              <tr class="add-area">
                <th>Address</th>
                <td>
                  <textarea name="add-text" id="" cols="80" rows="5"><?php if (!empty($Add_text)) echo $Add_text; ?></textarea>
                </td>
              </tr>
              <tr class="add-area">
                <th>GoogleマップURL</th>
                <td>
                  <textarea name="add-map" id="" cols="80" rows="5"><?php if (!empty($Add_map)) echo $Add_map; ?></textarea>
                </td>
              </tr>
              <tr class="add-area">
                <th>項目1</th>
                <td>
                  <input type="text" name="add-name" id="" style="width:200px;" placeholder="項目1(cut等)" value="<?php if (!empty($cut_name)) echo $cut_name; ?>">
                </td>
              </tr>
              <tr class="add-area">
                <th>時間</th>
                <td>
                  <input type="text" name="add-place" id="" style="width:200px;" placeholder="時間" value="<?php if (!empty($Add_place)) echo $Add_place; ?>">
                </td>
              </tr>
              <tr class="add-area">
                <th>項目2</th>
                <td>
                  <input type="text" name="add-station" id="" style="width:200px;" placeholder="項目2(perma color等)" value="<?php if (!empty($perma)) echo $perma; ?>">
                </td>
              </tr>
              <tr class="add-area">
                <th>時間</th>
                <td>
                  <input type="text" name="add-time" id="" style="width:200px;" placeholder="時間" value="<?php if (!empty($Add_time)) echo $Add_time; ?>">
                </td>
              </tr>
              <tr class="add-area">
                <th>TELL(ハイフンなし)</th>
                <td>
                  <input type="text" name="add-tell" id="" style="width: 50%;" placeholder="08012345432" value="<?php if (!empty($Add_tell)) echo $Add_tell; ?>">
                </td>
              </tr>
            </tbody>
          </table>


          <div class="custom-tab">ロゴ設定<span class="js-arrow"></span></div>
          <div class="custom-area">
            <div class="culnm-flex">
              <?php for ($i = 2; $i <= 2; $i++) : ?>
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
          <div class="custom-tab">予約ページのリンク(ホットペッパーのリンク等)<span class="js-arrow"></span></div>
          <div class="custom-area" style="padding-top: 30px;">
            <table class="add-area">
              <tbody>
                <tr>
                  <th>URL</th>
                  <td>
                    <input type="text" name="url_link" id="" style="width:400px;" placeholder="" value="<?php if (!empty($Url_link)) echo $Url_link; ?>">
                </tr>
                </td>
              </tbody>
            </table>
          </div>

          <div class="custom-tab">その他<span class="js-arrow"></span></div>
          <div class="custom-area" style="padding-top: 30px;">
            <table class="add-area">
              <tbody>
                <tr>
                  <th>フッターテキスト</th>
                  <td>
                    <input type="text" name="footer-text" id="" style="width:400px;" placeholder="" value="<?php if (!empty($Footer_text)) echo $Footer_text; ?>">
                  </td>
                </tr>
                <tr>
                  <th>ロード中テキスト</th>
                  <td>
                    <input type="text" name="load" id="" style="width:400px;" placeholder="" value="<?php if (!empty($Load)) echo $Load; ?>">
                  </td>
                </tr>
              </tbody>
            </table>
            <p>全体背景画像(少し透明になって表示されます)</p>
            <div class="media-area" style="margin: auto; height: 50px;">
              <input type="button" name="media" style="width: 150px;" value="画像選択" class="media-select">
              <input type="button" name="clear" style="width: 150px;" value="画像削除" class="media-clear">
              <input type="text" name="sampleMedia" style="visibility: hidden;" value="<?php if (!empty($image)) echo $image; ?>" class="sample-media main-bc">
            </div>
            <div id="media" style="width: 350px;">
              <img src="<?php echo $image; ?>" alt="" style="width: 350px;">
            </div>
          </div>

        </div>

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