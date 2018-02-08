<?php

namespace ZephyrHQ\AllMySMSBundle\Provider;

use Davaxi\AllMySMS\Client;
use Davaxi\AllMySMS\Model\Email;
use Davaxi\AllMySMS\Model\MMS;
use Davaxi\AllMySMS\Model\SMS;
use Davaxi\AllMySMS\Service\Message\OutGoing;
use Exception;

/**
 * Description of AllMySMSProvider
 *
 * @author Nicolas de Marqué <ndm@zephyr-web.fr>
 */
class AllMySMSManager implements AllMySMSManagerInterface
{
    /** @var OutGoing */
    protected $service;
    /** @var boolean */
    protected $simulate;
    /** @var boolean */
    protected $simple;
    
    public function __construct($api_login, $api_key, $simulate, $simple)
    {
        $client = new Client();
        $client->setLogin($api_login);
        $client->setApiKey($api_key);
        $this->simple = (bool)$simple;
        $this->simulate = (bool)$simulate;
        
        $this->service = new OutGoing($client);
    }

    /**
     * @return SMS
     */
    public function createSMS()
    {
        return new SMS();
    }

    /**
     * @return MMS
     */
    public function createMMS()
    {
        return new MMS();
    }

    /**
     * @return Email
     */
    public function createEmail()
    {
        return new Email();
    }

    public function send($message, $simulate=false, $simple=false)
    {
        //dump($message, $this);
        if($message instanceof SMS){
            if($simulate || $this->simulate) {
                return $this->service->simulateSMS($message);
            } elseif($simple || $this->simple) {
                return $this->service->simpleSMS($message);
            }
            echo "a";
            return $this->service->sendSMS($message);
        } elseif($message instanceof MMS){
            return $this->service->sendMMS($message);
        } elseif($message instanceof Email){
            return $this->service->sendEmail($message);
        }
        throw new Exception(sprintf("Type %s isn't recognized and cannot sended."
        . " Recognized types are %s, %s and %s", get_class($message), SMS::class, MMS::class, Email::class));
    }
}
