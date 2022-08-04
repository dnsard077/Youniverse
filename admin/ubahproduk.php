<h2>Edit Product</h2>
<?php
$result = $conn->query("SELECT * FROM product WHERE product_id='$_GET[id]'");
$row = $result->fetch_assoc();
$alldata= array();
$result = mysqli_query($conn, "SELECT * FROM category");
while ($single = $result ->fetch_assoc())
{
    $alldata[] = $single;
}

?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $row['product_name'];?>">
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="id_kategori">
            <?php foreach ($alldata as $key => $value) :?>
                <option value="<?php echo $value['category_id'];?>" <?php if($row['category_id']==$value['category_id']){echo "selected";}?>><?php echo $value['category_name'];?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $row['product_price'];?>">
    </div>
    <div class="form-group">
        <label>Weight</label>
        <input type="number" class="form-control" name="berat" value="<?php echo $row['product_weight'];?>">
    </div>
    <div class="form-group">
        <label>stock</label>
        <input type="number" class="form-control" name="stok" value="<?php echo $row['product_stock'];?>">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea type="text" class="form-control" name="deskripsi" rows="10"><?php echo $row['product_description'];?></textarea>
    </div>
    <div class="form-group">
        <img src="../assets/img/produk_pic/<?php echo $row['product_pic'];?>" width="200">
    </div>
    <div class="form-group">
        <label>Pic</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <button class="btn btn-primary" name="ubah">Save</button>
</form>

<?php
if (isset($_POST['ubah']))
{
    $pic_name = $_FILES['foto']['name'];
    $pic_loc = $_FILES['foto']['tmp_name'];
    if (!empty($pic_loc))
    {
        move_uploaded_file($pic_loc, "../assets/img/produk_pic/".$pic_name);
        $conn->query("UPDATE product SET product_name='$_POST[nama]',product_price='$_POST[harga]',product_weight='$_POST[berat]',product_pic='$pic_name',product_description='$_POST[deskripsi]',product_stock='$_POST[stok]', category_id='$_POST[id_kategori]' 
        WHERE product_id='$_GET[id]'");
    }
    else
    {
        move_uploaded_file($pic_loc, "../assets/img/produk_pic/".$pic_name);
        $conn->query("UPDATE product SET product_name='$_POST[nama]',product_price='$_POST[harga]',product_weight='$_POST[berat]',product_description='$_POST[deskripsi]',product_stock='$_POST[stok]', category_id='$_POST[id_kategori]'
        WHERE product_id='$_GET[id]'");
    }

    echo "<script>alert('Data saved');</script>";
    echo "<script>window.location.href='index.php?halaman=produk'</script>";

}
?>
