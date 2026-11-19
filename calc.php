<?php
$result = '';

// Проверяем, что данные пришли методом POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Проверяем, что все поля пришли и не пустые
    if (isset($_POST['num1'], $_POST['num2'], $_POST['operator'])
        && trim($_POST['num1']) !== ''
        && trim($_POST['num2']) !== ''
        && trim($_POST['operator']) !== '') {

        // Фильтруем данные
        $num1 = (int) trim($_POST['num1']);
        $num2 = (int) trim($_POST['num2']);
        $operator = trim(strip_tags($_POST['operator']));

                switch ($operator) {
            case '+':
                $result = "Результат: $num1 + $num2 = " . ($num1 + $num2);
                break;
            case '-':
                $result = "Результат: $num1 - $num2 = " . ($num1 - $num2);
                break;
            case '*':
                $result = "Результат: $num1 * $num2 = " . ($num1 * $num2);
                break;
            case '/':
                if ($num2 == 0) {
                    $result = 'Ошибка: на ноль делить нельзя!';
                } else {
                    $result = "Результат: $num1 / $num2 = " . ($num1 / $num2);
                }
                break;
            default:
                $result = 'Ошибка: неизвестный оператор "' . htmlspecialchars($operator)
                        . '". Используйте только +, -, * или /';
        }

    } else {
        $result = 'Ошибка: заполните все поля формы!';
    }
}