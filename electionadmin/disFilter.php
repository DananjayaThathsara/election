<?php include '../Model/dbConfig.php'; ?>
<select class="form-control"  name="d_id">
    <option disabled selected>Select District</option>
    <?php
    $query = "SELECT * FROM dis";
    $result = mysql_query($query);

    if ($result) {
        while ($row = mysql_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row['d_id']; ?>">
                <?php echo $row['d_name']; ?></option>
        <?php }
    } ?>
</select>
