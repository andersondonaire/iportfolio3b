<?php

if (isset($_POST['salvar'])) {

    Helpers::setSettings("nome_perfil", $_POST['nome_perfil']);
    Helpers::setSettings("link_face", $_POST['link_face']);
    Helpers::setSettings("link_insta", $_POST['link_insta']);
    Helpers::setSettings("link_linkedin", $_POST['link_linkedin']);

    $txt_home = $_POST['txt_home'];
    $txt_home = explode(",", $txt_home);


    // var_dump($txt_home);

    $json_txt_home = json_encode($txt_home, true);

    Helpers::setSettings("txt_home", $json_txt_home);

    
    //IMAGENS

    $caminho = "../img/";

    if (isset($_FILES['img_profile'])) {

        $img = $_FILES['img_profile'];

        if (file_exists($caminho . Helpers::getSettings('img_profile'))) {
            unlink($caminho . Helpers::getSettings('img_profile'));
        }

       

        include_once "./class/upload/class.upload.php";

        $imgPerfil = new \Verot\Upload\Upload($_FILES['img_profile']);

        if ($imgPerfil->uploaded) {
            $imgPerfil->file_new_name_body = mt_rand();
            $imgPerfil->image_resize = true;
            $imgPerfil->image_convert = 'jpg';
            $imgPerfil->image_x = 200;
            $imgPerfil->image_ratio_y = true;
            $imgPerfil->process($caminho);

            if ($imgPerfil->processed) {
                $imgPerfil->clean();

                $rImgPerfil = connect::update("settings", ['setting_value' => $imgPerfil->file_dst_name], "setting_key='img_profile'");

                if ($rImgPerfil['codErro'] != 0) {
                    echo "Erro ao salvar a imagem do perfil no banco de dados.{$rImgPerfil['msg']}";
                }
            } else {
                echo 'Erro ao processar a imagem do perfil: ' . $imgPerfil->error;
            }
        }
    }


    // Processamento da imagem de fundo
    if (!empty($_FILES['img_fundo']['name'])) {

        //buscar nome da imagem no banco de dados
        $img_antiga = Helpers::getSettings("img_fundo");

        if (file_exists($caminho . $img_antiga)) {
            unlink($caminho . $img_antiga);
        }

        $imgFundo = new \Verot\Upload\Upload($_FILES['img_fundo']);

        if ($imgFundo->uploaded) {
            $imgFundo->file_new_name_body = 'img_fundo';
            $imgFundo->image_resize = true;
            $imgFundo->image_convert = 'webp';
            $imgFundo->image_x = 1920; // tamanho maior para a imagem de fundo
            $imgFundo->image_ratio_y = true;
            $imgFundo->process($caminho);
            if ($imgFundo->processed) {
                $imgFundo->clean();
                $rImgFundo = $sql->update("settings", ['setting_value' => $imgFundo->file_dst_name], "id=7");
                if ($rImgFundo['codErro'] != 0) {
                    echo "Erro ao salvar a imagem do perfil no banco de dados.";
                }
            } else {
                echo 'Erro ao processar a imagem do perfil: ' . $imgPerfil->error;
            }
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

    $txt_home = json_decode(Helpers::getSettings("txt_home"));
    $txt_home_value = "";

    $total = count($txt_home);
    $i = 0;

    foreach ($txt_home as $value) {
        $txt_home_value .= $value;
        if (++$i < $total) {
            $txt_home_value .= ",";
        }
    }

    ?>
    <input class="form-control" type="text" name="txt_home" id="txt_home" value="<?= $txt_home_value ?>">
    <hr>
    <label for="img_profile">Imagem Perfil</label><br>
    <input type="file" name="img_profile" id="img_profile" accept="image/*">
    <br>

    <label for="img_background">Imagem de Fundo</label><br>
    <input type="file" name="img_background" id="img_fundo" accept="image/*">

    <br>
    <input class="btn btn-success float-end" type="submit" value="Salvar" name="salvar">

</form>