<?php


function getURL($url)
{

  return get_template_directory_uri().'/' . $url;
}
//SVGをアップロード
function add_file_types_to_uploads($file_types)
{

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);

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


// function js_init()
// {
//     // 参照url::https://www.tailtension.com/wordpress/1743/

//     wp_register_script('function-js', get_template_directory_uri() . '/js/custom.js');
//     wp_enqueue_script('function-js');
// }
// add_action('admin_init', 'js_init');


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
    add_meta_box('single_id', 'ホバー時設定', 'custom_area', 'worklist', 'normal');
    add_meta_box('backImg_id', 'インフォコメント設定', 'custom_area2', 'information', 'normal');
    add_meta_box('about_id', '経歴', 'custom_area3', 'about', 'normal');
    add_meta_box('backImg_id', '背景画像', 'custom_area2', 'news', 'normal');
    add_meta_box('interview_id', 'スライドショー用情報', 'custom_area3', 'interview', 'normal');
    add_meta_box('interview-detail_id', 'インタビュー詳細', 'custom_area4', 'interview', 'normal');
    add_meta_box('schedule_id', '1日のスケジュール', 'custom_area5', 'interview', 'normal');
}

//カスタムフィールドの見た目を作っていく
function custom_area()
{

    global $post;
    echo 'ホバー時設定:';

    $work_list = '';
?>
    <p>タイトル</p>
    <input type="text" name="worklist" value="<?php echo get_post_meta($post->ID, 'worklist', true); ?>">
    <p>コメント(40字程度)</p>
    <textarea name="work-comment" id="" cols="30" rows="10"><?php echo get_post_meta($post->ID, 'work-comment', true); ?></textarea>
    

<?php
}


function custom_area2()
{

    global $post;
    echo 'コメント';

    $info_comment = '';
?>
   
 
     <table>
        <tbody>
          
            <tr>
                <th style="width: 300px;">一言コメント(50字程度)</th>
                <td>
                    <textarea class="js-count-area" name="info-comment" id="" cols="60" rows="5"><?php echo get_post_meta($post->ID, 'info-comment', true); ?></textarea>
                    <p><span class="js-count"></span>/50</p>
                    <p class="over-text">文字数オーバーです。</p>
                </td>
            </tr>

        </tbody>
    </table>
    

<?php
}


//=====================================================================




//カスタムフィールドが更新された時の処理

function save_custom($post_id)
{

    //=============================================================================
    //先輩インタビュー表示
    //=============================================================================

    $work_list = '';
    if (isset($_POST['worklist'])) {

        $work_list = $_POST['worklist'];

        if ($work_list !== get_post_meta($post_id, 'worklist', true)) {
            update_post_meta($post_id, 'worklist', $work_list);
        } elseif ($work_list = '') {
            delete_post_meta($post_id, 'worklist', get_post_meta($post_id, 'worklist', true));
        }
    }
    $work_comment = '';
    if (isset($_POST['work-comment'])) {

        $work_comment = $_POST['work-comment'];

        if ($work_comment !== get_post_meta($post_id, 'work-comment', true)) {
            update_post_meta($post_id, 'work-comment', $work_comment);
        } elseif ($work_comment = '') {
            delete_post_meta($post_id, 'work-comment', get_post_meta($post_id, 'work-comment', true));
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
?>
<?php




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
        'worklist', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => '制作実績', //ダッシュボードに表示される名前
                'add_new_item' => '制作実績', // 新規追加画面に表示される名前
                'edit_item' => '制作実績', // 編集画面に表示される名前
            ),
            'public' => true, // ダッシュボードに表示するか否か
            'hierarchical' => true, // 階層型にするか否か
            'has_archive' => true, // アーカイブ（一覧表示機能）を持つか否か
            'supports' => array( // カスタム投稿ページに表示される項目
                'title', // タイトル　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
                'editor', // 本文　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
                'categorie',
                'custom-fields', // カスタムフィールド
                'thumbnail', // アイキャッチ画像　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
            ),
            'menu_position' => 5, // ダッシュボードで投稿の下に表示
            "show_in_rest" => true,
            'rewrite' => array('with_front' => false), // パーマリンクの編集（newsの前の階層URLを消して表示）
            'exclude_from_search' => false, //検索対象に含める場合はfalse
        )
    );
    register_taxonomy(
        'work-cat',
        array('worklist'),
        array(
            'hierarchical' => true,
            'update_count_callback' => '_update_post_term_count',
            'label' => '制作実績カテゴリー',
            'singular_label' => 'カテゴリー',
            'public' => true,
            'show_ui' => true,
            "show_in_rest" => true,
        )
    );
    // register_taxonomy_for_object_type('category', 'worklist');  //カスタム投稿にもカテゴリー設定


    register_post_type( // カスタム投稿タイプを定義するための関数
        'information', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => 'インフォ', //ダッシュボードに表示される名前
                'add_new_item' => 'インフォ', // 新規追加画面に表示される名前
                'edit_item' => 'information', // 編集画面に表示される名前
            ),
            'public' => true, // ダッシュボードに表示するか否か
            'hierarchical' => true, // 階層型にするか否か
            'has_archive' => true, // アーカイブ（一覧表示機能）を持つか否か
            'supports' => array( // カスタム投稿ページに表示される項目
                'title', // タイトル　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
                'editor', // 本文　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
                'categorie',
                'taxonomy',
                //'custom-fields', // カスタムフィールド
                'thumbnail', // アイキャッチ画像　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
            ),
            'menu_position' => 5, // ダッシュボードで投稿の下に表示
            "show_in_rest" => true,
            'rewrite' => array('with_front' => true), // パーマリンクの編集（newsの前の階層URLを消して表示）
            // 'exclude_from_search' => false, //検索対象に含める場合はfalse
        )
    );
    // register_taxonomy_for_object_type('category', 'information');  //カスタム投稿にもカテゴリー設定
    register_taxonomy(
        'info-cat',
        array('information'),
        array(
            'hierarchical' => true,
            'update_count_callback' => '_update_post_term_count',
            'label' => 'INFORMATIONカテゴリー',
            'singular_label' => 'カテゴリー',
            'public' => true,
            'show_ui' => true,
            "show_in_rest" => true,
        )
    );

    register_post_type( // カスタム投稿タイプを定義するための関数
        'voice', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => 'VOICE', //ダッシュボードに表示される名前
                'add_new_item' => 'voice', // 新規追加画面に表示される名前
                'edit_item' => 'voice', // 編集画面に表示される名前
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
            'menu_position' => 6, // ダッシュボードで投稿の下に表示
            "show_in_rest" => true, //これないとアイキャッチ開いた時ファイル読み込まない
            'rewrite' => array('with_front' => true), // パーマリンクの編集（newsの前の階層URLを消して表示）
            'exclude_from_search' => true, //検索対象に含める場合はfalse
        )
    );
    // register_taxonomy_for_object_type('category', 'voice');  //カスタム投稿にもカテゴリー設定

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
function the_pagination() {
    global $wp_query;
    if ( $wp_query->max_num_pages <= 1 )
    return;
    echo paginate_links( array(
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
    'prev_text' => '前へ',
    'next_text' => '次へ',
    'type' => 'list',
    'end_size' => 3,
    'mid_size' => 1
    ) );
    }

    
    function my_paginate(){
        global $wp_query, $paged;
        $p_base = get_pagenum_link(1);
        $p_format = 'page/%#%';
        if($word = strpos($p_base, '?')){
            $p_base = get_option( 'home' ).(substr(get_option( 'home' ), -1 ,1) === '/' ? '' : '/')
                .'%_%'.substr($p_base, $word);
        } else{
            $p_base .= (substr($p_base, -1 ,1) === '/' ? '' : '/') .'%_%';
        }
         echo paginate_links(array(
            'base' => $p_base,
            'format' => $p_format,
            'total' => $wp_query->max_num_pages,
            'current' => ($paged ? $paged : 1),
            'end_size' => 1,
            'mid_size' => 2,
        ));
    }
    function change_posts_per_page($query) {
     if( is_admin() || ! $query->is_main_query() ){
         return;
     }
     /* 「member」「info」のカテゴリーページで表示件数を6件にする */
     if ( $query->is_tax( array('work-cat','info-cat') )) {
         $query->set( 'posts_per_page', '6' );
         return;
     }
    }
    add_action( 'pre_get_posts', 'change_posts_per_page' );

//============================================================
//メディアライブラリから画像を選択できる処理を実装するところから

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
        $query->set('post_type', array('post', 'page', 'news', 'worklist', 'information'));
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





add_action('widgets_init', 'about_area');

add_action('widgets_init', function () {
    register_widget('my_widget_item2');
});

//ウィジェットをドラッグで持ってくるスペース確保
function about_area()
{
    register_sidebar(array(
        'name' => 'ABOUTエリア',
        'id' => 'about_widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
    ));
}

//実際に入力するスペース
class my_widget_item2 extends WP_Widget
{

    function __construct()
    {
        parent::__construct(false, $name = 'Aboutウィジェット');
    }

    function form($instance)
    {

        //サニタイズっぽいこと
        $title = esc_attr($instance['title']);
        $title_id =  $this->get_field_id('title');
        $title_name =  $this->get_field_name('title');
        for ($i = 1; $i <= 10; $i++) {

            $history[$i] = esc_attr($instance['history' . $i]);
            $content[$i] = esc_attr($instance['content' . $i]);

            $history_id[$i] =  $this->get_field_id('history' . $i);
            $content_id[$i] =  $this->get_field_id('content' . $i);


            $history_name[$i] =  $this->get_field_name('history' . $i);
            $content_name[$i] =  $this->get_field_name('content' . $i);
        }

?>

        <div>
            <label for="<?php echo $title_id;  ?>">
                <?php echo '見出し';  ?>
            </label>
            <input type="text" id="<?php echo $title_id; ?>" name="<?php echo $title_name; ?>" value="<?php echo $title; ?>" style="width: 150px;">
        </div>
        <?php for ($i = 1; $i <= 10; $i++) : ?>
            <div style="margin-top: 10px;">

                <div style="float: left;">
                    <p>年</p>
                    <input type="text" name="<?php echo $history_name[$i]  ?>" style="width: 150px;" id="<?php echo $history_id[$i] ?>" value="<?php echo $history[$i]; ?>">
                </div>
    
                <div style="text-align: center">
    
                    <label for="<?php echo $content_id[$i];  ?>" style="display: block;">
                        <?php echo 'テキスト';  ?>
                    </label>
                    <textarea name="<?php echo $content_name[$i]; ?>" id="<?php echo $content_id[$i]; ?>" cols="40" rows="0"><?php echo $content[$i]; ?></textarea>
                </div>
            </div>

        <?php
        endfor;
    }

    //入力した内容を更新する。
    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        for ($i = 1; $i <= 10; $i++) {

            $instance['history' . $i] = strip_tags($new_instance['history' . $i]);
            $instance['content' . $i] = trim($new_instance['content' . $i]);
        }

        return $instance;
    }

    //実際にどのようにhtml画面に表させるかる処理
    function widget($args, $instance)
    {

        extract($args);
        $title = $instance['title'];
        for ($i = 1; $i <= 10; $i++) {
            $history[$i] = $instance['history' . $i];
            $content[$i] = $instance['content' . $i];
        }
        if ($title) { ?>

            <h3><?php echo $title; ?></h3>
            <div class="history-content" style="margin-bottom: 42px;">
                <?php
                for ($i = 1; $i <= 10; $i++) { ?>
                    <div style="float:left"><?php echo $history[$i] ?></div>
                    <div class="history-text" style="margin-left: 5em;"><?php echo nl2br($content[$i]); ?></div>
                <?php   } ?>
            </div>
<?php
        }
    }
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
  
  add_filter( 'get_the_archive_title', 'my_theme_archive_title' );




?>