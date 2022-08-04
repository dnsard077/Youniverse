<h2>Add Category</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Categoty Name</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <button class="btn btn-primary" name="save">Save</button>
</form>
<?php 
if (isset($_POST['save']))
{
    $nama = $_POST['nama'];

    mysqli_query($conn, "INSERT INTO category(category_name) VALUES ('$nama')");

    echo "<script>alert('New Category Added');</script> ";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";

}
?>