<?php
    include '../utils/database.php';
    if(isset($_POST["added"])) {
        $sql = "INSERT INTO hoadon (mahd,tenkh,sdtkh,manh,soluong) VALUES ('{$_POST['mahd']}','{$_POST['tenkh']}','{$_POST['sdtkh']}','{$_POST['manh']}',{$_POST['soluong']})";
        if ($db->query($sql) === TRUE) {
            $alert = "Thêm hoá đơn thành công";
            $alert_type = "success";
        }
    }

    if(isset($_POST["delete"])) {
        $sql = "DELETE FROM hoadon WHERE mahd='{$_POST['delete']}'";
        if ($db->query($sql) === TRUE) {
            $alert = "Xoá hoá đơn thành công";
            $alert_type = "success";
        }
    }
?>
<form class="main-box" method="POST" enctype="multipart/form-data">
    <div class="main-title">
        Danh sách hoá đơn
    </div>
    <div class="main-content">
        <div class="main-table">
            <div class="table-hd">Mã hoá đơn</div>
            <div class="table-hd">Tên khách hàng</div>
            <div class="table-hd">SĐT khách hàng</div>
            <div class="table-hd">Mã nước hoa</div>
            <div class="table-hd">Tên nước hoa</div>
            <div class="table-hd">Giá</div>
            <div class="table-hd">Số lượng</div>
            <div class="table-hd">Tổng tiền</div>
            <div class="table-hd">Thao tác</div>
            <?php
                if(isset($_POST["add"])):
            ?>
                <div class="table-i">
                    <input class="table-input" name="mahd" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="tenkh" required>
                </div>
                <div class="table-i">
                    <input class="table-input" name="sdtkh" required>
                </div>
                <div class="table-i">
                    
                </div>
                <div class="table-i">
                <select class="table-input" name="manh" required>
                        <?php
                            $result1 = $db->query("SELECT * FROM nuochoa");
                            if (mysqli_num_rows($result1) > 0):
                                while($row1 = $result1->fetch_assoc()):
                        ?>
                        <option value="<?=$row1["manh"]?>"><?=$row1["tennh"]?></option>
                        <?php endwhile; endif;?>
                    </select>
                </div>
                <div class="table-i">
                    
                </div>
                <div class="table-i">
                    <input class="table-input" name="soluong" required>
                </div>
                <div class="table-i">
                    
                </div>
                <div class="table-i">
                    <button class="table-btn" name="added">Thêm</button>
                </div>
            <?php else: ?>
                <button class="table-add" name="add">
                    <img class="table-add-icon" src="../assets/icons/plus-circle.svg">
                    Thêm hoá đơn
                </button>
            <?php endif ?>
            <?php
                $result = $db->query("SELECT h.mahd, h.tenkh, h.sdtkh, h.manh, n.tennh, n.gia, h.soluong, (n.gia * h.soluong) AS tongtien FROM nuochoa n, hoadon h WHERE n.manh = h.manh");

                if (mysqli_num_rows($result) > 0):
                    while($row = $result->fetch_assoc()):
            ?>
                <div class="table-i"><?=$row["mahd"]?></div>
                <div class="table-i"><?=$row["tenkh"]?></div>
                <div class="table-i"><?=$row["sdtkh"]?></div>
                <div class="table-i"><?=$row["manh"]?></div>
                <div class="table-i"><?=$row["tennh"]?></div>
                <div class="table-i"><?=$row["gia"]?></div>
                <div class="table-i"><?=$row["soluong"]?></div>
                <div class="table-i"><?=$row["tongtien"]?></div>
                <div class="table-i">
                    <button class="icon-box" name="delete" value="<?=$row["mahd"]?>">
                        <img src="../assets/icons/trash.svg" class="table-icon">
                    </button>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</form>