<?php

include('../includes/dbconnection.php');

if (isset($_POST['first_id'])) {
    $id = $_POST['id'];
?>
    <label for="">Grade</label>
    <input type="text" class="form-control" id="grade" style="width: 50%;">

    <div class="modal-footer">
        <button type="submit" id="first_grade_submit" class="btn btn-primary first_grade_submit" data-id="<?php echo $id ?>">Save</button>
    </div>
<?php }
