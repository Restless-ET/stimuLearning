<?php

/**
 * HTTP Authentication filter for Symfony
 *
 * @package    ccam
 * @subpackage filter
 * @author     Ubiprism Lda. / be.ubi <contact@beubi.com>
 */
class HttpAuthFilter extends sfFilter
{
    /**
     * Execute filter
     *
     * @param sfFilterChain $filterChain Filter chain
     *
     * @return Nothing
     */
    public function execute ($filterChain)
    {
        // execute filter once
        if ($this->isFirstCall() && sfConfig::get('app_auth') !== false) {
            if (!isset($_SERVER['PHP_AUTH_USER'])) {
                $this->sendHeadersAndExit();
            }
            if (!($_SERVER['PHP_AUTH_USER'] == sfConfig::get('app_auth_username')
                && $_SERVER['PHP_AUTH_PW'] == sfConfig::get('app_auth_password'))
            ) {
                $this->sendHeadersAndExit();
            }
        }
        // execute next filter
        $filterChain->execute();
    }

    /**
     * Sends HTTP Auth headers and exits
     *
     * @return null
     */
    private function sendHeadersAndExit ()
    {
        header('WWW-Authenticate: Basic realm="'.sfConfig::get('app_auth_realm').'"');
        header('HTTP/1.0 401 Unauthorized');
        exit();
    }
}
