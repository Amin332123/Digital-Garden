<?php session_start(); 
if (!isset($_SESSION['id'])) {
     header("Location: http://digitalgarden.test/login.php");
    exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theme Modal</title>

    <!-- NEW STYLE (DARK BLUE + GREEN THEME) -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #0b1c2d;
        }

        /* Overlay */
        .overlay-dark {
            position: fixed;
            inset: 0;
            background: rgba(5, 20, 40, 0.85);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Modal Box */
        .box-dark {
            background: #102a44;
            width: 400px;
            padding: 20px;
            border-radius: 10px;
            position: relative;
            box-shadow: 0 0 25px rgba(0,0,0,0.6);
        }

        .title-green {
            color: #7CFF9E;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Inputs */
        .group-dark,
        .group-dark-alt {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        label,
        span {
            color: #cde3ff;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .input-dark,
        .group-dark-alt input {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #1f4f6b;
            background: #0b1c2d;
            color: #ffffff;
        }

        .input-dark::placeholder {
            color: #7a9ab8;
        }

        input[type="color"] {
            border: none;
            width: 100%;
            height: 40px;
            background: transparent;
            cursor: pointer;
        }

        /* Actions */
        .actions-green {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-create {
            flex: 1;
            padding: 10px;
            background: #1fa66a;
            border: none;
            color: #ffffff;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-create:hover {
            background: #27c47e;
        }

        .btn-modify {
            flex: 1;
            padding: 10px;
            background: #0f7a4a;
            border: none;
            color: #ffffff;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-modify:hover {
            background: #14935b;
        }

        /* Close Button */
        .close-dark {
            position: absolute;
            top: 10px;
            right: 12px;
            cursor: pointer;
            color: #7CFF9E;
            font-size: 18px;
        }
    </style>
</head>

<body>

<div class="overlay-dark" id="themeModal">
    <div class="box-dark">

        <h2 class="title-green">Theme Settings</h2>

        <form action="config/database.php" method="POST" id="themeForm">

            <div class="group-dark">
                <label>Theme Name</label>
                <input type="text"
                       placeholder="Enter theme name"
                       name="themeName"
                       class="input-dark"
                       id="themename"
                       value="<?=  $_SESSION["themetitle"]?>"
                       >
            </div>

            <div class="group-dark-alt">
                <label for="maxNotes">Max Notes</label>
                <input type="number"
                      
                       name="maxNotes"
                       value="<?=  $_SESSION["thememaxNotes"] ?>"
                       >
            </div>

            <span>Background Color :</span>
            <input type="color"
                   value="<?=  $_SESSION["backgroundcolor"] ?>"
                   name="backgroundColor"
                  >

            <!-- KEPT EXACTLY -->
           

            <div class="actions-green">
                

                <input type="submit"
                       class="btn-modify"
                       name="actionformodification"
                       value="Update"
                      >
            </div>

            <div id="thememodalerror"
                 style="color:red;text-align:center;margin-top:5px;"></div>

        </form>

        

    </div>
</div>

</body>
</html>
