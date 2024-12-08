<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surveys and Forms</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <script src="./test.js" defer></script>
</head>
<body>
    <div class="header"> SET Questionnaire Page </div>

    <div class="information">
        <div class="course_Num">
            <div class="label"><strong>Class Number: </strong> <span class="info"></span></div>
        </div>
        <div class="course_ID">
            <div class="label"><strong>Course ID: </strong> <span class="info"></span></div>
        </div>
        <div class="course_Title">
            <div class="label"><strong>Subject:</strong> <span class="info"></span></div>
        </div>
        <div class="class_desc">
            <div class="label"><strong>Description:</strong> <span class="info"></span></div>
        </div>
        <div class="instructor_name">
            <div class="label"><strong>Instructor: </strong> <span class="info"></span></div>
        </div>
    </div>

    <div id="page-content">
        <div class="instructions">
            <p><strong>STUDENT EVALUATION FOR TEACHING EFFECTIVENESS</strong></p>
            <p>
                <strong>INSTRUCTIONS FOR THE STUDENT</strong>: The Student Evaluation for Teaching Effectiveness (SET U.P.) is a useful source
                of information for assisting faculty in improving how they teach their courses. It describes teaching behaviors
                from the point of view of students. Your sincere and honest feedback is very much appreciated. Your responses
                will be anonymous and will not be linked to you as an individual.
            </p>
            <p>
                Please read the following items carefully and rate the teaching effectiveness for this class according to the
                rating scale below:
            </p>
            <p>
                1 = Almost never, 2 = Rarely, 3 = Sometimes, 4 = Frequently, 5 = Almost always, N/A = Not applicable
            </p>
        </div>

        <!-- The form now has the correct ID evalForm -->
        <form action = "connect.php" method = "post">
            <table>
                <thead>
                    <tr>
                        <th class="question">In this class, the teacher:</th>
                        <th>1</th>      
                        <th>2</th>      
                        <th>3</th>      
                        <th>4</th>      
                        <th>5</th>      
                        <th>N/A</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'seteval'); // Adjust credentials if necessary

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $sql = "SELECT * FROM questionnaire"; 
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td class="question">' . $row["questions"] . '</td>';
                            for ($j = 1; $j <= 5; $j++) {
                                echo '<td><input type="radio" name="responses[' . $i . ']" value="' . $j . '"></td>';
                            }
                            echo '<td><input type="radio" name="responses[' . $i . ']" value="N/A"></td>';
                            echo '</tr>';
                            $i++;
                        }
                    } else {
                        echo "<tr><td colspan='7'>No questions available.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>

            <!-- Open-ended Questions -->
            <div style="margin-top: 20px; font-weight: bold;">Please also answer the following questions:</div>
            <div>
                <p>1. In relation to your learning experience <strong>in this class</strong>, what does your teacher do that you find very helpful/effective?</p>
                <textarea name="comments[open1]" rows="6" cols="90"></textarea>
            </div>
            <div> 
                <p>2. How do you think can the teaching in this class be improved to enhance your learning experience?</p>
                <textarea name="comments[open2]" rows="6" cols="90"></textarea>
            </div>
        <div class="button-container">
            <button type="submit">SUBMIT</button>
            <button type="button" onclick="window.location.href='index.php'">CANCEL</button>
        </div>
        <p style="text-align: center; margin-top: 20px;">Thank you very much!</p>
    </form>
</div>
</body>
</html>