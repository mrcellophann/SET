<!DOCTYPE html>
<html lang="en">
<script src="./script.js"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surveys and Forms</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <!-- <script src="./script.js" defer></script> -->
     <script src="./test.js" defer></script>
</head>
<body>
    <div class="header">
        <h1>University of the Philippines</h1>
    </div>
    <div class="container">
        <div class="sidebar">
            <h3>Menu</h3>
            <ul>
      
                <li><a href="#">Student Evaluation of Teaching</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h2>Surveys and Forms</h2>
            <table>
                <thead>
                    <tr>
                        <th>Evaluate</th>
                        <th>Edit Response</th>
                        <th>Reset Response</th>
                        <th>Class Nbr</th>
                        <th>Course ID</th>
                        <th>Class Section</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Instructor</th>
                        <th>Schedule</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Database Connection
                    $host = '127.0.0.1'; // Localhost for local server
                    $user = 'root'; // Default XAMPP username
                    $pass = ''; // Default XAMPP password is empty
                    $db = 'seteval'; // Database name

                    $conn = new mysqli($host, $user, $pass, $db);

                    // Check connection
                    if ($conn->connect_error) {
                        die('Connection failed: ' . $conn->connect_error);
                    }

                    $sql = "SELECT 
                                c.course_Num,
                                c.course_ID,  
                                c.course_Title, 
                                c.class_Section, 
                                c.class_desc, 
                                c.class_sched, 
                                CONCAT(i.iFirst_Name, ' ', i.iLast_Name) AS instructor_name
                            FROM 
                                course c
                            LEFT JOIN 
                                instructor i 
                            ON 
                                c.course_ID = i.course_ID";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>
                                    <button class='evaluate-button' 
                                        onclick=\"forwardDataStorage(
                                            '{$row['course_Num']}', 
                                            '{$row['course_ID']}', 
                                            '{$row['course_Title']}', 
                                            '{$row['class_Section']}', 
                                            '{$row['class_desc']}', 
                                            '{$row['instructor_name']}', 
                                            '{$row['class_sched']}'
                                        )\">Evaluate</button>
                                </td>
                                <td>
                                    <button class='evaluate-button'>Edit</button>
                                </td>
                                <td>
                                    <button class='evaluate-button'>Reset</button>
                                </td>
                                <td>{$row['course_Num']}</td>
                                <td>{$row['course_ID']}</td>
                                <td>{$row['class_Section']}</td>
                                <td>{$row['course_Title']}</td>
                                <td>{$row['class_desc']}</td>
                                <td>{$row['instructor_name']}</td>
                                <td>{$row['class_sched']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No courses found</td></tr>";
                    }

                    $conn->close();
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>