<html lang="en">
<head>
 <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
 <title>Import  Laravel </title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>
<body>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
   <div class="navbar-header">
    <a class="navbar-brand" href="#"> Import Excel or CSV into  Database</a>
   </div>
  </div>
 </nav>
 <div class="container">
  <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importArticle') }}" class="form-horizontal" method="post" enctype="multipart/form-data" >
   <input type="file" name="import_file" />

                 {{ csrf_field() }}
   <button class="btn btn-primary">篇章</button>
  </form>
  <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importSlip') }}" class="form-horizontal" method="post" enctype="multipart/form-data" >
   <input type="file" name="import_file" />

                 {{ csrf_field() }}
   <button class="btn btn-primary">竹簡</button>
  </form>
  <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importCharacter') }}" class="form-horizontal" method="post" enctype="multipart/form-data" >
   <input type="file" name="import_file" />

                 {{ csrf_field() }}
   <button class="btn btn-primary">字</button>
  </form>
  <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importSlipContent') }}" class="form-horizontal" method="post" enctype="multipart/form-data" >
   <input type="file" name="import_file" />

                 {{ csrf_field() }}
   <button class="btn btn-primary">竹簡內容</button>
  </form>
  <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importCharacterPic') }}" class="form-horizontal" method="post" enctype="multipart/form-data" >
   <input type="file" name="import_file" />

                 {{ csrf_field() }}
   <button class="btn btn-primary">字圖</button>
  </form>
 </div>
</body>
</html>
