function showState(val) {

    $.ajax({
        type: "POST",
        url: "subject.php",
        data: 'id=' + val,
        success: function (data) {
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
        success: function (data) {
            // alert(data);
            $("#dist").html(data);
        }
    });

}

$(document).ready(function () {
    $('#add-pl-btn').on('click', function () {
        const comp = $('#comp-add').val();
        $.ajax({
            url: "db_add_pl.php",
            type: 'post',
            data: {
                'comp': comp
            }, success: function () {
                alert(comp + ' Company Added Successfully');
                location.reload();
            }
        })
    });


    $('#add-user-btn').on('click', function () {
        const user = $('#username').val();
        const password = $('#password').val();
        $.ajax({
            url: "db_add_officer.php",
            type: 'post',
            data: {
                'user': user,
                'password': password
            }, success: function () {
                alert('User Added Successfully');
                location.reload();
            }
        })
    });


    $('#info-print').on('click', function () {
        print()
    });

    $('.edit-session').on('click', function (e) {
        e.preventDefault();
        const editSession = $(this).data("session_id");
        console.log(editSession);

        $.ajax({
            url: 'db_edit_session.php',
            type: 'post',
            data: {
                'check_session': true,
                'editSession': editSession
            }, success: function (response) {
                $.each(response, function (Key, value) {

                    $('#session-id').val(value['id']);
                    $('#session-name').val(value['session']);
                });
                $('#modal-session').modal('show');
            }
        })
    });



    $(document).on('click', '#ongoing', function (e) {
        e.preventDefault();
        var sessionID = $(this).data('session_id');
        var company = $(this).data('company');

        // console.log(sessionID, company)

        $.ajax({
            url: "db_ongoing_lists.php",
            type: "post",
            data: {
                'session_id': sessionID,
                'comp': company
            },
            success: function (data) {
                $(".modal-body").html(data);
                $('#ongoing-modal').modal('show');
            }
        });
    });


    //? list dropped
    $(document).on('click', '#dropped', function (e) {
        e.preventDefault();
        var sessionID = $(this).data('session_id');
        var company = $(this).data('company');

        // console.log(sessionID, company)

        $.ajax({
            url: "db_dropped_lists.php",
            type: "post",
            data: {
                'session_id': sessionID,
                'comp': company
            },
            success: function (data) {
                $(".modal-body").html(data);
                $('#dropped-modal').modal('show');
            }
        });
    });
})


function saveDataToSessionStorage(key, data) {
    sessionStorage.setItem(key, data);
}

function getDataFromSessionStorage(key) {
    return sessionStorage.getItem(key);
}

$(document).on('change', '#sessionSelect', function (e) {
    e.preventDefault();
    var pID = $('option:selected', this).data('id');
    $.ajax({
        url: "get-cadets-data.php",
        type: "post",
        data: {
            'pID': pID
        },
        success: function (data) {
            $('.datadist').html(data);
            saveDataToSessionStorage('cadetsData', data);
        }
    });
});

$(document).on('click', '.btn-view-data', function (e) {
    e.preventDefault();
    var session = $(this).data('session');
    var company = $(this).data('company');

    console.log(session, company);

    $.ajax({
        url: "get-table-data.php",
        type: "post",
        data: {
            'company': company,
            'session': session
        },
        success: function (data) {
            $('#btn-view-data').addClass('active');
            $('.table-data').html(data);
            saveDataToSessionStorage('tableData', data);
        }
    });
});

$(document).on('click', '.student-passed', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    console.log(id);

    $.ajax({
        url: "db_set_status.php",
        type: "post",
        data: {
            'passed': true,
            'id': id
        },
        success: function (data) {
            if (data.success) {
                alert('success');
                location.reload();
            }else{
                alert('Error');
                location.reload();
            }
        }
    });
});

$(document).on('click', '.drop-student', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    console.log(id);

    $.ajax({
        url: "db_set_status.php",
        type: "post",
        data: {
            'dropped': true,
            'id': id
        },
        success: function (data) {
            if (data.success) {
                alert('success');
                location.reload();
            }else{
                alert('Error');
                location.reload();
            }
        }
    });
});

$(document).on('click', '.drop-studentf', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    console.log(id);

    $.ajax({
        url: "db_set_status.php",
        type: "post",
        data: {
            'droppedf': true,
            'id': id
        },
        success: function (data) {
            if (data.success) {
                alert('success');
                location.reload();
            }else{
                alert('Error');
                location.reload();
            }
        }
    });
});

$(document).ready(function () {
    var cadetsData = getDataFromSessionStorage('cadetsData');
    if (cadetsData) {
        $('.datadist').html(cadetsData);
    }

    var tableData = getDataFromSessionStorage('tableData');
    if (tableData) {
        $('.table-data').html(tableData);
    }
});

$(document).on('click', '.drop-student', function () {

})


