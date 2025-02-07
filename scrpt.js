function appendToDisplay(value) {
    const display = document.getElementById("display");
    const expression = document.getElementById("expression");

    const lastChar = display.value.slice(-1);

    // Handle parentheses auto-completion
    if (value === '(') {
        if (/[\d)]/.test(lastChar)) {
            display.value += '*'; // Insert multiplication operator if needed
        }
        display.value += value + ')'; // Add opening and closing parentheses
        expression.value = display.value;

        // Move the cursor inside the parentheses
        const cursorPos = display.value.length - 1;
        setTimeout(() => {
            display.setSelectionRange(cursorPos, cursorPos);
        }, 0);
        return;
    }

    // Automatically add parentheses after √
    if (value === '√') {
        display.value += '√'; // Add √ and opening parenthesis
        expression.value = display.value;

        // Move the cursor inside the parentheses
        const cursorPos = display.value.length;
        setTimeout(() => {
            display.setSelectionRange(cursorPos, cursorPos);
        }, 0);
        return;
    }

    // Prevent consecutive operators
    if (['+', '-', '*', '/', '%', '^'].includes(lastChar) && ['+', '-', '*', '/', '%', '^'].includes(value)) {
        return; // Ignore invalid input
    }

    // Prevent starting with operators (except √ or log)
    if (display.value === '' && ['+', '-', '*', '/', '%', '^'].includes(value)) {
        return; // Ignore invalid input
    }

    // Append the value to the display
    display.value += value;
    expression.value = display.value;
}

function clearDisplay() {
    const display = document.getElementById("display");
    const expression = document.getElementById("expression");
    display.value = '';
    expression.value = '';
}

function deleteLast() {
    const display = document.getElementById("display");
    const expression = document.getElementById("expression");

    display.value = display.value.slice(0, -1);
    expression.value = display.value;
}