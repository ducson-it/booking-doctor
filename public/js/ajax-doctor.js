//edit data doctor
$(document).on('click', '.edit-data', function () {
    var edit_id = $(this).attr('id');
    $.ajax({
        url: 'controllers/AjaxEditDoctor.php',
        type: 'post',
        data: { edit_id: edit_id },
        success: function (data) {
            $('.modal-body').html(data);
        }
    })
});

//update data doctor
$(document).on('click', '.delete-data', function(){
    var delete_id = $(this).attr('id');
    $('#deleteData').val(delete_id);
    $('#delete-doctor').modal('show');
  });

  $(document).on('click', '.confirm-data', function () {
    var delete_id = $('#deleteData').val();
    $('#delete-doctor').modal('hide');
    $.ajax({
        url: 'controllers/AjaxDeleteDoctor.php',
        type: 'post',
        data: { delete_id: delete_id },
        success: function(){
            window.location.reload();
        }
    })
  });