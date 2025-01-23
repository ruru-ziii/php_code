<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Gaji</title>
</head>
<body>
    <h1>employee salary</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br><br>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="Men/Boy">Men/Boy</option>
            <option value="Woman/Girl">Woman/Girl</option>
        </select>
        <br><br>

        <label for="class">Class:</label>
        <select name="class" id="class" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        <br><br>

        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="Married">Married</option>
            <option value="Not Married">Not Married</option>
        </select>
        <br><br>

        <input type="submit" value="calculate salary">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // take data from form
        $class = $_POST['class'];
        $category = $_POST['category'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];

        // function to calculate salary
        function calculateSalary($class, $category) {
            // basic salary initialization
            $basicSalary = 0;

            // Determine basic salary based on class
            switch ($class) {
                case 'A':
                    $basicSalary = 5000000;
                    break;
                case 'B':
                    $basicSalary = 4500000;
                    break;
                case 'C':
                    $basicSalary = 4000000;
                    break;
                default:
                    return "Invalid class.";
            }

            // initialization of allowance
            $allowance = 0;

            // determine allowances based on category
            if ($category == 'Married') {
                $allowance = 500000;
            } elseif ($category == 'Not Married') {
                $allowance = 250000;
            } else {
                return "Status tidak valid.";
            }

            // calculate total salary
            $totalSalary = $basicSalary + $allowance;

            return $totalSalary;
        }

        // calculate total salary
        $totalSalary = calculateSalary($class, $category);

        // display results
        if (is_numeric($totalSalary)) {
            echo "<h2>Name: $name</h2>";
            echo "<h2>Gender: $gender</h2>";
            echo "<h2>Class: $class</h2>";
            echo "<h2>Category: $category</h2>";
            echo "<h2>Total salary received: Rp " . number_format($totalSalary, 0, ',', '.') . "</h2>";
        
        } else {
            echo "<h2>" . $totalSalary . "</h2>"; // display error message if any
        }
    }
    ?>
</body>
</html>