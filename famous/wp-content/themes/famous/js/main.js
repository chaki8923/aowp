$(function () {

  //ローディングアイコン
  $(window).on('load', function () { //全ての読み込みが完了したら実行
    $('.loading').delay(400).fadeOut('fast');
  });

  //3秒たったら強制的にロード画面を非表示
  $(function () {
    setTimeout(stopload, 400);
  });

  function stopload() {
    $('.js-loading').fadeOut();
  }

  //TOPへ戻る
  var $top = $('.js-top');
  $top.on('click', function () {

    $('body,html').animate({ scrollTop: 0 }, 300);

  });
  $('.js-footer-top').on('click', function () {

    $('body,html').animate({ scrollTop: 0 }, 300);

  });


  //ハンバーガーメニュー
  $('.bar').on('click', function () {
    $(this).find('.bar-top').toggleClass('active');
    $(this).find('.bar-middle').toggleClass('active');
    $(this).find('.bar-bottom').toggleClass('active');
    $('.header').toggleClass('slidein');
  })


  $(document).on('click', function (e) {
    if (!$(e.target).closest('.bar').length) {
      $('.bar-top').removeClass('active');
      $('.bar-middle').removeClass('active');
      $('.bar-bottom').removeClass('active');
      $('.header').removeClass('slidein');
    } else {
      // ターゲット要素をクリックした時の操作
    }
  });
  //=====================================================================
  $(window).on('scroll', function () {
    var docHeight = $(document).innerHeight(), //ドキュメントの高さ
      windowHeight = $(window).innerHeight(), //ウィンドウの高さ
      pageBottom = docHeight - windowHeight; //ドキュメントの高さ - ウィンドウの高さ

    if (pageBottom <= $(window).scrollTop() + 190) {

      $top.addClass('bottom');
    } else {
      $top.removeClass('bottom');

    }
  });

  //==========================================
  //work
  //==========================================
  $('.js-work-link').hover(function (e) {
    $(this).find('.work-area--img').stop().addClass('isdark');
    $(this).find('.js-work-title').stop().slideDown();
    $(this).find('.js-work-text').stop().addClass('isShow')

  }, function () {
    $(this).find('.work-area--img').stop().removeClass('isdark');
    $(this).find('.js-work-title').stop().slideUp();
    $(this).find('.js-work-text').stop().removeClass('isShow')

  });
  //===================================================
  $('.info-inner--panel').hover(function (e) {
    $(this).find('.js-info-img').stop().addClass('iszoom');

  }, function () {
    $(this).find('.js-info-img').stop().removeClass('iszoom');

  });
  //===================================================
  $('.blog-panel').hover(function (e) {
    $(this).find('.js-blog-img').stop().addClass('iszoom');
    $(this).find('.js-blog-title').stop().slideDown()


  }, function () {
    $(this).find('.js-blog-img').stop().removeClass('iszoom');
    $(this).find('.js-blog-title').stop().slideUp()

  });
  //===================================================

  //=================================================
  var window_h = $(window).height();

  //スクロールした時の全てのアクション
  $(window).on('scroll', function () {
    var scroll_top = $(window).scrollTop();


    $(".slide").add($(".slide2")).add($(".js-panel")).add($(".manu")).each(function () {
      //各box要素のtopの位置を取得する
      var elem_pos = $(this).offset().top;

      //どのタイミングでフェードインさせるか

      if (scroll_top >= elem_pos - window_h + 200) {

        $(".menu").addClass("fadein");
      }


    });
    //TOPに戻るボタンが出たり消えたり
    if ($(window).scrollTop() > 250) {
      $('.js-top').addClass('fadein');
    } else {
      $('.js-top').removeClass('fadein');
    }
  });

  $('.js-panel').hover(function () {
    $(this).find('.js-text').addClass('slideup');
  }, function () {
    $(this).find('.js-text').removeClass('slideup');
  })
  //=====================================================

  $('.js-catList').hover(function () {

    $(this).find('.js-thumbnail img').addClass('zoomup');
  }, function () {
    $(this).find('.js-thumbnail img').removeClass('zoomup');
  });

  //news記事一覧
  $('.js-news-link').hover(function () {
    $(this).find('.news-inner__img img').addClass('zoomup');
  }, function () {
    $(this).find('.news-inner__img img').removeClass('zoomup');
  });

  $('.p-category_panelImg').hover(function () {
    $(this).find('.js-cat-panel').addClass('zoomup');
  }, function () {
    $(this).find('.js-cat-panel').removeClass('zoomup');

  });
  //関連記事一覧
  $('.relation-panel').hover(function () {
    $(this).find('.js-relation_img').addClass('zoomup');
  }, function () {
    $(this).find('.js-relation_img').removeClass('zoomup');

  });
  //WORK一覧
  $('.tab-panel').hover(function () {
    $(this).find('.js-detail-title').addClass('slideup');
  }, function () {
    $(this).find('.js-detail-title').removeClass('slideup');

  });

  $('.js-info-panel').hover(function () {
    $(this).find('.js-info-image').addClass('zoomup');
  }, function () {
    $(this).find('.js-info-image').removeClass('zoomup');

  });

  
  //タブメニュー

  $('.tab-panel').hide();
  $('.tab-panel').first().show();
  $('.page-inner_tab li').first().css('color', 'red');

  $('.page-inner_tab li').on('click', function () {
    $('.tab-panel').hide();
    $('.page-inner_tab li').css('color', '#333');
    $(this).css('color', 'red');

    $target = $(this).attr('class');
    console.log(`.cat-${$target}`);

    $(`.cat-${$target}`).show();


  });



});
//月選択
$('.js-list').find('li').addClass('js-arcivelist p-sidebar_arciveList');
if ($('.js-click-arcive').hasClass('js-arcivelist')) {

  $('.js-click-arcive').removeClass('js-arcivelist p-sidebar_arciveList');
}
$('.js-click-arcive').on('click', function (e) {

  $('.js-arrow').toggleClass('role');
  $('.js-arcivelist').slideToggle('fast');

});



//==============================================
//スライダー
//==============================================
let slide_show = 4;

if ($('.sp-flg').css('color') === 'rgb(238, 130, 238)') {
  slide_show = 1;
}
$('.voice-slider').slick({
  arrows: true,
  autoplay: false,
  dots: true,
  /* ポイントここから～ */
  autoplaySpeed: 2000,
  // cssEase: 'linear',
  speed: 1000,
  prevArrow: '<button type=”button” class=slick-prev style=" cursor: pointer;outline: none; border: none;z-index: 20; border: none;"></button>',
  nextArrow: '<button type=”button” class=slick-next style=" cursor: pointer;outline: none;border: none; z-index: 20;"></button>',
  dotsClass: 'dots',
  /* ～ここまで */
  slidesToShow: slide_show,
  slidesToScroll: 1,
  responsive: [{
		breakpoint: 767,
		settings: {
			slidesToShow: 1, 
			slidesToScroll: 1,
		}
	}]
});

//=========================================================
//SPフッター用
//=========================================================

$('.top-return').on('click', function () {
  $('body,html').animate({ scrollTop: 0 }, 300);

});

let click = true;
$('.js-sns-btn').stop().on('click', function () {
  if (click) {
    click = false;
    $('.sns-area').not(":animated").slideToggle();
    $('.js-sns-open').toggle();
    $('.js-sns-close').toggle();
    setTimeout(function () {
      click = true;
    }, 500)
  }
});





document.addEventListener("DOMContentLoaded", function () {

  const elem = document.querySelector(".js-target-parallax");
  if (elem !== null) { //クラス名js-target-parallaxがあるか判定
    let target = document.getElementsByClassName("js-target-parallax"); //クラス名js-target-parallaxがある要素をすべて取得

    let parallaxConfig = { //simpleParallaxの設定
      delay: 0,
      orientation: "down",
      scale: 1.8,
      //overflow: true, //必要なら
      //maxTransition : 50 //必要なら
    };

   const parallax_instance = new simpleParallax(target, parallaxConfig);

  }
});

document.addEventListener("DOMContentLoaded", function () {

  const elem = document.querySelector(".js-footer-parallax");
  if (elem !== null) { //クラス名js-target-parallaxがあるか判定
    let target = document.getElementsByClassName("js-footer-parallax"); //クラス名js-target-parallaxがある要素をすべて取得

    let parallaxConfig = { //simpleParallaxの設定
      delay: 0,
      orientation: "down",
      scale: 1.8,
      //overflow: true, //必要なら
      //maxTransition : 50 //必要なら
    };

   const parallax_instance = new simpleParallax(target, parallaxConfig);

  }
});
