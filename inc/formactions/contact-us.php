<?php
if (isset($_POST['data'])) {
    parse_str($_POST['data'], $data);
    $to = "sales@winnieindustries.com";
    $subject = "Winnie Indutries | Contact us";
    $message = '
                <html>
                <head>
                    <title>Winnie Indutries | Contact us</title>
                </head>
                <body>
                <table border="1" cellpadding="5">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                    <tr>
                        <td>'.$data['cname'].'</td>
                        <td>'.$data['cemail'].'</td>
                        <td>'.$data['cmsg'].'</td>
                    </tr>
                </table>
                </body>
                </html>';
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    //$headers .= 'From: <rupinder.developer@yahoo.in>' . "\r\n";
        
    $result = mail($to,$subject,$message,$headers);
    if ($result === true) {
        echo 'true';
    } else {
        echo 'false';
    }       
}
?>