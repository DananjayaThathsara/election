
<?php
include '../Model/dbConfig.php';
$council= $_REQUEST['council'];
?>
<div class="form-group" >
    <label>Seats</label>
    <select class="form-control" name="s_id">
        <option disabled selected>Select Council</option>
        <?php
        $query="SELECT * FROM seat WHERE d_id='$council' ORDER BY seat_name ASC";
        $result=mysql_query($query);
        if($result){
            while ($row=mysql_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['s_id'];?>"><?php echo ucfirst(strtolower($row['seat_name']));?></option>
            <?php }
        }?>
    </select>
</div>