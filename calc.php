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

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Калькулятор</title>
</head>
<body>
  <h1>Калькулятор</h1>

  <?php
  // Вывод результата перед формой
  if ($result != '') {
      echo "<p><b>$result</b></p>";
  }
  ?>

  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <label>Число 1:</label><br />
    <input type="text" name="num1" /><br /><br />

    <label>Оператор (+, -, *, /):</label><br />
    <input type="text" name="operator" size="3" /><br /><br />

    <label>Число 2:</label><br />
    <input type="text" name="num2" /><br /><br />

    <input type="submit" value="Считать" />
  </form>
</body>
</html>