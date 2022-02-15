<html>
<body>
<form action="<?php site_url('Homepage/update');    ?>" method="POST">

    <input  name="ad" value="<?php  echo $user->ad;   ?>" type="text"  ></input>
    <input   name="sifre" value="<?php echo $user->sifre; ?>" type="text"  ></input>
    <input  name="mail" value="<?php echo $user->mail; ?>"></input>
    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
    <input  type="hidden"  name="id" value="<?php   echo $user->id; ?>" >
    <input
    <button type="submit"   name="guncelbuton"  ></button>



</form>


</body>


</html>
<?php

if (!empty(form_error('ad'))){
    echo form_error('ad');
}

if (!empty(form_error('sifre'))){
    echo form_error('sifre');
}

if (!empty(form_error('mail'))){
    echo form_error('mail');

}
if (!empty(form_error('id'))){
    echo form_error('id');
}
if (!empty($succes)){
    echo $succes;
}







?>