<?php

if(isset($_POST)){

Helpers::setSettings("nome_perfil",$_POST['nome_perfil']);
Helpers::setSettings("link_face",$_POST['link_face']);
Helpers::setSettings("link_insta",$_POST['link_insta']);
Helpers::setSettings("link_linkedin",$_POST['link_linkedin']);

$txt_home = $_POST['txt_home'];
$txt_home = explode(",",$txt_home);

$json_txt_home = json_encode($txt_home);

Helpers::setSettings("txt_home",$json_txt_home);

//IMAGENS

if(isset($_FILES['img_profile'])){

    $img = $_FILES['img_profile'];
    
    if(file_exists(__DIR__."../../img/".Helpers::getSettings('img_profile'))){
        unlink(__DIR__."../../img/".Helpers::getSettings('img_profile'));

        

    }

}





}
?>


<h1>Home</h1>

<form class="form-group" method="post" enctype="multipart/form-data">

    <label for="nome_perfil">Nome de Perfil</label>
    <input class="form-control" type="text" name="nome_perfil" id="nome_perfil" value="<?= Helpers::getSettings("nome_perfil") ?>">

    <label for="link_face">Link do Facebook</label>
    <input class="form-control" type="text" name="link_face" id="link_face" value="<?= Helpers::getSettings("link_face") ?>">

    <label for="link_insta">Link do Instagram</label>
    <input class="form-control" type="text" name="link_insta" id="link_insta" value="<?= Helpers::getSettings("link_insta") ?>">

    <label for="link_linkedin">Link do Linkedin</label>
    <input class="form-control" type="text" name="link_linkedin" id="link_linkedin" value="<?= Helpers::getSettings("link_linkedin") ?>">

    <label for="txt_home">Texto da Home:</label>

    <?php

    $txt_home = json_decode(Helpers::getSettings("txt_home"), true);
    $txt_home_value = "";
    foreach ($txt_home as $value) {
        $txt_home_value .= $value . ", ";
    }
    ?>
    <input class="form-control" type="text" name="txt_home" id="txt_home" value="<?= $txt_home_value ?>">
    <hr>
    <label for="img_profile">Imagem Perfil</label><br>
    <input type="file" name="img_profile" id="img_profile" accept="image/*">
    <br>

    <label for="img_background">Imagem de Fundo</label><br>
    <input type="file" name="img_background" id="img_background" accept="image/*">

    <br>
    <input class="btn btn-success float-end" type="submit" value="Salvar" name="salvar">

</form>