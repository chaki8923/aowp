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

      $movie = $_POST['main-movie']; //動画
      $movie_text = $_POST['movie_text'];   //動画用テキスト

      $top_img = []; //スライドショー
      for ($i = 1; $i <= 3; $i++) {

        $top_img[$i] = $_POST['sampleMedia' . $i];

        update_option('top_img' . $i, $top_img[$i]);
      }

      $slide_title = $_POST['slide_title'];

      $work_title = $_POST['work-title'];
      $work_link = $_POST['work-link'];
      $work_bc = $_POST['sampleWork'];
      $icon_img = []; //アイコン
      for ($i = 1; $i <= 5; $i++) {

        $icon_img[$i] = $_POST['icon-view' . $i];
        $work_text[$i] = $_POST['work-text' . $i];
        update_option('icon-img' . $i, $icon_img[$i]);
        update_option('work-text' . $i, $work_text[$i]);
      }
      $another_title = $_POST['another-title'];
      $another_link = $_POST['another-link'];

      $another_bc = [];
      $another_text = [];
      for ($i = 4; $i <= 5; $i++) {
        $another_text[$i] = $_POST['another-text' . $i];
        $another_bc[$i] = $_POST['sampleanother' . $i];
        update_option('another-bc' . $i, $another_bc[$i]);
        update_option('another-text' . $i, $another_text[$i]);
      }
      $another_link = $_POST['another-link'];

      $entry_link = $_POST['entry-link'];
      $logo = $_POST['samplelogo'];
      $add = $_POST['add'];
      $post = $_POST['post'];
      $copy_text = $_POST['copy_text'];
      $about_title = $_POST['about_title'];
      $interview_title = $_POST['interview_title'];

      //==================================================
      //postされた値をwp_optionに保存
      //==================================================


      update_option('main-movie', $movie);
      update_option('movie_text', $movie_text);
      update_option('slide_title', $slide_title);
      update_option('work_title', $work_title);
      update_option('work_link', $work_link);
      update_option('work_bc', $work_bc);
      update_option('another_title', $another_title);
      update_option('another_link', $another_link);
      update_option('entry_link', $entry_link);
      update_option('logo', $logo);
      update_option('add', $add);
      update_option('post', $post);
      update_option('copy_text', $copy_text);
      update_option('about_title', $about_title);
      update_option('interview_title', $interview_title);







      //===============================================
      //動画か写真フラグ
      //===============================================
      if (isset($_POST['main'])) {
        $top_flg = $_POST['main'];

        update_option('top_flg', $top_flg);
      }
    }




    //============================================
    //入力保持用
    //============================================
    $Movie = get_option('main-movie');
    $Top_img = [];

    for ($i = 1; $i <= 3; $i++) {
      $Top_img[$i] = get_option('top_img' . $i);
    }

    $Movie_text = get_option('movie_text'); //動画用テキスト
    $Top_flg = get_option('top_flg'); //動画写真切り替え
    $Slide_title = get_option('slide_title'); //スライドショー用テキスト


    $Icon_img = [];
    $Work_text = [];
    $Another_bc = [];
    $Another_text = [];
    $Work_title = get_option('work_title');
    $Work_bc = get_option('work_bc');
    $Add = get_option('add');
    $Post = get_option('post');
    $About_title = get_option('about_title');
    $Interview_title = get_option('interview_title');


    for ($i = 1; $i <= 5; $i++) {
      $Icon_img[$i] = get_option('icon-img' . $i);
      $Work_text[$i] = get_option('work-text' . $i);
    }
    for ($i = 4; $i <= 5; $i++) {
      $Another_bc[$i] = get_option('another-bc' . $i);
      $Another_text[$i] = get_option('another-text' . $i);
    }

    $Another_title = get_option('another_title');
    $Another_link = get_option('another_link');

    $Entry_link = get_option('entry_link');
    $Logo = get_option('logo');
    $Copy_text = get_option('copy_text');
?>
    <form action="" method="POST" class="custom-form">
      <!--============== メインのビジュアル設定 =====================-->
      <div class="custom">

        <div class="custom-box">

          <div class="custom-tab">ロゴ設定<span class="js-arrow"></span></div>
          <div class="custom-area">
            <div class="panel">
              <div class="media-area-flex">
                <input type="button" name="logo-select" style="width: 150px;" value="画像選択" class="media-select">
                <input type="button" name="logo-delete" style="width: 150px;" value="画像削除" class="media-clear">
                <input type="text" name="samplelogo" style="visibility: hidden;" value="<?php if (!empty($Logo)) echo $Logo; ?>" class="sample-media main-bc">
                <div id="logo"  class="media-preview">
                  <img src="<?php if (!empty($Logo)) echo $Logo; ?> ?>" alt="" style="width: 100%;">
                </div>
              </div>
            </div>
            <table style="margin-top: 32px;">
              <tbody>
                <tr>
                  <th class="custom-title">採用サイトへのリンク（リクルートナビなど）</th>
                  <td>
                    <input type="text" class="slide-text" name="entry-link" value="<?php if (!empty($Entry_link)) echo $Entry_link; ?>">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>


          <div class="custom-tab">トップイメージ設定<span class="js-arrow"></span></div>
          <div class="custom-area">
            <div class="radio">
              <div>
                <input type="radio" id="movie" name="main" value="1" <?php if ($Top_flg == 1) echo 'checked' ?>>
                <label for="movie">動画を使用</label>
              </div>
              <div>
                <input type="radio" id="image" name="main" value="2" <?php if ($Top_flg == 2) echo 'checked' ?>>
                <label for="image">写真を使用(スライドショー)</label>
              </div>
            </div>
            <table style="margin-bottom: 24px;">
              <tbody>
                <tr>
                  <th class="custom-title">動画URL貼り付け(最大8Mまで)</th>
                  <!-- こっからクリップボードに動画URLコピーしてそれを貼りつける -->
                  <td>
                    <input type="text" name="main-movie" value="<?php if (isset($Movie))  echo $Movie; ?>" class="slide-text">
                  </td>
                </tr>
                <tr>
                  <th>動画用テキスト</th>
                  <td>
                    <textarea name="movie_text" id="" cols="60" rows="5"><?php if (!empty($Movie_text)) echo $Movie_text; ?></textarea>
                  </td>

                </tr>
                <tr>
                  <th>スライドショー用テキスト </th>
                  <td>
                    <input type="text" class="slide-text" name="slide_title" value="<?php if (!empty($Slide_title)) echo $Slide_title; ?>">
                  </td>
                </tr>
              </tbody>

            </table>
            <div class="media-area">
              <div class="main-imagearea">
                <div class="culnm-flex">
                  <?php for ($i = 1; $i <= 3; $i++) : ?>

                    <div class="panel">
                      <div class="media-area-flex">
                        <input type="button" name="media<?php echo $i; ?>" style="width: 150px;" value="画像選択" class="media-select">
                        <input type="button" name="clear<?php echo $i; ?>" style="width: 150px;" value="画像削除" class="media-clear">
                        <input type="text" name="sampleMedia<?php echo $i; ?>" style="visibility: hidden;" value="<?php echo $Top_img[$i]; ?>" class="sample-media">
                        <div id="media<?php echo $i; ?>" <?php echo $i; ?>  class="media-preview">
                          <img src="<?php echo $Top_img[$i]; ?>" alt="" style="width: 100%;">
                        </div>
                      </div>
                    </div>

                  <?php endfor; ?>
                </div>
              </div>
            </div>
          </div>

          <!-- ============================================================== -->
          <div class="custom-tab">業務内容エリア<span class="js-arrow"></span></div>
          <div class="custom-area">
            <table class="inner">
              <tbody>
                <tr>
                  <th>タイトル</th>
                  <td>
                    <input type="text" name="work-title" style="width: 100%;" value="<?php if (!empty($Work_title)) echo $Work_title; ?>">
                  </td>
                </tr>
                

              </tbody>
            </table>
            <div class="culnm-flex">
              <?php for ($i = 1; $i <= 3; $i++) : ?>
                <div class="panel">
                  <div class="media-area-flex">
                    <p>アイコン選択<?php echo $i; ?></p>
                    <div class="media-area">
                      <input type="button" name="icon<?php echo $i ?>"  value="画像選択" class="media-select">
                      <input type="button" name="clear-icon<?php echo $i ?>"  value="画像削除" class="media-clear">
                      <input type="text" name="icon-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Icon_img[$i])) echo $Icon_img[$i]; ?>" class="sample-media main-bc">
                      <div id="media-icon<?php echo $i; ?>" <?php echo $i; ?> class="media-preview icon">
                        <img src="<?php echo $Icon_img[$i]; ?>" alt="" style="width: 150px;">
                      </div>
                    </div>
                  </div>
                  <p>テキスト<?php echo $i; ?></p>
                  <input type="text" name="work-text<?php echo $i; ?>" class="work-title" value="<?php if (!empty($Work_text[$i])) echo $Work_text[$i]; ?>">
                </div>
              <?php endfor; ?>
            </div>
            <div class="culnm-flex">
              <div class="panel">
                <p>背景画像</p>
                <div class="media-area-flex">
                  <input type="button" name="work-bc"  value="画像選択" class="media-select">
                  <input type="button" name="clear-work"  value="画像削除" class="media-clear">
                  <input type="text" name="sampleWork" style="visibility: hidden;" value="<?php if (!empty($Work_bc)) echo $Work_bc; ?>" class="sample-media main-bc">
                </div>
                <div id="work-bc-view" class="media-preview ">
                  <img src="<?php if (!empty($Work_bc)) echo $Work_bc; ?> ?>" alt="" style="width: 250px;">
                </div>
              </div>
            </div>
          </div>
          <!-- //======================================================================
          //その他エリア
          //====================================================================== -->

          <div class="custom-tab">人材育成エリア<span class="js-arrow"></span></div>
          <div class="custom-area">
            <table class="inner">
              <tbody>
                <tr>
                  <th>タイトル</th>
                  <td>
                    <input type="text" name="another-title" class="link" value="<?php if (!empty($Another_title)) echo $Another_title; ?>">
                  </td>
                </tr>
               
              </tbody>
            </table>
            <div class="culnm-flex">
              <?php for ($i = 4; $i <= 5; $i++) : ?>
                <div class="panel">
                  <p>アイコン選択</p>
                  <div class="media-area-flex">
                    <input type="button" name="icon<?php echo $i ?>"  value="画像選択" class="media-select">
                    <input type="button" name="clear-icon<?php echo $i ?>"  value="画像削除" class="media-clear">
                    <input type="text" name="icon-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Icon_img[$i])) echo $Icon_img[$i]; ?>" class="sample-media main-bc">
                    <div id="media-icon<?php echo $i; ?>" <?php echo $i; ?> class="media-preview icon">
                      <img src="<?php echo $Icon_img[$i]; ?>" alt="" style="width: 150px;">
                    </div>
                  </div>
                  <p>テキスト</p>
                  <input type="text" name="another-text<?php echo $i; ?>" class="work-title" value="<?php if (!empty($Another_text[$i])) echo $Another_text[$i]; ?>">
                </div>
              <?php endfor; ?>
            </div>
            <div class="media-area">
              <div class="culnm-flex">
                <?php for ($i = 4; $i <= 5; $i++) : ?>
                  <div class="panel">
                    <p>背景画像<?php if ($i === 4) {
                              echo '左';
                            } else {
                              echo '右';
                            }
                            ?>

                    </p>
                    <div class="media-area-flex">
                      <input type="button" name="another-bc<?php echo $i; ?>"  value="画像選択" class="media-select">
                      <input type="button" name="clear-another<?php echo $i; ?>"  value="画像削除" class="media-clear">
                      <input type="text" name="sampleanother<?php echo $i; ?>" style="visibility: hidden;" value="<?php if (!empty($Another_bc[$i])) echo $Another_bc[$i]; ?>" class="sample-media main-bc">
                      <div id="another-bc-view<?php echo $i; ?>"  class="media-preview">
                        <img src="<?php if (!empty($Another_bc[$i])) echo $Another_bc[$i]; ?>" alt="" >
                      </div>
                    </div>
                  </div>
                <?php endfor; ?>
              </div>
            </div>
          </div>


          <div class="custom-tab">アドレス設定<span class="js-arrow"></span></div>
          <div class="custom-area">
            <table>
              <tbody>
                <tr>
                  <th>
                    郵便番号
                  </th>
                  <td>
                    <input type="text" name="post" class="link" placeholder="郵便番号" value="<?php if (!empty($Post)) echo $Post; ?>">
                  </td>
                </tr>
                <tr>
                  <th>住所</th>
                  <td>
                    <input type="text" name="add" class="slide-text" placeholder="住所" value="<?php if (!empty($Add)) echo $Add; ?>">
                  </td>
                </tr>
                <tr>
                  <th>コピーライト</th>
                  <td>
                    <input type="text" name="copy_text" class="slide-text" placeholder="コピーライト" value="<?php if (!empty($Copy_text)) echo $Copy_text; ?>">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="custom-tab">その他各タイトル<span class="js-arrow"></span></div>
          <div class="custom-area">
            <table>
              <tbody>
                <tr>
                  <th>
                    ABOUT
                  </th>
                  <td>
                    <input type="text" name="about_title" class="slide-text" placeholder="" value="<?php if (!empty($About_title)) echo $About_title; ?>">
                  </td>
                </tr>
                <tr>
                  <th>インタビュー</th>
                  <td>
                    <input type="text" name="interview_title" class="slide-text" placeholder="" value="<?php if (!empty($Interview_title)) echo $Interview_title; ?>">
                  </td>
                </tr>
              </tbody>
            </table>
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