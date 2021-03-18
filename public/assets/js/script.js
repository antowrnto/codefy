$(document).on('click', '#button_update', function(e) {
  e.preventDefault()
  var id = $(this).data('id');
  var title = $(this).data('title');
  var url = $(this).data('url');

  $('#title_header').text(title);
  $('#title_create').val(title);
  $('#id_create').val(id);
  $('#url_icon_create').val(url);
});

$(document).on('click', '.swall-delete', function (e) {
    e.preventDefault();
    var form = $(this).parents('form');
    var title = $(this).data('title');
    
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to delete this! " + title,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        form.submit();
        Swal.fire({
          type: "success",
          title: 'Deleting!',
          text: 'Your file has been deleting please wait a minute.',
          confirmButtonClass: 'btn btn-success',
        })
      }
      else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'Cancelled',
          text: "Your data this " + title + " is safe :)",
          type: 'error',
          confirmButtonClass: 'btn btn-success',
        })
      }
    })
  });
  
  