<?php

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


//カスタムフィールド使う宣言
add_action('admin_menu', 'my_custom');
//カスタムフィールドの更新を行う宣言
add_action('save_post', 'save_custom');

//ここに使うカスタムフィールドを書いていく。
function my_custom()
{
    add_meta_box('single_id', 'MENU設定', 'custom_area', 'menu', 'normal');
    add_meta_box('staff_id', '写真位置(スタッフ詳細ページの画像をどちらに寄せるか設定できます。)', 'custom_area2', 'staff', 'normal');
    add_meta_box('job_id', '採用ページ編集', 'custom_area3', 'page', 'normal');
    add_meta_box('job_id', '一言コメント', 'custom_area4', 'staff', 'normal');
}

//カスタムフィールドの見た目を作っていく
function custom_area()
{

    global $post;
?>
    <table>
        <tbody>
            <tr>
                <th style="width: 350px;">リンク先(HOTPEPPER BEAUTY等)</th>
                <td>
                    <input style="width: 480px;" type="text" name="hotpepper" value="<?php echo get_post_meta($post->ID, 'hotpepper', true); ?>" >
                </td>
            </tr>
            <tr>
                <th style="width: 300px;">ホバー時コメント(50字程度)</th>
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
function custom_area2()
{

    global $post;
?>
    <table>
        <tbody>
            <tr>
                <th>
                    <label for="top">上</label>
                </th>
                <td>
                    <input type="radio" name="position" id="top" value="1" <?php if (get_post_meta($post->ID, 'position', true) == 1) echo 'checked' ?>>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="bottom">下</label>
                </th>
                <td>
                    <input type="radio" name="position" id="bottom" value="2" <?php if (get_post_meta($post->ID, 'position', true) == 2) echo 'checked' ?>>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="left">左</label>
                </th>
                <td>
                    <input type="radio" name="position" id="left" value="3" <?php if (get_post_meta($post->ID, 'position', true) == 3) echo 'checked' ?>>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="right">右</label>
                </th>
                <td>
                    <input type="radio" name="position" id="right" value="4" <?php if (get_post_meta($post->ID, 'position', true) == 4) echo 'checked' ?>>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="right">中央(デフォルト)</label>
                </th>
                <td>
                    <input type="radio" name="position" id="right" value="5" <?php if (get_post_meta($post->ID, 'position', true) == 5) echo 'checked' ?>>
                </td>
            </tr>
        </tbody>
    </table>



<?php
}
function custom_area3()
{

    global $post;
?>
    <div class="edit-area">
        <p>ページタイトル</p>
        <input type="text" class="edit-input" name="job-title" value="<?php echo get_post_meta($post->ID, 'job-title', true); ?>">
    </div>
    <div class="edit-area">
        <p>採用リンク</p>
        <input type="text" class="edit-input" name="job-link" value="<?php echo get_post_meta($post->ID, 'job-link', true); ?>">
    </div>
    <div class="edit-area">
        <p>募集職種1</p>
        <input type="text" class="edit-input" name="job-category1" value="<?php echo get_post_meta($post->ID, 'job-category1', true); ?>">
        <?php for ($i = 1; $i <= 4; $i++) : ?>
            <p>質問<?php echo $i; ?></p>
            <input type="text" class="edit-input" name="job-question<?php echo $i; ?>" value="<?php echo get_post_meta($post->ID, 'job-question' . $i, true); ?>">
            <p>回答<?php echo $i; ?></p>
            <textarea name="answer<?php echo $i; ?>" id="" cols="30" rows="10"><?php echo get_post_meta($post->ID, 'answer' . $i, true); ?></textarea>
        <?php endfor; ?>
    </div>

    <div class="edit-area">
        <p>募集職種2</p>
        <input type="text" class="edit-input" name="job-category2" value="<?php echo get_post_meta($post->ID, 'job-category2', true); ?>">
        <?php for ($i = 5; $i <= 8; $i++) : ?>
            <p>質問<?php echo ($i - 4); ?></p>
            <input type="text" class="edit-input" name="job-question<?php echo $i; ?>" value="<?php echo get_post_meta($post->ID, 'job-question' . $i, true); ?>">
            <p>回答<?php echo ($i - 4); ?></p>
            <textarea name="answer<?php echo $i; ?>" id="" cols="30" rows="10"><?php echo get_post_meta($post->ID, 'answer' . $i, true); ?></textarea>
        <?php endfor; ?>
    </div>

    <div class="edit-area">
        <p>募集職種3</p>
        <input type="text" class="edit-input" name="job-category3" value="<?php echo get_post_meta($post->ID, 'job-category3', true); ?>">
        <?php for ($i = 9; $i <= 12; $i++) : ?>
            <p>質問<?php echo ($i - 8); ?></p>
            <input type="text" class="edit-input" name="job-question<?php echo $i; ?>" value="<?php echo get_post_meta($post->ID, 'job-question' . $i, true); ?>">
            <p>回答<?php echo ($i - 8); ?></p>
            <textarea name="answer<?php echo $i; ?>" id="" cols="30" rows="10"><?php echo get_post_meta($post->ID, 'answer' . $i, true); ?></textarea>
        <?php endfor; ?>
    </div>


<?php
}

function custom_area4()
{

    global $post;
?>
    <table>
        <tbody>
          
            <tr>
                <th style="width: 300px;">一言コメント(50字程度)</th>
                <td>
                    <textarea class="js-count-area" name="one_word" id="" cols="60" rows="5"><?php echo get_post_meta($post->ID, 'one_word', true); ?></textarea>
                    <p><span class="js-count"></span>/50</p>
                    <p class="over-text">文字数オーバーです。</p>
                </td>
            </tr>

        </tbody>
    </table>


<?php
}



//カスタムフィールドが更新された時の処理

function save_custom($post_id)
{

    $hotpepper = '';
    $menu_text = "";
    //カスタムフィールド内にポストされたら・・・
    if (isset($_POST['hotpepper'])) {
        $hotpepper = $_POST['hotpepper'];

        //変更されていたら更新
        if ($hotpepper !== get_post_meta($post_id, 'hotpepper', true)) {
            update_post_meta($post_id, 'hotpepper', $hotpepper);
            //何もデータが入っていなければ削除
        } elseif ($hotpepper == '') {
            delete_post_meta($post_id, 'hotpepper', get_post_meta($post_id, 'hotpepper', true));
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

    $position = "";
    if (isset($_POST['position'])) {
        $position = $_POST['position'];

        //変更されていたら更新
        if ($position !== get_post_meta($post_id, 'position', true)) {
            update_post_meta($post_id, 'position', $position);
            //何もデータが入っていなければ削除
        } elseif ($position == '') {
            delete_post_meta($post_id, 'position', get_post_meta($post_id, 'position', true));
        }
    }

    $job_title = '';
    $job_question = [];
    $answer = [];
    $job_category1 = '';
    $job_category2 = '';
    $job_category3 = '';
    for ($i = 1; $i <= 12; $i++) :
        $job_question[$i] = '';
        $answer[$i] = '';
    endfor;

    if (isset($_POST['job-title'])) {
        $job_title = $_POST['job-title'];

        //変更されていたら更新
        if ($job_title !== get_post_meta($post_id, 'job-title', true)) {
            update_post_meta($post_id, 'job-title', $job_title);
            //何もデータが入っていなければ削除
        } elseif ($job_title == '') {
            delete_post_meta($post_id, 'job-title', get_post_meta($post_id, 'job-title', true));
        }
    }
    if (isset($_POST['job-link'])) {
        $job_link = $_POST['job-link'];

        //変更されていたら更新
        if ($job_link !== get_post_meta($post_id, 'job-link', true)) {
            update_post_meta($post_id, 'job-link', $job_link);
            //何もデータが入っていなければ削除
        } elseif ($job_link == '') {
            delete_post_meta($post_id, 'job-link', get_post_meta($post_id, 'job-link', true));
        }
    }

    if (isset($_POST['job-category1'])) {
        $job_category1 = $_POST['job-category1'];

        //変更されていたら更新
        if ($job_category1 !== get_post_meta($post_id, 'job-category1', true)) {
            update_post_meta($post_id, 'job-category1', $job_category1);
            //何もデータが入っていなければ削除
        } elseif ($job_category1 == '') {
            delete_post_meta($post_id, 'job-category1', get_post_meta($post_id, 'job-category1', true));
        }
    }
    if (isset($_POST['job-category2'])) {
        $job_category2 = $_POST['job-category2'];

        //変更されていたら更新
        if ($job_category2 !== get_post_meta($post_id, 'job-category2', true)) {
            update_post_meta($post_id, 'job-category2', $job_category2);
            //何もデータが入っていなければ削除
        } elseif ($job_category2 == '') {
            delete_post_meta($post_id, 'job-category2', get_post_meta($post_id, 'job-category2', true));
        }
    }
    if (isset($_POST['job-category3'])) {
        $job_category3 = $_POST['job-category3'];

        //変更されていたら更新
        if ($job_category3 !== get_post_meta($post_id, 'job-category3', true)) {
            update_post_meta($post_id, 'job-category3', $job_category3);
            //何もデータが入っていなければ削除
        } elseif ($job_category3 == '') {
            delete_post_meta($post_id, 'job-category3', get_post_meta($post_id, 'job-category3', true));
        }
    }

    for ($i = 1; $i <= 12; $i++) :
        if (isset($_POST['job-question' . $i])) {
            $job_question[$i] = $_POST['job-question' . $i];

            //変更されていたら更新
            if ($job_question[$i] !== get_post_meta($post_id, 'job-question' . $i, true)) {
                update_post_meta($post_id, 'job-question' . $i, $job_question[$i]);
                //何もデータが入っていなければ削除
            } elseif ($job_question[$i] == '') {
                delete_post_meta($post_id, 'job-question' . $i, get_post_meta($post_id, 'job-question' . $i, true));
            }
        }
        if (isset($_POST['answer' . $i])) {
            $answer[$i] = $_POST['answer' . $i];

            //変更されていたら更新
            if ($answer[$i] !== get_post_meta($post_id, 'answer' . $i, true)) {
                update_post_meta($post_id, 'answer' . $i, $answer[$i]);
                //何もデータが入っていなければ削除
            } elseif ($answer[$i] == '') {
                delete_post_meta($post_id, 'answer' . $i, get_post_meta($post_id, 'answer' . $i, true));
            }
        }
    endfor;

    $one_word = '';
    if (isset($_POST['one_word'])) {
        $one_word = $_POST['one_word'];

        //変更されていたら更新
        if ($one_word !== get_post_meta($post_id, 'one_word', true)) {
            update_post_meta($post_id, 'one_word', $one_word);
            //何もデータが入っていなければ削除
        } elseif ($one_word == '') {
            delete_post_meta($post_id, 'one_word', get_post_meta($post_id, 'one_word', true));
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
        'menu', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => 'メニュー設定', //ダッシュボードに表示される名前
                'add_new_item' => 'メニュー設定', // 新規追加画面に表示される名前
                'edit_item' => 'メニューの編集', // 編集画面に表示される名前
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
    register_taxonomy_for_object_type('category', 'menu');  //カスタム投稿にもカテゴリー設定


    register_post_type( // カスタム投稿タイプを定義するための関数
        'staff', // カスタム投稿タイプ名
        array(
            'labels' => array(
                'name' => 'スタッフ登録', //ダッシュボードに表示される名前
                'add_new_item' => 'スタッフ登録', // 新規追加画面に表示される名前
                'edit_item' => 'メニューの編集', // 編集画面に表示される名前
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
    // register_taxonomy_for_object_type('category', 'menu');  //カスタム投稿にもカテゴリー設定
    register_taxonomy(
        'staff-cat',
        array('staff'),
        array(
            'hierarchical' => true,
            'update_count_callback' => '_update_post_term_count',
            'label' => 'スタッフカテゴリー',
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

function my_theme_archive_title($title)
{
    if (is_post_type_archive() && !is_date()) {

        $title = post_type_archive_title('', false);
    } elseif (is_date()) {

        $date  = single_month_title('', false);
        $point = strpos($date, '月');
        $title = mb_substr($date, $point + 1) . '年' . mb_substr($date, 0, $point + 1);
    }

    return $title;
}

add_filter('get_the_archive_title', 'my_theme_archive_title');

