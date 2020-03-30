<?php

namespace Geodis\DAO;

use Doctrine\ORM\EntityManager;
use Geodis\DAO\Exception\ApiException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class Connection
{
    const CONTENT_TYPE_JSON = 'application/json';

    private static $baseUrl;
    private static $serviceRecordSend;
    private static $serviceValidationSend;

    private static $geodisClientId;
    private static $geodisClientSecret;

    private static $em;
    private static $contentType = self::CONTENT_TYPE_JSON;

    public static function setConfig(array $config, EntityManager $em)
    {
        self::$em = $em;
        self::$baseUrl = $config['baseUrl'];
        self::$serviceRecordSend = $config['serviceRecordSend'];
        self::$serviceValidationSend = $config['serviceValidationSend'];

        self::$geodisClientId = $config['clientId'];
        self::$geodisClientSecret = $config['clientSecret'];
    }



    /**
     * Create Request.
     *
     * @return GuzzleHttp\Psr7\Request;
     */
    private static function createRequest($method = 'GET', $endpoint, $body)
    {
        /*
            X-GEODIS-Service:
            id;current timestamp in ms;language;hash
                Id => My Space login
                CurrentTimestamp => Timestamp when you created the call. Epoch format in  millisecondes
                Language => Language expected
                Hash => Message hashe sha256
                        Message sent, to call one of the methods of the service must be the subject of a calculation of its hash sha256.
                        This calculation is based on the following parameter :
                        Api key;id;current timestamp in ms;language;service;json query parameter
                            API Key => API  key in My Space
                            Id => My Space login
                            Current Timestamp => Timestamp when you created the call. Epoch format in  millisecondes
                            Language => Langue expected
                            Service => Service call
                            Json query parameter => The parameters call, JSON format

            Example =>
            X-GEODIS-Service:
            ZANGRA;1584105904250;fr;64c34a8d118f81f9c72682779cac98501d860cc1e2eb76456887b105aaa5b3cd
        */
        $now = new \DateTime('now');
        $now = $now->getTimestamp();

        $hash = self::$geodisClientSecret.';'.self::$geodisClientId.';'.$now.';fr;'.$endpoint.';'.$body;
        $hash = hash('sha256', $hash);

        $headers = array_merge($headers, [
            'X-GEODIS-Service' => self::$geodisClientId.';'.$now.';fr;'.$hash
        ]);

        $request = new Request($method, $endpoint, $headers, $body);

        return  $request;
    }

    /**
     * Execute request.
     *
     * @param string $method
     * @param string $json
     * @param string $url
     *
     * @return array
     */
    public static function Request($method, $service, $body = null)
    {
        if ($service == "enregistrement") {
            $url = self::$baseUrl.'/'.self::$serviceRecordSend;
        } else {
            $url = self::$baseUrl.'/'.self::$serviceValidationSend;
        }

        try {
            $client = new Client();
            $request = self::createRequest($method, $url, $body);
            $response = $client->send($request);
        } catch (\Exception $ex) {
            $error = $ex->getResponse()->getBody()->getContents();

            throw new ApiException($error, $ex->getResponse()->getStatusCode());
        }

        try {
            $parsedResponse = self::parseResponse($response, $request->getMethod());

            return $parsedResponse;
        } catch (\Exception $ex) {
            throw new ApiException($e->getMessage(), $e->getStatusCode());
        }
    }

    private static function parseResponse(Response $response, $method, $returnSingleIfPossible = true)
    {
        if (204 === $response->getStatusCode() && 'POST' == $method) {
            throw new ApiException($response->getReasonPhrase(), $response->getStatusCode());
        }

        if (self::CONTENT_TYPE_XML === self::$contentType) {
            return $response->getBody()->getContents();
        }

        if (self::CONTENT_TYPE_JSON === self::$contentType) {
            return self::parseJSON($response, $returnSingleIfPossible);
        }
    }

    /**
     * Parse JSON response.
     *
     * @param Response $response
     * @param bool     $returnSingleIfPossible
     *
     * @return array (associative)
     */
    private static function parseJSON(Response $response, $returnSingleIfPossible = true)
    {
        try {
            Psr7\rewind_body($response);
            $json = json_decode($response->getBody()->getContents(), true);

            if (is_array($json)) {
                if (array_key_exists('d', $json)) {
                    if (array_key_exists('results', $json['d'])) {
                        if ($returnSingleIfPossible && 1 == count($json['d']['results'])) {
                            return $json['d']['results'][0];
                        }

                        return $json['d']['results'];
                    }

                    return $json['d'];
                }
            }

            return $json;
        } catch (\ApiException $e) {
            throw new ApiException($e->getMessage(), $e->getStatusCode());
        }
    }

    public static function setContentType($type = 'json')
    {
        if ('xml' === $type) {
            self::$contentType = self::CONTENT_TYPE_XML;
        }

        if ('json' === $type) {
            self::$contentType = self::CONTENT_TYPE_JSON;
        }
    }
}
