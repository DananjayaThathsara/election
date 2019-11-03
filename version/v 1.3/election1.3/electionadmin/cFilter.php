
<?php
include '../Model/dbConfig.php';
$council= $_REQUEST['council'];
?>
<div class="form-group">
    <label>Council</label>
    <select class="form-control" name="l_id">
        <option disabled selected>Select Council</option>
        <?php
        $query="SELECT * FROM la WHERE d_id='$council' ORDER BY l_id ASC";
        $result=mysql_query($query);
        if($result){
            while ($row=mysql_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['l_id'];?>"><?php echo $row['l_id'];?> - <?php echo $row['l_name'];?></option>
            <?php }
        }?>
    </select>
</div>