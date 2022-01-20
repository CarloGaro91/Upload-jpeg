<?php

Class UploadResize {

    public function MultiUploadImg($NameButton,$dir){
        $nameImgArray = array();
        $Data = date('d_m_Y');
        for ($i = 0; $i < count($_FILES[$NameButton]['name']); $i++) {
            if(!empty($_FILES[$NameButton]['tmp_name'][$i])){// Controllo Array
                
                if ($_FILES[$NameButton]['type'][$i] == 'image/jpeg'){ // Controllo type
                    $extension = '.jpg'; // Estensione File
                    $nameImg = $Data.'_'.rand(1,100). $extension; // Nome File Modificabile
                    $img = imagecreatefromjpeg($_FILES[$NameButton]['tmp_name'][$i]); 
                    imagejpeg($img,$dir.$nameImg,30); // 0-30 = [Qualità]
                    $nameImgArray [] = $nameImg; // Salva Img nell'array
                }
                /* else if($_FILES['image']['type'][$i] == 'image/png'){// Controllo png
                    $nameImg = $Data.'_'.rand(1,100).'.png'; // Nome File Modificabile
                    $img = imagecreatefrompng($_FILES[$NameButton]['tmp_name'][$i]); 
                    imagepng($img,$dir.$nameImg,1); 
                    $nameImgArray [] = $nameImg;
                } */
                else{
                    $nameImgArray [] = "Not_Img_$i";
                }
            }
        }
        return $nameImgArray ; // Ritorno Nome immagine 
         //var_dump($nameImgArray);
    }

    public function SingleUploadImg($NameButton,$dir){
        $Data = date('d_m_Y');
        $nameImgArray = array();
        if(!empty($_FILES[$NameButton]['tmp_name'])){
            
            if ($_FILES[$NameButton]['type'] == 'image/jpeg'){ // Controllo Jpeg
                $extension = '.jpg'; // Estensione File
                $nameImg = $Data.'_'.rand(1,100). $extension; // Nome File 
                $img = imagecreatefromjpeg($_FILES[$NameButton]['tmp_name']); 
                imagejpeg($img,$dir.$nameImg,30); 
                $nameImgArray [] = $nameImg;
            }
            /* else if($_FILES['image']['type'] == 'image/png'){// Controllo png
                $nameImg = $Data.'_'.rand(1,100).'.png'; // Nome File 
                $img = imagecreatefrompng($_FILES[$NameButton]['tmp_name']); 
                imagepng($img,$dir.$nameImg,5); 
                $nameImgArray [] = $nameImg;
            } */
            else{
                $nameImgArray [] = 'Not_Img';
            }
            return $nameImgArray;
        }
    }
    
}

?>
