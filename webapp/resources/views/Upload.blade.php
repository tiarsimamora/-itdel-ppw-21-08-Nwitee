<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload</title>
  
  <link rel="stylesheet" href="upload.css">
</head>
<body>
 <section>
  <form action="" method="POST" enctype="multipart/form-data" >
   <div class="container">
    <div class="row">
     <div class="col-md-12">
      <div class="form-group">
       <label class="control-label">Upload File</label>
       <div class="preview-zone hidden">
        <div class="box box-solid">
         <div class="box-header with-border">
          <div><b>Preview</b></div>
          <div class="box-tools pull-right">
           <button type="button" class="btn btn-danger btn-xs remove-preview">
            <i class="fa fa-times"></i> Reset This Form
           </button>
          </div>
         </div>
         <div class="box-body"></div>
        </div>
       </div>
       <div class="dropzone-wrapper">
        <div class="dropzone-desc">
         <i class="glyphicon glyphicon-download-alt"></i>
         <p>Choose an image file or drag it here.</p>
        </div>
        <input type="file"  accept="image/*" role="button" datatestid = "file-input" class="dropzone">
       </div>
      </div>
     </div>
    </div>
    <div class="row">
     <div class="col-md-12">
      <button type="submit" class="btn btn-primary pull-right">Upload</button>
     </div>
    </div>
   </div>
  </form> 
 </section>
 
 
</body>
</html>