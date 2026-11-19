<?php
// Счётчик посещений
$visitCounter = 0;

if (isset($_COOKIE['visitCounter'])) {
    $visitCounter = (int) $_COOKIE['visitCounter'];
}

$visitCounter++;

// Последнее посещение
$lastVisit = '';

if (isset($_COOKIE['lastVisit'])) {
    $lastVisit = date('d-m-Y H:i:s', (int) $_COOKIE['lastVisit']);
}

// Куки устанавливаются только один раз в день
if (!isset($_COOKIE['lastVisit']) || date('d-m-Y', (int) $_COOKIE['lastVisit']) != date('d-m-Y')) {
    setcookie('visitCounter', $visitCounter, time() + 3600 * 24 * 365);
    setcookie('lastVisit', time(), time() + 3600 * 24 * 365);
}