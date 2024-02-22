function showState(val) {

    $.ajax({
        type: "POST",
        url: "subject.php",
        data: 'id=' + val,
        success: function(data) {
            // alert(data);
            $("#state").html(data);
        }
    });
}

function showDist(val) {

    $.ajax({
        type: "POST",
        url: "subject.php",
        data: 'did=' + val,
        success: function(data) {
            // alert(data);
            $("#dist").html(data);
        }
    });

}

$(document).ready(function() {
    
    $('#add-pl-btn').on('click', function() {
        const platoon = $('#platoon-add').val();
        $.ajax({
            url: "db_add_pl.php",
            type: 'post',
            data: {
                'platoon' : platoon
            },success: function(){
                alert(platoon+' Platoon Added Successfully');
                location.reload();
            }
        })
    });


    $('#info-print').on('click', function(){
        print()
    })
})

