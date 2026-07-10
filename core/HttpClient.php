<?php

class HttpClient
{
    public function get(string $url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (curl_errno($curl))
        {
            throw new Exception(curl_error($curl));
        }

        curl_close($curl);

        return [

            "status" => $statusCode,

            "body" => $response

        ];
    }
}