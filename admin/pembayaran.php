<h2>data pembayaran</h2>

<?php 
$id_purchase1 = $_GET['id'];
$ambil = mysqli_query($conn, "SELECT * FROM payment WHERE purchase_id='$id_purchase1'");
$detail = mysqli_fetch_assoc($ambil);
?>

<div class="row">
    <div class="col-md-6">
        <table class="table table-hover table-bordered">
            <tr>
                <th>First Name</th>
                <td><?php echo $detail['first_name']?></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?php echo $detail['last_name']?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo $detail['bank']?></td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><?php echo $detail['quantity']?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><?php echo $detail['date']?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../assets/img/proof/<?php echo $detail['proof'];?>" class="img-responsive">
    </div>
</div>

<form method="post">
    <div class="form-group">
        <label>Delivery Receipt</label>
        <input type="text" class="form-control" name="delivery_receipt">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="done">done</option>
            <option value="on delivery">On delivery</option>
            <option value="cancel">cancel</option>
        </select>
    </div>
    <button class="btn btn-primary" name="save">save</button>
</form>

<?php 
if (isset($_POST['save']))
{
    $delivery_receipt = $_POST['delivery_receipt'];
    $status = $_POST['status'];

    $conn->query("UPDATE purchase SET delivery_receipt='$delivery_receipt', purchase_status='$status' WHERE purchase_id='$id_purchase1'");
    echo "<script>alert('Data Saved')</script>";
    echo "<script>window.location.href='index.php?halaman=pembelian'</script>";
    echo "<script location='index.php?halaman=pembelian'>";
}
?>