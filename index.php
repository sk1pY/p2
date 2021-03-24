<html>
<head>
    <title>Чудо-новости</title>
    <style type="text/css">
        body {
            width:500px;
            margin:0 auto;
            font-family:Georgia;
        }
        .header, .footer {
            background:#900;
            color:#FFF;
            padding:10px;
        }
        .header .logo a {font-size:35px; font-weight:bold; color:#FFF; text-decoration:none;}
        .header .slogan {color:#EEE;}
        .news_list .news_item {margin:35px 0;}
        .date {
            margin:5px 0;
            color:#999;
        }
    </style>
</head>
<div class="header">
    <div class="logo"><a href="/files/01.13/stazher/example.php">Чудо-новости.рф</a></div>
    <div class="slogan">только достоверные новости!</div>
</div>
<div class="news_list">
    <h1>Последние новости</h1>
    <?php
    include 'connect.php';

    function getPage($link)
    {
        if (isset($_GET['author'])) {
            $id = $_GET['author'];
            $query = "SELECT * from news left join authors on news.author_id = authors.id where author_id = 1";
            $res = mysqli_query($link, $query) or die(mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row) ;
            foreach ($data as $elem) {
                $content .= "
                    <table>
                      <tr>
                           <td>{$elem['publish_date']}</td>
                      </tr>
                      <tr>
                           <td>{$elem['title']}</td>
                      </tr>
                      <tr>
                           <td>{$elem['text']}</td>
                      </tr>
                           <td><a href='?author={$elem['id']}'>{$elem['name']}</a></td>
                      ";
            }
            $content .= '</table>';
            echo $content;
        }elseif (isset($_GET['news']))
        {
            $id = $_GET['news'];
            $query = "SELECT * from news join authors on news.author_id = authors.id where news.id ='$id'";
            $res = mysqli_query($link, $query) or die(mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row) ;
            foreach ($data as $elem) {
                $content .= "
                <table>
                  <tr>
                       <td>{$elem['publish_date']}</td>
                  </tr>
                  <tr>
                       <td>{$elem['title']}</td>
                  </tr>
                  <tr>
                       <td>{$elem['text']}</td>
                  </tr>
                       <td><a href='?author={$elem['id']}'>{$elem['name']}</a></td>
                  ";
            }
            $content .= '</table>';
            echo $content;
        } else {
            $query = "select * from news";
            $res = mysqli_query($link, $query) or die(mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row) ;
            foreach ($data as $elem) {
                $content .= "
                    <table>
                  <tr>
                       <td><a href='?news={$elem['id']}'>{$elem['title']}</a></td>
                  </tr>
                  <tr>
                       <td>{$elem['publish_date']}</td>
                  </tr>
                       <td>{$elem['text']}</td>
                  ";
            }
            $content .= '</table>';
            echo $content;
        }
    }

    getPage($link);

    ?>
    <a href="admin">admin</a>