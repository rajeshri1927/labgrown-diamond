<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CSV File Upload</title>
</head>
<body>

<?php echo form_open_multipart(base_url('admin/ImageUpload/upload')); ?>

<label for="csv_file">Select CSV File:</label>
<input type="file" name="csv_file" accept=".csv" required>
<br>
<input type="submit" value="Upload">
<?php echo form_close(); ?>

</body>
</html>
