<h2>product</h2>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Weight</th>
            <th>Image</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        <?php $counter=1;?>
        <?php $result = $conn->query("SELECT * FROM product LEFT JOIN category ON product.category_id = category.category_id");?>
        <?php while ($row = $result->fetch_assoc()){?>
        <tr>
            <td><?php echo $counter;?>.</td>
            <td><?php echo $row['product_name'];?></td>
            <td><?php echo $row['category_name'];?></td>
            <td><?php echo $row['product_price'];?></td>
            <td><?php echo $row['product_weight'];?></td>
            <td>
                <img src="../assets/img/produk_pic/<?php echo $row['product_pic'];?>" width="100">
                
            <td>
                <a href="index.php?halaman=hapusproduk&id=<?php echo $row['product_id'];?>" class="btn btn-danger" class="btn btn-danger">Delete</a>
                <a href="index.php?halaman=ubahproduk&id=<?php echo $row['product_id'];?>" class="btn btn-warning" class="btn btn-warning">Edit</a>
            </td>
        </tr>
        <?php $counter++;?>
        <?php }?>
    </tbody>
</table>

<a href="index.php?halaman=tambahproduk" class="btn btn-warning" class="btn btn-primary">Add Product</a>