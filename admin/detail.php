<h2>Purchase Detail </h2>

<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $counter=1;?>
        <?php $ambil = $conn->query("SELECT * FROM product_purchase JOIN product ON product_purchase.product_id=product.product_id WHERE product_purchase.purchase_id='$_GET[id]'");?>
        <?php while ($row = $ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $counter;?>.</td>
            <td><?php echo $row['product_name'];?></td>
            <td><?php echo $row['product_price'];?></td>
            <td><?php echo $row['quantity'];?></td>
            <td><?php echo $row['product_price']*$row['quantity'];?></td>
        </tr>
        <?php $counter++;?>
        <?php }?>
    </tbody>
</table>