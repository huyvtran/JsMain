<?php
/**
* This class is used to set search paramters based on user input from app search page.
* @author : Lavesh Rawat
* @package Search
* @subpackage SearchTypes
* @copyright 2013 Lavesh Rawat
* @link http://devjs.infoedge.com/mediawiki/index.php/SEARCH
* @since 2014-11-01
* @author Lavesh Rawat
*/
class AppSearch extends SearchParamters
{	
	const neverMarried = 'N';
	const male = 'M';
	const female = 'F';

	/**
        * Constructor function.
        * @constructor
	* @access public	
	* @param LoggedInProfile $loggedInProfileObj logged in profile object
	*/
        public function __construct($loggedInProfileObj="")
        {
		$this->loggedInProfileObj = $loggedInProfileObj;
		parent::__construct();
	}

	/*
	* @access public	
        * Sets SearchParamtersObj corresponding to the user search performed in quick search bar /top search band.
        * @param mixed request request object array
        * @return SearchParamters $SearchParamtersObj 
        */
	public function getSearchCriteria($request)
	{
		if(MobileCommon::isApp()=='A')
			$searchParamsSetter['SEARCH_TYPE'] = SearchTypesEnums::App;
		else
			$searchParamsSetter['SEARCH_TYPE'] = SearchTypesEnums::iOS;
		$searchParamsSetter['GENDER'] = $request->getParameter('Gender');
		$searchParamsSetter['LAGE'] = $request->getParameter('lage');
		$searchParamsSetter['HAGE'] = $request->getParameter('hage');
		if($request->getParameter('lincome')!='' && $request->getParameter('hincome'))
		{
			$searchParamsSetter['LINCOME'] = $request->getParameter('lincome');
            $searchParamsSetter['HINCOME'] = $request->getParameter('hincome');
			$rArr["minIR"] = $request->getParameter('lincome');
			$rArr["maxIR"] = $request->getParameter('hincome');
			$incomeType = "R";
			$incomeMappingObj = new IncomeMapping($rArr,"");
			$incomeValues = $incomeMappingObj->getAllIncomes();
			unset($incomeMappingObj);
			$searchParamsSetter['INCOME'] = implode(",",$incomeValues);
		
		}
		if($request->getParameter('lheight') && $request->getParameter('hheight'))
		{
			$searchParamsSetter['LHEIGHT'] = $request->getParameter('lheight');
                	$searchParamsSetter['HHEIGHT'] = $request->getParameter('hheight');
		}
				
		$searchParamsSetter['RELIGION'] = $request->getParameter('religion');
		$searchParamsSetter['CASTE'] = $request->getParameter('caste');
		$searchParamsSetter['HAVEPHOTO'] = $request->getParameter('photo');
		$searchParamsSetter['MTONGUE'] = $request->getParameter('mtongue');
		$city_country_resArr = $request->getParameter('location');
		if($city_country_resArr)
		{
                        if(array_key_exists($city_country_resArr,FieldMap::getFieldLabel("state_india","","true")))
                        {
                                $searchParamsSetter['STATE'] = $city_country_resArr;
                                $searchParamsSetter['COUNTRY_RES'] = 51;
                        }
			elseif(is_numeric($city_country_resArr))
				$searchParamsSetter['COUNTRY_RES'] = $city_country_resArr;
			else
				$searchParamsSetter['CITY_INDIA'] = $city_country_resArr;
		}
	
		/** 
		* If profile is logged in , then gender is of opposite gender
		*/
		if(!$searchParamsSetter['GENDER'] && $this->loggedInProfileObj && $this->loggedInProfileObj->getPROFILEID())
		{
			if($this->loggedInProfileObj->getGENDER()==self::male)
				$searchParamsSetter['GENDER'] = self::female;
			else
				$searchParamsSetter['GENDER'] = self::male;
		}

		/*
		* For app mstatus is not based on user input.
		* We will set the status to be 
		* 1) Never married for logged-out case
		* 2) Never married if user mstatus is never married
		* 3) All Maried Earlier Options if user mstatus is not never married.
		*/
		if(!$this->loggedInProfileObj || $this->loggedInProfileObj->getPROFILEID()=='' || $this->loggedInProfileObj->getMSTATUS()==self::neverMarried)
			$mstatus[] = self::neverMarried;
		else
		{
			$mstatusArr = FieldMap::getFieldLabel('mstatus','',1);
			unset($mstatus);
			foreach($mstatusArr AS $k=>$v)
			{
				if($k!=self::neverMarried)
					$mstatus[]=$k;
			}
		}
		$searchParamsSetter['MSTATUS'] = implode(",",$mstatus);
                foreach($searchParamsSetter as $k=>$v)
                        if($v=='DONT_MATTER')
                                $searchParamsSetter[$k] = '';
		$this->setter($searchParamsSetter);
	}
} 
?>