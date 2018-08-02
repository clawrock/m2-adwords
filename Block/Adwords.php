<?php

namespace ClawRock\AdWords\Block;

class Adwords extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     *
     * @var \Magento\Sales\Model\OrderFactory
     */
    protected $orderFactory;

    /**
     * @var \ClawRock\AdWords\Helper\Config
     */
    protected $config;

    /**
     * @param \Magento\Checkout\Model\Session         $checkoutSession
     * @param \Magento\Sales\Model\OrderFactory       $orderFactory
     * @param \ClawRock\AdWords\Helper\Config               $config
     * @param \Magento\Backend\Block\Template\Context $context
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Sales\Model\OrderFactory $orderFactory,
        \ClawRock\AdWords\Helper\Config $config,
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        $this->checkoutSession = $checkoutSession;
        $this->orderFactory    = $orderFactory;
        $this->config          = $config;

        parent::__construct($context, $data);
    }

    public function getConversionId()
    {
        return $this->config->getConversionId();
    }

    public function getConversionLabel()
    {
        return $this->config->getConversionLabel();
    }

    public function getConversionValue()
    {
        $lastOrderId = $this->checkoutSession->getLastOrderId();

        $order = $this->orderFactory->create()->load($lastOrderId);
        return number_format($order->getGrandTotal(), 2);
    }

    public function isGlobalTagEnabled()
    {
        return $this->config->isGlobalTagEnabled();
    }
}
