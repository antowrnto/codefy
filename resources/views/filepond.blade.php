<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>filepond</title>
    <link href="/assets/vendors/filepond/dist/filepond.css" rel="stylesheet" />
</head>

<body>

  <form method="post" action="/upload" enctype="multipart/form-data">
    @csrf
    <label for="thumbnail">Upload File</label>
    <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
    <button type="submit">Submit</button>
  </form>

<script src="/assets/vendors/filepond/dist/filepond.js"></script>
<script>
  const inputElement = document.querySelector('input[type="file"]');
  const pond = FilePond.create( inputElement );
  
  FilePond.setOptions({
      server: {
        url: '/upload',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      }
  });
</script>
</body>

</html>