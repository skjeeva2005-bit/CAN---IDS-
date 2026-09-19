<?php
function DecryptFile($InFileName,$OutFileName,$password){
    //check the file if exists
    if (file_exists($InFileName)){
     
    //get file content as string
    $InFile = file_get_contents($InFileName);
    $InFile = base64_decode($InFile);
    // get string length
    $StrLen = strlen($InFile);
     
    // get string char by char
    for ($i = 0; $i < $StrLen ; $i++){
    //current char
    $chr = substr($InFile,$i,1);
     
    //get password char by char
    $modulus = $i % strlen($password);
    $passwordchr = substr($password,$modulus, 1);
     
    //encryption algorithm
    $OutFile .= chr(ord($chr)-ord($passwordchr));
    }
     
    //write to a new file
    if($newfile = fopen($OutFileName, "c")){
    file_put_contents($OutFileName,$OutFile);
    fclose($newfile);
    return true;
    }else{
    return false;
    }
    }else{
    return false;
    }
    }
     
    //Example
   /* $orginalfile = 'orginal.jpg';
    $crypt = 'crypt.jpg';
    $decrypt = 'decrypt.jpg';
    $password = 'pass';
     
    CryptFile($orginalfile,$crypt,$password);
    DecryptFile($crypt,$decrypt,$password);*/
?>