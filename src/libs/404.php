<?php require __DIR__ . '/../bootstrap.php'; ?>
<meta charset="UTF-8">
<title>Logout</title>

<?php view('header', ['title' => '404 NOT FOUND']);
session_unset();
?>
<div class="message-box" style="background-color: #900000; color: white">
    <p>PAGE NOT FOUND</p>
</div>
<?php view('footer'); ?>
