<?php
$logFile = 'log/' . PATH_LOG;

// Проверяем, существует ли файл журнала
if (file_exists($logFile)) {

    // Получаем всё содержимое файла в виде массива строк
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    echo '<ol>';
    foreach ($lines as $line) {
        list($dt, $page, $ref) = explode('|', $line);
        $date = date('d-m-Y H:i:s', (int) $dt);
        echo '<li>' . $date . ' - ' . htmlspecialchars($page)
           . ' -&gt; ' . htmlspecialchars($ref) . '</li>';
    }
    echo '</ol>';

} else {
    echo '<p>Журнал посещений пока пуст</p>';
}
