<?php
$title = "Лабораторна робота №7";
require '../components/header.php';
?>
<h2>Завдання 3</h2>
<?php
class Student
{
   public $name;
   public $surname;
   public $group;

   public function __construct($name = '', $surname = '', $group = '')
   {
      $this->name = $name;
      $this->surname = $surname;
      $this->group = $group;
   }

   public function getInfo()
   {
      echo "Ім'я: {$this->name}, Прізвище: {$this->surname}, Група: {$this->group}<br>";
   }
}

$student1 = new Student('Микола', 'Шевченко', 'Група ІП-71');
$student2 = new Student('Марія', 'Франко', 'Група ФІ-72');
$student3 = new Student('Олександер', 'Левицький', 'Група ФФ-73');

$student4 = new Student();
$student4->name = 'Анна';
$student4->surname = 'Коваленко';
$student4->group = 'Група КФ-74';

$student5 = new Student();
$student5->name = 'Ігор';
$student5->surname = 'Симоненко';
$student5->group = 'Група ФА-75';

$student6 = new Student();
$student6->name = 'Наталія';
$student6->surname = 'Савченко';
$student6->group = 'Група ПФ-76';

echo "<b>Інформація про студентів:</b>";
$student1->getInfo();
$student2->getInfo();
$student3->getInfo();
$student4->getInfo();
$student5->getInfo();
$student6->getInfo();
?>
<div class="next_task">
   <div>
      <a href="lab7.php">
         << Завдання 1,2 |</a>
            <a href="lab7.4.php">| Завдання 4 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>