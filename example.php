<?php
include "connect.php";

    function getAuthors($link){
        if(isset($_GET['author'])){
            $id = $_GET['author'];
            $query = "SELECT * from news left join authors on news.author_id = authors.id where author_id = 1";
            $res = mysqli_query($link, $query) or die(mysqli_error($link));
            for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
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
                           <td><a href='example.php?author={$elem['id']}'>{$elem['name']}</a></td>
                      ";
            }
            $content .= '</table>';
            echo $content;
        }
        }

function infoAuthor($link){
    if(isset($_GET['news'])){
        $id = $_GET['news'];
        $query = "SELECT * from news left join authors on news.author_id = authors.id ";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($res);$data[] = $row);
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
                       <td><a href='example.php?author={$elem['id']}'>{$elem['name']}</a></td>
                  ";
        }
        $content .= '</table>';
        echo $content;
    }
}
getAuthors($link);
infoAuthor($link);
