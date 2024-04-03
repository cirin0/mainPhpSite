<?php
$title = "Лабораторна робота №7";
require '../components/header.php';
?>
<h2>Завдання 4</h2>
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

   public function __clone()
   {
      $this->name = $this->name;
      $this->surname = $this->surname;
      $this->group = $this->group;
   }
}

$student1 = new Student('Микола', 'Шевченко', 'Група ІП-71');
$student2 = new Student('Марія', 'Франко', 'Група ФІ-72');
$student3 = new Student('Олександер', 'Левицький', 'Група ФФ-73');

$student7 = clone $student1;
$student6 = clone $student3;

echo "<b>Інформація про студентів:</b>";
$student1->getInfo();
$student2->getInfo();
$student3->getInfo();
echo "<br><b>Інформація про клонованих студентів:</b>";
$student6->getInfo();
$student7->getInfo();
?>
<div class="next_task">
   <div>
      <a href="lab7.3.php">
         << Завдання 3 |</a>
            <a href="lab7.5.php">| Завдання 5 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>