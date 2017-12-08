<?php
    // Allowed extentions.
    $allowedExts = array("gif", "jpeg", "jpg", "png");

    // Get filename.
    $temp = explode(".", $_FILES["file"]["name"]);

    // Get extension.
    $extension = end($temp);

    // An image check is being done in the editor but it is best to
    // check that again on the server side.
    // Do not use $_FILES["file"]["type"] as it can be easily forged.
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);

    if ((($mime == "image/gif")
    || ($mime == "image/jpeg")
    || ($mime == "image/pjpeg")
    || ($mime == "image/x-png")
    || ($mime == "image/png"))
    && in_array($extension, $allowedExts)) {
        // Generate new random name.
        $name = sha1(microtime()) . "." . $extension;
//echo "nota ". getcwd()  . $name;
//echo "nota ".  $name;
        // Save file in the uploads folder.
        move_uploaded_file($_FILES["file"]["tmp_name"], "http://localhost/cm/upload/" . $name);

        // Generate response.
        $response = new StdClass;
        $response->link =   $name;
        echo stripslashes(json_encode($response));
/*

<PostResponse>
<Location>
https://s3-eu-west-1.amazonaws.com/froala-eu/temp_files%2F1510176226474-image2.jpg
</Location>
<Bucket>
froala-eu
</Bucket>
<Key>
temp_files/1510176226474-image2.jpg
</Key>
<ETag>
"432a2eb3f2435285d5416dd40918c5be"
</ETag>
</PostResponse>


        echo '<PostResponse><Location>'.getcwd()  . $name . '</Location><Bucket>froala-eu </Bucket><Key> 123.jpg</Key><ETag>"432a2eb3f2435285d5416dd40918c5be"</ETag></PostResponse>';
 */      
    }
?>