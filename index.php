<?php
/////////////////////////////////////////////////////
// EchoFunction

function echoSyntax($input){
    echo $input;
    return "<div class='text-warning'> {$input} </div>";
}

/////////////////////////////////////////////////////
// CreateFolder

if (isset($_POST['create-folder'])) {
    if(!file_exists($_POST['folder-name']) & !empty($_POST['folder-name'])) {
        mkdir($_POST['folder-name']);
        echoSyntax("the folder created");
    }elseif(file_exists($_POST['folder-name'])) {
        echoSyntax("the folder already exist");
    }elseif(empty($_POST['folder-name'])) {
        echoSyntax("Please insert the folder name");   
    }
}

/////////////////////////////////////////////////////
// CreateFolder

function createFile()
{
    if ($_POST['file-type'] == 'php') {
        file_put_contents($_POST['folder-thisFile-name'] . DIRECTORY_SEPARATOR . $_POST['file-name'] . '.php', '<?php ' .
            $_POST['file-content'] . ' ?>');
        echoSyntax("The file created");

    } elseif($_POST['file-type'] == 'txt') {
        file_put_contents($_POST['folder-thisFile-name'] . DIRECTORY_SEPARATOR . $_POST['file-name'] . '.txt', $_POST['file-content']);
        echoSyntax("The file created");

    } elseif($_POST['file-type'] == 'json') {
        file_put_contents($_POST['folder-thisFile-name'] . DIRECTORY_SEPARATOR . $_POST['file-name'] . '.json', $_POST['file-content']);
        echoSyntax("The file created");

    } elseif(empty($_POST['file-type'])) {
        echoSyntax("Please choose the file type ");
    }
}

if(isset($_POST['create-file'])){
    if (!empty($_POST['file-type']) & !empty($_POST['folder-thisFile-name'])) {
        if(file_exists($_POST['folder-thisFile-name'])) {
            createFile();
        }elseif(!file_exists($_POST['folder-thisFile-name'])) {
            mkdir($_POST['folder-thisFile-name']);
            createFile();
        }
    }elseif(empty($_POST['file-type']) || empty($_POST['folder-thisFile-name'])) {
        echoSyntax("Please insert the folder name & folder type  & file name");
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="bg-dark text-light" style="
    background-image: url('94fb9e94f0db7e3d429df2d9c64527d2.jpg');
    background-color: #cccccc;
    background-size: cover;
    ">
    <div class="container py-5 " style="width:70%">
        <form class="border border-info rounded" style="background-color:rgb(0,0,0);" method="POST">
            <h5 style="text-align:center;">CREATE FOLDER</h5>
            <div class="row flex ">

                <div class="col-12 p-5">
                    <label for="exampleFormControlInput0" class="text-info" style="font-weight: bold;">Create Folder
                        :</label></br>
                    <input name="folder-name" type="text" class="mx-3" id="exampleFormControlInput0"></br>
                    <button name="create-folder" class="btn btn-primary m-3 ">Create Folder</button>

                </div>
            </div>
        </form>
        <form class="border border-info rounded" style="background-color:rgb(0,0,0);" method="POST">
            <h5 style="text-align:center;">CREATE FILE</h5>
            <div class="row flex ">
                <div class="col-4 p-5">
                    <label for="exampleFormControlInput0" class="text-info" style="font-weight: bold;">Folder Name
                        :</label>

                    <input name="folder-thisFile-name" type="text" class="mx-3" id="exampleFormControlInput0">

                    <label for="exampleFormControlInput0" class="text-info" style="font-weight: bold;">File Name
                        :</label>
                    <input name="file-name" type="text" class="mx-3" id="exampleFormControlInput0">

                    <button name="create-file" class="btn btn-primary m-3">Create File</button>

                </div>
                <div class="col-4 p-5">
                    <p class="text-info" style="font-weight: bold;">Choose the type of file :</p>
                    <div class="mx-3">
                        <input type="radio" id="php" name="file-type" value="php">
                        <label for="php">PHP</label><br>
                        <input type="radio" id="txt" name="file-type" value="txt">
                        <label for="txt">TEXT</label><br>
                        <input type="radio" id="json" name="file-type" value="json">
                        <label for="json">JSON</label>
                    </div>
                </div>
                <div class="col-4 p-5">
                    <label for="exampleFormControlTextarea1" class="text-info" style="font-weight: bold;">The Content of
                        file</label>
                    <textarea name="file-content" class="mx-3" id="exampleFormControlTextarea1" rows="4" cols="20"></textarea>
                </div>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh3U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>