<?php
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");
require "../connection.php";


$sqlSelect = "SELECT lesson.week_day, lesson.lesson_number, lesson.auditorium, lesson.disciple, lesson.type FROM `teacher`, `lesson_teacher`, `lesson` WHERE teacher.ID_Teacher = :teacherID AND lesson_teacher.FID_Teacher = teacher.ID_Teacher and lesson.ID_Lesson = lesson_teacher.FID_Lesson1";

$sth = $dbh->prepare($sqlSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':teacherID' => $_GET['teacher']));

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
echo '<?xml version="1.0" encoding="utf8" ?>';
echo "<root>";
 
foreach ($lessons as $value) :
	echo "
	<lessonItem>
		<weekDay>".$value['week_day']."</weekDay>
		<lessionNumber>".$value['lesson_number']."</lessionNumber>
		<auditorium>".$value['auditorium']."</auditorium>
		<disciple>".$value['disciple']."</disciple>
		<type>".$value['type']."</type>
	</lessonItem>";
endforeach;
echo "</root>";
?>
