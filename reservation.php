<?php require('dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hair Salon Ripple</title>
    <meta http-equiv="content-type" content = "text/html" >
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "css/styles.css">
    <link rel = "stylesheet" href = "css/responsive.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <header>
      <div class="header-container">
        <div class="right-header">
          <a href="overview.php">Overview</a>
          <a href="salon.php">Salon</a>
          <a href="reservation.php">Reservetion</a>
          <a href="news.php">News</a>
          <div id ="menu-icon" class="btn">
            <i class="fas fa-bars"></i>
          </div>
          <div id="menu-contents">
            <div id="cross-icon" class = "btn cross-btn">
              <i class="fas fa-times fa-2x"></i>
            </div>
            <div class="menu-sentence">
              <h1>Menu</h2>
              <p class="btn ripple-btn">Hair Salon Ripple</p>
              <p class="btn overview-btn">Ovewview</p>
              <p class="btn salon-btn">Salon</p>
              <p class="btn reservation-btn">Reservetion</p>
              <p class="btn news-btn">News</p>
            </div>
          </div>
        </div>
        <div class="left-header">
          <a href="index.php">Hair Salon Ripple</a>
        </div>

      </div>
    </header>


    <div class="reservation-wrapper">
      <div class="container">
        <h1>Reservation</h1>
        <p>ご予約は、下記の電話番号からお願いいたします。</p>
        <p>tel：0561-72-3938</p>

      </div>
    </div>



    <footer>
      <div id="link" class="container">
        <div class="map-wrapper">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3261.8587347921234!2d137.0337931152446!3d35.16014368031911!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600364356f1487c7%3A0x48662c8098a53ce5!2z44Oq44OD44OX44Or!5e0!3m2!1sja!2sjp!4v1587301234287!5m2!1sja!2sjp" width="800" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          <h1>美容院 リップル</h1>
          <div class="footer-info">
            <p>〒470-0136 愛知県日進市竹の山１丁目２１０６</p>
            <p>通常営業時間：9:00～19:00（受付：カット～18:30、パーマ～17:30）</p>
            <p>定休日：毎週水曜日、第2,4火曜日</p>
            <p>駐車場：あり（最大3台）</p>
            <p>0561-72-3938</p>
            <p>※現在コロナの影響により、営業時間変更中（9:00~16:00）</p>
          </div>
        </div>
        <div class="left-footer">

          <div class="footer-row">
            <div class="footer-column">
              <h5>MENU</h5>
              <a href="">HOME</a>
              <a href="first-btn btn">OVERVIEW</a>
              <a href="salon.php" class="">SALON</a>
              <a href="">NEWS</a>
              <a href="" href="login.php">My Page</a>
            </div>
            <div class="footer-column">
              <h5>Official Links</h5>
              <p>↓Ripple公式リンク↓</p>

              <div class="footer-column-link">
                <a class="insta_btn" href="" target = "_blank"><span class = "insta"><i class="fab fa-instagram"></i></span></a>
                <a href="https://twitter.com/StudioM_tweet" target = "_blank"><i class="fab fa-twitter fa-2x twitter-icon" alt-="公式ツイッターアカウント"></i></a>

              </div>
            </div>
            <div class="footer-column">
              <h5>Calender</h5>
              <?php
              date_default_timezone_set('Asia/Tokyo');

              $year = date('Y');
              $month = date('m');

              //月末日を取得
              $end_month = date('t', strtotime($year.$month.'01'));
              //1日の曜日を取得
              $first_week = date('w', strtotime($year.$month.'01'));
              //月末日の曜日を取得
              $last_week = date('w', strtotime($year.$month.$end_month));

              $Calendar = [];
              $j = 0;
              for ($i=0; $i < $first_week; $i++) {
                $Calendar[$i] = '';
              }

              for ($i=1; $i < $end_month + 1; $i++) {
                $Calendar[$first_week + $i -1] = $i;
              }

              for ($i=($first_week+$end_month)%7; $i != 7; $i++) {
                $j++;
                $Calendar[$end_month + $first_week + $j - 1] = '';
              }
              ?>
              <table class="calender">
                <p><?php
                  print($year . '年');
                  print($month . '月'); ?></p>
                <tr>
                  <th>日</th>
                  <th>月</th>
                  <th>火</th>
                  <th>水</th>
                  <th>木</th>
                  <th>金</th>
                  <th>土</th>
                </tr>
                <tr>
                  <?php
                  for($i = 0;$i < count($Calendar);$i++):
                    ?>
                    <td <?php if(date(j) == $Calendar[$i]){print('class = "today"');} ?>>
                      <?php print($Calendar[$i]); ?>
                    </td>
                    <?php
                    if($i%7 == 6):
                      ?>
                    </tr>

                      <tr>
                      <?php
                    endif;
                  endfor;
                   ?>
                </tr>

              </table>


              <p>※赤色は本日の日付です。</p>
            </div>
            </div>
          </div>
        <div class="right-footer">

        </div>
        <p id="copyright">copyright (c) Ikehata Tetsuji all rights reserved.</p>

      </div>

    </footer>


    <script src="JavaScript/script.js"></script>
  </body>
</html>
