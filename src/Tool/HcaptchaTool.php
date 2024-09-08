<?php
namespace DCO\HcaptchaTools\Tool;

use DCO\HcaptchaTools\Exception\CaptchaUnconfiguredException;
use Pimcore\Model\WebsiteSetting;

class HcaptchaTool {
    public static function getSiteKey() {
        $setting = WebsiteSetting::getByName('hcaptcha_sitekey');
        if (empty($setting))
            throw new CaptchaUnconfiguredException();
        return $setting->getData();
    }
    private static function getSecretKey() {
        $setting = WebsiteSetting::getByName('hcaptcha_secretkey');
        if (empty($setting))
            throw new CaptchaUnconfiguredException();
        return $setting->getData();
    }

    /**
     *
     *
     * 'response' => $_POST['h-captcha-response']
     *
     * @param $response
     * @return void
     */
    public static function verifyResponse($response) : bool {
        $data = array(
            'secret' => self::getSecretKey(),
            'response' => $response
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        $responseData = json_decode($response);
        return ($responseData->success);
    }
}
