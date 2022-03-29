<?php include './layouts/header.php' ?>
<h3 class="text-center">Thêm mới Học sinh</h3>
<form action="" method="post" class="form-">
    <div class="container">
        <div class="form-group">
            <label>Tên</label>
            <input name="name" type="text" class="form-control" placeholder="Họ và tên" value="<?= $student->name ?>">
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <input type="radio" name="gender" value="Nam">Nam
            <input type="radio" name="gender" value="Nữ">Nữ
        </div>
        <div class="form-group">
            <label>Ngày sinh</label>
            <input name="birthday" type="date" class="form-control" value="<?= $student->birthday ?>">
        </div>
        <div class="form-group">
            <label>Chức vụ</label>
            <select name="position">
                <option value="Lớp Trưởng">Lớp Trưởng</option>
                <option value="Tổ Trưởng">Tổ Trưởng</option>
                <option value="Thành Viên">Thành Viên</option>
            </select>
            <!-- <input name="position" class="form-control" type="text" placeholder="chức vụ"> -->
        </div>
        <div class="mb-3">
            <label class="form-label">GVCN</label>
            <select class="form-select form-control" name="teacherID">

                <option value="1-Đỗ Mỹ Linh">1 <label>- Đỗ Mỹ Linh</label></option>
                <option value="2-Ngô Đình Nam">2 <label>- Ngô Đình Nam</label></option>
                <option value="3-Nguyễn Đức Anh">3 <label>- Nguyễn Đức Anh</label></option>
            </select>
        </div>



        <button type="submit" class="btn btn-primary">Lưu</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Trở về</i></button>

</form>
</div>
<?php include './layouts/footer.php' ?>