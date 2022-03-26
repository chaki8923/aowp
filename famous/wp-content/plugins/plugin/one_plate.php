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
      for ($i = 1; $i <= 21; $i++) {

        $main_view[$i] = $_POST['main-view' . $i];
        $slide_text[$i] = $_POST['slide_text' . $i];
        $sns_link[$i] = $_POST['sns_link' . $i];

        update_option('main_view' . $i, $main_view[$i]);
        update_option('slide_text' . $i, $slide_text[$i]);
        update_option('sns_link' . $i, $sns_link[$i]);
      }
      //==================================================
      //postされた値をwp_optionに保存
      //==================================================
      $about_title = $_POST['about_title'];
      $work_title = $_POST['work_title'];
      $info_title = $_POST['info_title'];
      $voice_title = $_POST['voice_title'];
      $blog_title = $_POST['blog_title'];
      $about_text = $_POST['about_text'];
      $about_text2 = $_POST['about_text2'];
      $work_text = $_POST['work_text'];
      $abater_name = $_POST['abater_name'];
      $abater_comment = $_POST['abater_comment'];
      $footer_text = $_POST['footer_text'];
      $copy_text = stripslashes($_POST['copy_text']);
      $tell_number = $_POST['tell_number'];

      $address_title = $_POST['address_title'];
      $address_map = stripslashes($_POST['address_map']);
      $address_name = $_POST['address_name'];
      $address_time = $_POST['address_time'];
      $logo = $_POST['logo'];
      $fes_info = [];
      for ($i = 0; $i <= 6; $i++) {

        $fes_info[$i] = $_POST['fes_info' . $i];
        update_option('fes_info' . $i, $fes_info[$i]);
      }
      update_option('about_title', $about_title);
      update_option('about_text', $about_text);
      update_option('about_text2', $about_text2);
      update_option('work_title', $work_title);
      update_option('info_title', $info_title);
      update_option('voice_title', $voice_title);
      update_option('blog_title', $blog_title);
      update_option('work_text', $work_text);
      update_option('abater_name', $abater_name);
      update_option('abater_comment', $abater_comment);
      update_option('footer_text', $footer_text);
      update_option('copy_text', $copy_text);
      update_option('tell_number', $tell_number);

      update_option('address_title', $address_title);
      update_option('address_map', $address_map);
      update_option('address_name', $address_name);
      update_option('address_time', $address_time);
      update_option('logo', $logo);
    }




    //============================================
    //入力保持用
    //============================================
    $Main_img = [];
    $Slide_text = [];
    $Sns_link = [];
    for ($i = 1; $i <= 21; $i++) {

      $Main_img[$i] =  get_option('main_view' . $i);
      $Slide_text[$i] = get_option('slide_text' . $i);
      $Sns_link[$i] = get_option('sns_link' . $i);
    }
    $Fes_info = [];
    for ($i = 0; $i <= 4; $i++) {

      $Fes_info[$i] = get_option('fes_info' . $i);
    }

    $About_title = get_option('about_title');
    $Work_title = get_option('work_title');
    $Info_title = get_option('info_title');
    $Voice_title = get_option('voice_title');
    $Blog_title = get_option('blog_title');
    $About_text = get_option('about_text');
    $Work_text = get_option('work_text');
    $About_text2 = get_option('about_text2');
    $Abater_name = get_option('abater_name');
    $Footer_text = get_option('footer_text');
    $Copy_text = get_option('copy_text');
    $Tell_number = get_option('tell_number');

    $Abater_comment = get_option('abater_comment');
    $Address_title = get_option('address_title');
    $Address_map = get_option('address_map');
    $Address_name = get_option('address_name');
    $Address_time = get_option('address_time');
    $Logo = get_option('logo');

?>
    <form action="" method="POST" class="custom-form">
      <!--============== メインのビジュアル設定 =====================-->
      <div class="custom-tab">TOPページスライドショー<span class="js-arrow"></span></div>
      <div class="custom-area">
        <div class="culnm-flex">
          <?php for ($i = 1; $i <= 2; $i++) : ?>
            <div class="panel">
              <p>スライドショー画像選択<?php echo $i; ?></p>
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

        <div class="culnm-flex">
          <?php for ($i = 3; $i <= 4; $i++) : ?>
            <div class="panel">
              <p>スライドショー画像選択<?php echo $i; ?></p>
              <div class="media-area-flex">
                <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
                <div id="main-view-preview<?php echo $i; ?>" class="media-preview">
                  <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 100%;">
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>
      </div>



      <div class="custom-tab">スライドショーのテキスト<span class="js-arrow"></span></div>
      <table class="custom-area">
        <tbody>
          <?php for ($i = 1; $i <= 4; $i++) : ?>
            <tr>
              <th>
                <label for="slide-text" class="label">スライドテキスト<?php echo $i ?></label>
              </th>
              <td>
                <input id="slide-text" type="text" name="slide_text<?php echo $i ?>" class="input-style" value="<?php echo $Slide_text[$i]; ?>">
              </td>
            </tr>
          <?php endfor; ?>

        </tbody>
      </table>


      <div class="custom-tab">ABOUTエリア設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        <table>
          <tbody>
            <tr>
              <th>
                <label for="about" class="label">タイトル(設定しなければ「ABOUT」と表示)</label>
              </th>
              <td>
                <input type="text" name="about_title" id="about" class="input-style" value="<?php echo $About_title; ?>">
              </td>
            </tr>
            <tr>
              <th>写真上文章</th>
              <td>
                <textarea name="about_text" id="" cols="60" rows="5"><?php echo $About_text; ?></textarea>
              </td>
            </tr>
            <tr>
              <th>写真下文章</th>
              <td>
                <textarea name="about_text2" id="" cols="60" rows="5"><?php echo $About_text2; ?></textarea>
              </td>
            </tr>

          </tbody>
        </table>
        <div class="culnm-flex">
          <?php for ($i = 5; $i <= 7; $i++) : ?>
            <div class="panel">
              <p>画像選択<?php echo $i; ?></p>
              <div class="media-area-flex">
                <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
                <div id="main-view-preview<?php echo $i; ?>" class="media-preview">
                  <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 100%;">
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>
      </div>



      <div class="custom-tab">WORKエリア設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        <table>
          <tbody>
            <tr>
              <th>
                <label for="about" class="label">タイトル(設定しなければ「WORK」と表示)</label>
              </th>
              <td>
                <input type="text" name="work_title" id="about" class="input-style" value="<?php echo $Work_title; ?>">
              </td>
            </tr>
            <tr>
              <th>文章</th>
              <td>
                <textarea name="work_text" id="" cols="60" rows="5"><?php echo $Work_text; ?></textarea>
              </td>
            </tr>

          </tbody>
        </table>
      </div>


      <div class="custom-tab">INFORMATIONエリア設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        <table>
          <tbody>

            <tr>
              <th>
                <label for="about" class="label">タイトル(設定しなければ「 INFORMATION」と表示)</label>
              </th>
              <td>
                <input type="text" name="info_title" id="about" class="input-style" value="<?php echo $Info_title; ?>">
              </td>
            </tr>
          </tbody>
        </table>
      </div>


      <div class="custom-tab">VOICEエリア設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        <table>
          <tbody>
            <tr>
              <th>
                <label for="about" class="label">タイトル(設定しなければ「VOICE」と表示)</label>
              </th>
              <td>
                <input type="text" name="voice_title" id="about" class="input-style" value="<?php echo $Voice_title; ?>">
              </td>
            </tr>
          </tbody>
        </table>
        <div class="panel" style="text-align: center;">
          <p>VOICEエリア背景画像選択</p>
          <?php for ($i = 8; $i <= 8; $i++) : ?>

            <p>背景画像選択</p>
            <div class="media-area-flex">
              <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
              <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
              <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
              <div id="main-view-preview<?php echo $i; ?>" class="media-preview">
                <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 100%;">
              </div>
            </div>
          <?php endfor; ?>
        </div>
      </div>



      <div class="custom-tab">BLOGエリア設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        <table>
          <tbody>
            <tr>
              <th>
                <label for="about" class="label">タイトル(設定しなければ「BLOG」と表示)</label>
              </th>
              <td>
                <input type="text" name="blog_title" id="about" class="input-style" value="<?php echo $Blog_title; ?>">
              </td>
            </tr>
          </tbody>
        </table>

      </div>

      <div class="custom-tab">ロゴ設定(横型150✖️80程度)<span class="js-arrow"></span></div>
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
      <div class="custom-tab">サイドバーTOP画像<span class="js-arrow"></span></div>
      <div class="custom-area">
        <div class="culnm-flex">
          <?php for ($i = 21; $i <= 21; $i++) : ?>
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



      <div class="custom-tab">自己紹介設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        <table>
          <tbody>
            <tr>
              <th>
                <label for="abater" class="label">自分の名前</label>
              </th>
              <td>
                <input type="text" name="abater_name" id="abater" class="input-style" value="<?php echo $Abater_name; ?>">
              </td>
            </tr>
            <tr>
              <th>自己紹介文</th>
              <td>
                <textarea name="abater_comment" cols="60" rows="5"><?php echo $Abater_comment; ?></textarea>
              </td>
            </tr>
          </tbody>
        </table>
        <div>
          <?php for ($i = 9; $i <= 9; $i++) : ?>

            <p>画像選択</p>
            <div class="media-area-flex">
              <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
              <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
              <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
              <div id="main-view-preview<?php echo $i; ?>" class="media-preview">
                <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 250px;">
              </div>
            </div>
          <?php endfor; ?>
        </div>

      </div>




      <div class="custom-tab">フッターエリア設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        <div>
          <?php for ($i = 10; $i <= 10; $i++) : ?>

            <p>フッター背景</p>
            <div class="media-area-flex">
              <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
              <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
              <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
              <div id="main-view-preview<?php echo $i; ?>" class="media-preview">
                <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 250px;">
              </div>
            </div>
          <?php endfor; ?>
        </div>
        <div>
          <p>フッター内テキスト</p>
          <input type="text" name="footer_text" id="about" class="input-style" value="<?php echo $Footer_text; ?>">
        </div>
        <div>
          <p>©︎コピーライト</p>
          <input type="text" name="copy_text" id="about" class="input-style" value="<?php echo $Copy_text; ?>">
        </div>
        <div>
          <p>電話番号(ハイフンなし)</p>
          <input type="text" name="tell_number" id="about" class="input-style" value="<?php echo $Tell_number; ?>" placeholder="例:09012344321">
        </div>
      </div>




      <div class="custom-tab">住所エリア設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        <div>
          <label for="about" class="label">

            <label for="about" class="label">タイトル(設定しなければ「アクセス」と表示)
            </label>
            <input type="text" name="address_title" id="about" class="input-style" value="<?php echo $Address_title; ?>">
        </div>
        <div>
          <label for="about" class="label">MAP URL</label>
          <textarea name="address_map" id="" cols="30" rows="10"><?php echo $Address_map; ?></textarea>
        </div>
        <div>
          <label for="about" class="label">住所</label>
          <input class="input-style" name="address_name" value="<?php echo $Address_name; ?>">
        </div>
        <div>
          <label for="about" class="label">開催時間</label>
          <input type="text" name="address_time" id="about" class="input-style" value="<?php echo $Address_time; ?>">

        </div>
        <div>
          <label for="about" class="label">開催情報（空白の場合は表示されません）</label>
          <table>
            <tbody>
            <tr>
              <th>
                開催期間
              </th>
              <td>
                <input type="text" name="fes_info0" id="about" class="input-style" value="<?php echo $Fes_info[0]; ?>" placeholder="開催期間">
              </td>
            </tr>
            <tr>
              <th>
                会場
              </th>
              <td>
                <input type="text" name="fes_info1" id="about" class="input-style" value="<?php echo $Fes_info[1]; ?>" placeholder="会場">
              </td>
            </tr>
            <tr>
              <th>
                料金
              </th>
              <td>
                <input type="text" name="fes_info2" id="about" class="input-style" value="<?php echo $Fes_info[2]; ?>" placeholder="料金">
              </td>
            </tr>
            <tr>
              <th>
                お問い合わせ
              </th>
              <td>

                <input type="text" name="fes_info3" id="about" class="input-style" value="<?php echo $Fes_info[3]; ?>" placeholder="お問い合わせ">
              </td>
            </tr>
            <tr>
              <th>
                URL
              </th>
              <td>
                <input type="text" name="fes_info4" id="about" class="input-style" value="<?php echo $Fes_info[4]; ?>" placeholder="URL">
              </td>
            </tr>
            </tbody>
          </table>
  
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