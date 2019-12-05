<?php 	
header('Content-type: text/html; charset=utf-8');
error_reporting(-1);

require_once 'connect.php';
require_once 'functions.php';

if(!empty($_POST)) {
    save_mass();
    header("Location: {$_SERVER['PHP_SELF']}");
    die;
}

if(!empty($_GET)) {
    delete();
    header("Location: {$_SERVER['PHP_SELF']}");
    die;
}

$message = read_mass();

?>

<form action="" method="post">
    <p>
        <label for="name">Имя: </label><br>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="text">Сообщение: </label><br>
        <textarea name="text" id="text" cols="21" rows="5"></textarea>
    </p>
    <button type="submit">Отправить</button>
</form>

<hr>

<?php foreach($message as $value): ?>
    <div class="message">
        <p>Имя: <b><?=htmlspecialchars($value['name'])?></b> | Дата: <b><?=$value['date']?></b></p>
        <div><?=nl2br(htmlspecialchars($value['text']))?></div>
        <a href="?id=<?=$value['id']?>">Удалить</a>
    </div>
<?php endforeach; ?>