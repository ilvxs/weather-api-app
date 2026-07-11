<?php

class HttpClient
{
    public function request(
        string $method,
        string $url,
        array $headers = [],
        ?string $body = null
    )
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        if (!empty($headers))
        {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        if ($body !== null)
        {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        }

        $response = curl_exec($curl);

        $statusCode = curl_getinfo(
            $curl,
            CURLINFO_HTTP_CODE
        );

        if (curl_errno($curl))
        {
            throw new Exception(
                curl_error($curl)
            );
        }

        curl_close($curl);

        return [
            "status" => $statusCode,
            "body" => $response
        ];
    }

    public function get(string $url)
    {
        return $this->request(
            "GET",
            $url
        );
    }
}