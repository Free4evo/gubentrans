<?php

function send_mail( $sender, $receiver, $subject, $text, $sitename = '', $filepath = '', $filename = '', $bcc = '' )
{
    $subject = '=?UTF-8?B?'.base64_encode( filter_var( $subject ) ).'?=';

    if( empty ($sitename) )
        $sitename = $_SERVER['SERVER_NAME'];
    else
        $sitename = '=?UTF-8?B?'.base64_encode( filter_var( $sitename, FILTER_SANITIZE_STRING ) ).'?=';

   if( empty ($filepath) )
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: ".$sitename." <".$sender.">\r\n";
        $headers .= "Return-path: <".$sender.">\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        if(!empty($bcc)){
            $headers .= "Bcc: ".$bcc."\r\n";
        }
        $multipart = $text;
    }
   else
    {
        $boundary = "--".md5(uniqid(time()));
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: ".$sitename." <".$sender.">\r\n";
        $headers .= "Return-path: <".$sender.">\r\n";
        $headers .="Content-Type: multipart/mixed; boundary=\"".$boundary."\"\r\n";
        if(!empty($bcc)){
            $headers .= "Bcc: ".$bcc."\r\n";
        }
        $multipart = "--".$boundary."\r\n";
        $multipart .= "Content-Type: text/html; charset=UTF-8\r\n";
        $multipart .= "Content-Transfer-Encoding: base64\r\n\r\n";

        $text =  chunk_split(base64_encode( $text ))."\r\n\r\n";

        $multipart .= stripslashes($text);

        $file = '';
        $fp = fopen($filepath, "r");
        if ( $fp )
        {
           $content = fread($fp, filesize($filepath));
            $file .= "--".$boundary."\r\n";
            $file .= 'Content-Type: application/octet-stream'."\r\n";
            $file .= 'Content-Transfer-Encoding: base64'."\r\n";
            $file .= 'Content-Disposition: attachment; filename="=?UTF-8?B?'.base64_encode( filter_var( $filename, FILTER_SANITIZE_STRING ) ).'?="'."\r\n\r\n";
            $file .= chunk_split(base64_encode($content))."\r\n";
        }
        fclose($fp);
        $multipart .= $file."--".$boundary."--\r\n";
    }

    if( mail($receiver, $subject, $multipart, $headers) )
        return true;
    else
        return false;
}

?>
