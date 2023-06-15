<?php
header("content-type: text/plain");


$conn = new mysqli("localhost", "root", "", "test_bd");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
echo "Подключение успешно установлено" . PHP_EOL;
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Задачи для решения на SELECT

$result = $conn->query("SELECT * FROM workers WHERE ID=3");
while($row = $result->fetch_assoc()) {
    print_r($row); 
}

$result = $conn->query("SELECT * FROM workers WHERE salary=1000");
while($row = $result->fetch_assoc()) {
    print_r($row); 
}

$result = $conn->query("SELECT * FROM workers WHERE age=23");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE salary>400");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE salary>=500");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE salary!=500");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE salary<=900");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE salary<=900");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT salary, age FROM workers WHERE name='вася'");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// Задачи для решения на SELECT

// На OR и AND

$result = $conn->query("SELECT * FROM workers WHERE (age>25 and age<=28)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE name='петя'");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE (name='петя' or name='вася')");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE name!='петя'");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE (age=27 or salary=1000)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE ((age>=23 and age<27) or salary = 1000)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE ((age>=23 and age<=27) or (salary >= 1000 and salary <= 1000))");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE (age=27 or salary!=400)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На OR и AND

// На INSERT
$result = $conn->query("SELECT * FROM workers WHERE name='Никита'");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO workers (name, age, salary) VALUES ('Никита', 26, 300)");
}

$result = $conn->query("SELECT * FROM workers WHERE name='Светлану'");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO workers VALUES ('Светлану', 95, 1200)");
}

$result = $conn->query("SELECT * FROM workers WHERE (name='Ярослав' or name='Петр')");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO workers (name, age, salary) VALUES ('Ярослав', 30, 1200), ('Петр', 31, 1000)");
}

// На INSERT

// На DELETE

$result = $conn->query("SELECT * FROM workers WHERE ID=7");
$row = $result->fetch_assoc();
if (!empty($row)) {
    $result = $conn->query("DELETE FROM workers WHERE ID=7");
}

$result = $conn->query("SELECT * FROM workers WHERE name='Коля'");
$row = $result->fetch_assoc();
if (!empty($row)) {
    $result = $conn->query("DELETE FROM workers WHERE name='Коля'");
}

$result = $conn->query("SELECT * FROM workers WHERE age=23");
$row = $result->fetch_assoc();
if (!empty($row)) {
    $result = $conn->query("DELETE FROM workers WHERE age=23");
}

// восстановление

$result = $conn->query("SELECT * FROM workers WHERE name='Дима'");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO workers (ID, name, age, salary) VALUES (1, 'Дима', 23, 400)");
}

$result = $conn->query("SELECT * FROM workers WHERE name='Вася'");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO workers (ID, name, age, salary) VALUES (3, 'Вася', 23, 500)");
}

$result = $conn->query("SELECT * FROM workers WHERE name='Коля'");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO workers (ID, name, age, salary) VALUES (4, 'Коля', 30, 1000)");
}

$result = $conn->query("SELECT * FROM workers WHERE name='Никита'");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO workers (ID, name, age, salary) VALUES (7, 'Никита', 26, 300)");
}

// восстановление

// На DELETE

// На UPDATE

$result = $conn->query("UPDATE workers SET salary=300 WHERE name='Вася'");
$result = $conn->query("UPDATE workers SET age=35 WHERE id=4");
$result = $conn->query("UPDATE workers SET salary=700 WHERE salary=500");
$result = $conn->query("UPDATE workers SET age=23 WHERE id>=2 and id<=5");
$result = $conn->query("UPDATE workers SET name='Женя', salary=900 WHERE name='Вася'");

// На UPDATE

// На LIMIT

$result = $conn->query("SELECT * FROM workers LIMIT 6");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers LIMIT 2, 3");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На LIMIT

// На ORDER BY

$result = $conn->query("SELECT * FROM workers ORDER BY salary");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers ORDER BY salary DESC");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers ORDER BY age LIMIT 1, 5");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На ORDER BY

// На COUNT

$result = $conn->query("SELECT COUNT(*) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT COUNT(*) FROM workers WHERE salary=300");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На COUNT

// На LIKE

// создание и заполнение таблици
$result = $conn->query("CREATE TABLE IF NOT EXISTS pages (id TINYINT PRIMARY KEY AUTO_INCREMENT UNIQUE, athor TEXT, article TEXT)");

$result = $conn->query("SELECT * FROM pages WHERE athor='Петров'");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO pages (athor, article) VALUES ('Петров', 'В своей статье рассказывает о машинах')");
}
$result = $conn->query("SELECT * FROM pages WHERE athor='Иванов'");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO pages (athor, article) VALUES ('Иванов', 'Написал статью об инфляции')");
}
$result = $conn->query("SELECT * FROM pages WHERE athor='Сидоров'");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO pages (athor, article) VALUES ('Сидоров', 'Придумал новый химический элемент')");
}
$result = $conn->query("SELECT * FROM pages WHERE athor='Осокина'");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO pages (athor, article) VALUES ('Осокина', 'Также писала о машинах')");
}
$result = $conn->query("SELECT * FROM pages WHERE athor='Ветров'");
$row = $result->fetch_assoc();
if (empty($row)) {
    $result = $conn->query("INSERT INTO pages (athor, article) VALUES ('Ветров', 'Написал статью о том, как разрабатывать элементы дизайна')");
}
// создание и заполнение таблици

$result = $conn->query("SELECT * FROM pages WHERE athor LIKE '%ов'");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM pages WHERE article LIKE '%элемент%'");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("SELECT * FROM workers WHERE age LIKE '3_'");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE name LIKE '%я'");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На LIKE

// На IN

$result = $conn->query("SELECT * FROM workers WHERE id IN (1, 2, 3, 5, 12)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("ALTER TABLE workers ADD login text"); //рождение логина

$result = $conn->query("UPDATE workers SET login='eee' WHERE name='Вася'");
$result = $conn->query("UPDATE workers SET login='bbb' WHERE name='Кирилл'");
$result = $conn->query("UPDATE workers SET login='zzz' WHERE name='Петр'");
$result = $conn->query("SELECT * FROM workers WHERE login IN ('eee', 'bbb', 'zzz')");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

$result = $conn->query("UPDATE workers SET login='user' WHERE id=3");
$result = $conn->query("UPDATE workers SET login='admin' WHERE id=6");
$result = $conn->query("UPDATE workers SET login='ivan' WHERE id=8");
$result = $conn->query("SELECT * FROM workers WHERE (id IN (1, 3, 6, 8) and login IN ('user', 'admin', 'ivan') and salary>=300)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На IN

// На BETWEEN

$result = $conn->query("SELECT * FROM workers WHERE salary BETWEEN 100 and 1000");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE (salary BETWEEN 300 and 500) and (id BETWEEN 3 and 10)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На BETWEEN

// На AS

$result = $conn->query("SELECT id as userId, login as userLogin, salary as userSalary FROM workers WHERE login!=''");
while($row = $result->fetch_assoc()) {
    print_r($row);
}


$result = $conn->query("ALTER TABLE workers DROP login"); //смерть логина
// На AS

// На DISTINCT

$result = $conn->query("SELECT DISTINCT salary FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT DISTINCT age FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На DISTINCT

// На MIN и MAX

$result = $conn->query("SELECT MIN(salary), MAX(salary) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На MIN и MAX

// На SUM

$result = $conn->query("SELECT SUM(salary) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT SUM(salary) FROM workers WHERE age>=21 and age<=25");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT SUM(salary) FROM workers WHERE id IN(1, 2, 3, 5)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На SUM

// На AVG

$result = $conn->query("SELECT AVG(salary) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT AVG(age) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На AVG

// На NOW, CURRENT_DATE, CURRENT_TIME

$result = $conn->query("UPDATE workers SET date=NOW() where name='Дима'");
$result = $conn->query("UPDATE workers SET date=NOW() where name='Дима'");
$result = $conn->query("UPDATE workers SET date=CURRENT_DATE() where name='Женя'");
$result = $conn->query("UPDATE workers SET time=CURRENT_TIME() where name='Коля'");

$result = $conn->query("SELECT date, name FROM workers WHERE date > NOW()");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На NOW, CURRENT_DATE, CURRENT_TIME

// На работу с частью даты Для решения задач данного блока вам понадобятся следующие SQL команды и функции: SECOND, MINUTE, HOUR, DAY, MONTH, YEAR, DAYOFWEEK, WEEKDAY

$result = $conn->query("SELECT * FROM workers WHERE YEAR(date)=2016");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE MONTH(date)=3");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE DAY(date)=3");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE DAY(date)=5 and MONTH(date)=4");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE DAY(date) IN (1, 3, 5, 12, 15, 19, 21, 29)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE DAYOFWEEK(date)=3");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE (DAY(date)>=1 and DAY(date)<=7) and YEAR(date)=2016");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE DAY(date)<MONTH(date)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На работу с частью даты Для решения задач данного блока вам понадобятся следующие SQL команды и функции: SECOND, MINUTE, HOUR, DAY, MONTH, YEAR, DAYOFWEEK, WEEKDAY

// На EXTRACT, DATE

$result = $conn->query("UPDATE workers SET year=EXTRACT(year from date)");
$result = $conn->query("UPDATE workers SET month=EXTRACT(month from date)");
$result = $conn->query("UPDATE workers SET day=EXTRACT(day from date)");

$result = $conn->query("UPDATE workers SET yearMonthDay=DATE(date)");

// На EXTRACT, DATE

// На DATE_FORMAT

$result = $conn->query("SELECT DATE_FORMAT(date, '%d.%m.%Y') FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT DATE_FORMAT(date, '%Y %d.%m') FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На DATE_FORMAT

// На INTERVAL, DATE_ADD, DATE_SUB

$result = $conn->query("SELECT DATE_ADD(date, INTERVAL 1 DAY) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT DATE_SUB(date, INTERVAL 1 DAY) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT DATE_ADD(date, INTERVAL '1 2' DAY_HOUR) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT DATE_ADD(date, INTERVAL '1 2' YEAR_MONTH) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT DATE_ADD(date, INTERVAL '1 2 3' DAY_MINUTE) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT DATE_ADD(date, INTERVAL '1 2 3 5' DAY_SECOND) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT DATE_ADD(date, INTERVAL '2 3 5' HOUR_SECOND) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT date + INTERVAL 1 DAY - INTERVAL 2 HOUR FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT date + INTERVAL 1 DAY - INTERVAL '2 3' HOUR_MINUTE FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На INTERVAL, DATE_ADD, DATE_SUB\

// На математические операции

$result = $conn->query("SELECT 3 as res FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT 'eee' as res FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT 3 as '3' FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT salary + age as 'res' FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT salary - age as 'res' FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT (salary + age)/2 as 'res' FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT *, DAY(date) + MONTH(date) as 'res' FROM workers WHERE (DAY(date) + MONTH(date))<10");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На математические операции

// На LEFT, RIGHT, SUBSTRING

$result = $conn->query("UPDATE workers SET description='aaaabbbbcccc'");
$result = $conn->query("SELECT LEFT(description, 5) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT RIGHT(description, 5) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT SUBSTRING(description, 2, 9) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На LEFT, RIGHT, SUBSTRING

// На UNION

$result = $conn->query("SELECT name FROM category UNION SELECT name FROM sub_category");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На UNION

// На CONCAT, CONCAT_WS

$result = $conn->query("SELECT CONCAT(salary, age) as 'res' FROM workers WHERE 1");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT CONCAT(salary, age, '!!!') as 'res' FROM workers WHERE 1");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT CONCAT_WS('-', salary, age) as 'res' FROM workers WHERE 1");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На CONCAT, CONCAT_WS

// На GROUP BY

$result = $conn->query("SELECT age, MIN(salary) FROM workers GROUP BY age ORDER BY age ASC");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT salary, MAX(age) FROM workers GROUP BY salary ORDER BY salary ASC");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На GROUP BY

// На GROUP_CONCAT

$result = $conn->query("SELECT age, GROUP_CONCAT(id SEPARATOR '-') as res FROM workers GROUP BY age");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На GROUP_CONCAT

// На подзапросы

$result = $conn->query("SELECT AVG(salary) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE (salary>(SELECT AVG(salary) FROM workers))");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT (AVG(age)/2*3) FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE (age<(SELECT (AVG(age)/2*3) FROM workers))");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE salary=(SELECT MIN(salary) FROM workers)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT * FROM workers WHERE salary=(SELECT MAX(salary) FROM workers)");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT MAX(salary) as max FROM workers WHERE age=23");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT (MAX(age) - MIN(age))/2 as avg FROM workers");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT (MAX(salary) - MIN(salary))/2 as avg FROM workers WHERE age=23");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На подзапросы

// На JOIN

$result = $conn->query("SELECT category.name as mainName, page.name, page.category_id FROM category INNER JOIN page ON page.id = category.id");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
$result = $conn->query("SELECT category.name as mainName, sub_category.name as subName, page.name, page.category_id FROM category INNER JOIN sub_category ON sub_category.id = category.id INNER JOIN page ON page.id = category.id");
while($row = $result->fetch_assoc()) {
    print_r($row);
}

// На JOIN

$conn->close();