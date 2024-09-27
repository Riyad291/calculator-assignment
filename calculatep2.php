
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Fetch the inputs

    $input1 = $_POST['input1'];
    $operator1 = $_POST['operator1'];
    $input2 = $_POST['input2'];
    $operator2 = $_POST['operator2'];
    $input3 = $_POST['input3'];

    // Validate inputs 

    if (!is_numeric($input1) || !is_numeric($input2) || !is_numeric($input3)) {
        echo "ERROR: Invalid input. All inputs must be numbers.";
        exit();
    }

    // Convert inputs to float for calculation

    $input1 = floatval($input1);
    $input2 = floatval($input2);
    $input3 = floatval($input3);

   

    if ($operator1 == '*' || $operator1 == '/') {
        if ($operator1 == '*') {
            $result = $input1 * $input2;
        } elseif ($input2 != 0) {
            $result = $input1 / $input2;
        } else {
            echo "ERROR: Division by zero.";
            exit();
        }
        
        if ($operator2 == '+') {
            $result += $input3;
        } elseif ($operator2 == '-') {
            $result -= $input3;
        }
    } else {

        if ($operator2 == '*' || $operator2 == '/') {
            if ($operator2 == '*') {
                $result = $input2 * $input3;
            } elseif ($input3 != 0) {
                $result = $input2 / $input3;
            } else {
                echo "ERROR: Division by zero.";
                exit();
            }

            if ($operator1 == '+') {
                $result = $input1 + $result;
            } elseif ($operator1 == '-') {
                $result = $input1 - $result;
            }
        } else {
            if ($operator1 == '+') {
                $result = $input1 + $input2;
            } elseif ($operator1 == '-') {
                $result = $input1 - $input2;
            }

            if ($operator2 == '+') {
                $result += $input3;
            } elseif ($operator2 == '-') {
                $result -= $input3;
            }
        }
    }

    // Print the result
    echo "Result: " . $result;
}
?>
