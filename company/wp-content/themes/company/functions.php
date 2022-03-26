<?php

function getURL($url)
{

    return get_template_directory_uri() . '/demo/' . $url;
}


//wordpressのjquery削除
add_filter('wp_default_scripts', 'dequeue_jquery_migrate');
function dequeue_jquery_migrate($scripts)
{
    if (!is_admin()) {
        $scripts->remove('jquery');
    }
}

function my_scripts()
{
    wp_deregister_script('jquery');
    //custom.jsというファイルを使いたい場合
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'my_scripts');

function js_init()
{
    // 参照url::https://www.tailtension.com/wordpress/1743/

    wp_register_script('function-js', get_template_directory_uri() . '/js/custom.js');
    wp_enqueue_script('function-js');
}
add_action('admin_init', 'js_init');


//TOPメニュー
register_nav_menu('topmenu', 'トップメニュー');
register_nav_menu('footermenu', 'フッターメニュー');

//カスタムフィールド使う宣言
add_action('admin_menu', 'my_custom');
//カスタムフィールドの更新を行う宣言
add_action('save_post', 'save_custom');

//ここに使うカスタムフィールドを書いていく。
function my_custom()
{
    add_meta_box('subtitle_id', 'サブタイトル', 'custom_area', 'about', 'normal');
    add_meta_box('backImg_id', '背景画像', 'custom_area2', 'about', 'normal');
    add_meta_box('interview_id', 'スライドショー用情報', 'custom_area3', 'interview', 'normal');
    add_meta_box('interview-detail_id', 'インタビュー詳細', 'custom_area4', 'interview', 'normal');
    add_meta_box('schedule_id', '1日のスケジュール', 'custom_area5', 'interview','normal');

}

//カスタムフィールドの見た目を作っていく
function custom_area()
{

    global $post;
    echo 'サブタイトル:      <input type="text"  name= "sub_title" value= ' . get_post_meta($post->ID, 'sub_title', true) . '><br>';
}
function custom_area2()
{

    global $post;
    echo '背景画像:<br>';
?>
    <?php $backImg = get_post_meta($post->ID, 'back-img', true) ?>
    <input type="text" name="back-img" value="<?php if (!empty($backImg)) echo $backImg; ?>" style="visibility: hidden;"><br>

    <input type="button" name="detail" style="width: 150px;" value="画像選択" class="detail-select">
    <input type="button" name="clear-detail" style="width: 150px;" value="画像削除" class="detail-delete> delete-btn">
    <div id="back-view" style="width: 350px;" class="back-view">
        <img src="<?php echo get_post_meta($post->ID, 'back-img', true) ?>" alt="" style="width: 350px;">
    </div>
    <p>背景数字</p>
    <input type="text" name="back-number" value="<?php echo get_post_meta($post->ID, 'back-number', true); ?>">
    <p>背景色</p>
    <input type="color" name="back-color" value="<?php echo get_post_meta($post->ID, 'back-color', true); ?>">
<?php
}
//=====================================================================
function custom_area3()
{

    global $post;
    echo 'スライドショー用先輩画像:<br>';
?>
    <?php $actorImg = get_post_meta($post->ID, 'actor-img', true) ?>
    <input type="text" name="actor-img" value="<?php if (!empty($actorImg)) echo $actorImg; ?>" style="visibility: hidden;"><br>

    <input type="button" name="select" style="width: 150px;" value="画像選択" class="detail-select">
    <input type="button" name="clear-select" style="width: 150px;" value="画像削除" class="detail-delete> delete-btn">
    <div id="actor-view" style="width: 350px;">
        <img src="<?php echo get_post_meta($post->ID, 'actor-img', true) ?>" alt="" style="width: 350px;">
    </div>
    <p>先輩氏名</p>
    <input type="text" name="actor-name" value="<?php echo get_post_meta($post->ID, 'actor-name', true); ?>">
    <p>入社時期</p>
    <input type="text" name="actor-year" value="<?php echo get_post_meta($post->ID, 'actor-year', true); ?>">
    <p>先輩コメント</p>
    <textarea name="actor-comment" id="" cols="30" rows="10"><?php echo get_post_meta($post->ID, 'actor-comment', true); ?></textarea>
    <p>ラベル色</p>
    <input type="color" name="label-color" value="<?php echo get_post_meta($post->ID, 'label-color', true); ?>">
    <?php
}

function custom_area4()
{

    global $post;
    for ($i = 1; $i <= 3; $i++) :
        echo '<p>先輩画像' . $i . '</p>';
    ?>
        <?php
        $actorImg = [];
        $actorImg[$i] = get_post_meta($post->ID, 'actor-img' . $i, true) ?>
        <input type="text" name="actor-img<?php echo $i ?>" value="<?php if (!empty($actorImg[$i])) echo $actorImg[$i]; ?>" style="visibility: hidden;"><br>

        <input type="button" name="select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="detail-select">
        <input type="button" name="clear-select<?php echo $i ?>" style="width: 150px;" value="画像削除" class="detail-delete> delete-btn">
        <div id="actor-view<?php echo $i ?>" style="width: 350px;" class="actor-view">
            <img src="<?php echo get_post_meta($post->ID, 'actor-img' . $i, true) ?>" alt="" style="width: 350px;">
        </div>
        <p>コメントタイトル<?php echo $i ?></p>
        <input type="text" name="comment-title<?php echo $i ?>" value="<?php echo get_post_meta($post->ID, 'comment-title' . $i, true); ?>">
        <p>先輩コメント<?php echo $i ?></p>
        <textarea name="actor-comment<?php echo $i ?>" id="" cols="50" rows="10"><?php echo get_post_meta($post->ID, 'actor-comment' . $i, true); ?></textarea>
<?php
    endfor;
}

function custom_area5()
{

    global $post;
    echo '<p>スケジュール登録</p>';
    for ($i = 1; $i <= 6; $i++) :
    ?>

        <div class="time-table">
            <input type="text" name="time<?php echo $i ?>" class="time-input" value="<?php echo get_post_meta($post->ID, 'time' . $i, true); ?>" placeholder="時間を入力">
            <input type="text" name="job<?php echo $i ?>" class="job-input" value="<?php echo get_post_meta($post->ID, 'job' . $i, true); ?>" placeholder="業務内容を入力">
            <textarea name="job_detail<?php echo $i ?>" id="" cols="40" rows="10" placeholder="詳細を入力" class="job-detail-input"><?php echo get_post_meta($post->ID, 'job_detail' . $i, true); ?></textarea>
        </div>
<?php
    endfor;
}


//カスタムフィールドが更新された時の処理

function save_custom($post_id)
{

    $sub_title = '';
    //カスタムフィールド内にポストされたら・・・
    if (isset($_POST['sub_title'])) {
        $sub_title = $_POST['sub_title'];

        //変更されていたら更新
        if ($sub_title !== get_post_meta($post_id, 'sub_title', true)) {
            update_post_meta($post_id, 'sub_title', $sub_title);
            //何もデータが入っていなければ削除
        } elseif ($sub_title == '') {
            delete_post_meta($post_id, 'sub_title', get_post_meta($post_id, 'sub_title', true));
        }
    }

    $back_img = '';
    if (isset($_POST['back-img'])) {

        $back_img = $_POST['back-img'];

        if ($back_img !== get_post_meta($post_id, 'back-img', true)) {
            update_post_meta($post_id, 'back-img', $back_img);
        } elseif ($back_img = '') {
            delete_post_meta($post_id, 'back-img', get_post_meta($post_id, 'back-img', true));
        }
    }
    $back_number = '';
    if (isset($_POST['back-number'])) {

        $back_number = $_POST['back-number'];
        if ($back_number !== get_post_meta($post_id, 'back-number', true)) {
            update_post_meta($post_id, 'back-number', $back_number);
        } elseif ($back_number = '') {
            delete_post_meta($post_id, 'back-number', get_post_meta($post_id, 'back-number', true));
        }
    }
    $back_color = '';
    if (isset($_POST['back-color'])) {

        $back_color = $_POST['back-color'];
        if ($back_color !== get_post_meta($post_id, 'back-color', true)) {
            update_post_meta($post_id, 'back-color', $back_color);
        } elseif ($back_color = '') {
            delete_post_meta($post_id, 'back-color', get_post_meta($post_id, 'back-color', true));
        }
    }
    //=============================================================================
    //先輩インタビュー表示
    //=============================================================================

    $actor_img = '';
    if (isset($_POST['actor-img'])) {

        $actor_img = $_POST['actor-img'];

        if ($actor_img !== get_post_meta($post_id, 'actor-img', true)) {
            update_post_meta($post_id, 'actor-img', $actor_img);
        } elseif ($actor_img = '') {
            delete_post_meta($post_id, 'actor-img', get_post_meta($post_id, 'actor-img', true));
        }
    }
    $actor_name = '';
    if (isset($_POST['actor-name'])) {

        $actor_name = $_POST['actor-name'];
        if ($actor_name !== get_post_meta($post_id, 'actor-name', true)) {
            update_post_meta($post_id, 'actor-name', $actor_name);
        } elseif ($actor_name = '') {
            delete_post_meta($post_id, 'actor-name', get_post_meta($post_id, 'actor-name', true));
        }
    }
    $actor_year = '';
    if (isset($_POST['actor-year'])) {

        $actor_year = $_POST['actor-year'];
        if ($actor_year !== get_post_meta($post_id, 'actor-year', true)) {
            update_post_meta($post_id, 'actor-year', $actor_year);
        } elseif ($actor_year = '') {
            delete_post_meta($post_id, 'actor-year', get_post_meta($post_id, 'actor-year', true));
        }
    }
    $actor_comment = '';
    if (isset($_POST['actor-comment'])) {

        $actor_comment = $_POST['actor-comment'];
        if ($actor_comment !== get_post_meta($post_id, 'actor-comment', true)) {
            update_post_meta($post_id, 'actor-comment', $actor_comment);
        } elseif ($actor_comment = '') {
            delete_post_meta($post_id, 'actor-comment', get_post_meta($post_id, 'actor-comment', true));
        }
    }
    $label_color = '';
    if (isset($_POST['label-color'])) {

        $label_color = $_POST['label-color'];
        if ($label_color !== get_post_meta($post_id, 'label-color', true)) {
            update_post_meta($post_id, 'label-color', $label_color);
        } elseif ($label_color = '') {
            delete_post_meta($post_id, 'label-color', get_post_meta($post_id, 'label-color', true));
        }
    }
    //=============================================================================
    //先輩インタビュー詳細　登録
    //=============================================================================

    $actor_imgs = [];
    $comment_titles = [];
    $actor_comments = [];
    for ($i = 1; $i <= 3; $i++) {


        if (isset($_POST['actor-img' . $i])) {

            $actor_imgs[$i] = $_POST['actor-img'.$i];

            if ($actor_imgs[$i] !== get_post_meta($post_id, 'actor-img'.$i, true)) {
                update_post_meta($post_id, 'actor-img'.$i, $actor_imgs[$i]);
            } elseif ($actor_imgs[$i] = '') {
                delete_post_meta($post_id, 'actor-img'.$i, get_post_meta($post_id, 'actor-img'.$i, true));
            }
        }
        if (isset($_POST['comment-title'.$i])) {

            $comment_titles[$i] = $_POST['comment-title'.$i];
            if ($comment_titles[$i] !== get_post_meta($post_id, 'comment-title'.$i, true)) {
                update_post_meta($post_id, 'comment-title'.$i, $comment_titles[$i]);
            } elseif ($comment_title[$i] = '') {
                delete_post_meta($post_id, 'comment-title'.$i, get_post_meta($post_id, 'comment-title'.$i, true));
            }
        }
        if (isset($_POST['actor-comment'.$i])) {

            $actor_comments[$i] = $_POST['actor-comment'.$i];
            if ($actor_comments[$i] !== get_post_meta($post_id, 'actor-comment'.$i, true)) {
                update_post_meta($post_id, 'actor-comment'.$i, $actor_comments[$i]);
            } elseif ($actor_comments[$i] = '') {
                delete_post_meta($post_id, 'actor-comment'.$i, get_post_meta($post_id, 'actor-comment'.$i, true));
            }
        }
    }
    //=============================================================================
    //スケジュール　登録
    //=============================================================================

    $time = [];
    $job = [];
    $job_detail = [];
    for ($i = 1; $i <= 6; $i++) {


        if (isset($_POST['job' . $i])) {

            $job[$i] = $_POST['job'.$i];

            if ($job[$i] !== get_post_meta($post_id, 'job'.$i, true)) {
                update_post_meta($post_id, 'job'.$i, $job[$i]);
            } elseif ($job[$i] = '') {
                delete_post_meta($post_id, 'job'.$i, get_post_meta($post_id, 'job'.$i, true));
            }
        }
        if (isset($_POST['time'.$i])) {

            $time[$i] = $_POST['time'.$i];
            if ($time[$i] !== get_post_meta($post_id, 'time'.$i, true)) {
                update_post_meta($post_id, 'time'.$i, $time[$i]);
            } elseif ($comment_title[$i] = '') {
                delete_post_meta($post_id, 'time'.$i, get_post_meta($post_id, 'time'.$i, true));
            }
        }
        if (isset($_POST['job_detail'.$i])) {

            $job_detail[$i] = $_POST['job_detail'.$i];
            if ($job_detail[$i] !== get_post_meta($post_id, 'job_detail'.$i, true)) {
                update_post_meta($post_id, 'job_detail'.$i, $job_detail[$i]);
            } elseif ($job_detail[$i] = '') {
                delete_post_meta($post_id, 'job_detail'.$i, get_post_meta($post_id, 'job_detail'.$i, true));
            }
        }
    }
   
}
?>
<?php


//======================================================================================
//業務内容ウィジェット
//======================================================================================
add_action('widgets_init', 'work_area');

add_action('widgets_init', function () {
    register_widget('my_widget_item1');
});

//ウィジェットをドラッグで持ってくるスペース確保
function work_area()
{
    register_sidebar(array(
        'name' => '業務内容エリア',
        'id' => 'work_widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
    ));
}

//実際に入力するスペース
class my_widget_item1 extends WP_Widget
{

    function __construct()
    {
        parent::__construct(false, $name = '業務内容ウィジェット');
    }

    function form($instance)
    {

        //サニタイズっぽいこと

        $icon = esc_attr($instance['icon']);
        $text = esc_attr($instance['text']);

        $icon_id =  $this->get_field_id('icon');
        $text_id =  $this->get_field_id('text');


        $icon_name =  $this->get_field_name('icon');
        $text_name =  $this->get_field_name('text');

?>

        <p>画像URL:</p>
        <input type="text" name="<?php echo $icon_name  ?>" style="width: 350px;" id="<?php echo $icon_id ?>" value="<?php echo $icon; ?>" class="icon-select">

        <p>
            <label for="<?php echo $text_id;  ?>">
                <?php echo 'テキスト';  ?>
            </label>
            <input type="text" id="<?php echo $text_id; ?>" name="<?php echo $text_name; ?>" value="<?php echo $text; ?>">
        </p>
        <?php
    }

    //入力した内容を更新する。
    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;
        $instance['icon'] = strip_tags($new_instance['icon']);
        $instance['text'] = trim($new_instance['text']);

        return $instance;
    }

    //実際にどのようにhtml画面に表させるかる処理
    function widget($args, $instance)
    {

        extract($args);
        $icon = $instance['icon'];
        $text = $instance['text'];

        if ($text) { ?>
            <div class="job-box">
                <img src="<?php echo $icon; ?>" alt="アイコン" class="job-box__logo">
                <h2 class="job-box__title"><?php echo $text; ?></h2>
            </div>
<?php
        }
    }
}


//=====================================================================
//カスタムタクソノミー
//=====================================================================
//カスタム投稿タイプ
function twpp_setup_theme()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'twpp_setup_theme');

add_action('init', 'register_post_type_and_taxonomy'); //最初にregister_post_type_and_taxonomy関数を実行
function register_post_type_and_taxonomy()
{
    register_post_type( // カスタム投稿タイプを定義するための関数
        'about', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => '私たちについて', //ダッシュボードに表示される名前
                'add_new_item' => '私たちについて', // 新規追加画面に表示される名前
                'edit_item' => '商品の編集', // 編集画面に表示される名前
            ),
            'public' => true, // ダッシュボードに表示するか否か
            'hierarchical' => true, // 階層型にするか否か
            'has_archive' => true, // アーカイブ（一覧表示機能）を持つか否か
            'supports' => array( // カスタム投稿ページに表示される項目
                'title', // タイトル　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
                'editor', // 本文　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
                'categorie',
                // 'custom-fields', // カスタムフィールド
                'thumbnail', // アイキャッチ画像　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
            ),
            'menu_position' => 5, // ダッシュボードで投稿の下に表示
            "show_in_rest" => true,
            'rewrite' => array('with_front' => false), // パーマリンクの編集（newsの前の階層URLを消して表示）
        )
    );
    register_taxonomy_for_object_type('category', 'about');  //カスタム投稿にもカテゴリー設定


    register_post_type( // カスタム投稿タイプを定義するための関数
        'interview', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => '先輩インタビュー', //ダッシュボードに表示される名前
                'add_new_item' => '先輩インタビュー', // 新規追加画面に表示される名前
                'edit_item' => '先輩インタビュー', // 編集画面に表示される名前
            ),
            'public' => true, // ダッシュボードに表示するか否か
            'hierarchical' => true, // 階層型にするか否か
            'has_archive' => true, // アーカイブ（一覧表示機能）を持つか否か
            'supports' => array( // カスタム投稿ページに表示される項目
                'title', // タイトル　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
                'editor', // 本文　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
                'categorie',
                //'custom-fields', // カスタムフィールド
                'thumbnail', // アイキャッチ画像　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
            ),
            'menu_position' => 5, // ダッシュボードで投稿の下に表示
            "show_in_rest" => true,//これないとアイキャッチ開いた時ファイル読み込まない
            'rewrite' => array('with_front' => false), // パーマリンクの編集（newsの前の階層URLを消して表示）
        )
    );
    register_taxonomy_for_object_type('category', 'interview');  //カスタム投稿にもカテゴリー設定

   
}


//==========================================
//パンクず
//==========================================
function mytheme_breadcrumb()
{
    if (!is_front_page()) :

        $sep = '>';
        echo '<a href="' . get_bloginfo('url') . '" class > HOME</a>';
        echo $sep;
        if (is_singular()) {
            if (is_attachment()) {
                previous_post_link('<li>%link</li>');
                echo $sep;
            }
            the_title('<li>', '</li>');
        }

    endif;
}

//=========================================
//ページネーション
//=========================================

function pagination($pages = '', $range = 2)
{

    //何ページ表示させるか？
    $showitems = ($range * 2) + 1;
    //現在ページ取得
    global $paged;

    if (empty($paged)) $paged = 1;

    if ($pages == '') {
        global $wp_query;
        //変数$pagesに総ページを代入
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    //総ページが1じゃなければページネーション表示
    if (1 != $pages) {
        echo "<div class=\"pagenation\">\n";
        echo "<ul>\n";
        if ($paged > 1) echo "<li class = \"prev\"><a href = " . get_pagenum_link($paged - 1) . ">前へ</a></li>\n";

        for ($i = 1; $i <= $pages; $i++) {
            if ($pages != 1 && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<li class=\"active\">" . $i . "</li>" : "<li><a href = " . get_pagenum_link($i) . ">" . $i . "</a></li>";
            }
        }
        if ($paged < $pages) echo "<li class = \"next\"><a href = " . get_pagenum_link($paged + 1) . ">次へ</a></li>\n";
        echo "</ul>\n";
        echo "</div>";
    }
}


//============================================================
//メディアライブラリから画像を選択できる処理を実装するところから
//これないとメディアライブラリ使えない

if (!empty($_GET['post']) && !empty($_GET['action'])) {
    return false;
} else {
    wp_enqueue_media();
}
add_filter('media_library_infinite_scrolling', '__return_true');

global $wp_rewrite;
$wp_rewrite->flush_rules();
