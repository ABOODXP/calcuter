<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            padding: 200px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-top: 0;
            color: #333;
            font-size: 70px;
        }
        form {
            text-align: center;
            font-size: 40px;
        }
        input[type="number"] {
            width: 80%;
            padding: 40px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 30px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 50%;
            padding: 40px;
            border: none;
            border-radius: 5px;
            background-color: #4caf50;
            color: #fff;
            font-size: 40px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            text-align: center;
        }
        .result p {
            margin: 5px 0;
            font-size: 40px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Not sınav Calculator</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Vize Not: <br>
            <input type="number" name="midterm" min="0" max="100" required><br><br>
            Final Not: <br>
            <input type="number" name="final" min="0" max="100" required><br><br>
            <input type="submit" name="submit" value="Calculate">
        </form>

        <?php
        // Function to calculate the letter grade
        function calculateGrade($average) {
            if ($average >= 90) {
                return 'AA';
            } elseif ($average >= 80) {
                return 'BA';
            } elseif ($average >= 70) {
                return 'CB';
            } elseif ($average >= 60) {
                return 'DD';
            } else {
                return 'FF';
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $midterm = $_POST['midterm'];
            $final = $_POST['final'];

            // Calculate average
            $average = ($midterm + $final) / 2;

            // Output the average
            echo "<div class='result'>";
            echo "<p>Ortalama: $average</p>";

            // Convert average to letter grade
            $letterGrade = calculateGrade($average);
            echo "<p>Harf: $letterGrade</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>