<?php
/**
 * Created by PhpStorm.
 * User: westin
 * Date: 3/15/2015
 * Time: 5:39 PM
 */

namespace TechData\AS2SecureBundle\Factories;

use Psr\Log\LoggerInterface;
use TechData\AS2SecureBundle\Factories\Partner as PartnerFactory;
use TechData\AS2SecureBundle\Models\Adapter as AdapterModel;

/**
 * Class Adapter
 *
 * @package TechData\AS2SecureBundle\Factories
 */
class Adapter
{
    /**
     * @var PartnerFactory
     */
    private $partnerFactory;
    /**
     * @var string
     */
    private $AS2_DIR_BIN;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Adapter constructor.
     *
     * @param Partner $partnerFactory
     * @param         $AS2_DIR_BIN
     * @param LoggerInterface  $logger
     */
    function __construct(PartnerFactory $partnerFactory, $AS2_DIR_BIN, LoggerInterface $logger)
    {
        $this->partnerFactory = $partnerFactory;
        $this->AS2_DIR_BIN    = $AS2_DIR_BIN;
        $this->logger         = $logger;
    }


    /**
     * @param $partner_from
     * @param $partner_to
     *
     * @return AdapterModel
     * @throws \TechData\AS2SecureBundle\Models\AS2Exception
     */
    public function build($partner_from, $partner_to)
    {
        $adapter = new AdapterModel($this->partnerFactory, $this->AS2_DIR_BIN, $this->logger);
        $adapter->initialize($partner_from, $partner_to);

        return $adapter;
    }
}