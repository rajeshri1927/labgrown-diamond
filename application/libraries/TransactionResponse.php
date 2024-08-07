<?php

class TransactionResponse {

    //private $respHashKey = "b20aa5ad5c4b64e71d";
    private $respHashKey = "faace30b9f944dabd1";
    //private $respHashKey = "KEYRESP123657234";

    /**
     * @return string
     */
    public function getRespHashKey()
    {
        return $this->respHashKey;
    }

    /**
     * @param string $respHashKey
     */
    public function setRespHashKey($respHashKey)
    {
        $this->respHashKey = $respHashKey;
    }



    public function validateResponse($responseParams)
    {
        $str = $responseParams["mmp_txn"].$responseParams["mer_txn"].$responseParams["f_code"].$responseParams["prod"].$responseParams["discriminator"].$responseParams["amt"].$responseParams["bank_txn"];
        $signature =  hash_hmac("sha512",$str,$this->respHashKey,false);
        
        if($signature == $responseParams["signature"]){
            return true;
        } else {
            return false;
            echo $str;
        }

    }
}
