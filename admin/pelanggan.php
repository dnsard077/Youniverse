<h2>User</h2>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        <?php $counter=1;?>
        <?php $result = $conn->query("SELECT * FROM user WHERE user.status='Member'");?>
        <?php while ($row = $result->fetch_assoc()){?>
        <tr>
            <td><?php echo $counter;?>.</td>
            <td><?php echo $row['first_name'];?></td>
            <td><?php echo $row['last_name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td>
                <a href="" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php $counter++;?>
        <?php }?>
    </tbody>
</table>
