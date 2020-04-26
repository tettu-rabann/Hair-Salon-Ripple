$(function(){
  //---------------------------------------ページ遷移イベント------------------------------------
  $('.ripple-btn').click(function(){
    window.location.href='index.php';
  });

  $('.overview-btn').click(function(){
    window.location.href='overview.php';
  });

  $('.salon-btn').click(function(){
    window.location.href='salon.php';
  });

  $('.reservation-btn').click(function(){
    window.location.href='reservation.php';
  });

  $('.news-btn').click(function(){
    window.location.href='news.php';
  });


  //---------------------------------------メニューイベント------------------------------------

  $('#menu-icon').click(function(){
    for (var i = 0; i < 5; i++) {
      console.log(i);
    }
    $('#menu-icon').parent().find("#menu-contents").animate({'marginRight':'400px','opacity':0.7},{'duration':400});
    $(".menu-sentence").delay(400).fadeIn(150);

  });

  $('#cross-icon').click(function(){
    $('#menu-icon').parent().find("#menu-contents").animate({'marginRight':'0px'},300);
    $('.menu-sentence').fadeOut(1000);
  });

})
