<?php


function getURL($url)
{

    return get_template_directory_uri() . '/' . $url;
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
    add_meta_box('single_id', '商品設定', 'custom_area', 'product', 'normal');
    add_meta_box('backImg_id', 'インフォパネル設定', 'custom_area2', 'information', 'normal');
    add_meta_box('about_id', '経歴', 'custom_area3', 'about', 'normal');
    add_meta_box('backImg_id', '背景画像', 'custom_area2', 'news', 'normal');
    add_meta_box('interview_id', 'スライドショー用情報', 'custom_area3', 'interview', 'normal');
 
}

//カスタムフィールドの見た目を作っていく
function custom_area()
{

    global $post;
    echo '商品設定:';


?>
    <?php for ($i = 1; $i <= 5; $i++) : ?>
        <?php $Image[$i] = get_post_meta($post->ID, 'back-img' . $i, true) ?>
        <input type="text" name="back-img<?php echo $i ?>" value="<?php if (!empty($Image[$i])) echo $Image[$i]; ?>" style="visibility: hidden;"><br>
        <input type="button" name="select<?php echo $i ?>" style="width: 150px;" value="画像選択" class="detail-select">
        <input type="button" name="clear-select<?php echo $i ?>" style="width: 150px;" value="画像削除" class="detail-delete> delete-btn">
        <div id="product-view<?php echo $i ?>" class="produvt_preview" style="width: 350px;">
            <img src="<?php echo get_post_meta($post->ID, 'back-img' . $i, true) ?>" alt="" style="width: 250px;">
        </div>
    <?php endfor; ?>

    <table style="width: 80%;">
        <tbody>
            <?php for ($i = 1; $i <= 6; $i++) : ?>
                <tr style="margin-bottom: 24px; display: inline-block;">
                    <th> <input type="text" name="title<?php echo $i; ?>" value="<?php echo get_post_meta($post->ID, 'title' . $i, true) ?>" placeholder ="素材やsize等">
                </th>
                    <td>
                        <input type="text" name="material<?php echo $i; ?>" value="<?php echo get_post_meta($post->ID, 'material' . $i, true) ?>">
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <table>
        <tbody>
        <?php for ($i = 1; $i <= 3; $i++) : ?>
            <tr style="margin-bottom: 24px; display:inline-block;">
                <th>ECサイトURL</th>
                <td><input type="text" name="site_name<?php echo $i; ?>" value="<?php echo get_post_meta($post->ID,'site_name'.$i,true); ?>" placeholder="サイト名"></td>
                <td><input type="text" name="site_url<?php echo $i; ?>" value="<?php echo get_post_meta($post->ID,'site_url'.$i,true); ?>" style="width: 300px;" placeholder="URL"></td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>

<?php
}


//=====================================================================




//カスタムフィールドが更新された時の処理

function save_custom($post_id)
{

    $image = [];
    for ($i = 1; $i <= 5; $i++) :
        if (isset($_POST['back-img' . $i])) {

            $image[$i] = $_POST['back-img' . $i];

            if ($image[$i] !== get_post_meta($post_id, 'back-img' . $i, true)) {
                update_post_meta($post_id, 'back-img' . $i, $image[$i]);
            } elseif ($image[$i] = '') {
                delete_post_meta($post_id, 'back-img' . $i, get_post_meta($post_id, 'back-img' . $i, true));
            }
        }

    endfor;

    $material = [];
    for ($i = 1; $i <= 10; $i++) :
        if (isset($_POST['material' . $i])) {

            $material[$i] = $_POST['material' . $i];

            if ($material[$i] !== get_post_meta($post_id, 'material' . $i, true)) {
                update_post_meta($post_id, 'material' . $i, $material[$i]);
            } elseif ($material[$i] = '') {
                delete_post_meta($post_id, 'material' . $i, get_post_meta($post_id, 'material' . $i, true));
            }
        }

    endfor;
    $title = [];
    for ($i = 1; $i <= 10; $i++) :
        if (isset($_POST['title' . $i])) {

            $title[$i] = $_POST['title' . $i];

            if ($title[$i] !== get_post_meta($post_id, 'title' . $i, true)) {
                update_post_meta($post_id, 'title' . $i, $title[$i]);
            } elseif ($title[$i] = '') {
                delete_post_meta($post_id, 'title' . $i, get_post_meta($post_id, 'title' . $i, true));
            }
        }

    endfor;
    $site_name = [];
    $site_url = [];
    for ($i = 1; $i <= 3; $i++) :
        if (isset($_POST['site_name' . $i]) && isset($_POST['site_url'.$i])) {

            $site_name[$i] = $_POST['site_name' . $i];
            $site_url[$i] = $_POST['site_url' . $i];

            if ($site_name[$i] !== get_post_meta($post_id, 'site_name' . $i, true)) {
                update_post_meta($post_id, 'site_name' . $i, $site_name[$i]);
            } elseif ($site_name[$i] = '') {
                delete_post_meta($post_id, 'site_name' . $i, get_post_meta($post_id, 'site_name' . $i, true));
            }

            if ($site_url[$i] !== get_post_meta($post_id, 'site_url' . $i, true)) {
                update_post_meta($post_id, 'site_url' . $i, $site_url[$i]);
            } elseif ($site_url[$i] = '') {
                delete_post_meta($post_id, 'site_url' . $i, get_post_meta($post_id, 'site_url' . $i, true));
            }
        }

    endfor;


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
        'product', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => '商品登録', //ダッシュボードに表示される名前
                'add_new_item' => '商品登録', // 新規追加画面に表示される名前
                'edit_item' => '商品登録', // 編集画面に表示される名前
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
            'exclude_from_search' => true, //検索対象に含める場合はfalse
        )
    );
    register_taxonomy(
        'product-cat',
        array('product'),
        array(
            'hierarchical' => true,
            'update_count_callback' => '_update_post_term_count',
            'label' => '商品カテゴリー',
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
function mytheme_breadcrumb() {
	//HOME>と表示
	$sep = '>';
	echo '<li><a href="'.get_bloginfo('url').'" >HOME</a></li>';
	echo $sep;
 
	//投稿記事ページとカテゴリーページでの、カテゴリーの階層を表示
	$cats = '';
	$cat_id = '';
	if ( is_single() ) {
		$cats = get_the_category();
		if( isset($cats[0]->term_id) ) $cat_id = $cats[0]->term_id;
	}
	else if ( is_category() ) {
		$cats = get_queried_object();
		$cat_id = $cats->parent;
	}
	$cat_list = array();
	while ($cat_id != 0){
		$cat = get_category( $cat_id );
		$cat_link = get_category_link( $cat_id );
		array_unshift( $cat_list, '<a href="'.$cat_link.'">'.$cat->name.'</a>' );
		$cat_id = $cat->parent;
	}
	foreach($cat_list as $value){
		echo '<li>'.$value.'</li>';
		echo $sep;
	}
 
	//現在のページ名を表示
	if ( is_singular() ) {
		if ( is_attachment() ) {
			previous_post_link( '<li>%link</li>' );
			echo $sep;
		}
		the_title( '<li>', '</li>' );
	}
	else if( is_archive() ) the_archive_title( '<li>', '</li>' );
	else if( is_search() ) echo '<li>検索 : '.get_search_query().'</li>';
	else if( is_404() ) echo '<li>ページが見つかりません</li>';
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
function the_pagination()
{
    global $wp_query;
    if ($wp_query->max_num_pages <= 1)
        return;
    echo paginate_links(array(
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '前へ',
        'next_text' => '次へ',
        'type' => 'list',
        'end_size' => 3,
        'mid_size' => 1
    ));
}


function my_paginate()
{
    global $wp_query, $paged;
    $p_base = get_pagenum_link(1);
    $p_format = 'page/%#%';
    if ($word = strpos($p_base, '?')) {
        $p_base = get_option('home') . (substr(get_option('home'), -1, 1) === '/' ? '' : '/')
            . '%_%' . substr($p_base, $word);
    } else {
        $p_base .= (substr($p_base, -1, 1) === '/' ? '' : '/') . '%_%';
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
function change_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    /* 「member」「info」のカテゴリーページで表示件数を6件にする */
    if ($query->is_category(array('member', 'info'))) {
        $query->set('posts_per_page', '4');
        return;
    }
}
add_action('pre_get_posts', 'change_posts_per_page');

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

function pre_get_posts_custom($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    //カテゴリーのみ何件表示させるか
    if ($query->is_category('')) {
        $query->set('posts_per_page', 10);
    }
}
add_action('pre_get_posts', 'pre_get_posts_custom');

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
// add_filter('the_title', 'wps_highlight_results');
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
  
  add_filter( 'get_the_archive_title', 'my_theme_archive_title' );



?>