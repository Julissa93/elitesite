<?php
function connect2db()
{
  $servername = parse_url(getenv('DATABASE_URL'));
  $username = "bbc52bf21f8514";
  $password = "08558808";
  $db = "heroku_29bbb9f48b3ae18";
  mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_STRICT);
  @ $result = new mysqli($servername, $username, $password, $db);
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
  echo "<br>Number of posts: ";
  var_dump($result);
  $totalNumResults = $result->num_rows;

  return $totalNumResults;
}

function getBlogPosts($page)
{
  $conn = connect2db();
  $limitPostsPerPage = 5;
  $offset = ($page - 1) * $limitPostsPerPage;
  //$query = "select * from blog as b, users as u where b.userID = u.userID order by date desc limit " .$offset. ", " . $limitPostsPerPage. "; ";
  $query = "select * from blog";
  $result = $conn->query($query);
  if($result->num_rows > 0)
  {
      while($row = $result->fetch_assoc())
      {
        //note to self: make new page when user clicks "read more".
        echo"<article>
            <h1 class = 'text-center'>".$row['title']."</h1>
            <strong class = 'text-center'>Author: ".$row['firstname']." ". $row['lastname']." </strong>
            <br>
            <h3 class = 'date'>".$row['date']."</h3>

            <p class = 'blog_content'>". substr($row['body'], 0, 300) . "...

            <a href='#' class='post-link'>Read More</a>
            </p>
            </article>";
      }
  }
  else {
      echo "not working!!!";
  }
}
?>
