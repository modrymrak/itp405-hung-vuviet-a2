<?php

if (!isset($_GET['rating'])){
    header('Location: index.php');
    exit();
}

$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$pw = 'ttrojan';


$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pw);

$rating = $_GET['rating']; //$_REQUEST['dvd_title'] - takes any request type

$sql = " SELECT title, genre_name, format_name, rating_name
    FROM dvds
    INNER JOIN genres
    ON dvds.genre_id = genres.id
    INNER JOIN formats
    ON dvds.format_id = formats.id
    INNER JOIN ratings
    ON dvds.rating_id = ratings.id
    WHERE rating_name = ?
    ";

$statement = $pdo->prepare($sql);
$like = $rating;
$statement->bindParam(1, $like);
$statement->execute();
$dvds = $statement->fetchAll(PDO::FETCH_OBJ);//var_dump($dvds);

?>

<?php
echo "<head>
        <meta charset=\"utf-8\">
        <title>Results page</title>
        <link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>
        <script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
      </head><body>";

echo "<div class='container'>";
echo "<div class=\"row\"><div class='span12'><h1>DVD Results</h1></div></div>";
echo "<div class='span12'><h3><em>You are looking at DVDs with '" . $rating . "' rating.</em></h3></div>";

?>
<?php foreach ($dvds as $dvd) : ?>
    <?php echo "<div class='row'>"; ?>
    <?php echo
    ("<div class='col-md-12'>
          <h3> $dvd->title </h3>
         </div>" );
    ?>
    <?php echo "</div>"; ?>
    <?php echo "<div class='row'>"; ?>
    <?php echo
    ("<div class='col-md-4'>
          <p> Genre: $dvd->genre_name </p>
         </div>" );
    ?>
    <?php echo
    ("<div class='col-md-4'>
           <p> Format: $dvd->format_name </p>
         </div>" );
    ?>
    <?php echo ("<div class='col-md-4'>"); ?>
    <?php
    $ratingStringLink = "<p> Rating: " . "<a href='ratings.php?rating=$dvd->rating_name'>" . $dvd->rating_name . "</a></p>";
    echo $ratingStringLink;
    ?>
    <?php echo ("</div>" ); ?>
    <?php echo "</div><br>"; ?>
<?php endforeach?>
<?php
echo ("</div></body>");
?>