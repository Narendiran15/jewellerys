<?php

/**
 * Library for using Authorize.net's (automated recurring billing)
 *
 * @author      Brandon Cordell(brandon@leadandrock.com)
 * @link        http://projects.leadAndrock.com/cake_arb
 * @copyright   Copyright (c) 2010, Brandon Cordell
 * @version     1.0
 *
 *
 *
 * Usage:
 *
 * $arb = new AuthorizeARB(); // you can pass the login id and transaction key as parameters, or set them in the class
 *
 * // set a trial subscription
 * $arb->setTrial('1', '0.00');
 *
 * // set the payment schedule
 * $arb->setPaymentSchedule('1', 'months', 'now', '9999', '99.00');
 *
 * // set payment type/info
 * $arb->setPayment('creditcard', array($cc['number'], $cc['exp'], $cc['ccv']));
 *
 * // set billing info
 * $arb->billTo($billing_data['fname'], $billing_data['lname']);
 *
 * // get the response back from Authorize.Net
 * $response = $arb->createSubscription();
 *
 */
class AuthorizeARB  {

    // the merchants API login ID (must be valid)
    private $loginId = '';

    // the merchants transaction key (must be valid)
    private $transactionKey = '';

    // active API url (testing mode by default)
    private $activeUrl = 'https://apitest.authorize.net/xml/v1/request.api';

    // authorize.net ARB production url
    private $productionUrl = 'https://api.authorize.net/xml/v1/request.api';

    // authorize.net ARB test url
    private $testUrl = 'https://apitest.authorize.net/xml/v1/request.api';

    // authorize.net ARB xml schema
    private $xmlSchema = 'https://api.authorize.net/xml/v1/schema/AnetApiSchema.xsd';

    // array to hold error codes and descriptions
    private $errors = array(
        'E00001' => array('message' => 'An unexpected system error occurred while processing this request.'),
        'E00002' => array('message' => 'The only supported content-types are text/xml and application/xml.'),
        'E00003' => array('message' => 'An error occurred while parsing the XML request.'),
        'E00004' => array('message' => 'The name of the requested API method is invalid.')
    );

    // info about your trial period
    private $trialInfo = array();

    // info about your paymentSchedule
    private $paymentScheduleInfo = array();

    // info about your payment
    private $paymentInfo = array();

    // array to hold payment schedule information
    private $paymentSchedule = null;

    // array to hold the order info
    private $orderInfo = array();

    // array to hold the customer info
    private $customerInfo = array();

    // array to hold the billing info
    private $billTo = array();
    
    // we'll hold the subscription id throughout a couple methods
    public  $subscriptionId = null;

    // reference id, if you want to pass one to authorize.net
    public  $referenceId = null;

    /**
     * Authorize ARB construct
     *
     * For abstraction sake, you can pass in your
     * loginId and transactionKey on initialization
     *
     * @param string $loginId
     * @param string $transactionKey
     */
    public function  __construct($loginId = null, $transactionKey = null) {

        // FireCake::log($this->errors);

        if($loginId && $transactionKey) {

            $this->loginId = $loginId;
            $this->transactionKey = $transactionKey;

        } elseif ( ($loginId && !$transactionKey) || (!$loginId && $transactionKey) ) {

            trigger_error('You must either pass both parameters, or no parameters', '512');
        }
    }

    /**
     * Set your authorize.net ARB environment
     *
     * Accepts testing and production (testing is set by default)
     *
     * @param  string  $mode
     * @return bool
     */
    public function setMode($mode) {

        switch(strtolower($mode)) {

            case 'testing':
                $this->activeUrl = $this->testUrl;
                break;

            case 'production':
                $this->activeUrl = $this->productionUrl;
                break;

            default:
                trigger_error('Invalid mode passed, defaulting to testing mode', '512');
                $this->activeUrl = $this->testUrl;
                break;
        }
    }

    /**
     * Create ARB subscription
     *
     * @param array $data   A full array of data to create the subscription
     * @param bool  $manual Must be true, in order to pass in a data array
     */
    public function createSubscription() {
        
        return $this->buildRequest('Create');
    }
    public function getSubscription($val) {
        
        $this->checksub=$val;
		return $this->buildRequest('getSubscription');
    }

    /**
     * Update ARB subscription:
     * To update an ARB subscription you need to pass in the subscriptionID (required by authorize.net)
     *
     * @param   mixed   $subscriptionId
     */
    public function updateSubscription($subscriptionId) {

        if(!$subscriptionId)
            trigger_error('Parameter is required', E_ERROR);

        $this->subscriptionId = $subscriptionId;
        $this->buildRequest('Update');
    }

    /**
     * Cancel ARB subscription:
     * To cancel an ARB subscription you need to pass in the subscriptionID (required by authorize.net)
     *
     * @param   mixed   $subscriptionID
     * @param   mixed   $refId    Optional merchant assigned reference ID for this request
     */
    public function cancelSubscription($subscriptionId) {

        if(!$subscriptionId)
            trigger_error('Parameter is required', '2');

        $this->subscriptionId = $subscriptionId;
        $this->buildRequest('Cancel');
    }
    
    /**
     * Set the trial occurrences and amounts in your request (Create only)
     *
     * @param int $occurences - Number of billing or payments in the trial period
     * @param int $amount     - The amount to be charged for each payment during the trial period
     */
    public function setTrial($occurrences, $amount) {

        $this->trialInfo[0] = $occurrences;
        $this->trialInfo[1] = $amount;
    }
   public function setSubscription_name($name) {

        $this->subscription_name = $name;        
    }

    /**
     * Set the payment schedule of your request (Create and Update Only)
     */
    public function setPaymentSchedule($intervalLength, $intervalUnit, $startDate, $totalOccurrences, $amount) {

        $formattedDate = date('Y-m-d', strtotime($startDate));

        $this->paymentScheduleInfo[0] = $intervalLength;
        $this->paymentScheduleInfo[1] = $intervalUnit;
        $this->paymentScheduleInfo[2] = $formattedDate;
        $this->paymentScheduleInfo[3] = $totalOccurrences;
        $this->paymentScheduleInfo[4] = $amount;
    }

    /**
     * Set the payment information of your request (Create and Update Only)
         *
         * TODO: Add check/money order logic. It's only credit card right now
     */
    public function setPayment($paymentType, $paymentInfo = array()) {

        $months = array('01' => 'January', '02' => 'February', '03' => 'March',
                        '04' => 'April',   '05' => 'May',      '06' => 'June',
                        '07' => 'July',    '08' => 'August',   '09' => 'September',
                        '10' => 'October', '11' => 'November', '12' => 'December');

        switch(strtolower($paymentType)) {

            case 'creditcard':
                
                $exp = explode('/', $paymentInfo[1]);
                $exp_date = date('Y-m', strtotime($months[$exp[0]].' 20'.$exp[1]));

                $this->paymentInfo[0] = $paymentInfo[0];
                $this->paymentInfo[1] = $exp_date;
                $this->paymentInfo[2] = $paymentInfo[2];
                break;

            default:
                break;
        }
    }

    /**
     * Set up the billing information
     */
    public function billTo($firstName, $lastName, $company = null, $address = null, $city = null, $state = null, $zip = null, $country = null) {

        $this->billTo['firstName'] = $firstName;
        $this->billTo['lastName']  = $lastName;

        if($company) $this->billTo['company'] = $company;
        if($address) $this->billTo['address'] = $address;
        if($city)    $this->billTo['city']    = $city;
        if($state)   $this->billTo['state']   = $state;
        if($zip)     $this->billTo['zip']     = $zip;
        if($country) $this->billTo['country'] = $country;
    }

    /**
     * Builds the request to be sent to $this->sendRequest()
     *
     * @param
     * @return
     */
    public function buildRequest($requestType) {
        
        $request = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n".
                   "<ARB{$requestType}SubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">\n".
                   "    <merchantAuthentication>\n" .
                   "        <name>$this->loginId</name>\n" .
                   "        <transactionKey>$this->transactionKey</transactionKey>\n" .
                   "    </merchantAuthentication>\n";

       

        // check to see if we've set a reference Id
        if($this->referenceId)
            $request .= "    <refId>$this->referenceId</refId>\n";

        // check to see if we've set a trial period
        if($this->trialInfo) {
            $trialOccurrences = "            <trialOccurrences>{$this->trialInfo[0]}</trialOccurrences>\n";
            $trialAmount      = "        <trialAmount>{$this->trialInfo[1]}</trialAmount>\n";
        } else {
            $trialOccurrences = $trialAmount = '';
        }

        if($this->billTo) {
            $firstName = $this->billTo['firstName'];
            $lastName  = $this->billTo['lastName'];
        } else {
            $firstName = $lastName = '';
        }

        switch($requestType) {

            case 'Create':
                $request .= "    <subscription>\n".
							"        <name>{$this->subscription_name}</name>\n".				
                            "        <paymentSchedule>\n".
                            "            <interval>\n".
                            "                <length>{$this->paymentScheduleInfo[0]}</length>\n".
                            "                <unit>{$this->paymentScheduleInfo[1]}</unit>\n".
                            "            </interval>\n".
                            "            <startDate>{$this->paymentScheduleInfo[2]}</startDate>\n".
                            "            <totalOccurrences>{$this->paymentScheduleInfo[3]}</totalOccurrences>\n".
                            $trialOccurrences.
                            "        </paymentSchedule>\n".
                            "        <amount>{$this->paymentScheduleInfo[4]}</amount>\n".
                            $trialAmount.
                            "        <payment>\n".
                            "            <creditCard>\n".
                            "                <cardNumber>{$this->paymentInfo[0]}</cardNumber>\n".
                            "                <expirationDate>{$this->paymentInfo[1]}</expirationDate>\n".
                            "            </creditCard>\n".
                            "        </payment>\n".
                            "        <order>\n".
                            "            <invoiceNumber>{$this->generateInvoiceNumber()}</invoiceNumber>\n".
                            "        </order>\n".
                            "        <billTo>\n".
                            "            <firstName>$firstName</firstName>\n".
                            "            <lastName>$lastName</lastName>\n".
                            "        </billTo>\n".
                            "    </subscription>\n";
                break;

            case 'Update':
                // $request .= "<ARBUpdateSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">\n";
                break;

            case 'Cancel':
                $request .= "    <subscriptionId>$this->subscriptionId</subscriptionId>\n";
                break;
        }
        if($requestType!="getSubscription"){
        $request .= "</ARB{$requestType}SubscriptionRequest>";
		 return $this->parseReturn($this->sendRequest($request));
		}else{
        $request = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n".
				    "<ARBGetSubscriptionListRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">\n".
				    "    <merchantAuthentication>\n" .
				    "        <name>$this->loginId</name>\n" .
				    "        <transactionKey>$this->transactionKey</transactionKey>\n" .
					"    </merchantAuthentication>\n". 
					"          <searchType>subscriptionActive</searchType>\n".
					"		   <sorting>\n".
					"			  <orderBy>id</orderBy>\n".
					"			  <orderDescending>false</orderDescending>\n".
					"		   </sorting>\n".
					"		   <paging>\n".
					"			  <limit>1000</limit>\n".
					"			  <offset>1</offset>\n".
					"		   </paging>\n".
				    "    </ARBGetSubscriptionListRequest>\n"; 
					 return $this->parseReturn_get($this->sendRequest($request));

		}
        // debug($this->sendRequest($request));
        #return $this->parseReturn($this->sendRequest($request));

    }

    private function sendRequest($content) {

        // set curl handle
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->activeUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml'));
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        return curl_exec($ch);

        debug(curl_getinfo($ch));
    }

    /**
     * validate the xml against the authorize.net schema
     *
     * @param  mixed  $xmlToValidate
     * @return bool
     */
    private function validateSchema($xmlToValidate) {

        $xml = new DOMDocument();
        $xml->loadXML($xmlToValidate);

            if(!$xml->schemaValidateSource($this->xmlSchema))
            {
                return false;
            }

       
        return true;
    }

    //function to parse Authorize.net response
    private function parseReturn($content)
    {   #echo '<pre>';print_r($content);
        $refId = $this->substringBetween($content,'<refId>','</refId>');
        $resultCode = $this->substringBetween($content,'<resultCode>','</resultCode>');
        $code = $this->substringBetween($content,'<code>','</code>');
        $text = $this->substringBetween($content,'<text>','</text>');
        $subscriptionId = $this->substringBetween($content,'<subscriptionId>','</subscriptionId>');

        return array('refID' => $refId,
                     'resultCode' => $resultCode,
                     'code' => $code,
                     'text' => $text,
                     'subscriptionId' => $subscriptionId);
    }

     private function parseReturn_get($content)
    {   #echo '<pre>';print_r($content);
	          
        $resultCode = $this->substringBetween($content,'<resultCode>','</resultCode>');
        $code = $this->substringBetween($content,'<code>','</code>');
        $text = $this->substringBetween($content,'<text>','</text>');
        $subscriptionId = "<subscriptionDetails>".$this->substringBetween($content,'<subscriptionDetails>','</subscriptionDetails>')."</subscriptionDetails>";
		$p = xml_parser_create();
		xml_parse_into_struct($p, $subscriptionId, $vals, $index);
		xml_parser_free($p);
		#echo "Index array\n <pre>";
		#print_r($index);
		#echo "\nVals array\n  <pre>";
		#print_r($vals);
		for($i=0;$i<count($index['ID']);$i++)
		{
			$new_array[$vals[$index['ID'][$i]]['value']]=$vals[$index['PASTOCCURRENCES'][$i]]['value'];
		}
		if(array_key_exists($this->checksub,$new_array))
		{
			echo $new_array[$this->checksub];
		}
		else{
			echo 0;
		}
        
    }

    //helper function for parsing response
    private function substringBetween($haystack,$start,$end)
    {
        if (strpos($haystack,$start) === false || strpos($haystack,$end) === false)
        {
            return false;
        }
        else
        {
            $start_position = strpos($haystack,$start)+strlen($start);
            $end_position = strpos($haystack,$end);
            return substr($haystack,$start_position,$end_position-$start_position);
        }
    }

    /**
     * Generate a invoice number for the transasction
     *
     * @return  string  $invoiceNumber
     */
    private function generateInvoiceNumber() {        
        
        return mt_rand('0', '1000000') + strtotime('now');
    }
}