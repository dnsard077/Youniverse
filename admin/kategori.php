<h2>Category</h2>
<?php 
$alldata= array();
$result = mysqli_query($conn, "SELECT * FROM category");
while ($single = $result ->fetch_assoc())
{
    $alldata[] = $single;
}

?>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($alldata as $key => $value) {
        ?>
        <tr>
            <td><?php echo $key + 1;?></td>
            <td><?php echo $value['category_name'];?></td>
            <td>
                <a href="index.php?halaman=deletecategory&id=<?php echo $value['category_id'];?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
<a href="index.php?halaman=addcategory" class="btn btn-warning" class="btn btn-primary">Add Category</a>