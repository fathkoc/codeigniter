<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url("assets/dropzone.min.css");  ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo site_url("assets/dropzone.css") ?>">
    <script src="<?php echo site_url("assets/dropzone.min.js")?>"></script>

</head>
<body>
<div class="container">
    <div class="row">

      <div class="col-4">

          <img src="#">
          <h5>id gelcek</h5>
          <h2>title gelcek</h2>

      </div>

        <div class="col-12">

            <div class="form-group">
                <div action="<?php echo site_url('Homepage/add-image'); ?>" class="dropzone dropzone-area" id="dpz-single-file">
                    <div class="dz-message">
						 <span class="m-dropzone__msg-desc">
						   Bir Adet Resim Seçiniz.
						 </span>
                    </div>
                </div>
                <form  action="<?php echo base_url('Homepage/liste')  ?>" method="POST" >
                    <br>
                    <input name="title"  type="text"></input>
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
                    <br>
                    <button type="submit" name="eklebuton" >KAYDET</button>
                </form>
            </div>

        </div>

    </div>
</div>


</body>
</html>

<?php


if (!empty(form_error('resim'))){

    echo form_error('resim');


}








?>
