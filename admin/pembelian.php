<h2>pembelian</h2>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date</th>
            <th>Status</th>
            <th>Total</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        <?php $counter=1;?>
        <?php $result = $conn->query("SELECT * FROM purchase JOIN user ON purchase.email=user.email");?>
        <?php while ($row = $result->fetch_assoc()){?>
        <tr>
            <td><?php echo $counter;?>.</td>
            <td><?php echo $row['first_name'];?></td>
            <td><?php echo $row['last_name'];?></td>
            <td><?php echo $row['purchase_date'];?></td>
            <td><?php echo $row['purchase_status'];?></td>
            <td><?php echo $row['purchase_total'];?></td>
            <td>
                <a href="index.php?halaman=detail&id=<?php echo $row['purchase_id'];?>" class="btn btn-info">detail</a>
                <?php
                if($row['purchase_status'] !== 'pending'):?>
                <a href="index.php?halaman=pembayaran&id=<?php echo $row['purchase_id'];?>" class="btn btn-success">Payment</a>
                <?php endif ?>
            </td>
        </tr>
        <?php $counter++;?>
        <?php }?>
    </tbody>
</table>