<?php
require "connection.php";
require "inc/groups.php";
require "inc/teachers.php";
require "inc/auditories.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Первый Вариант</title>
    <script src="assets/vendors/jquery-3.5.0.min.js"></script>
    <script src="assets/js/common.js"></script>
    <style>th,td,tr{padding:10px;}</style>
</head>
<body>
    <section class="container">
        
        <!-- Первое задание -->
        <h5>Расписание произвольной группы из списка</h5>
        <form action="forms/lessons-by-student.php" class="form-group">
            <select name="group">
                <?php
                    foreach ($groups as $group) {
                        echo "<option value=\"". $group['id'] ."\">". $group['title'] ."</option>";
                    }
                ?>
            </select>
            <input type="button" value="Отправить" onclick="getRes1(this)">
        </form>
        <div id="result1"></div>
        <!--   -->


        <!--  Второе задание  -->
        <h5>Расписание произвольного преподавателя из списка.</h5>
        <form action="forms/lessons-by-teacher.php" class="form-group">
            <select name="teacher">
                <?php
                foreach ($teachers as $teacher) {
                    echo "<option value=\"". $teacher['id'] ."\">". $teacher['name'] ."</option>";
                }
                ?>
            </select>
            <input type="button" value="Отправить" onclick="getRes2(this)">
        </form>
        <table id="result2">
            <thead>
                <tr>
                    <th>День недели</th>
                    <th>Номер пары</th>
                    <th>Аудитория</th>
                    <th>Дисциплина</th>
                    <th>Тип занятия</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <!--    -->

        <!--  Третье задание  -->
        <h5>Расписание по аудитории из списка.</h5>
        <form action="forms/lessons-by-auditorium.php" class="form-group">
            <select name="auditorium">
                <?php
                foreach ($auditoriums as $auditorium) {
                    echo "<option value=\"". $auditorium ."\">". $auditorium ."</option>";
                }
                ?>
            </select>
            <input type="button" value="Отправить" onclick="getRes3(this)">
        </form>
        <table id="result3">
            <thead>
                <tr>
                    <th>День недели</th>
                    <th>Номер пары</th>
                    <th>Аудитория</th>
                    <th>Дисциплина</th>
                    <th>Тип занятия</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <!--  -->

    
        <!--  Четвертое задание  -->
        <h5>Добавление практического занятия.</h5>
        <form action="forms/add-lesson.php" class="form-group">
            <select name="group">
                <?php
                    foreach ($groups as $group) {
                        echo "<option value=\"". $group['id'] ."\">". $group['title'] ."</option>";
                    }
                ?>
            </select>
            <select name="teacher">
                <?php
                foreach ($teachers as $teacher) {
                    echo "<option value=\"". $teacher['id'] ."\">". $teacher['name'] ."</option>";
                }
                ?>
            </select>
            <input type="text" placeholder="День недели" name="week_day">
            <input type="number" placeholder="Номер пары" name="lesson_number">
            <input type="text" placeholder="Аудитория" name="auditorium">
            <input type="text" placeholder="Дисциплина" name="disciple">
            
            <input type="button" value="Отправить" onclick="getRes4(this)">
        </form>
        <!--  -->
    





    </section>
</body>
</html>