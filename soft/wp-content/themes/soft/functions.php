<?php

function getURL($url)
{

  return get_template_directory_uri() . '/demo/' . $url;
}

function getImg($url)
{

    return get_template_directory_uri() . '/img/' . $url;
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

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
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
    add_meta_box('plice_id', '金額入力欄', 'custom_area', 'product', 'normal');
    // add_meta_box('title_id', '商品説明タイトル', 'custom_area2', array('product'), 'normal');
    // add_meta_box('subtitle_id', '商品説明サブタイトル', 'custom_area3', 'product', 'normal');
    // add_meta_box('sdetail_id', '商品説明内容', 'custom_area4', 'product', 'normal');
    // add_meta_box('how_id', '使用方法', 'custom_area5', 'page','use');
    
}

//カスタムフィールドの見た目を作っていく
function custom_area()
{

    global $post;
    echo '金額:      <input type="text"  name= "plice" value= ' . get_post_meta($post->ID, 'plice', true) . '><br>';
}

function custom_area4()
{

    global $post;
    for ($i = 1; $i <= 5; $i++) {
        echo '<div class = detail-area detail-area' . $i . '>';
        echo '<p>説明タイトル' . $i . ':</p>    <input type="text" class="detail-title" name= "detail-title' . $i . '" value= ' . get_post_meta($post->ID, 'detail-title' . $i . '', true) . '><br>';
        echo '<p>説明コメント' . $i . ':</p>    <textarea name="detail-text' . $i . '" id="" cols="50" rows="10">' . get_post_meta($post->ID, 'detail-text' . $i . '', true) . '</textarea>';
?>

        <p>画像<?php echo $i ?></p>
        <?php $detailImg = get_post_meta($post->ID, 'detail-img' . $i, true) ?>
        <input type="text" name="detail-img<?php echo $i; ?>" value="<?php if (!empty($detailImg)) echo $detailImg; ?>" style="visibility: hidden;"><br>

        <input type="button" name="detail<?php echo $i; ?>" style="width: 150px;" value="画像選択" class="detail-select">
        <input type="button" name="clear-detail<?php echo $i; ?>" style="width: 150px;" value="画像削除" class="detail-delete<?php echo $i; ?> delete-btn">
        <div id="detail-view<?php echo $i; ?>" style="width: 350px;">
            <img src="<?php echo get_post_meta($post->ID, 'detail-img' . $i, true) ?>" alt="" style="width: 350px;">
        </div>


<?php
        echo '</div>';
    }
}


//カスタムフィールドが更新された時の処理

function save_custom($post_id)
{

    $plice = '';
    //カスタムフィールド内にポストされたら・・・
    if (isset($_POST['plice'])) {
        $plice = $_POST['plice'];

        //変更されていたら更新
        if ($plice !== get_post_meta($post_id, 'plice', true)) {
            update_post_meta($post_id, 'plice', $plice);
            //何もデータが入っていなければ削除
        } elseif ($plice == '') {
            delete_post_meta($post_id, 'plice', get_post_meta($post_id, 'plice', true));
        }
    }

    
}
?>
<?php

//======================================================================================
//FEATUREウィジェット
//======================================================================================
add_action('widgets_init', 'merit_area');

add_action('widgets_init', function () {
    register_widget('my_widget_item1');
});

//ウィジェットをドラッグで持ってくるスペース確保
function merit_area()
{
    register_sidebar(array(
        'name' => 'アピールエリア',
        'id' => 'merit_widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
    ));
}

//実際に入力するスペース
class my_widget_item1 extends WP_Widget
{

    function __construct()
    {
        parent::__construct(false, $name = 'アピールウィジェット');
    }

    function form($instance)
    {

        //サニタイズっぽいこと
        $title = esc_attr($instance['title']);
        $text = esc_attr($instance['text']);


        $title_id =  $this->get_field_id('title');
        $text_id =  $this->get_field_id('text');

        $title_name =  $this->get_field_name('title');
        $text_name =  $this->get_field_name('text');

?>
        <p>
            <label for="<?php echo  $title_id; ?>">
                <?php echo 'タイトル';  ?>
            </label>
            <input type="text" id="<?php echo $title_id; ?>" name="<?php echo $title_name;  ?>" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo $text_id;  ?>">
                <?php echo 'テキスト';  ?>
            </label>
            <textarea name="<?php echo $text_name ?>" id="<?php echo $text_id ?>" cols="50" rows="15"><?php echo $text; ?></textarea>
        </p>
        <?php
    }

    //入力した内容を更新する。
    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] = trim($new_instance['text']);

        return $instance;
    }

    //実際にどのようにhtml画面に表させるかる処理
    function widget($args, $instance)
    {

        extract($args);

        $title = $instance['title'];
        $text = $instance['text'];

        if ($title) { ?>
            <div class="feature-merit__inner">
                <h1 class="js-merit__title"><?php echo $title; ?></h1>
                <p><?php echo $text; ?></p>
            </div>
        <?php
        }
    }
}
//======================================================================================
//OPTIONウィジェット
//======================================================================================
add_action('widgets_init', 'option_area');

add_action('widgets_init', function () {
    register_widget('my_widget_item2');
});

//ウィジェットをドラッグで持ってくるスペース確保
function option_area()
{
    register_sidebar(array(
        'name' => '施術の流れエリア',
        'id' => 'option_widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
    ));
}

//実際に入力するスペース
class my_widget_item2 extends WP_Widget
{

    function __construct()
    {
        parent::__construct(false, $name = '施術流れウィジェット');
    }

    function form($instance)
    {

        //サニタイズっぽいこと
        $title = esc_attr($instance['title']);
        $subtitle = esc_attr($instance['sub-title']);
        $text = esc_attr($instance['text']);


        $title_id =  $this->get_field_id('title');
        $subtitle_id =  $this->get_field_id('sub-title');
        $text_id =  $this->get_field_id('text');

        $title_name =  $this->get_field_name('title');
        $subtitle_name =  $this->get_field_name('sub-title');
        $text_name =  $this->get_field_name('text');

        ?>
        <p>
            <label for="<?php echo  $title_id; ?>">
                <?php echo 'タイトル';  ?>
            </label>
            <input type="text" id="<?php echo $title_id; ?>" name="<?php echo $title_name;  ?>" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo  $title_id; ?>">
                <?php echo 'サブタイトル';  ?>
            </label>
            <input type="text" id="<?php echo $subtitle_id; ?>" name="<?php echo $subtitle_name;  ?>" value="<?php echo $subtitle; ?>">
        </p>
        <p>
            <label for="<?php echo $text_id;  ?>">
                <?php echo 'テキスト';  ?>
            </label>
            <textarea name="<?php echo $text_name ?>" id="<?php echo $text_id ?>" cols="50" rows="15"><?php echo $text; ?></textarea>
        </p>
        <?php
    }

    //入力した内容を更新する。
    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['sub-title'] = strip_tags($new_instance['sub-title']);
        $instance['text'] = trim($new_instance['text']);

        return $instance;
    }

    //実際にどのようにhtml画面に表させるかる処理
    function widget($args, $instance)
    {

        extract($args);

        $title = $instance['title'];
        $subtitle = $instance['sub-title'];
        $text = $instance['text'];

        if ($title) { ?>
            <div class="option-box">
                <h1 class="option-box__title"><?php echo $title; ?></h1>
                <h2 class="option-box__subtitle"><?php echo $subtitle; ?></h2>
                <p class="option-box__txt"><?php echo $text; ?></p>
                <?php if (is_single()) : ?>
                    <div class="bottom-btn">
                        <a href="https://chakiryo.gumroad.com/l/sTVuX" target="_blank" rel="noopener noreferrer" class="option-btn noclick"><span>購入する</span></a>
                    </div>
                    <div class="bottom-kiyakuarea">
                        <p class="bottom-kiyaku">オプションご希望の方はご購入の前に<a href="">お問い合わせフォーム</a> からお問い合わせ下さい。</p>
                        <input type="checkbox" class="check" name="check-option">
                    </div>
                <?php endif; ?>
            </div>
<?php
        }
    }
}



//=====================================================================
//カスタムタクソノミー
//=====================================================================
//カスタム投稿タイプ
function twpp_setup_theme() {
    add_theme_support( 'post-thumbnails' );
  }
  add_action( 'after_setup_theme', 'twpp_setup_theme' );

add_action('init', 'register_post_type_and_taxonomy'); //最初にregister_post_type_and_taxonomy関数を実行
function register_post_type_and_taxonomy()
{
    register_post_type( // カスタム投稿タイプを定義するための関数
        'product', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => '商品(コース)追加', //ダッシュボードに表示される名前
                'add_new_item' => '商品を新規追加', // 新規追加画面に表示される名前
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
            'exclude_from_search' => true, //検索対象に含める場合はfalse
        )
    );
    // register_taxonomy_for_object_type('category', 'product');  //カスタム投稿にもカテゴリー設定
    

    
  
    // register_taxonomy_for_object_type('category', 'howto');  //カスタム投稿にもカテゴリー設定


    register_post_type( // カスタム投稿タイプを定義するための関数
        'voice', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => 'お客様の声', //ダッシュボードに表示される名前
                'add_new_item' => 'お客様の声', // 新規追加画面に表示される名前
                'edit_item' => 'お客様の声', // 編集画面に表示される名前
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
            // 'exclude_from_search' => true, //検索対象に含める場合はfalse
        )
    );
    // register_taxonomy_for_object_type('category', 'product');  //カスタム投稿にもカテゴリー設定
    register_taxonomy(
        'voice-cat',
        array('voice'),
        array(
            'hierarchical' => true,
            'update_count_callback' => '_update_post_term_count',
            'label' => 'お声カテゴリー',
            'singular_label' => 'カテゴリー',
            'public' => true,
            'show_ui' => true,
            "show_in_rest" => true,
        )
    );
    
    
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
   
    if ( $query->is_tax('voice-cat')) {
        $query->set( 'posts_per_page', '8' );
        return;
    }
   }
   add_action( 'pre_get_posts', 'change_posts_per_page' );



//============================================================
//メディアライブラリから画像を選択できる処理を実装するところから
//これないとメディアライブラリ使えない

if(!empty($_GET['post']) && !empty($_GET['action'])){
    return false;
}else{
    wp_enqueue_media();

}
add_filter( 'media_library_infinite_scrolling', '__return_true' );

global $wp_rewrite;
$wp_rewrite->flush_rules();


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
        $query->set('post_type', array('post'));
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

