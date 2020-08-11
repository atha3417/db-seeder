<?php

session_start();
if (isset($_SESSION['status']) && isset($_SESSION['amount'])) {
    if ($_SESSION['status'] == 'success') {
        echo "<script>alert('Successfully added " . $_SESSION['amount'] . " records to the database!');</script>";
        unset($_SESSION['amount']);
        unset($_SESSION['status']);
    } else {
        echo "<script>alert('Failed added " . $_SESSION['amount'] . " records to the database!');</script>";
        unset($_SESSION['amount']);
        unset($_SESSION['status']);
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Database Seeder</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <h1 class="text-center">Database Seeder With Faker</h1>
                <form action="src/system.php" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <?php if (!isset($_SESSION['db_config'])) : ?>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" autocomplete="off" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" name="password" id="password" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="database">Database</label>
                                    <input type="text" name="database" id="database" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="table">Table</label>
                                    <input type="text" name="table" id="table" class="form-control" autocomplete="off">
                                <?php endif; ?>
                                </div>
                        </div>
                        <div class="col-6 <?= isset($_SESSION['db_config']) ? 'offset-3' : null; ?>">
                            <div class="form-group">
                                <label for="column">Column</label>
                                <input type="text" name="column" id="column" class="form-control" autocomplete="off">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="number" name="amount" id="amount" class="form-control" min="1" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="locale">Locale</label>
                                        <input type="text" name="locale" id="locale" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="option">Option</label>
                                <input type="text" name="option" id="option" class="form-control" autocomplete="off">
                            </div>
                            <div class="mt-5">
                                <a href="src/options.php" target="_blank">See Available Options</a>
                                <div class="form-group float-right">
                                    <button type="submit" name="reset" class="btn btn-danger" onclick="return confirm('Are you sure want to reset the configuraion?');">Reset</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>