<?php
    function fileUpload($pic, $source = "user"){
        if($pic["error"] == 4){
            $pictureName = "avatar.webp";

            if($source == "animal"){
                $pictureName = "picture.webp";
            }

            $message = "No picture has been chosen!";
        } else {
            $checkIfImage = getimagesize($pic["tmp_name"]);
            $message = $checkIfImage ? "Ok" : "Not an image";
        }

        if($message == "Ok"){
            $ext = strtolower(pathinfo($pic["tmp_name"], PATHINFO_EXTENSION));
            $pictureName = uniqid(""). " " . $ext;
            $destination = "images/{$pictureName}";
            
            if($source == "animal"){
                $destination = "../images/{$pictureName}";
            }

            move_uploaded_file($pic["tmp_name"], $destination);
        } elseif($message == "Not an image"){
            $pictureName = "picture.webp";
            $message = "The file is not an image";
        }
        return [$pictureName, $message];
    }