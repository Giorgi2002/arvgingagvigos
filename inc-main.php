<?php 
mb_http_input("utf-8");
mb_http_output("utf-8");
?>
<?php 
///////SettingsLock/////////////////
$SettingsLocked="true"; // true or false
//If about setting is set to false, System Settings General and Tax Settings can be changed by administrator user.
ini_set('error_reporting', E_ALL);


function httpGet($url)
{
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
}

function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}


$defaultLanguage="en";
$defaultSearchResultslimit="10"; //0 - 50
//$langUagesList=array();
$langUagesList = array(
        'en' => 'English' , 
        'aa' => 'Afar' , 
        'ab' => 'Abkhazian' , 
        'af' => 'Afrikaans' , 
        'am' => 'Amharic' , 
        'ar' => 'Arabic' , 
        'as' => 'Assamese' , 
        'ay' => 'Aymara' , 
        'az' => 'Azerbaijani' , 
        'ba' => 'Bashkir' , 
        'be' => 'Byelorussian' , 
        'bg' => 'Bulgarian' , 
        'bh' => 'Bihari' , 
        'bi' => 'Bislama' , 
        'bn' => 'Bengali/Bangla' , 
        'bo' => 'Tibetan' , 
        'br' => 'Breton' , 
        'ca' => 'Catalan' , 
        'co' => 'Corsican' , 
        'cs' => 'Czech' , 
        'cy' => 'Welsh' , 
        'da' => 'Danish' , 
        'de' => 'German' , 
        'dz' => 'Bhutani' , 
        'el' => 'Greek' , 
        'eo' => 'Esperanto' , 
        'es' => 'Spanish' , 
        'et' => 'Estonian' , 
        'eu' => 'Basque' , 
        'fa' => 'Persian' , 
        'fi' => 'Finnish' , 
        'fj' => 'Fiji' , 
        'fo' => 'Faeroese' , 
        'fr' => 'French' , 
        'fy' => 'Frisian' , 
        'ga' => 'Irish' , 
        'gd' => 'Scots/Gaelic' , 
        'gl' => 'Galician' , 
        'gn' => 'Guarani' , 
        'gu' => 'Gujarati' , 
        'ha' => 'Hausa' , 
        'hi' => 'Hindi' , 
        'hr' => 'Croatian' , 
        'hu' => 'Hungarian' , 
        'hy' => 'Armenian' , 
        'ia' => 'Interlingua' , 
        'ie' => 'Interlingue' , 
        'ik' => 'Inupiak' , 
        'in' => 'Indonesian' , 
        'is' => 'Icelandic' , 
        'it' => 'Italian' , 
        'iw' => 'Hebrew' , 
        'ja' => 'Japanese' , 
        'ji' => 'Yiddish' , 
        'jw' => 'Javanese' , 
        'ka' => 'Georgian' , 
        'kk' => 'Kazakh' , 
        'kl' => 'Greenlandic' , 
        'km' => 'Cambodian' , 
        'kn' => 'Kannada' , 
        'ko' => 'Korean' , 
        'ks' => 'Kashmiri' , 
        'ku' => 'Kurdish' , 
        'ky' => 'Kirghiz' , 
        'la' => 'Latin' , 
        'ln' => 'Lingala' , 
        'lo' => 'Laothian' , 
        'lt' => 'Lithuanian' , 
        'lv' => 'Latvian/Lettish' , 
        'mg' => 'Malagasy' , 
        'mi' => 'Maori' , 
        'mk' => 'Macedonian' , 
        'ml' => 'Malayalam' , 
        'mn' => 'Mongolian' , 
        'mo' => 'Moldavian' , 
        'mr' => 'Marathi' , 
        'ms' => 'Malay' , 
        'mt' => 'Maltese' , 
        'my' => 'Burmese' , 
        'na' => 'Nauru' , 
        'ne' => 'Nepali' , 
        'nl' => 'Dutch' , 
        'no' => 'Norwegian' , 
        'oc' => 'Occitan' , 
        'om' => '(Afan)/Oromoor/Oriya' , 
        'pa' => 'Punjabi' , 
        'pl' => 'Polish' , 
        'ps' => 'Pashto/Pushto' , 
        'pt' => 'Portuguese' , 
        'qu' => 'Quechua' , 
        'rm' => 'Rhaeto-Romance' , 
        'rn' => 'Kirundi' , 
        'ro' => 'Romanian' , 
        'ru' => 'Russian' , 
        'rw' => 'Kinyarwanda' , 
        'sa' => 'Sanskrit' , 
        'sd' => 'Sindhi' , 
        'sg' => 'Sangro' , 
        'sh' => 'Serbo-Croatian' , 
        'si' => 'Singhalese' , 
        'sk' => 'Slovak' , 
        'sl' => 'Slovenian' , 
        'sm' => 'Samoan' , 
        'sn' => 'Shona' , 
        'so' => 'Somali' , 
        'sq' => 'Albanian' , 
        'sr' => 'Serbian' , 
        'ss' => 'Siswati' , 
        'st' => 'Sesotho' , 
        'su' => 'Sundanese' , 
        'sv' => 'Swedish' , 
        'sw' => 'Swahili' , 
        'ta' => 'Tamil' , 
        'te' => 'Tegulu' , 
        'tg' => 'Tajik' , 
        'th' => 'Thai' , 
        'ti' => 'Tigrinya' , 
        'tk' => 'Turkmen' , 
        'tl' => 'Tagalog' , 
        'tn' => 'Setswana' , 
        'to' => 'Tonga' , 
        'tr' => 'Turkish' , 
        'ts' => 'Tsonga' , 
        'tt' => 'Tatar' , 
        'tw' => 'Twi' , 
        'uk' => 'Ukrainian' , 
        'ur' => 'Urdu' , 
        'uz' => 'Uzbek' , 
        'vi' => 'Vietnamese' , 
        'vo' => 'Volapuk' , 
        'wo' => 'Wolof' , 
        'xh' => 'Xhosa' , 
        'yo' => 'Yoruba' , 
        'zh' => 'Chinese' , 
        'zu' => 'Zulu' , 
        );
/*
$langUagesList['ar']="العربية";  
$langUagesList['az']="Azərbaycanca";  
$langUagesList['bg']="Български";  
$langUagesList['nan']="Bân-lâm-gú / Hō-ló-oē"; 
$langUagesList['be']="Беларуская (Акадэмічная)"; 
$langUagesList['ca']="Català"; 
$langUagesList['cs']="Čeština"; 
$langUagesList['da']="Dansk"; 
$langUagesList['de']="Deutsch"; 
$langUagesList['et']="Eesti"; 
$langUagesList['el']="Ελληνικά"; 
$langUagesList['en']="English"; 
$langUagesList['es']="Español"; 
$langUagesList['eo']="Esperanto"; 
$langUagesList['eu']="Euskara"; 
$langUagesList['fa']="فارسی"; 
$langUagesList['fr']="Français"; 
$langUagesList['gl']="Galego"; 
$langUagesList['ko']="한국어"; 
$langUagesList['hy']="Հայերեն"; 
$langUagesList['hi']="हिन्दी"; 
$langUagesList['hr']="Hrvatski"; 
$langUagesList['id']="Bahasa Indonesia"; 
$langUagesList['it']="Italiano"; 
$langUagesList['he']="עברית"; 
$langUagesList['ka']="ქართული"; 
$langUagesList['la']="Latina"; 
$langUagesList['lt']="Lietuvių"; 
$langUagesList['hu']="Magyar"; 
$langUagesList['ms']="Bahasa Melayu"; 
$langUagesList['min']="Bahaso Minangkabau"; 
$langUagesList['nl']="Nederlands"; 
$langUagesList['ja']="日本語"; 
$langUagesList['no']="Norsk (Bokmål)"; 
$langUagesList['nn']="Norsk (Nynorsk)"; 
$langUagesList['ce']="Нохчийн"; 
$langUagesList['uz']="Oʻzbekcha / Ўзбекча"; 
$langUagesList['pl']="Polski"; 
$langUagesList['pt']="Português"; 
$langUagesList['kk']="Қазақша / Qazaqşa / قازاقشا"; 
$langUagesList['ro']="Română"; 
$langUagesList['ru']="Русский";
$langUagesList['simple']="Simple English"; 
$langUagesList['ceb']="Sinugboanong Binisaya"; 
$langUagesList['sk']="Slovenčina";
$langUagesList['sl']="Slovenščina"; 
$langUagesList['sr']="Српски / Srpski"; 
$langUagesList['sh']="Srpskohrvatski / Српскохрватски"; 
$langUagesList['fi']="Suomi"; 
$langUagesList['sv']="Svenska"; 
$langUagesList['th']="ภาษาไทย"; 
$langUagesList['tr']="Türkçe"; 
$langUagesList['uk']="Українська"; 
$langUagesList['ur']="اردو"; 
$langUagesList['vi']="Tiếng Việt"; 
$langUagesList['vo']="Volapük"; 
$langUagesList['war']="Winaray"; 
$langUagesList['zh']="中文"; 
*/
 ?>
