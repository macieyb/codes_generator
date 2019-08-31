<?php
?>
<!doctype html>
<html lang="en">
<head>
    <title>Generate Codes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .btn-dl {
            background-color: #36c732;
            border: none;
            color: white;
            padding: 12px 30px;
            cursor: pointer;
            font-size: 20px;
        }

        .btn-dl:hover {
            background-color: #2ea629;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col-6 text-center pb-4 pt-4">
            <h4>Generate your codes!</h4>
        </div>
        <div class="col">
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
        <div class="col-4 text-center">
            <form id="codes-form" method="post" enctype="multipart/form-data" action="generateCodes.php" role="form">
                <div class="form-group">
                    <label for="codesQty">Codes quantity</label>
                    <input type="number" name="codesQty" class="form-control" id="codesQty" min="1" max="1000000"
                           aria-describedby="codesQtyHelp" required>
                    <small id="codesQtyHelp" class="form-text text-muted">Please enter how many codes do you want to
                        generate (1-1000000)</small>
                </div>
                <div class="form-group">
                    <label for="codeLength">Code length</label>
                    <input type="number" name="codesLength" class="form-control" id="codeLength" min="8" max="30"
                           aria-describedby="codeLength" required>
                    <small id="codeLength" class="form-text text-muted">Please enter how long your codes should be
                        (8-30 characters)</small>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Generate codes">
            </form>
        </div>
        <div class="col">
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
        <div class="col-6 text-center pt-5">
            <?php

            if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['filepath'])) {
                echo "<a href='{$_GET['filepath']}' download='generated_codes'>
                         <button class='btn btn-dl'><i class='fa fa-download'></i> Download codes!</button>
                      </a>";
            } else {
                echo "<p>Create some codes! :)</p>";
            }

            ?>
        </div>
        <div class="col">
        </div>
    </div>
</div>
</body>
</html>