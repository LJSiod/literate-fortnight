<?php
date_default_timezone_set('Asia/Manila');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentdate = date("Ymd_His");
    $file = $_FILES["file"];
    $file_name = $file["name"];
    $file_tmp_name = $file["tmp_name"];
    $file_size = $file["size"];
    $file_error = $file["error"];
    $file_type = $file["type"];
    $file_ext = explode(".", $file_name);
    $file_ext = strtolower(end($file_ext));

    if ($file_error === 0) {
        $file_new_name = $currentdate . "." . $file_ext;
        $file_destination = "upload/" . $file_new_name;
        move_uploaded_file($file_tmp_name, $file_destination);
        echo "File uploaded successfully: " . $file_destination;
    } else {
        echo "Error uploading file: " . $file_error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="styles.css" rel="stylesheet">
    <title>Backup Trigger</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Fira Sans', sans-serif;
            background-color:rgb(211, 211, 211);
        }

        .br-pagebody {
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
            max-width: 900px;
        }

        .br-section-wrapper {
            background-color: #fff;
            padding: 20px;
            margin-left: 0px;
            margin-right: 0px;
            box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.21);
        }

    </style>
</head>
<body>
    <div class="br-pagebody">
        <div class="row">
            <div class="col-md-12">
                <div class="br-section-wrapper">
                    <h6 class="br-section-label">Upload File</h6>
                    <input class="form-control" type="file" name="file" id="file"><br>
                    <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>