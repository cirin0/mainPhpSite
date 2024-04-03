<?php
$title = "Лабораторна робота №7";
require '../components/header.php';
?>
<h2>Завдання 1, 2</h2>
<?php
class Student
{
   public $name;
   public $surname;
   public $group;

   public function __construct($name, $surname, $group)
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

echo "<b>Інформація про студентів:</b><br>";
echo "Студент 1: {$student1->name} {$student1->surname}, Група: {$student1->group}<br>";
echo "Студент 2: {$student2->name} {$student2->surname}, Група: {$student2->group}<br>";
echo "Студент 3: {$student3->name} {$student3->surname}, Група: {$student3->group}<br>";
echo "<br>";

echo "<b>Інформація про студентів:</b>";
$student1->getInfo();
$student2->getInfo();
$student3->getInfo();
?>

<div class="next_task">
   <div>
      <a href="lab7.3.php">| Завдання 3 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>