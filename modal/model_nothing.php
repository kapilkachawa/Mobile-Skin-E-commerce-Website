<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="all CSS/lolcss.css">
    <!-- <link rel="stylesheet" href="cc.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d871e58d52.js" crossorigin="anonymous"></script>
    <style>
        .model_container {
            width: 100%;
            display: grid;
            place-items: center;
            padding: 2rem 0 2rem 0;
            justify-content: space-around;
        }

        #heading{
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: gray;
        }
        .photo {
            height: 310px;
            width: auto;
            transition: 0.5s ease;
        }

        .photo:hover {
            transform: scale(1.1);
        }

        .name {
            font-size: 17px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 14px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: gray;
        }

        .modelsss {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            width: 100%;
            padding: 0 4rem 0 4rem;
        }

        .modelss {
            padding: 2rem 0 0 0;
        }

        .model {
            border: 1px solid rgb(222, 222, 222);
        }

        .model:hover {
            background: rgb(244, 244, 244);

        }

        /* -----------------------------------------media--------------------------------------------------- */

        @media only screen and (max-width:992px) {
            .photo {
                height: 200px;
                width: auto;
                transition: 0.5s ease;
            }

            .modelsss {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                width: 100%;
                padding: 0 2rem 0 2rem;
            }

            .name {
                font-size: 12.5px;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                margin-top: 14px;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                color: gray;
            }
        }

        @media only screen and (max-width:467px) {
            .photo {
                height: 150px;
                width: auto;
                transition: 0.5s ease;
            }

            .modelsss {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                width: 100%;
                padding: 0 2rem 0 2rem;
            }

            .name {
                font-size: 12px;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                margin-top: 14px;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                color: gray;
            }
        }

        @media only screen and (max-width:367px) {
            .photo {
                height: 130px;
                width: auto;
                transition: 0.5s ease;
            }

            .modelsss {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                width: 100%;
                padding: 0 2rem 0 2rem;
            }

            .name {
                font-size: 11.5px;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                margin-top: 14px;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                color: gray;
            }
        }

        @media only screen and (max-width:327px) {
            .photo {
                height: 120px;
                width: auto;
                transition: 0.5s ease;
            }

            .modelsss {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                width: 100%;
                padding: 0 1rem 0 1rem;
            }

            .name {
                font-size: 10px;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                margin-top: 14px;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                color: gray;
            }
        }
    </style>
</head>

<body>
    <?php include ('nav.php');?>
    <!-- --------------------------------------------model------------------------------------------------------------ -->

    <div class="model_container">
        <h2 id="heading">Select your model</h2>
        <div class="modelsss">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bhavani";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, model_name, image_path FROM model_nothing";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="modelss">
                            <div class="model"><a href="#"><img src="' . $row["image_path"] . '" class="photo"></a></div>
                            <h3 class="name">' . $row["model_name"] . '</h3>
                          </div>';
                }
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
    </div>


    <!-- ---------------------------------------------footer--------------------------------------------------- -->
    <?php include ('footer.php');?>


    <script src="all js/loljs.js"></script>
</body>

</html>