<?php

/**
 * Vultr.com Curl Adapter
 *
 * NOTE: this adapter was extracted from
 * https://github.com/usefulz/vultr-api-client and updated for PSR compliance.
 *
 * @package Vultr
 * @version 1.0
 * @author  https://github.com/usefulz
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @see     https://github.com/malc0mn/vultr-api-client
 */

namespace Vultr\Adapter;

use Vultr\Exception\ApiException;
use Vultr\VultrClient;
use Vultr\Cache\CacheInterface;

class CurlAdapter extends AbstractAdapter
{
    /**
     * @var string API endpoint
     */
    protected $endpoint;

    /**
     * API Token
     *
     * @see https://my.vultr.com/settings/
     *
     * @var string $api_token Vultr.com API token
     */
    protected $apiToken;

    /**
     * The API responsecode
     *
     * @var integer
     */
    protected $responseCode;

    /**
     * Debug Variable
     *
     * @var bool Debug API requests
     */
    protected $debug;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * Constructor.
     *
     * @param string $apiToken
     */
    public function __construct($apiToken, CacheInterface $cache = null)
    {
        $this->apiToken = $apiToken;
        $this->responseCode = 0;
        $this->debug = false;
        $this->cache = $cache;

        $this->endpoint = VultrClient::ENDPOINT;
    }

    /**
     * Enable debug mode.
     *
     * @param boolean $debug
     *
     * @return self
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;

        return $this;
    }

    /**
     * Added primarily to allow proper code testing.
     *
     * @param string $endpoint
     */
    public function setEndpoint($endpoint) {
        $this->endpoint = $endpoint;
    }

    /**
     * Is caching enabled?
     *
     * @return boolean
     */
    protected function hasCache()
    {
        return is_object($this->cache);
    }

    /**
     * {@inheritdoc}
     */
    public function get($url, array $args = [])
    {
        return $this->query($url, $args, 'GET');
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, array $args, $getCode = false)
    {
        return $this->query($url, $args, 'POST', $getCode);
    }

    /**
     * API Query Function
     *
     * @param string  $url
     * @param array   $args
     * @param string  $requestType POST|GET
     * @param boolean $getCode     whether or not to return the HTTP response code
     *
     * @return object
     */
    protected function query($url, array $args, $requestType, $getCode = false)
    {
        $url = $this->endpoint . $url . '?api_key=' . $this->apiToken;

        if ($this->debug) {
            print($requestType . ' ' . $url . PHP_EOL);
        }

        $defaults = [
            CURLOPT_USERAGENT => sprintf('%s v%s (%s)', VultrClient::AGENT, VultrClient::VERSION, 'https://github.com/usefulz/vultr-api-client'),
            CURLOPT_HEADER => 0,
            CURLOPT_VERBOSE => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_HTTP_VERSION => '1.0',
            CURLOPT_FOLLOWLOCATION => 0,
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => ['Accept: application/json'],
        ];

        $cacheable = false;
        switch($requestType) {
            case 'POST':
                $postData = http_build_query($args);
                $defaults[CURLOPT_URL] = $url;
                $defaults[CURLOPT_POST] = 1;
                $defaults[CURLOPT_POSTFIELDS] = $postData;
                break;

            case 'GET':
                if ($args !== false) {
                    $getData = http_build_query($args);
                    $defaults[CURLOPT_URL] = $url . '&' . $getData;
                } else {
                    $defaults[CURLOPT_URL] = $url;
                }

                $cacheable = true;
                if ($this->hasCache()) {
                    $response = $this->cache->serveFromCache($defaults[CURLOPT_URL]);
                    if ($response !== false) {
                        return $response;
                    }
                }
                break;
        }

        // To avoid rate limit hits.
        if ($this->hasCache() && $this->cache->readLast() == time()) {
            usleep(500000);
        }

        $apisess = curl_init();
        curl_setopt_array($apisess, $defaults);
        $response = curl_exec($apisess);
        if ($this->hasCache()) {
            $this->cache->writeLast();
        }

        // Check to see if there were any API exceptions thrown.
        // If so, then error out, otherwise, keep going.
        $this->isAPIError($apisess, $response, $getCode);
        // The call above also closes the curl

        if ($getCode) {
            return (int) $this->responseCode;
        }

        // Return the decoded JSON response.
        $array = json_decode($response, true);

        if ($this->hasCache()) {
            if ($cacheable) {
                $this->cache->saveToCache($url, $response);
            } else {
                $this->cache->purgeCache($url);
            }
        }

        return $array;
    }

    /**
     * @param $responseObj
     * @param $response
     * @param $getCode
     *
     * @throws ApiException
     */
    protected function isAPIError($responseObj, $response, $getCode)
    {
        $code = curl_getinfo($responseObj, CURLINFO_HTTP_CODE);
        curl_close($responseObj);

        if ($getCode) {
            $this->responseCode = $code;
            return;
        }

        if ($this->debug) echo $code . PHP_EOL;

        $this->reportError($code, $response);
    }
}
