<?php

function connect2db()
{
  /*$servername = "us-cdbr-iron-east-05.cleardb.net";
  $username = "bbc52bf21f8514";
  $password = "08558808";
  $db = "heroku_29bbb9f48b3ae18";*/
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $db = "elite-db";
  $result = new mysqli($servername, $username, $password, $db);
       if (mysqli_connect_errno())
       {
         throw new Exception('Could not connect to database server');
       } else
       {
         return $result;
       }
}

function getNumberOfPages()
{
  $limitPostsPerPage = 5;
  $numPages = ceil(getTotalNumPosts() / $limitPostsPerPage);
  return $numPages;
}

function getTotalNumPosts()
{
  $conn = connect2db();
  $query = "select * from blog as b, users as u where b.userID = u.userID order by date desc;";
  $result = $conn->query($query);
  $totalNumResults = $result->num_rows;

  return $totalNumResults;
}

function getBlogPosts($page)
{
  $conn = connect2db();
  $limitPostsPerPage = 5;
  $offset = ($page - 1) * $limitPostsPerPage;
  $query = "select * from blog as b, users as u where b.userID = u.userID order by date desc limit " .$offset. ", " . $limitPostsPerPage. "; ";
  $result = $conn->query($query);
  if($result->num_rows > 0)
  {
      while($row = $result->fetch_assoc())
      {
        //note to self: make new page when user clicks "read more".
        echo"<article class = 'blog-post'>
            <h3 class = 'text-center'>".$row['title']."</h3>
            <strong class = 'text-center'>Author: ".$row['firstname']." ". $row['lastname']." </strong>
            <br>
            <p class = 'date'>".$row['date']."</p>
            <center><img src = 'data:image/jpeg;base64,".base64_encode($row['image'])."' class = 'img-responsive'/></center>
            &nbsp;

            <p class = 'blog_content'>". substr($row['body'], 0, 300) . "...

            <form action = 'displayblog.php' method = 'get'>
              <input type = 'hidden' name = 'blog-link' value = ".$row['blogID'].">
              <input class = 'button' type = 'submit' value = 'Read more'>
            </form>

            </p>
            </article>";
      }

  }
  else {
      echo "not working!!!";
  }
}

function getPost()
{
  $conn = connect2db();

  if(isset($_GET['blog-link']))
  {
    $blog = $_GET['blog-link'];
    $query = "select * from blog as b, users as u where b.userID = u.userID and b.blogID = ".$blog." ";
    $result = $conn->query($query);
    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        echo"<article class = 'blog-post'>
            <h3 class = 'text-center'>".$row['title']."</h3>
            <strong class = 'text-center'>Author: ".$row['firstname']." ". $row['lastname']." </strong>
            <br>
            <p class = 'date'>".$row['date']."</p>
            <center><img src = 'data:image/jpeg;base64,".base64_encode($row['image'])."' class = 'img-responsive'/></center>
            &nbsp;
            <p class = 'blog_content'>". $row['body']. "
            </p>
            </article>";
      }
    }
  }
}
?>
