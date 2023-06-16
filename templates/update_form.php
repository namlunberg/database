<form action="" method="post">
    <input type="hidden" name="id" require value="<?=!empty($id)?$id:''?>">
    <input type="text" name="name" placeholder="name" require value="<?=!empty($name)?$name:''?>">
    <input type="text" name="age" placeholder="age" require value="<?=!empty($age)?$age:''?>">
    <input type="text" name="salary" placeholder="salary" require value="<?=!empty($salary)?$salary:''?>">
    <input type="hidden" name="mode" require value="<?=$mode?>">
    <input type="submit" name="submit" value="сохранить">
</form>
<a href="/index.php">вернуться на главную</a>