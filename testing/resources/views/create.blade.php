<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form  method="post" enctype="multipart/form-data">
        @csrf
        <input name="name" class="form-control form-control-sm" type="text" placeholder="Nhap ten" required>
        <div class="form-group">
            <label for="exampleFormControlFile1">Chon anh dai dien</label>
            <input type="file" name="image" onchange="previewDataImg()" class="form-control-file" id="exampleFormControlFile1" required>
        </div>
        <img id="previewImg">
        <input name="gt" class="form-control form-control-sm" type="text" placeholder="Nhap gioi tinh" required>
        <input name="sdt" class="form-control form-control-sm" type="text" placeholder="Nhap so dien thoai" required>
        <input name="email" class="form-control form-control-sm" type="email" placeholder="Nhap email" required>
        <button type="submit">Submit</button>
    </form>
    <script>
        function previewDataImg() {
            let previewImg = document.getElementById('previewImg');
            let url = url.createObjectURL(event.target.files[0]);
            previewImg.src = url;
            previewImg.onload = function(){
                URL.revokeObjectURL(url);
            }
        }
    </script>
</body>
</html>