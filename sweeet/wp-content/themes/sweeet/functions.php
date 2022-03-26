<?php


function getURL($url)
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





//wordpressのjquery削除
add_filter('wp_default_scripts', 'dequeue_jquery_migrate');
function dequeue_jquery_migrate($scripts)
{
    if (!is_admin()) {
        $scripts->remove('jquery');
    }
}

function getImg($url)
{

    return get_template_directory_uri() . '/img/' . $url;
}



//TOPメニュー
register_nav_menu('top_menu', 'トップメニュー');
register_nav_menu('footermenu', 'フッターメニュー');

//カスタムフィールド使う宣言
add_action('admin_menu', 'my_custom');
//カスタムフィールドの更新を行う宣言
add_action('save_post', 'save_custom');

//ここに使うカスタムフィールドを書いていく。
function my_custom()
{
    add_meta_box('new_flg', '商品設定各種', 'custom_area', 'product', 'normal');
}

//カスタムフィールドの見た目を作っていく
function custom_area()
{

    global $post;
    $check = get_post_meta($post->ID, 'check_flg', true)
?>
    <div class="radio">
        <div>
            <label for="new">人気</label>
            <input type="radio" id="new" name="check_flg" value="1" <?php if($check == 1) echo "checked" ?> >
        </div>
        <div>
            <label for="popu">新作</label>
            <input type="radio" id="popu" name="check_flg" value="2" <?php if($check == 2) echo "checked" ?> >
        </div>
        <div>
            <label for="popu">選択なし</label>
            <input type="radio" id="popu" name="check_flg" value="3" <?php if($check == 3) echo "checked" ?> >
        </div>
    </div>
    <table>
        <tbody>
            <tr>
                <th style="width: 350px;">値段</th>
                <td>
                    <input style="width: 480px;" type="text" name="plice" value="<?php echo get_post_meta($post->ID, 'plice', true); ?>" >
                </td>
            </tr>
            <tr>
                <th style="width: 300px;">商品コメント</th>
                <td>
                    <textarea class="js-count-area" name="menu_text" id="" cols="60" rows="5"><?php echo get_post_meta($post->ID, 'menu_text', true); ?></textarea>
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

    $check_flg= '';
    if (isset($_POST['check_flg'])) {

        $check_flg = $_POST['check_flg'];

        if ($check_flg !== get_post_meta($post_id, 'check_flg', true)) {
            update_post_meta($post_id, 'check_flg', $check_flg);
        } elseif ($check_flg = '') {
            delete_post_meta($post_id, 'check_flg', get_post_meta($post_id, 'check_flg', true));
        }
    }


    $plice = '';
    $menu_text = "";
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
    if (isset($_POST['menu_text'])) {
        $menu_text = $_POST['menu_text'];

        //変更されていたら更新
        if ($menu_text !== get_post_meta($post_id, 'menu_text', true)) {
            update_post_meta($post_id, 'menu_text', $menu_text);
            //何もデータが入っていなければ削除
        } elseif ($menu_text == '') {
            delete_post_meta($post_id, 'menu_text', get_post_meta($post_id, 'menu_text', true));
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
        'product', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => '商品設定', //ダッシュボードに表示される名前
                'add_new_item' => '商品設定', // 新規追加画面に表示される名前
                'edit_item' => '商品設定', // 編集画面に表示される名前
            ),
            'public' => true, // ダッシュボードに表示するか否か
            'hierarchical' => true, // 階層型にするか否か
            'has_archive' => true, // アーカイブ（一覧表示機能）を持つか否か
            'supports' => array( // カスタム投稿ページに表示される項目
                'title', // タイトル　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
                'editor', // 本文　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
                // 'categorie',
                'custom-fields', // カスタムフィールド
                'thumbnail', // アイキャッチ画像　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
            ),
            'menu_position' => 5, // ダッシュボードで投稿の下に表示
            "show_in_rest" => true,
            'rewrite' => array('with_front' => false), // パーマリンクの編集（newsの前の階層URLを消して表示）
            'exclude_from_search' => false, //検索対象に含める場合はfalse
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
        $query->set('post_type', array('post', 'page', 'news', 'worklist', 'information'));
    }
}

function pre_get_posts_custom($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    if ($query->is_category('')) {
        $query->set('posts_per_page', 3);
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





?>