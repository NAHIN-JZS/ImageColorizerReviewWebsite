<?php
// $uploads_dir = "generated_images/";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "image_colorizer";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// ini_set('max_file_uploads', 300);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="styles/css/main.css">

</head>

<body>
    <div class="row">
    <div class="feature">
        <div class="feature-image">
            <a href="admin_page.php" class="btn btn-black">Back To Admin</a>
            <button class="menu_toggle">
                <svg height="6" width="20" xmlns="http://www.w3.org/2000/svg" class="open">
                    <g fill-rule="evenodd">
                        <path d="M0 0h20v1H0zM0 5h20v1H0z"></path>
                    </g>
                </svg>
                <svg height="15" width="16" xmlns="http://www.w3.org/2000/svg" class="close">
                    <path d="M14.718.075l.707.707L8.707 7.5l6.718 6.718-.707.707L8 8.207l-6.718 6.718-.707-.707L7.293 7.5.575.782l.707-.707L8 6.793 14.718.075z" fill-rule="evenodd"></path>
                </svg>
            </button>

        </div>
    </div>

    <div class="feature">
        <div class="feature-image">
            <a href="summarize_user_info.php" class="btn btn-black">Summarize</a>
            <button class="menu_toggle" >
                <svg height="6" width="20" xmlns="http://www.w3.org/2000/svg" class="open">
                    <g fill-rule="evenodd">
                        <path d="M0 0h20v1H0zM0 5h20v1H0z"></path>
                    </g>
                </svg>
                <svg height="15" width="16" xmlns="http://www.w3.org/2000/svg" class="close">
                    <path d="M14.718.075l.707.707L8.707 7.5l6.718 6.718-.707.707L8 8.207l-6.718 6.718-.707-.707L7.293 7.5.575.782l.707-.707L8 6.793 14.718.075z" fill-rule="evenodd"></path>
                </svg>
            </button>

        </div>
    </div>

    </div>

    <?php
    $sql_user_search = "SELECT * FROM `user_info`;";
    // $sql_user_info_count = "SELECT `user_info`.`age`, `user_info`.`cp`, COUNT(*) as cout FROM `user_info` GROUP BY `user_info`.`age`, `user_info`.`cp`;";

    // $new_data = mysqli_query($conn, $sql_image_search);
    if ($new_data = mysqli_query($conn, $sql_user_search)) {
      
        echo "    <style>";
        echo "    table {";
        echo "      border-collapse: collapse;";
        echo "      margin: 0 auto;";
        echo "    }";
        echo "    th, td {";
        echo "      padding: 10px;";
        echo "      border: 1px solid black;";
        echo "      text-align: center;";
        echo "    }";
        echo "  </style>";

        echo "<table>";
        echo "<thead>";
        echo "  <tr>";
        echo "    <th>ID</th>";
        echo "    <th>Cookie ID</th>";
        echo "    <th>Age Range</th>";
        echo "    <th>Comouter Proficiency</th>";
        echo "  </tr>";
        echo "</thead>";
        echo "<tbody>";


        // Loop over data and generate table rows
        foreach ($new_data as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value['uid'] . '</td>';
            echo '<td>' . $value['cookie_id'] . '</td>';
            echo '<td>' . $value['age'] . '</td>';
            echo '<td>' . $value['cp'] . '</td>';
            // echo '<td>' . $value['path'] . '</td>';
            echo '</tr>';
        }

        echo "</tbody>";
        echo "</table>";

        mysqli_close($conn);


        // //   }
        //   else {
        //     echo "404 Not Found!!! <br> Check File name <br>";
        //   }
    }
    ?>


</body>

</html>