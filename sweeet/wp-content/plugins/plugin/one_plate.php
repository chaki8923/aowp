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
      $title = [];
      $sns_link = [];
      $top_flg = [];
      $month = [];
      $day = [];
      $plase = [];
      for ($i = 1; $i <= 20; $i++) {

        $main_view[$i] = $_POST['main-view' . $i];
        $slide_text[$i] = $_POST['slide_text' . $i];
        $title[$i] = $_POST['title' . $i];
        $movie[$i] = $_POST['movie' . $i];
        $sns_link[$i] = $_POST['sns_link' . $i];
  



        update_option('main_view' . $i, $main_view[$i]);
        update_option('slide_text' . $i, $slide_text[$i]);
        update_option('title' . $i, $title[$i]);
        update_option('movie' . $i, $movie[$i]);
        update_option('sns_link' . $i, $sns_link[$i]);


        if (isset($_POST['select' . $i])) {
          $top_flg[$i] = $_POST['select' . $i];

          update_option('top_flg' . $i, $top_flg[$i]);
        }
      }
      //==================================================
      //postされた値をwp_optionに保存
      //==================================================

      $footer_text = $_POST['footer_text'];
      $copy_text = $_POST['copy_text'];
      $tell_number = $_POST['tell_number'];

      $store_name = stripslashes($_POST['store_name']);
      
      $fes_info = [];
      for ($i = 0; $i <= 6; $i++) {

        $fes_info[$i] = $_POST['fes_info' . $i];
        $month[$i] = $_POST['month' . $i];
        $day[$i] = $_POST['day' . $i];
        $plase[$i] = $_POST['plase' . $i];
        update_option('fes_info' . $i, $fes_info[$i]);
        update_option('month' . $i, $month[$i]);
        update_option('day' . $i, $day[$i]);
        update_option('plase' . $i, $plase[$i]);
      }

      update_option('footer_text', $footer_text);
      update_option('copy_text', $copy_text);
      update_option('tell_number', $tell_number);

      update_option('store_name', $store_name);
 
     
    }




    //============================================
    //入力保持用
    //============================================
    $Main_img = [];
    $Slide_text = [];
    $Sns_link = [];
    $Title = [];
    $Movie = [];
    $Top_flg = [];
    $Month = [];
    $Day = [];
    $Plase = [];
    for ($i = 0; $i <= 6; $i++) {

      $Month[$i] = get_option('month' . $i);
      $Day[$i] = get_option('day' . $i);
      $Plase[$i] = get_option('plase' . $i);
    }
    for ($i = 1; $i <= 20; $i++) {

      $Main_img[$i] =  get_option('main_view' . $i);
      $Slide_text[$i] = get_option('slide_text' . $i);
      $Title[$i] = get_option('title' . $i);
      $Movie[$i] = get_option('movie' . $i);
      $Sns_link[$i] = get_option('sns_link' . $i);
      $Top_flg[$i] = get_option('top_flg' . $i); //動画写真切り替え
    }
    $Fes_info = [];
    for ($i = 0; $i <= 6; $i++) {

      $Fes_info[$i] = get_option('fes_info' . $i);
    }


    $Tell_number = get_option('tell_number');

    $Store_name = get_option('store_name');

    

?>
    <form action="" method="POST" class="custom-form">
      <!--============== メインのビジュアル設定 =====================-->
      <div class="custom-tab">TOPページスライドショー<span class="js-arrow"></span></div>
      <div class="custom-area">
        <p>画像を3枚選んでください</p>
        <div class="culnm-flex">
          <?php for ($i = 1; $i <= 3; $i++) : ?>
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

      </div>



      <div class="custom-tab">セクション1<span class="js-arrow"></span></div>
      <div class="custom-area">

        <table class=""><div class="culnm-flex">
          <?php for ($i = 9; $i <= 9; $i++) : ?>
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
          <tbody>
            <?php for ($i = 1; $i <= 2; $i++) : ?>
              <tr>
                <th>
                  <label for="slide-text" class="label">タイトル</label>
                </th>
                <td>
                  <input id="slide-text" type="text" name="title<?php echo $i ?>" class="input-style" value="<?php echo $Title[$i]; ?>">
                </td>
              </tr>
            <?php endfor; ?>
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
        <div class="culnm-flex">
          <?php for ($i = 4; $i <= 5; $i++) : ?>
            <div class="panel">
              <p>画像選択または動画URL</p>
              <div class="radio">
                <div>
                  <input type="radio" id="movie<?php echo $i; ?>" name="select<?php echo $i; ?>" value="1" <?php if ($Top_flg[$i] == 1) echo 'checked' ?>>
                  <label for="movie<?php echo $i; ?>">動画を使用</label>
                </div>
                <div>
                  <input type="radio" id="image<?php echo $i; ?>" name="select<?php echo $i; ?>" value="2" <?php if ($Top_flg[$i] == 2) echo 'checked' ?>>
                  <label for="image<?php echo $i; ?>">写真を使用</label>
                </div>
              </div>
              <div class="media-area-flex">
                <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
                <div id="main-view-preview<?php echo $i; ?>" class="media-preview ">
                  <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 100%;">
                </div>
              </div>
              <input type="text" name="movie<?php echo $i; ?>" class="input-style" value="<?php echo $Movie[$i]; ?>" placeholder="動画URL">
            </div>
          <?php endfor; ?>
        </div>
      </div>


      <div class="custom-tab">セクション2<span class="js-arrow"></span></div>
      <div class="custom-area">

        <table class="">
          <tbody>
            <?php for ($i = 3; $i <= 4; $i++) : ?>
              <tr>
                <th>
                  <label for="slide-text" class="label">タイトル</label>
                </th>
                <td>
                  <input id="slide-text" type="text" name="title<?php echo $i ?>" class="input-style" value="<?php echo $Title[$i]; ?>">
                </td>
              </tr>
            <?php endfor; ?>
            <?php for ($i = 5; $i <= 8; $i++) : ?>
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
        <div class="culnm-flex">
          <?php for ($i = 6; $i <= 6; $i++) : ?>
            <div class="panel">
              <p>画像選択または動画URL</p>
              <div class="radio">
                <div>
                  <input type="radio" id="movie<?php echo $i; ?>" name="select<?php echo $i; ?>" value="1" <?php if ($Top_flg[$i] == 1) echo 'checked' ?>>
                  <label for="movie<?php echo $i; ?>">動画を使用</label>
                </div>
                <div>
                  <input type="radio" id="image<?php echo $i; ?>" name="select<?php echo $i; ?>" value="2" <?php if ($Top_flg[$i] == 2) echo 'checked' ?>>
                  <label for="image<?php echo $i; ?>">写真を使用</label>
                </div>
              </div>
              <div class="media-area-flex">
                <input type="button" name="main-view-select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="media-select">
                <input type="button" name="clear-main-view<?php echo $i ?>" style="width: 150px;" value="画像削除" class="media-clear">
                <input type="text" name="main-view<?php echo $i ?>" style="visibility: hidden;" value="<?php if (!empty($Main_img[$i])) echo $Main_img[$i]; ?>" class="sample-media main-bc">
                <div id="main-view-preview<?php echo $i; ?>" class="media-preview ">
                  <img src="<?php echo $Main_img[$i]; ?>" alt="" style="width: 100%;">
                </div>
              </div>
              <input type="text" name="movie<?php echo $i; ?>" class="input-style" value="<?php echo $Movie[$i]; ?>" placeholder="動画URL">
            </div>
          <?php endfor; ?>
        </div>
      </div>


      <div class="custom-tab">商品エリア<span class="js-arrow"></span></div>
      <div class="custom-area">

        <table class="">
          <tbody>
            <?php for ($i = 5; $i <= 5; $i++) : ?>
              <tr>
                <th>
                  <label for="slide-text" class="label">タイトル</label>
                </th>
                <td>
                  <input id="slide-text" type="text" name="title<?php echo $i ?>" class="input-style" value="<?php echo $Title[$i]; ?>">
                </td>
              </tr>
            <?php endfor; ?>

          </tbody>
        </table>
        <div class="culnm-flex">
          <?php for ($i = 7; $i <= 7; $i++) : ?>
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



      <div class="custom-tab">ADDRESSエリア設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        <table>
          <tbody>
            <?php for ($i = 6; $i <= 6; $i++) : ?>
              <tr>
                <th>
                  <label for="slide-text" class="label">タイトル</label>
                </th>
                <td>
                  <input id="slide-text" type="text" name="title<?php echo $i ?>" class="input-style" value="<?php echo $Title[$i]; ?>">
                </td>
              </tr>
            <?php endfor; ?>
            <?php for ($i = 7; $i <= 7; $i++) : ?>
              <tr>
                <th>
                  <label for="slide-text" class="label">予定表タイトル</label>
                </th>
                <td>
                  <input id="slide-text" type="text" name="title<?php echo $i ?>" class="input-style" value="<?php echo $Title[$i]; ?>">
                </td>
              </tr>
            <?php endfor; ?>
            <?php $week = [
              '日', //0
              '月', //1
              '火', //2
              '水', //3
              '木', //4
              '金', //5
              '土', //6
            ]; ?>
            <?php for ($i = 0; $i <= 6; $i++) : ?>
              <tr>
                <th>
                  <input type="text" name="month<?php echo $i; ?>" placeholder="月" style="width: 35px;" value="<?php echo $Month[$i]; ?>">
                  月
                  <input type="text" name="day<?php echo $i; ?>" placeholder="日" style="width: 35px;" value="<?php echo $Day[$i]; ?>">
                  日 (<?php echo $week[$i] ?>)
                </th>
                <td>
                  <input type="text" name="plase<?php echo $i; ?>" style="width: 325px;" value="<?php echo $Plase[$i]; ?>">
                </td>
              </tr>
            <?php endfor; ?>
          </tbody>
        </table>
        <table>
          <tbody>
            <tr>
              <th>電話番号</th>
              <td>
                <input type="text" name="tell_number" class="input-style" value="<?php echo $Tell_number; ?>">
              </td>
            </tr>
          </tbody>
        </table>
        <div class="culnm-flex">
          <?php for ($i = 8; $i <= 8; $i++) : ?>
            <div class="panel">
              <p>画像選択(店舗外観など)</p>
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



      <div class="custom-tab">店名設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        <table>
          <tbody>
            <th>
              <label for="about" class="label">店名入力</label>
            </th>
            <td>
              <input type="text" name="store_name" id="about" class="input-style" value="<?php echo $Store_name; ?>">
            </td>
          </tbody>
        </table>

      </div>

      <div class="custom-tab">ロゴ設定<span class="js-arrow"></span></div>
      <div class="custom-area">
        
        <div class="culnm-flex">
          <?php for ($i = 10; $i <= 10; $i++) : ?>
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
          <?php for ($i = 20; $i <= 20; $i++) : ?>
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