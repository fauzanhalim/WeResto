<?php include("functions.php") ?>

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
            margin: 10% auto;
            padding: 30px;
            background: #0f77df;
        }

        form input {
            width: 100%;
            height: 50px;
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>

<body class="bg-white">

    <div class="wrapper">
        <center>
            <p>
            <h1>WeRestoAPP</h1>
            </p>
            <div class="card bg-white mt-4" style="width: 45%;">
                <div class=" card-body">
                    <?php
                    if (isset($_GET["error"])) {
                        $error = $_GET["error"];
                        if ($error == 1) {
                            showError("Username atau Password tidak sesuai.");
                        } else
                            if ($error == 2) {
                            showError("Error database. Silahkan hubungi administrator!");
                        } else
                            if ($error == 3) {
                            showError("Koneksi ke Database gagal. Autentikasi gagal.");
                        } else
                            if ($error == 4) {
                            showError("Silahkan login terlebih dahulu!");
                        } else
                            showError("Error tidak diketahui!");
                    }

                    ?>
                    <div class="mt-3">
                        <form action="view/login/login.php" method="post">
                            <table class="table table-borderless">
                                <tr>
                                    <td>
                                        <input type="text" name="userid" class="form-control" placeholder="Input ID">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="password" name="pass" class="form-control" placeholder="Passoword">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><input type="submit" name="TblLogin" value="Login" class="btn btn-success"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </div>
</body>

</html>