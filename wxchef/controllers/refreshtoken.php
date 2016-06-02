<?php
        $url= "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxa997c956cf6631b0&secret=ee3f2a43a6c508708780dba0c5bd7393";
        $result         = wxHttpsRequest($url);
        $jsoninfo       = json_decode($result, true);
        $access_token   = $jsoninfo["access_token"];
        $_SESSION['update_code']   = $jsoninfo["access_token"];

        // var_dump($_SESSION['update_code']);
        // var_dump($access_token); 

        function wxHttpsRequest($url,$data = null)
        {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            if (!empty($data)){
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($curl);
            curl_close($curl);
            return $output;
        }

?>