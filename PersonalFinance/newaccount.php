<?php
    include "connection.php";
    
    if (isset($_REQUEST['submit'])){
        $accountName = $_REQUEST["accountname"];
        $accountType = $_REQUEST["accounttype"];

        //--check whether the acocunt name is already taken or not

        $checkAccountAlreadyExistSql = "SELECT * FROM `accountlist` WHERE `account_name`='$accountName'";
        $checkAccountAlreadyExist = mysqli_query($connection, $checkAccountAlreadyExistSql);

        if (mysqli_num_rows($checkAccountAlreadyExist)>0){

            //       ****TODO : CREATE ALERT *****
            // "Account already exists! Try with another name";

            header("Location:newaccount.php");
            exit();
        }

        else{

            //--update the account list with new account

            $addToAccountList = "INSERT INTO `accountlist` (`account_name`, `account_type`) VALUES ('$accountName', '$accountType')";
            mysqli_query($connection, $addToAccountList) or die ("Table Creation failed");
    
            //--create tables for new account
            $createTableDebit = "CREATE TABLE `$accountName.Debit` (`transaction_id` int(11) NOT NULL AUTO_INCREMENT,`date` date NOT NULL,`description` varchar(100) NOT NULL,`amount` double NOT NULL,PRIMARY KEY (`transaction_id`))";
            mysqli_query($connection, $createTableDebit) or die ("Table Creation failed");

            $createTableCredit = "CREATE TABLE `$accountName.Credit` (`transaction_id` int(11) NOT NULL AUTO_INCREMENT,`date` date NOT NULL,`description` varchar(100) NOT NULL,`amount` double NOT NULL,PRIMARY KEY (`transaction_id`))";
            mysqli_query($connection, $createTableCredit) or die ("Table Creation failed");

            header("Location:TaskPanel.php");
            exit();
        }

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
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <h3>Create New Account</h3>

            <label for="accountname">Account Name</label><br>
            <input type="text" name="accountname" id="accountname" placeholder="Enter a new Account Name" required><br><br>

            <label for="Account Type">Account Type</label><br>
            <select name="accounttype" id="accounttype">
                <option value="Assets">Asset</option>
                <option value="Libilities">Liability</option>
                <option value="Equity">Equity</option>
                <option value="Income">Income</option>
                <option value="Expenses">Expense</option>
            </select><br><br>
            
            <span>
                <button><a href="TaskPanel.php">Back</a></button>
            </span><br>

            <span>
                <input type="submit" name="submit" value="Create">
            </span><br>

        </form>
    </body>

</html>