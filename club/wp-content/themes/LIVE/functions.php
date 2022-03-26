<?php


//SVGをアップロード
function add_file_types_to_uploads($file_types){
 
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
 
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


// 「投稿」のアーカイブを有効化
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効に
        $args['has_archive'] = 'archive'; // 任意のURL
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);


function getImg($url)
{

    return get_template_directory_uri() . '/img/' . $url;
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
    add_meta_box('single_id', 'スライド画像設定', 'custom_area', 'topimage', 'normal');
    add_meta_box('backImg_id', '背景画像', 'custom_area2', 'post', 'normal');
    add_meta_box('backImg_id', '背景画像', 'custom_area2', 'schedule', 'normal');
    add_meta_box('backImg_id', '背景画像', 'custom_area2', 'news', 'normal');
    add_meta_box('interview_id', 'スライドショー用情報', 'custom_area3', 'interview', 'normal');
    add_meta_box('interview-detail_id', 'インタビュー詳細', 'custom_area4', 'interview', 'normal');
    add_meta_box('schedule_id', '1日のスケジュール', 'custom_area5', 'interview', 'normal');
}

//カスタムフィールドの見た目を作っていく
function custom_area()
{

    global $post;
    echo 'トップページスライド画像設定:';

    $actorImg = '';
    $actorImg = get_post_meta($post->ID, 'actor-img', true) ?>
    <div class="media-area">
        <input type="text" name="actor-img" value="<?php if (!empty($actorImg)) echo $actorImg; ?>" style="visibility: hidden;"><br>
        <input type="button" name="select" style="width: 150px;" value="画像選択" class="detail-select">
        <input type="button" name="clear-select" style="width: 150px;" value="画像削除" class="detail-delete delete-btn">
        <div id="actor-view" class="custom-preview">
            <img src="<?php echo get_post_meta($post->ID, 'actor-img', true) ?>" alt="" style="width: 100%;">
        </div>
    </div>


<?php
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
    <div id="back-view" style="width: 350px;">
        <img src="<?php echo get_post_meta($post->ID, 'back-img', true) ?>" alt="" style="width: 350px;">
    </div>

<?php
}
//=====================================================================
//カスタムフィールドが更新された時の処理

function save_custom($post_id)
{

    //=============================================================================
    //キャストイメージ
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
    $back_img = '';
    if (isset($_POST['back-img'])) {

        $back_img = $_POST['back-img'];

        if ($back_img !== get_post_meta($post_id, 'back-img', true)) {
            update_post_meta($post_id, 'back-img', $back_img);
        } elseif ($back_img = '') {
            delete_post_meta($post_id, 'back-img', get_post_meta($post_id, 'back-img', true));
        }
    }
    
    $info_comment = '';
    if (isset($_POST['info-comment'])) {

        $info_comment = $_POST['info-comment'];

        if ($info_comment !== get_post_meta($post_id, 'info-comment', true)) {
            update_post_meta($post_id, 'info-comment', $info_comment);
        } elseif ($info_comment = '') {
            delete_post_meta($post_id, 'info-comment', get_post_meta($post_id, 'info-comment', true));
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
        'topimage', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => 'イベント設定', //ダッシュボードに表示される名前
                'add_new_item' => 'イベント設定', // 新規追加画面に表示される名前
                'edit_item' => 'イベントの編集', // 編集画面に表示される名前
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
            'exclude_from_search' => false, //検索対象に含める場合はfalse
        )
    );
    // register_taxonomy_for_object_type('category', 'topimage');  //カスタム投稿にもカテゴリー設定


    register_post_type( // カスタム投稿タイプを定義するための関数
        'schedule', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => 'スケジュール', //ダッシュボードに表示される名前
                'add_new_item' => 'スケジュール', // 新規追加画面に表示される名前
                'edit_item' => 'schedule', // 編集画面に表示される名前
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
            "show_in_rest" => true,
            'rewrite' => array('with_front' => false), // パーマリンクの編集（newsの前の階層URLを消して表示）
            'exclude_from_search' => false, //検索対象に含める場合はfalse
        )
    );
    // register_taxonomy_for_object_type('category', 'schedule');  //カスタム投稿にもカテゴリー設定
    register_taxonomy(
        'schedule-cat',
        array('schedule'),
        array(
            'hierarchical' => true,
            'update_count_callback' => '_update_post_term_count',
            'label' => 'スケジュールカテゴリー',
            'singular_label' => 'カテゴリー',
            'public' => true,
            'show_ui' => true,
            "show_in_rest" => true,
        )
    );

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

//検索結果ページの表示の定型
function wp_search_title($search_title)
{
    if (is_search()) {
        $search_title = '「' . get_search_query() . '」の検索結果';
    }
    return $search_title;
}
add_filter('wp_title', 'wp_search_title');

//検索対象を指定
function my_pre_get_posts($query)
{
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        $query->set('post_type', array('post', 'page', 'blog', 'schedule', 'topimage'));
    }
}
add_action('pre_get_posts', 'my_pre_get_posts');
function wps_highlight_results($text)
{
    if (is_search()) {
        $sr = get_query_var('s');
        $keys = explode(" ", $sr);
        $text = preg_replace('/(' . implode('|', $keys) . ')/iu', '<span class="searchresult-highlight">' . $sr . '</span>', $text);
    }
    return $text;
}
add_filter('the_title', 'wps_highlight_results');
add_filter('the_content', 'wps_highlight_results');

//=======================================================
//人気記事実装
//=======================================================
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0 View';
    }
    return $count + 1 . ' Views';
}

function setPostViews($postID)
{   
    
    $count_key = 'post_views_count';
    get_post_meta($postID, $count_key, true);
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
    // デバッグ start
    //   echo '';
    //   echo 'console.log("postID: ' . $postID .'");';
    //   echo 'console.log("カウント: ' . $count .'");';
    //   echo '';
    // デバッグ end
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function is_bot()
{

    $ua = $_SERVER['HTTP_USER_AGENT'];

    $bot = array(

        'Googlebot',

        'Yahoo! Slurp',

        'Mediapartners-Google',

        'msnbot',

        'bingbot',

        'MJ12bot',

        'Ezooms',

        'pirst; MSIE 8.0;',

        'Google Web Preview',

        'ia_archiver',

        'Sogou web spider',

        'Googlebot-Mobile',

        'AhrefsBot',

        'YandexBot',

        'Purebot',

        'Baiduspider',

        'UnwindFetchor',

        'TweetmemeBot',

        'MetaURI',

        'PaperLiBot',

        'Showyoubot',

        'JS-Kit',

        'PostRank',

        'Crowsnest',

        'PycURL',

        'bitlybot',

        'Hatena',

        'facebookexternalhit',

        'NINJA bot',

        'YahooCacheSystem',

        'NHN Corp.',

        'Steeler',

        'DoCoMo',

    );

    foreach ($bot as $bot) {

        if (stripos($ua, $bot) !== false) {

            return true;
        }
    }

    return false;
}



/* --------------------------
  the_archive_title 余計な文字を削除
 ------------------------- */

 function my_theme_archive_title( $title ) {
    if ( is_post_type_archive() && !is_date() ) {
  
      $title = post_type_archive_title( '', false );
  
    } elseif ( is_date() ) {
  
      $date  = single_month_title('',false);
      $point = strpos($date,'月');
      $title = mb_substr($date,$point+1).'年'.mb_substr($date,0,$point+1);
  
    }
  
    return $title;
  }