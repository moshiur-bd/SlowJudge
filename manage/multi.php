<!doctype html>
<html>
    <head>
        <title>Test</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="my_file[]" multiple>
            <input type="submit" value="Upload">
        </form>
        <?php
            if (isset($_FILES['my_file'])) {
                $myFile = $_FILES['my_file'];
                $fileCount = count($myFile["name"]);

                for ($i = 0; $i < $fileCount; $i++) {
                    ?>
                        <p>File #<?= $i+1 ?>:</p>
                        <p>
                            Name: <?= $myFile["name"][$i] ?><br>
                            Temporary file: <?= $myFile["tmp_name"][$i] ?><br>
                            Type: <?= $myFile["type"][$i] ?><br>
                            Size: <?= $myFile["size"][$i] ?><br>
                            Error: <?= $myFile["error"][$i] ?><br>
                        </p>
                    <?php
                }
            }
        ?>
    </body>
</html>