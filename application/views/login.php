<html>
<head>

<body>


<form  action="" method="POST">

    <input type="text" name="ad" placeholder="adını gir"></input><br>
    <input type="password" name="sifre" placeholder="SİFRE GİR"></input><br>
    <input type="text" name="mail" placeholder="mail"></input><br>
    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
    <button type="submit" name="buton">GİRİŞ YAP</button>


</form>

</body>

</head>

</html>

<?php

  if (!empty(form_error('ad'))){

       echo form_error('ad');

  }

  if (!empty(form_error('sifre'))){


      echo form_error('sifre');
  }
if (!empty($succes)){


    echo $succes;
}









?>