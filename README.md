# Calculator Project
A simple web-based calculator built using HTML, CSS, JavaScript, and PHP. This calculator supports basic arithmetic operations,
logarithms, square roots, exponents, and more.

# Features
Basic Operations: Addition (+), subtraction (-), multiplication (*), and division (/).

Advanced Operations:**Square root (√).
  Logarithm (log).
  Exponentiation (^).

**Parentheses Support**: Allows grouping of operations using ( and ).

**Percentage Calculation**: Supports percentage (%) operations.

**Clear and Delete**: Clear the entire display (C) or delete the last character (del).

**Responsive Design:** Works on both desktop and mobile devices.

**How to Use**
# Entering Numbers and Operators:
Click the buttons to input numbers and operators.
Use parentheses ( and ) to group operations.
Use √ for square roots and log for logarithms.

# Performing Calculations:
Click the = button to evaluate the expression.

# Clearing the Display:
Use the C button to clear the entire display.
Use the del button to delete the last character.

# Keyboard Support:
You can also use your keyboard to input numbers and operators.

# Code Structure
HTML
 The calculator interface is built using HTML forms and buttons.
 Form method (POST) implemented.

Two input fields are used:
   expression: Displays the current expression.
   display: Shows the result of the calculation.

CSS
  Styling is applied using style.css to create a clean and user-friendly interface.
  Buttons are styled with a consistent design, and special buttons (e.g., C, del, operators) are highlighted.
  Flex is implemented to align the body to the center of page.
  CSS grid has been implemented for the keys(buttons).four rows.
  

JavaScript
   Handles button clicks and updates the display.
     - implemented a function to append to display the operator and operand in the event of a click.
   Functions implemented to clear display and also delete the last expression entered in the display.  
   Prevents invalid inputs (e.g., consecutive operators).   

PHP
Processes the expression when the form is submitted.
Post metod excutes the input values/expressions in the display.
Safely evaluates the expression using eval() after sanitizing and validating the input.
Handles advanced operations like square roots, logarithms, and exponents.

<img width="451" alt="image" src="https://github.com/user-attachments/assets/02ce040d-c4a9-4675-aebc-13beedf93e40" />


# Installation
Clone the repository:
Copy
git clone https://github.com/Arnoldisprobablycrazy/calc.git
Navigate to the project directory:

Copy
cd calculator
Set up a local server (e.g., using XAMPP, or PHP's built-in server):

Copy
php -S localhost:8000
Open your browser and visit:
Copy
http://localhost:8000
# Example Usage
Basic Calculation:
Input: 2 + 3 * 4
Result: 14

Square Root:
Input: √(16)
Result: 4

Logarithm:
Input: log(100)
Result: 2

Exponentiation:
Input: 2^3
Result: 8

Percentage:
Input: 50% * 200
Result: 100

# License
This project is licensed under the MIT License. See the LICENSE file for details.

# Acknowledgments
Built with HTML, CSS, JavaScript, and PHP.




