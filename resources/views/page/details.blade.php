@extends('layouts.masterDetail')

@section('title', 'Detail')
{{-- heroMenu --}}
@section('detail')
<section id="works">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="works-title">
                    <h1>Chi tiết sản phẩm</h1>
                    <span class="st-border"></span>
                </div>
            </div>
            <div class="col-md-4 offset-md-1">
                <img class="image-detail" src="/images/{{$book->image}}" alt="">
            </div>
            <div class="col-md-6 offset-md-1">
            <h3>{{$book->name}}</h3>
            <p class="author"><span>Tác giả: </span>{{$authorOne->name}}</p>
            <p class="smallDes">{{$book->smallDes}}</p>
            <p class="intro">{{$book->intro}}</p>
            <p class="review">{{$book->review}}</p>
            <a class="add-cart" href="#">Chọn mua </a>
            </div>
        </div>
    </div>
</section>
@endsection

<?php include('header.php');
// include('function.php');
$data = 6;
$name = null;
if (isset($_POST['search']) && !isset($_GET['product'])) {
    $name = $_POST['name'];
    $product = 1;
    // echo $name;
} elseif (isset($_GET['product']) && isset($_POST['search'])) {
    $name = $_POST['name'];
    $product = $_GET['product'];
} else {
    header("Location:index.php");
}
$sql = "SELECT COUNT(*) FROM product WHERE name LIKE  '%$name%'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$number = $stmt->fetchColumn();
$page = ceil($number / $data);
$tin = ($product - 1) * $data;
?>
<div class="container" style="margin-top:20px">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class=" top-nav rsidebar span_1_of_left">
                <h3 class="cate">Danh mục</h3>
                <ul class="menu">
                    <li>
                        <ul class="kid-menu">
                            <?php foreach (selectDb("SELECT * FROM category") as $row) { ?>
                                <li><a href="product.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></li>
                            <?php

                            } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <p>Tìm thấy <?=$number?> kết quả mong muốn.</p>
            <?php foreach (selectDb("SELECT * FROM product WHERE name LIKE '%$name%' ORDER BY id DESC LIMIT $tin,$data") as $row) { ?>
                <div class="col-md-4" style="margin-bottom:20px">
                    <div class=" col-md-12" style="border:1px solid #cdcdcd;border-radius:5px">
                        <a href="single.php?id=<?= $row['id'] ?>&cate=<?= $row['id_cate'] ?>"><img class="img-responsive chain" style="width:200px;height:300px" src="public/images/<?= $row['images'] ?>" alt="" /></a>
                        <span style="position:absolute;top:5px;right:10px;color:red;font-size:30px;font-family:Chilanka">
                            <?php if ($row['sale'] != 0) { ?>
                                <?= $row['sale'] . '%' ?>
                            <?php
                                } ?>
                        </span>
                        <div class="grid-chain-bottom" style="text-align: center">
                            <h6><a href="single.php"><?= $row['name'] ?></a></h6>
                            <div class="star-price">
                                <span class="actual"><?= number_format($row['price'] - ($row['price'] * ($row['sale'] / 100))) . "đ" ?></span>
                                <?php
                                    if ($row['sale'] != 0) { ?>
                                    <span class="reducedfrom"><?= number_format($row['price']) ?>đ</span><br>
                                <?php
                                    }
                                    ?>
[16/11/2020 13:24:02] Tâm C: <a href="#" class="btn btn-primary">Thêm vào giỏ hàng</a>

                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            };
            ?>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php
                for ($t = 1; $t <= $page; $t++) { ?>
                    <a href="search.php?product=<?= $t ?>" class=" btn btn-primary" style="float:left;margin-left:5px"><?= $t ?></a>
                <?php

                }
                ?>
            </div>


        </div>

    </div>
</div>
<?php include('footer.php') ?>

