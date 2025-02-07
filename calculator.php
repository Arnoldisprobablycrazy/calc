<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" action="">
        <div id="calculator">
            <!-- Display the expression above the result -->
            <input type="text" id="expression" name="expression" readonly>
            <input type="text" id="display" name="display" >

            <div id="key">
                <button type="button" onclick="clearDisplay()" class="custom-btn">C</button>
                <button type="button" onclick="appendToDisplay('(')" class="custom-btn">(</button>
                <button type="button" onclick="appendToDisplay(')')" class="custom-btn">)</button>
                <button type="button" onclick="appendToDisplay('/')" class="custom-btn">/</button>

                <button type="button" onclick="appendToDisplay('%')" class="custom-btn">%</button>
                <button type="button" onclick="appendToDisplay('log(')" class="custom-btn">log</button>
                <button type="button" onclick="appendToDisplay('√')" class="custom-btn">√</button>
                <button type="button" onclick="appendToDisplay('^')" class="custom-btn">EXP</button>

                <button type="button" onclick="appendToDisplay('7')">7</button>
                <button type="button" onclick="appendToDisplay('8')">8</button>
                <button type="button" onclick="appendToDisplay('9')">9</button>
                <button type="button" onclick="appendToDisplay('*')" class="custom-btn">X</button>

                <button type="button" onclick="appendToDisplay('4')">4</button>
                <button type="button" onclick="appendToDisplay('5')">5</button>
                <button type="button" onclick="appendToDisplay('6')">6</button>
                <button type="button" onclick="appendToDisplay('-')" class="custom-btn">-</button>

                <button type="button" onclick="appendToDisplay('1')">1</button>
                <button type="button" onclick="appendToDisplay('2')">2</button>
                <button type="button" onclick="appendToDisplay('3')">3</button>
                <button type="button" onclick="appendToDisplay('+')" class="custom-btn">+</button>

                <button type="button" onclick="appendToDisplay('0')">0</button>
                <button type="button" onclick="appendToDisplay('.')">.</button>
                <button type="submit" class="custom-btn">=</button>
                <button type="button" onclick="deleteLast()" class="custom-btn">del</button>
            </div>
        </div>
    </form>
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expression = $_POST['display'] ?? '';

    // Ensure the expression is safe to evaluate
    $safeExpression = preg_replace('/[^0-9+\-*\/().%√log^]/', '', $expression);

    // Validate the expression
    $isValid = preg_match('/^[0-9√log\(\)\.%+\-\*\/\^]+$/', $safeExpression) &&
        !preg_match('/[+\-\*\/%\^]{2,}/', $safeExpression) &&
        preg_match('/[0-9\)√]$/', $safeExpression);

    if ($isValid) {
        try {
            // Replace 'x' with '*' for multiplication
            $safeExpression = str_replace('x', '*', $safeExpression);

            // Handle square root (√)
            // Replace √(...) with sqrt(...)
            $safeExpression = preg_replace('/√\(([^)]+)\)/', 'sqrt($1)', $safeExpression);
            // Replace √number with sqrt(number)
            $safeExpression = preg_replace('/√(\d+)/', 'sqrt($1)', $safeExpression);

            // Handle logarithm (log)
            $safeExpression = str_replace('log(', 'log10(', $safeExpression); // Replace log(...) with log10(...)

            // Handle exponentiation (^)
            $safeExpression = preg_replace('/(\d+)\^(\d+)/', 'pow($1,$2)', $safeExpression);

            // Safely evaluate the expression
            $result = eval('return ' . $safeExpression . ';');
        } catch (Throwable $e) {
            $result = 'Error: Invalid Expression';
        }
    } else {
        $result = 'Invalid Input';
    }

    // Output the result and update the display
    echo "<script>
            document.getElementById('display').value = '$result';
            document.getElementById('expression').value = '$expression';
          </script>";
}
?>

    
<script src="scrpt.js">

</script>

</body>

</html>
