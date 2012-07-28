<html>
<head>
  <title>上传状态</title>
  <meta charset="utf-8"></meta>
</head>
<body>

</body>
</html>
<?php
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/png")))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "错误: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . "文件已经存在";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "上传成功，地址：" . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "上传失败";
  }
?>
</body>
</html>