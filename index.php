<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location: login.php');
}
include "tools.php";
include "connect.php";
$stmt = $pdo->prepare("SELECT *,COUNT(detail.ID_Food) as count from detail join stock on detail.ID_Food=stock.ID_Food join categoryf on categoryf.ID_CATF=stock.ID_CATF 
WHERE categoryf.category='beverage' GROUP BY stock.ID_Food  ORDER BY `count`  DESC ;");
$stmt->execute();
$stmt1 = $pdo->prepare("SELECT *,COUNT(detail.ID_Food) as count from detail join stock on detail.ID_Food=stock.ID_Food join categoryf on categoryf.ID_CATF=stock.ID_CATF 
WHERE categoryf.category='bakery' GROUP BY stock.ID_Food  ORDER BY `count`  DESC ;");
$stmt1->execute();


?>
<!DOCTYPE html>
<html lang="en">
<style>
    * {
        font-size: 30px;
    }

    .header {
        margin-left: 50px;
    }

    .vertical-menu {
        width: 200px;
    }

    .vertical-menu a {
        background-color: #eee;
        color: black;
        display: block;
        padding: 12px;
        text-decoration: none;
    }

    .vertical-menu a:hover {
        background-color: #ccc;
    }

    .vertical-menu a.active {
        background-color: #04AA6D;
        color: white;
    }

    h1 {
        padding: 20px;
        color: rgb(226, 82, 195);
    }

    .auto-grid {
        --auto-grid-min-size: 16rem;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(var(--auto-grid-min-size), 1fr));
        grid-gap: 1rem;
    }

    body.grid {
        align-items: center;
        background: #efefef;
        padding: 1rem;
        font-family: sans-serif;
    }

    li.grid {
        transition: 0.3s;
        box-shadow: 0 8px 6px 0 rgba(0, 0, 0, 0.2);
        border-radius: 100px;
        margin: 50px 20px 0px 20px;
        padding: 5rem 2rem;
        text-align: center;
        font-size: 1.2rem;
        background: #ffc9de;
        color: #ffffff;
    }

    li.grid a:link,
    li.grid a:visited {
        font-weight: bold;
        font-size: 1.8rem;
        text-decoration: none;
        color: #ffffff;
    }

    li.grid:hover {
        padding: 2rem 1rem 1rem 1rem;
        font-size: 1.8rem;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
    }
</style>

<body>
    <div class="content-grid">
        <h1 style="font-size: 60px;">Top 3 เครื่องดื่ม</h1>

        <ul class="auto-grid">
            <?php while ($row = $stmt->fetch()) : ?>
                <li class="grid"><img src="img/<?=$row[10]?>" width="100%">
                    <p><?=$row[7]?></p>
                    <p>ราคา <?=$row[9]?> บาท</p>
                    <p>ยอดขาย <?=$row['count']?> แก้ว</p><a href="cart.php?ID_Product=<?= $row[4] ?>&op=add">
                        <p>ซื้อ</p>
                </li></a>
            <?php endwhile; ?>
        </ul>

    </div>

    <div class="content-grid">
        <h1 style="font-size: 60px;">Top 3 ขนม</h1>
        <ul class="auto-grid">
        <?php while ($row1 = $stmt1->fetch()) : ?>
                <li class="grid"><img src="img/<?=$row1[10]?>" width="100%">
                    <p><?=$row1[7]?></p>
                    <p>ราคา <?=$row1[9]?> บาท</p>
                    <p>ยอดขาย <?=$row1['count']?> รายการ</p><a href="cart.php?ID_Product=<?= $row[4] ?>&op=add">
                        <p>ซื้อ</p>
                </li></a>
            <?php endwhile; ?>

        </ul>
    </div>


</body>
<?php include("footer.php"); ?>

</html>