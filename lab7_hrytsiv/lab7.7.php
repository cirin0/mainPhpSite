<?php
$title = "Лабораторна робота №7";
require '../components/header.php';
?>
<h2>Завдання 7</h2>
<?php
class User
{
   public $name;
   public $surname;
   public $age;
   public $email;

   public function __construct()
   {
      $this->surname;
      $this->name;
      $this->age;
      $this->email;
   }

   public function setUserData($surname, $name, $age, $email)
   {
      $this->surname = $surname;
      $this->name = $name;
      $this->age = $age;
      $this->email = $email;
   }

   public function displayUserData()
   {
      echo "<div style = 'border: 1px solid; padding: 5px; border-radius: 5px;'>";
      echo "<h3>Ваші данні:</h3>";
      echo "Прізвище: {$this->surname}<br>";
      echo "Ім'я: {$this->name}<br>";
      echo "Вік: {$this->age}<br>";
      echo "E-mail: {$this->email}<br>";
      echo "</div>";
   }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (!empty($_POST['surname']) && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['email'])) {
      $user = new User();
      $user->setUserData($_POST['name'], $_POST['surname'], $_POST['age'], $_POST['email']);
      $user->displayUserData();
   } else {
      echo "Будь ласка, заповніть всі поля форми.";
   }
}
?>
<div class="form_container">
   <form method="POST">
      <label for="name">Ім'я:</label>
      <input type="text" id="name" name="name">
      <label for="surname">Прізвище:</label>
      <input type="text" id="surname" name="surname">
      <label for="age">Вік:</label>
      <input type="number" id="age" name="age">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email">
      <input type="submit" value="ГОТОВО">
   </form>
</div>
<div class="next_task">
   <div>
      <a href="lab7.6.php">
         << Завдання 6 |</a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>