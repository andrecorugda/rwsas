
<?php
    $tab = 1;
    if(isset($_GET['tab'])){
        $tab = $_GET['tab'];
    }
?>
<html>

<head>
    <title>Manage Road Signs</title>
    <?php require_once __DIR__.'/../common/head.php'; ?>

</head>

<body>
    <div class="container-fluid">
        <?php require_once __DIR__.'/header.php'; ?>
        <?php require_once __DIR__.'/content.php'; ?>
    </div>
</body>

<?php require_once __DIR__.'/../common/foot.php'; ?>

</html>