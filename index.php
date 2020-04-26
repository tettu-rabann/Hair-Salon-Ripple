<?php require('dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hair Salon Ripple | 愛知県日進市竹の山 【美容院リップル】 日進店</title>
    <meta name="description" content="愛知県日進市竹の山にある美容院リップル 予約不要、お手頃な価格で理想のヘアスタイルをご提供"/>
    <meta http-equiv="content-type" content = "text/html" >
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
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

    <div class="title-wrapper">
      <div class="container">
        <div class="title-contents">
          <h1>Hair Salon Ripple</h1>

          <p>Rippleでは、お客様の要望に沿って理想のヘアスタイルを提供します。</p>
        </div>
      </div>

    </div>

    <div class="overview-wrapper">
      <div class="container">
        <h1>Overview</h1>
        <h2>Hair Salon Rippleを通して"人の輪"を創り出す</h2>

        <p>Rippleの持つ仕事のキーワードは「コミュニケーションの場を作る」です。 <br>
          誰もが気軽に来てもらえるような、双方から親しい人とのコミュニケーションを <br>
          より活性化させる環境を生み出すことができれば、お客様の満足度に繋がると考えています。 <br>
          そんな未来を思い描き、キャッチコピーを”人の輪を創り出す”と定義し、 <br>
          Rippleの強みである会話のある環境作りを推進して行きます。</p>



      </div>

    </div>
    <div class="style-wrapper">

      <div class="container">
        <h1>Gallery</h1>
        <p></p>
        <div class="style-row">
          <div class="style-column">
            <img src="img/salon-img4.jpg" alt="写真1">
          </div>
          <div class="style-column">
            <img src="img/salon-img2.jpg" alt="写真2">
          </div>
          <div class="style-column">
            <img src="img/salon-img3.jpg" alt="写真3">
          </div>
        </div>
        <div class="style-row">
          <div class="style-column">
            <img src="img/salon-img1.jpg" alt="写真4">
          </div>
          <div class="style-column">
            <img src="img/salon-img5.jpg" alt="写真4">
          </div>
        </div>
      </div>
    </div>

    <div class="salon-wrapper">
      <div class="container">
        <h1>Salon</h1>
        <h2>Rippleでは、お客様にお手軽な価格で、理想のヘアスタイルを提供いたします。</h2>
        <div class="salon-plan">
          <div class="salon-row">
            <h2>Cut <span>カット（ブロー付）</span> </h2>
            <p>￥ 2,000</p>
          </div>
          <div class="salon-row">
            <h2>Color<span>カラー（シャンプー、ブロー付）</span> </h2>
            <p>￥ 3,500 ~</p>
          </div><div class="salon-row">
            <h2>Perm <span>パーマ（カット、ブロー付）</span> </h2>
            <p>￥ 3,500 ~</p>
          </div>
          <h3>...</h3>
        </div>
        <p>詳細な料金プランはこちら<i class="fas fa-chevron-circle-down"></i></p>
        <p>
          <a class="btn" href="salon.php">Show More...</a>
        </p>
      </div>
    </div>


    <div class="news-wrapper">
      <div class="container">
        <h1>News</h1>
        <p>当店の情報を発信しています</p>

        <?php
        if(isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])){
          $page = $_REQUEST['page'];
        } else {
          $page = 1;
        }
        $start = 6*($page-1);

        $counts = $db->query('SELECT COUNT(*) AS cnt FROM posts ');
        $count = $counts->fetch();
        $max_page = floor($count['cnt']/6)+1;



        $memos = $db->prepare('SELECT * FROM posts ORDER BY id DESC LIMIT ? , 6');
        $memos->bindParam(1,$start,PDO::PARAM_INT);
        $memos->execute();
         ?>
         <article class="news-row">
           <?php while($memo = $memos->fetch()): ?>
             <div class="news-column">
               <time>
                 <?php print($memo['created']); ?>
               </time>
               <p>
               <a href="message.php?id=<?php print($memo['id']); ?>">
                   <?php print(mb_substr($memo['title'] , 0 , 50)); ?>
                   <?php print(mb_strlen($memo['title']) > 50 ? '...':''); ?>
                 </a>
               </p>
               <p>
                 <a href="message.php?id=<?php print($memo['id']); ?>">
                   <?php print(mb_substr($memo['message'] , 0 , 50)); ?>
                   <?php print(mb_strlen($memo['message']) > 50 ? '...':''); ?>
                 </a>
               </p>
             </div>
          <?php endwhile; ?>
         </article>
         <div class="news-jump">
           <a href="news.php">More <span><i class="fas fa-angle-right"></i></span></a>
         </div>

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
            <div class="footer-column footer-menu">
              <h5>MENU</h5>
              <a href="index.php" class="">HOME</a>
              <a href="overview.php" class="first-btn btn">OVERVIEW</a>
              <a href="salon.php" class="">SALON</a>
              <a href="news.php">NEWS</a>
              <a href="login.php">My Page</a>
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


              <p>※赤色が本日の日付</p>
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
