<?php
header('Content-Type: application/json');
require "../connection.php";


$sqlSelect = "SELECT * FROM `lesson` WHERE lesson.auditorium = :auditorium";

$sth = $dbh->prepare($sqlSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':auditorium' => $_GET['auditorium']));


$lessons = array();
foreach ($sth as $index => $row) {
	$lessons[] = array(
		'week_day' => $row['week_day'],
		'lesson_number' => $row['lesson_number'],
		'auditorium' => $row['auditorium'],
		'disciple' => $row['disciple'],
		'type' => $row['type']
	);
}

echo json_encode($lessons);
