<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DVD Search</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>DVD Search</h1>
        <form action="results.php" method="get" role="form">
            <div class="form-group">
                <label for="title">DVD title:</label>
                <input type="text" name="dvd_title" id="title">
            </div>
            <input type="submit" value="Search" class="btn btn-primary">
        </form>
    </body>
</html>