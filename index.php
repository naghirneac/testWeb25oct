<?php
require_once 'vendor/vlucas/valitron/src/Valitron/Validator.php';
$v = new Valitron\Validator($_POST);
$v->rule('required', ['name', 'email','pass', 'confirmPass']);
$v->rule('lengthBetween', 'name', 3, 15);
$v->rule('email', 'email');
$v->rule('contains', 'phone', '+373');
$v->rule('numeric', 'age');
$v->rule('min', 'age', 1);
$v->rule('max', 'age', 100);
$v->rule('lengthBetween', 'pass', 10, 20);
$v->rule('lengthBetween', 'confirmPass', 10, 20);
$v->rule('equals', 'confirmPass', 'pass');
$v->rule('date', 'bdate');

if (!empty($_POST)){
    if($v->validate()) {
        echo "Success! All was introduced successful!";
    }
}
?>

<form action="" method="post">
    Nume = <input type="text" name="name"><br> <br>
    Email = <input type="text" name="email"><br><br>
    Telefon = <input type="text" name="phone"><br><br>
    Varsta = <input type="text" name="age"><br><br>
    Parola = <input type="password" name="pass"><br><br>
    Confirm. parola = <input type="password" name="confirmPass"><br><br>
    Data nasterii = <input type="text" name="bdate"><br>
    <input type="submit">
</form>

<? foreach ($v->errors() as $error){ ?>
<p>Error <?= $error[0] ?> !!!</p>
<?}?>
