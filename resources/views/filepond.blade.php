<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>filepond</title>
    <link href="/assets/vendors/filepond/dist/filepond.css" rel="stylesheet" />
</head>

<body>

  <form method="post" action="" enctype="multipart/form-data">
    <label for="thumbnail">Upload File</label>
    <input type="file" name="thumbnail" id="thumbnail">
  </form>

<script src="/assets/vendors/filepond/dist/filepond.js"></script>
<script>
  const inputElement = document.querySelector('input[type="file"]');
  const pond = FilePond.create( inputElement );
</script>
</body>

</html>