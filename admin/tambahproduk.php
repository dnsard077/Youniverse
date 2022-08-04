<?php
$semuadata= array();
$ambil = mysqli_query($conn, "SELECT * FROM category");
while ($tiap = $ambil ->fetch_assoc())
{
    $semuadata[] = $tiap;
}
?>
<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label>category</label>
        <select class="form-control" name="category_id">
            <?php foreach ($semuadata as $key => $value) :?>
                <option value="<?php echo $value['category_id'];?>"><?php echo $value['category_name'];?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label>berat</label>
        <input type="number" class="form-control" name="berat">
    </div>
    <div class="form-group">
        <label>stok</label>
        <input type="number" class="form-control" name="stok">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea type="text" class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save']))
{
    $name = $_FILES['foto']['name'];
    $id_category = $_POST['category_id'];
    $location = $_FILES['foto']['tmp_name'];
    move_uploaded_file($location, "../assets/img/produk_pic/".$name);

    mysqli_query($conn, "INSERT INTO product(product_name,product_price, product_weight, product_pic, product_description, category_id, product_stock) VALUES ('$_POST[name]', '$_POST[harga]','$_POST[berat]','$name','$_POST[deskripsi]', '$id_category','$_POST[stok]')");


    echo "<script>alert('Data saved');</script>";
    echo "<script>window.location.href='index.php?halaman=produk'</script>";
}
?>