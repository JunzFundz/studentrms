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

    //? list dropped
    $(document).on('click', '#dropped', function (e) {
        e.preventDefault();
        var session = $(this).data('session');

        console.log(session)

        $.ajax({
            url: "db_status_lists.php",
            type: "post",
            data: {
                'see_dropped': true,
                'dropped': true,
                'session': session
            },
            success: function (data) {
                $(".modal-body").html(data);
                $('#dropped-modal').modal('show');
            }
        });
    });

    $(document).on('click', '#passed', function (e) {
        e.preventDefault();
        var session = $(this).data('session');

        $.ajax({
            url: "db_status_lists.php",
            type: "post",
            data: {
                'see_passed': true,
                'passed': true,
                'session': session
            },
            success: function (data) {
                $(".modal-body").html(data);
                $('#passed-modal').modal('show');
            }
        });
    });

    // $(document).on('click', '.add-second-grade', function (e) {
    //     e.preventDefault();
    //     var id = $(this).data('id');

    //     console.log(id)

    //     $.ajax({
    //         url: "get-grades-second.php",
    //         type: "post",
    //         data: {
    //             'second_id': true,
    //             'id': id
    //         },
    //         success: function (data) {
    //             $(".modal-body2").html(data);
    //             $('#grade-second').modal('show');
    //         }
    //     });
    // });

    $(document).on('click', '.first_grade_submit', function (e) {
        e.preventDefault();
        var student_id = $(this).data('id');
        var grade = $('#grade').val();

        console.log(student_id, grade)
        $.ajax({
            url: "db_add_grades.php",
            type: "POST",
            data: {
                'student_id': student_id,
                'grade': grade
            },
            success: function (data) {
                alert('Success');
                location.reload();
            }
        });
    });

    $(document).on('click', '#second_submit', function (e) {
        e.preventDefault();
        var student_id = $(this).data('second_id');
        var second_grade = $('#second_grade').val();

        console.log(student_id, second_grade)
        $.ajax({
            url: "db_add_second.php",
            type: "POST",
            data: {
                'student_id': student_id,
                'grade': second_grade
            },
            success: function (data) {
                alert('Success');
                location.reload();
            }
        });
    });

    $(document).on('click', '#add-course-btn', function (e) {
        e.preventDefault();
        var course = $('#course_name').val();
        console.log(course)
        $.ajax({
            url: "db_set_status.php",
            type: "POST",
            data: {
                'add_course': true,
                'course': course
            },
            success: function (data) {
                alert('Success');
                location.reload();
            }
        });
    });

    function saveDataToSessionStorage(key, data) {
        sessionStorage.setItem(key, data);
    }

    function getDataFromSessionStorage(key) {
        return sessionStorage.getItem(key);
    }

    $(document).on('change', '#sessionSelect', function () {
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

    $(document).on('change', '#sessionSelectgrade', function (e) {
        e.preventDefault();
        var nID = $('option:selected', this).data('id');
        $('.select-semester-column').hide();
        $.ajax({
            url: "get-grades-data.php",
            type: "post",
            data: {
                'nID': nID
            },
            success: function (data) {
                $('.datadistgrade').html(data);
                saveDataToSessionStorage('gradesData', data);
            }
        });
    });

    $(document).on('change', '.select-semester', function (e) {
        e.preventDefault();
        var selectedSem = $(this).val();
        console.log(selectedSem);

        if (selectedSem == '1') {
            console.log('1st sem')
            $('.firstsem--').show();
            $('.secondsem--').hide();
        } else {
            console.log('2nd sem')
            $('.firstsem--').hide();
            $('.secondsem--').show();
        }
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

    $(document).on('click', '.btn-in-grade', function (e) {
        e.preventDefault();
    
        $('.btn-in-grade').removeClass('active');
    
        $(this).addClass('active');
    
        var session = $(this).data('session');
        var company = $(this).data('company');
    
        $('.select-semester-column').show();
    
        $.ajax({
            url: "get-table-grades.php",
            type: "post",
            data: {
                'company': company,
                'session': session
            },
            success: function (data) {
                $('.table-grades').html(data);
                saveDataToSessionStorage('tableGrades', data);
            }
        });
    });
    

    var cadetsData = getDataFromSessionStorage('cadetsData');
    if (cadetsData) {
        $('.datadist').html(cadetsData);
    }
    var tableData = getDataFromSessionStorage('tableData');
    if (tableData) {
        $('.table-data').html(tableData);
    }
    var gradesData = getDataFromSessionStorage('gradesData');
    if (gradesData) {
        $('.datadistgrade').html(gradesData);
    }
    var tableGrades = getDataFromSessionStorage('tableGrades');
    if (tableGrades) {
        $('.table-grades').html(tableGrades);
    }

    $(document).on('click', '.passed', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        console.log(id);

        $.ajax({
            url: "db_set_status.php",
            type: "post",
            data: {
                'second': true,
                'id': id
            },
            success: function (data) {
                if (data.success) {
                    alert(data.success);
                    location.reload();
                } else {
                    alert(data.error);
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
                } else {
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
                } else {
                    alert('Error');
                    location.reload();
                }
            }
        });
    });


});

$(document).ready(function() {

    $(document).on('change', '.add-grade', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var val = $(this).val();

        addGrades(id, val);
    });

    function addGrades(id, val) {
        $.ajax({
            url: "db_add_grades.php",
            type: "POST",
            data: {
                'student_id': id,
                'grade': val
            }
        });
    }

    $(document).on('change', '.add-second', function (e) {
        e.preventDefault();
        var nid = $(this).data('nid');
        var nval = $(this).val();

        naddGrades(nid, nval);
    });

    function naddGrades(nid, nval) {
        $.ajax({
            url: "db_add_second.php",
            type: "POST",
            data: {
                'student_id': nid,
                'grade': nval
            }
        });
    }
});
