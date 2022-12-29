<?php
    include '../utils/database.php';
    if(isset($_POST["added"])) {
        if (isset($_FILES["img"])) {
            $file_name = $_FILES['img']['name'];
            $file_tmp =$_FILES['img']['tmp_name'];
            move_uploaded_file($file_tmp,"../database/{$_POST['manh']}.png");

            $sql = "INSERT INTO nuochoa (manh,tennh,thuonghieu,xuatxu,namphathanh,gia,soluong) VALUES ('{$_POST['manh']}','{$_POST['tennh']}','{$_POST['thuonghieu']}','{$_POST['xuatxu']}',{$_POST['namphathanh']},{$_POST['gia']},{$_POST['soluong']})";
            if ($db->query($sql) === TRUE) {
                $alert = "Thêm sản phẩm thành công";
                $alert_type = "success";
            }
        }
    }

    if(isset($_POST["edited"])) {
        $sql = "UPDATE nuochoa SET tennh='{$_POST['tennh']}',thuonghieu='{$_POST['thuonghieu']}',xuatxu='{$_POST['xuatxu']}',namphathanh='{$_POST['namphathanh']}',gia={$_POST['gia']},soluong={$_POST['soluong']} WHERE manh='{$_POST['edited']}'";
        if ($db->query($sql) === TRUE) {
            $alert = "Sửa sản phẩm thành công";
            $alert_type = "success";
        }
    }

    if(isset($_POST["delete"])) {
        unlink("../database/{$_POST['delete']}.png");
        $sql = "DELETE FROM nuochoa WHERE manh='{$_POST["delete"]}'";
        if ($db->query($sql) === TRUE) {
            $alert = "Xoá sản phẩm thành công";
            $alert_type = "success";
        }
    }
?>
<form class="main-box" method="POST" enctype="multipart/form-data">
    <div class="main-head">
        <div class="main-title">
            Danh sách sản phẩm
        </div>
        <div class="nav-space"></div>
        <div class="search-box">
            <input class="search-input" name="search">
            <button class="search-btn" name="search-submit">
                <img class="search-icon" src="../assets/icons/search.svg">
            </button>
        </div>
    </div>
    <div class="main-content">
        <div class="main-table">
            <div class="table-hd">Ảnh</div>
            <div class="table-hd">Mã nước hoa</div>
            <div class="table-hd">Tên nước hoa</div>
            <div class="table-hd">Thương hiệu</div>
            <div class="table-hd">Xuất xứ</div>
            <div class="table-hd">Năm PH</div>
            <div class="table-hd">Giá</div>
            <div class="table-hd">SL</div>
            <div class="table-hd">Thao tác</div>
            <?php
                if(isset($_POST["add"])):
            ?>
                <div class="table-i">
                    <input  name="img" type="file" id="img" style="display:none;" accept="image/*">
                    <label for="img" class="table-btn">Chọn ảnh</label>
                </div>
                <div class="table-i">
                    <input class="table-input" name="manh" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="tennh" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="thuonghieu" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="xuatxu" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="namphathanh" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="gia" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="soluong" required>
                </div>
                <div class="table-i">
                    <button class="table-btn" name="added">Thêm</button>
                </div>
            <?php else: ?>
                <button class="table-add" name="add">
                    <img class="table-add-icon" src="../assets/icons/plus-circle.svg">
                    Thêm sản phẩm
                </button>
            <?php endif ?>
            <?php
                $search_sql = (isset($_POST["search-submit"]) && $_POST["search"] !== "") ? " WHERE tennh LIKE '%{$_POST["search"]}%'" : "";
                $result = $db->query("SELECT * FROM nuochoa{$search_sql}");

                if (mysqli_num_rows($result) > 0):
                    while($row = $result->fetch_assoc()):
                        if(isset($_POST["edit"]) && $_POST["edit"] == $row["manh"]):
            ?>
                <div class="table-i">
                    <img class="table-img" src="../database/<?=$row["manh"]?>.png">
                </div>
                <div class="table-i"><?=$row["manh"]?></div>
                <div class="table-i">
                    <input class="table-input" name="tennh" value="<?=$row["tennh"]?>" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="thuonghieu" value="<?=$row["thuonghieu"]?>" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="xuatxu" value="<?=$row["xuatxu"]?>" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="namphathanh" value="<?=$row["namphathanh"]?>" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="gia" value="<?=$row["gia"]?>" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="soluong" value="<?=$row["soluong"]?>" required>
                </div>
                <div class="table-i">
                    <button class="table-btn" name="edited" value=<?=$row["manh"]?>>Sửa</button>
                </div>
            <?php else: ?>
                <div class="table-i">
                    <img class="table-img" src="../database/<?=$row["manh"]?>.png">
                </div>
                <div class="table-i"><?=$row["manh"]?></div>
                <div class="table-i"><?=$row["tennh"]?></div>
                <div class="table-i"><?=$row["thuonghieu"]?></div>
                <div class="table-i"><?=$row["xuatxu"]?></div>
                <div class="table-i"><?=$row["namphathanh"]?></div>
                <div class="table-i"><?=$row["gia"]?></div>
                <div class="table-i"><?=$row["soluong"]?></div>
                <div class="table-i">
                    <button class="icon-box" name="edit" value="<?=$row["manh"]?>">
                        <img src="../assets/icons/edit-2.svg" class="table-icon">
                    </button>
                    <button class="icon-box" name="delete" value="<?=$row["manh"]?>">
                        <img src="../assets/icons/trash.svg" class="table-icon">
                    </button>
                </div>
            <?php endif; endwhile; endif; ?>
        </div>
    </div>
</form>