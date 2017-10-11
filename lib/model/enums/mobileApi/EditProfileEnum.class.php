<?php
class EditProfileEnum
{
	//search
	public static $editableArr = array( "HOROSCOPE_MATCH","RASHI","NAKSHATRA","MANGLIK","YOURINFO","CITY_RES","COUNTRY_RES","RELIGION","CASTE","SUBCASTE","SECT","MTONGUE","ANCESTRAL_ORIGIN","GOTHRA","DIOCESE","BAPTISED","READ_BIBLE","OFFER_TITHE","SPREADING_GOSPEL","ZARATHUSHTRI","PARENTS_ZARATHUSHTRI","AMRITDHARI","CUT_HAIR","TRIM_BEARD","WEAR_TURBAN","CLEAN_SHAVEN","MATHTHAB","NAMAZ","ZAKAT","FASTING","UMRAH_HAJJ","QURAN","SUNNAH_BEARD","SUNNAH_CAP","HIJAB","HIJAB_MARRIAGE","WORKING_MARRIAGE","HEIGHT","COMPLEXION","BTYPE","WEIGHT","HANDICAPPED","NATURE_HANDICAP","THALASSEMIA","HIV","PHONE_MOB","TIME_TO_CALL_START","TIME_TO_CALL_START","TIME_TO_CALL_END","TIME_TO_CALL_END","PHONE_RES","ALT_MOBILE","PROFILE_HANDLER_NAME","EMAIL","FAMILYINFO","FAMILY_VALUES","FAMILY_TYPE","FAMILY_STATUS","FAMILY_INCOME","FAMILY_BACK","MOTHER_OCC","T_BROTHER","M_BROTHER","T_SISTER","M_SISTER","PARENT_CITY_SAME","DIET","SMOKE","DRINK","OWN_HOUSE","HAVE_CAR","HOBBIES_LANGUAGE","HOBBIES_HOBBY","HOBBIES_INTEREST","HOBBIES_MUSIC","HOBBIES_BOOK","HOBBIES_DRESS","HOBBIES_SPORTS","HOBBIES_CUISINE","FAV_BOOK","FAV_MOVIE","FAV_TVSHOW","FAV_VAC_DEST","FAV_FOOD","OPEN_TO_PET","EDUCATION","EDU_LEVEL_NEW","DEGREE_UG","PG_COLLEGE","DEGREE_PG","COLLEGE","SCHOOL","JOB_INFO","OCCUPATION","COMPANY_NAME","INCOME","MARRIED_WORKING","GOING_ABROAD","NAME","HOBBIES_MOVIE","RELATION","RES_STATUS","BLOOD_GROUP","NATIVE_COUNTRY","NATIVE_STATE","NATIVE_CITY","GOTHRA_MATERNAL","OTHER_PG_DEGREE","OTHER_UG_DEGREE","WORK_STATUS","SUNSIGN","ASTRO_PRIVACY","MOBILE_NUMBER_OWNER","PHONE_NUMBER_OWNER","ALT_MOBILE_NUMBER_OWNER","PHONE_OWNER_NAME","MOBILE_OWNER_NAME","ALT_MOBILE_OWNER_NAME","SHOWALT_MOBILE","SHOWPHONE_MOB","SHOWPHONE_RES","CONTACT","PARENTS_CONTACT","SHOWADDRESS","SHOW_PARENTS_CONTACT","PINCODE","PARENT_PINCODE","ID_PROOF_TYP","ID_PROOF_NO","HAVECHILD","ID_PROOF_TYPE","ID_PROOF_VAL","ADDR_PROOF_TYPE","ADDR_PROOF_VAL","DISPLAYNAME","ALT_EMAIL","JAMAAT");
	
	public static $editableIncompleteArr = array( "RELATION","HAVECHILD","DTOFBIRTH","MSTATUS","CITY_RES","COUNTRY_RES","RELIGION","CASTE","MTONGUE","HEIGHT","PHONE_MOB","EDU_LEVEL_NEW","OCCUPATION","INCOME","YOURINFO");
	
	public static $duplication_fields=array("RELIGION","MTONGUE","CASTE","COUNTRY_RES","CITY_RES","HEIGHT","INCOME","EDU_LEVEL_NEW","CITY_BIRTH","BTIME","PASSWORD","SUBCASTE","OCCUPATION","SCHOOL","COLLEGE","PG_COLLEGE","COMPANY_NAME","EMAIL","MESSENGER_ID","PHONE_MOB","PHONE_RES","ALT_MOBILE");
	
	public static $keywordFieldArray=array('AGE', 'GENDER', 'HEIGHT', 'CASTE', 'OCCUPATION', 'CITY', 'HOBBY');
	
	public static $hobbyFieldsArr=array('HOBBIES_LANGUAGE','HOBBIES_HOBBY','HOBBIES_INTEREST','HOBBIES_MUSIC','HOBBIES_BOOK','HOBBIES_DRESS','HOBBIES_SPORTS','HOBBIES_CUISINE');
	
	public static $lengthArr = array('YOURINFO'=>'3000','FAMILYINFO'=>'1000','JOB_INFO'=>'1000','EDUCATION'=>'1000','CONTACT'=>'1000','EMAIL'=>'100','PASSWORD'=>'40','USERNAME'=>'40','MESSENGER_ID'=>'255','SPOUSE'=>'1000','SUBCASTE'=>'250','GOTHRA'=>'250','ANCESTRAL_ORIGIN'=>'100','PROFILE_HANDLER_NAME'=>'40','NAME'=>'40',"PARENTS_CONTACT"=>'1000');
	
	public static  $INCOMPLETE_YES="Y";
	public static  $INCOMPLETE_NO="N";
        public static $editableCriticalArr = array("DTOFBIRTH","MSTATUS","MSTATUS_PROOF");
	
}
