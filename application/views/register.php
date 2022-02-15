<html>
<head>


</head>
<body>

<form  action="" method="POST"  >
    <input name="mail" placeholder="mail gir"></input><br>

    <input type="password" placeholder="şifre gir" name="sifre"></input><br>

    <input type="text" placeholder="ad gir" name="ad"></input><br>


    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />

    <button  type="submit" name="kayitbuton" >KAYIT OL</button>

    <?php


      if(!empty(form_error('mail')))
    {

          echo form_error('mail');

    }

      if(!empty(form_error('ad')))
      {

          echo form_error('ad');
      }

      if(!empty(form_error('sifre'))){

          echo form_error('sifre');

      }
      elseif(!empty($succes)){

           echo $succes;

      }








    ?>










</form>
</body>
</html>