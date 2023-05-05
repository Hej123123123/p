
<?php
session_start();

require_once 'db_conn.php';

if(!isset($_SESSION['user'])){
header("location: login.php?ejlogin");
exit;
}else{
$username = $_SESSION['user'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="welcome.css">


</head>
<body>
<main>

    <section class='userInput'>
        <section class="loginInfo">
            <p>Du är inloggad som: <strong><?php echo $username ?></strong></p>
            <div>
                <button><a href="login.php?logout">Logga ut</a></button><br><br>
            </div>
        </section>
        
        <section class="messageArea">
            <form action="" method="post">
                <label for="comment">Meddelande:</label><br>
                <textarea name="comment" id="" cols="30" rows="10" required></textarea>
                <button type="submit" name="submit">Skicka</button>
            </form>
        </section>
        </section class='messages'>

        <?php

if(isset($_POST['submit'])){
    $comments = $_POST['comment'];
    $sql = "INSERT INTO comments (comment, user, date) VALUES ('$comments', '$username', NOW())";
    $query = mysqli_query($conn, $sql) or die('Det gick inte att ansluta till databasen');
}


            $sql = "SELECT user, comment, date FROM comments ORDER BY date DESC";

            $query = mysqli_query($conn, $sql);

            foreach($query as $userComments){
                extract($userComments);
                echo    "<section>
                            <header>$user<h5>$date</h5></header>
                            <p>$comment</p>
                        </section>";

                        
            }

            mysqli_close($conn);

        ?>

    </section>

</main>
</body>
</html>  