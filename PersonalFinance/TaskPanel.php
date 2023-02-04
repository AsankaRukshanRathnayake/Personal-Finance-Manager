<?php

    if(isset($_REQUEST["newaccount"])){
        header("Location:newaccount.php");
        exit();
    }

    if (isset($_REQUEST["transaction"])){
        header("Location:transaction.php");
        exit();
    }

?>

<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Task Panel</title>

    </head>

    <body>
        <!--Add Account-->
        <!--Record Transaction-->
        <div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="submit" name="newaccount" value="New Account">
                <input type="submit" name="transaction" value="New Transaction">
            </form>
        </div>
    </body>




</html>