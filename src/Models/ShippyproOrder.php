<?php

namespace yax\ShippyProConnector\Models;
use yax\ShippyProConnector\Services\ShippyProClient;

class ShippyproOrder{
    public $OrderID, $LabelURL, $PDF, $ZPL, $CarrierID, $MarketPlacePlatform, $TransactionID, $TrackingCarrier, $TrackingNumber, $TrackingExternalLink, $AdditionalTrackingNumbers, $Status;

    /**
     * Create new ShippyproOrder object
     *
     * @param object Order object returned from ShippyproAPI
     *
     * @return void
     */
    public function __construct($params)
    {
        foreach ($params as $key => $param){
            if(property_exists($this, $key)){
                $this->$key = $param;
            }
        }
    }

    /**
     * Get Shippypro Order data from ShippyPro API by order ID
     *
     * @param integer $id Order id
     *
     * @return ShippyproOrder Order object
     */
    public static function getOrder($id){
        $client = new ShippyProClient();
        $res = $client->order($id);
        $order = new ShippyproOrder($res);
        return $order;
    }
}
