<?php
    include "connection.php";
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Transaction</title>
    </head>

    <body>
        <div>
            <form name="transaction" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <h3>Transaction</h3>

                <label for="debitaccount">Debit</label>
                <select name="debitAccount" id="debitAccount">
                    <?php

                    //     ***** TODO : ADD A DROPDOWN LIST *****
                        $accountListSQL = "SELECT `account_name` from `accountlist` ORDER BY `accountname`";
                        $accountList = mysqli_query($connection, $accountListSQL) or die("Error");

                    ?>
                </select><br><br>

                <label for="creditaccount">Debit</label>
                <select name="creditAccount" id="creditAccount">
                    <?php
                        $accountListSQL = "SELECT `account_name` from `accountlist` ORDER BY `accountname`";
                        $accountList = mysqli_query($connection, $accountListSQL) or die("Error");

                    ?>
                </select><br><br>

                <input type="">

            </form>
        </div>
    </body>


</html>