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


      $search_bc = $_POST['sampleSearch'];
      $about_img = []; //アイコン

      for ($i = 1; $i <= 7; $i++) {
        $about_img[$i] = $_POST['about-view' . $i];
        update_option('about-img' . $i, $about_img[$i]);
      }



      $main_view = [];
      $sns_link = [];
      for ($i = 1; $i <= 21; $i++) {

        $main_view[$i] = $_POST['main-view' . $i];
        $sns_link[$i] = $_POST['sns_link' . $i];

        update_option('main_view' . $i, $main_view[$i]);
        update_option('sns_link' . $i, $sns_link[$i]);
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
      $logo = $_POST['logo'];
      $copy_text = stripslashes($_POST['copy_text']);
      $loading = stripslashes($_POST['loading']);

      //==================================================
      //postされた値をwp_optionに保存
      //==================================================

      update_option('search_bc', $search_bc);
      update_option('about_title', $about_title);
      update_option('about_text', $about_text);
      update_option('add_text', $add_text);
      update_option('add_map', $add_map);
      update_option('add_name', $add_name);
      update_option('add_place', $add_place);
      update_option('add_station', $add_station);
      update_option('add_time', $add_time);
      update_option('add_tell', $add_tell);

      update_option('copy_text', $copy_text);
      update_option('loading', $loading);
    }




    //============================================
    //入力保持用
    //============================================


    $About_img = [];
    for ($i = 1; $i <= 7; $i++) {

      $About_img[$i] = get_option('about-img' . $i);
    }
    $Icon_img = [];
    $Icon_link = [];
    for ($i = 1; $i <= 7; $i++) {

      $Icon_img[$i] = get_option('icon-img' . $i);
      $Icon_link[$i] = get_option('icon-link' . $i);
    }

    $Search_bc = get_option('search_bc');

    $About_title = get_option('about_title');
    $About_text = get_option('about_text');
    $Add_text = get_option('add_text');
    $Add_map = get_option('add_map');
    $Add_name = get_option('add_name');
    $Add_place = get_option('add_place');
    $Add_station = get_option('add_station');
    $Add_time = get_option('add_time');
    $Add_tell = get_option('add_tell');
    $Copy_text = get_option('copy_text');
    $Loading = get_option('loading');


    $Main_img = [];
    $Sns_link = [];
    for ($i = 1; $i <= 21; $i++) {

      $Main_img[$i] =  get_option('main_view' . $i);
      $Sns_link[$i] = get_option('sns_link' . $i);
    }




?>
    <form action="" method="POST" class="custom-form">
      <!--============== メインのビジュアル設定 =====================-->
      <div class="custom">

        <div class="custom-tab">検索結果背景<span class="js-arrow"></span></div>
        <div class="custom-area">
          <div class="culnm-flex">
            <div class="panel">
              <div class="media-area">
                <input type="text" name="sampleSearch" style="visibility: hidden;" value="<?php if (!empty($Search_bc)) echo $Search_bc; ?>" class="sample-media main-bc">
                <div style="text-align:center; width: 100%;">
                  <input type="button" name="search-bc" style="width: 150px;" value="画像選択" class="media-select">
                  <input type="button" name="clear-search" style="width: 150px;" value="画像削除" class="media-clear">
                </div>
                <div id="search-bc-view" class="media-preview">
                  <img src="<?php if (!empty($Search_bc)) echo $Search_bc; ?> ?>" alt="" style="width: 350px;">
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- ============================================================== -->

        <div class="custom-tab">ABOUT設定<span class="js-arrow"></span></div>
        <div class="custom-area">
          <div class="culnm-flex">
            <?php for ($i = 1; $i <= 2; $i++) : ?>
              <div class="panel">
                <p>ABOUT使用画像選択<?php echo $i; ?></p>
                <div class="media-area-flex">
                  <input type="button" name="about<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                  <input type="button" name="clear-about<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                  <input type="text" name="about-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($About_img[$i])) echo $About_img[$i]; ?>" class="sample-media main-bc">
                  <div id="about-sample<?php echo $i; ?>" class="media-preview">
                    <img src="<?php echo $About_img[$i]; ?>" alt="" style="width: 100%;">
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>

          <div class="culnm-flex">
            <?php for ($i = 3; $i <= 4; $i++) : ?>
              <div class="panel">
                <p>ABOUT使用画像選択<?php echo $i; ?></p>
                <div class="media-area-flex">
                  <input type="button" name="about<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                  <input type="button" name="clear-about<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                  <input type="text" name="about-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($About_img[$i])) echo $About_img[$i]; ?>" class="sample-media main-bc">
                  <div id="about-sample<?php echo $i; ?>" class="media-preview">
                    <img src="<?php echo $About_img[$i]; ?>" alt="" style="width: 100%;">
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>

          <div class="culnm-flex">
            <?php for ($i = 5; $i <= 7; $i++) : ?>
              <div class="panel">
                <p>ABOUT使用画像選択<?php echo $i; ?></p>
                <div class="media-area-flex">
                  <input type="button" name="about<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                  <input type="button" name="clear-about<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                  <input type="text" name="about-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($About_img[$i])) echo $About_img[$i]; ?>" class="sample-media main-bc">
                  <div id="about-sample<?php echo $i; ?>" class="media-preview">
                    <img src="<?php echo $About_img[$i]; ?>" alt="" style="width: 100%;">
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>



        </div>
        <!-- //======================================================================
          //その他エリア
          //====================================================================== -->
        <div class="custom-tab">ABOUT設定その他<span class="js-arrow"></span></div>
        <table class="custom-area">
          <tbody class="inner">
            <tr>
              <th>
                囲み内タイトル
              </th>
              <td>
                <input type="text" style="width: 80%;" name="about-title" class="another-title" value="<?php if (!empty($About_title)) echo $About_title; ?>">
              </td>
            </tr>
            <tr>
              <th>本文</th>
              <td>
                <textarea name="about-text" id="" cols="90" rows="5"><?php if (!empty($About_text)) echo $About_text; ?></textarea>
              </td>
            </tr>
          </tbody>
        </table>



        <div class="custom-tab">住所<span class="js-arrow"></span></div>
        <table class="custom-area">
          <tbody>
            <tr class="add-area">
              <th>テキスト</th>
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
              <th>名称</th>
              <td>
                <input type="text" name="add-name" id="" style="width: 50%;" placeholder="名称" value="<?php if (!empty($Add_name)) echo $Add_name; ?>">
              </td>
            </tr>
            <tr class="add-area">
              <th>所在地</th>
              <td>
                <input type="text" name="add-place" id="" style="width: 50%;" placeholder="所在地" value="<?php if (!empty($Add_place)) echo $Add_place; ?>">
              </td>
            </tr>
            <tr class="add-area">
              <th>最寄駅</th>
              <td>
                <input type="text" name="add-station" id="" style="width: 50%;" placeholder="最寄駅" value="<?php if (!empty($Add_station)) echo $Add_station; ?>">
              </td>
            </tr>
            <tr class="add-area">
              <th>営業時間</th>
              <td>
                <input type="text" name="add-time" id="" style="width: 50%;" placeholder="営業時間" value="<?php if (!empty($Add_time)) echo $Add_time; ?>">
              </td>
            </tr>
            <tr class="add-area">
              <th>TELL(ハイフンなし)</th>
              <td>
                <input type="text" name="add-tell" id="" style="width: 50%;" placeholder="tell" value="<?php if (!empty($Add_tell)) echo $Add_tell; ?>" placeholder="09012344321">
              </td>
            </tr>
          </tbody>
        </table>

        <div class="custom-tab">コピーライト<span class="js-arrow"></span></div>
        <div class="custom-area">
          <div>
            <p>©︎コピーライト</p>
            <input type="text" name="copy_text" id="about" class="input-style" value="<?php echo $Copy_text; ?>">
          </div>

        </div>
        <div class="custom-tab">ローディング中テキスト<span class="js-arrow"></span></div>
        <div class="custom-area">
          <div>
            <p>アニメーションさせるテキスト</p>
            <input type="text" name="loading" id="" class="input-style" value="<?php echo $Loading; ?>">
          </div>

        </div>
        <div class="custom-tab">ロゴ設定<span class="js-arrow"></span></div>
        <div class="custom-area">

          <div class="culnm-flex">
            <?php for ($i = 1; $i <= 1; $i++) : ?>
              <div class="panel">
                <p>画像選択</p>
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
            <?php for ($i = 21; $i <= 21; $i++) : ?>
              <div class="panel">
                <p>画像選択</p>
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
                        echo 'FaseBook';
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
                        echo 'hatena';
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
                                                        echo 'FaseBook';
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
                                                        echo 'hatena';
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