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

    
    $('#add-user-btn').on('click', function() {
        const user = $('#username').val();
        const password = $('#password').val();
        $.ajax({
            url: "db_add_officer.php",
            type: 'post',
            data: {
                'user' : user,
                'password' : password
            },success: function(){
                alert(user +'User Added Successfully');
                location.reload();
            }
        })
    });
    

    $('#info-print').on('click', function(){
        print()
    });

    $('.edit-session').on('click', function(e){
        e.preventDefault();
        const editSession = $(this).data("session_id");
        console.log(editSession);

        $.ajax({
            url: 'db_edit_session.php',
            type: 'post',
            data: {
                'check_session': true,
                'editSession': editSession
            }, success: function(response){
                $.each(response, function(Key, value){

                    $('#session-id').val(value['id']);
                    $('#session-name').val(value['session']);
                });
                $('#modal-session').modal('show');
            }
        })

    });

    var selectedSession = localStorage.getItem('selectedSession');
    var storedData = localStorage.getItem('datadistContent');

    if (selectedSession !== null && storedData !== null) {
        $('#sessionSelect').val(selectedSession);
        $('.datadist').html(storedData);
    }

    $('#sessionSelect').change(function(e) {
        e.preventDefault();
        var pID = $('option:selected', this).data('id');
        localStorage.setItem('selectedSession', pID);

        $.ajax({
            url: "get-cadets-data.php",
            type: "post",
            data: {
                'pID': pID
            },
            success: function(data) {
                $('.datadist').html(data);
                localStorage.setItem('datadistContent', data);
            }
        });
    });
    
})

