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
interface AllMySMSManagerInterface
{
    public function createSMS();

    /**
     * @return MMS
     */
    public function createMMS();

    /**
     * @return Email
     */
    public function createEmail();

    public function send($message, $simulate=false, $simple=false);
}
