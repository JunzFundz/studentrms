<?php

include('../includes/dbconnection.php');

if (isset($_POST['second_id'])) {
    $second_id = $_POST['id'];
?>
    <label for="">Grade</label>
    <input type="text" class="form-control" id="second_grade" style="width: 50%;">

    <div class="modal-footer">
        <button type="submit" id="second_submit" class="btn btn-primary second_submit" data-second_id="<?php echo $second_id ?>">Save</button>
    </div>
<?php }

