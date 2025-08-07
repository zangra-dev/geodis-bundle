<?php
declare(strict_types=1);

namespace GeodisBundle\Service\DAO;

use Doctrine\ORM\EntityManagerInterface;
use GeodisBundle\Service\DAO\Exception\ApiException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\rewind_body($response);

class Connection
{
    const CONTENT_TYPE_JSON = 'application/json';

    private static $baseUrl;
    private static $serviceRecordSend;
    private static $serviceValidationSend;

    private static $clientId;
    private static $clientSecret;

    private static $em;
    private static $contentType = self::CONTENT_TYPE_JSON;

    public static function setConfig(array $config, EntityManagerInterface $em)
    {
        self::$em = $em;
        self::$baseUrl = $config['baseUrl'];
        self::$serviceRecordSend = $config['serviceRecordSend'];
        self::$serviceValidationSend = $config['serviceValidationSend'];

        self::$clientId = $config['clientId'];
        self::$clientSecret = $config['clientSecret'];
    }

    /**
     * Create Request.
     *
     * @return GuzzleHttp\Psr7\Request;
     */
    private static function createRequest($method = 'GET', $endpoint, $body, $serviceCalled)
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
        $now = $now->getTimestamp() * 1000;

        if ('enregistrement' == $serviceCalled) {
            $serviceCalled = self::$serviceRecordSend;
        } else {
            $serviceCalled = self::$serviceValidationSend;
        }

        $hash = self::$clientSecret.';'.self::$clientId.';'.$now.';fr;'.$serviceCalled.';'.$body;

        $hash = hash('sha256', $hash);

        $header = array('X-GEODIS-Service' => self::$clientId.';'.$now.';fr;'.$hash);

        $request = new Request($method, $endpoint, $header, $body);

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
        //$url = self::$baseUrl;
        if ('enregistrement' == $service) {
            $url = self::$baseUrl.'/'.self::$serviceRecordSend;
        } else {
            $url = self::$baseUrl.'/'.self::$serviceValidationSend;
        }

        try {
            $client = new Client();
            $request = self::createRequest($method, $url, $body, $service);
            $response = $client->send($request);
        } catch (\Exception $ex) {
            $error = $ex->getResponse()->getBody()->getContents();

            throw new ApiException($ex->getMessage(), $ex->getResponse()->getStatusCode());
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

        if (self::CONTENT_TYPE_JSON === self::$contentType) {
            return self::parseJSON($response, $returnSingleIfPossible);
        }

        throw new ApiException($response->getReasonPhrase(), $response->getStatusCode());
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
