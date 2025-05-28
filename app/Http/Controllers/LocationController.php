<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    /**
     * Get list of all countries
     */
    public function getCountries()
    {
        // This is a simplified list of countries - in a real app, you might want to use a complete list
        $countries = [
            ['id' => 'US', 'name' => 'United States'],
            ['id' => 'CA', 'name' => 'Canada'],
            ['id' => 'GB', 'name' => 'United Kingdom'],
            ['id' => 'AU', 'name' => 'Australia'],
            ['id' => 'DE', 'name' => 'Germany'],
            ['id' => 'FR', 'name' => 'France'],
            ['id' => 'JP', 'name' => 'Japan'],
            ['id' => 'IN', 'name' => 'India'],
            ['id' => 'BR', 'name' => 'Brazil'],
            ['id' => 'MX', 'name' => 'Mexico'],
            // Add more countries as needed
        ];

        return response()->json($countries);
    }

    /**
     * Get states for a specific country
     */
    public function getStates(Request $request)
    {
        $country = $request->country;
        
        // Demo data - in a real app, this would come from a database
        $states = [];
        
        switch ($country) {
            case 'US':
                $states = [
                    ['id' => 'AL', 'name' => 'Alabama'],
                    ['id' => 'AK', 'name' => 'Alaska'],
                    ['id' => 'AZ', 'name' => 'Arizona'],
                    ['id' => 'AR', 'name' => 'Arkansas'],
                    ['id' => 'CA', 'name' => 'California'],
                    ['id' => 'CO', 'name' => 'Colorado'],
                    ['id' => 'CT', 'name' => 'Connecticut'],
                    ['id' => 'DE', 'name' => 'Delaware'],
                    ['id' => 'FL', 'name' => 'Florida'],
                    ['id' => 'GA', 'name' => 'Georgia'],
                    ['id' => 'HI', 'name' => 'Hawaii'],
                    ['id' => 'ID', 'name' => 'Idaho'],
                    ['id' => 'IL', 'name' => 'Illinois'],
                    ['id' => 'IN', 'name' => 'Indiana'],
                    ['id' => 'IA', 'name' => 'Iowa'],
                    ['id' => 'KS', 'name' => 'Kansas'],
                    ['id' => 'KY', 'name' => 'Kentucky'],
                    ['id' => 'LA', 'name' => 'Louisiana'],
                    ['id' => 'ME', 'name' => 'Maine'],
                    ['id' => 'MD', 'name' => 'Maryland'],
                    ['id' => 'MA', 'name' => 'Massachusetts'],
                    ['id' => 'MI', 'name' => 'Michigan'],
                    ['id' => 'MN', 'name' => 'Minnesota'],
                    ['id' => 'MS', 'name' => 'Mississippi'],
                    ['id' => 'MO', 'name' => 'Missouri'],
                    ['id' => 'MT', 'name' => 'Montana'],
                    ['id' => 'NE', 'name' => 'Nebraska'],
                    ['id' => 'NV', 'name' => 'Nevada'],
                    ['id' => 'NH', 'name' => 'New Hampshire'],
                    ['id' => 'NJ', 'name' => 'New Jersey'],
                    ['id' => 'NM', 'name' => 'New Mexico'],
                    ['id' => 'NY', 'name' => 'New York'],
                    ['id' => 'NC', 'name' => 'North Carolina'],
                    ['id' => 'ND', 'name' => 'North Dakota'],
                    ['id' => 'OH', 'name' => 'Ohio'],
                    ['id' => 'OK', 'name' => 'Oklahoma'],
                    ['id' => 'OR', 'name' => 'Oregon'],
                    ['id' => 'PA', 'name' => 'Pennsylvania'],
                    ['id' => 'RI', 'name' => 'Rhode Island'],
                    ['id' => 'SC', 'name' => 'South Carolina'],
                    ['id' => 'SD', 'name' => 'South Dakota'],
                    ['id' => 'TN', 'name' => 'Tennessee'],
                    ['id' => 'TX', 'name' => 'Texas'],
                    ['id' => 'UT', 'name' => 'Utah'],
                    ['id' => 'VT', 'name' => 'Vermont'],
                    ['id' => 'VA', 'name' => 'Virginia'],
                    ['id' => 'WA', 'name' => 'Washington'],
                    ['id' => 'WV', 'name' => 'West Virginia'],
                    ['id' => 'WI', 'name' => 'Wisconsin'],
                    ['id' => 'WY', 'name' => 'Wyoming'],
                    ['id' => 'DC', 'name' => 'District of Columbia'],
                ];
                break;
            case 'CA':
                $states = [
                    ['id' => 'AB', 'name' => 'Alberta'],
                    ['id' => 'BC', 'name' => 'British Columbia'],
                    ['id' => 'MB', 'name' => 'Manitoba'],
                    ['id' => 'NB', 'name' => 'New Brunswick'],
                    ['id' => 'NL', 'name' => 'Newfoundland and Labrador'],
                    ['id' => 'NS', 'name' => 'Nova Scotia'],
                    ['id' => 'NT', 'name' => 'Northwest Territories'],
                    ['id' => 'NU', 'name' => 'Nunavut'],
                    ['id' => 'ON', 'name' => 'Ontario'],
                    ['id' => 'PE', 'name' => 'Prince Edward Island'],
                    ['id' => 'QC', 'name' => 'Quebec'],
                    ['id' => 'SK', 'name' => 'Saskatchewan'],
                    ['id' => 'YT', 'name' => 'Yukon'],
                ];
                break;
            case 'GB':
                $states = [
                    ['id' => 'ENG', 'name' => 'England'],
                    ['id' => 'SCT', 'name' => 'Scotland'],
                    ['id' => 'WLS', 'name' => 'Wales'],
                    ['id' => 'NIR', 'name' => 'Northern Ireland'],
                ];
                break;
            case 'IN':
                $states = [
                    ['id' => 'MH', 'name' => 'Maharashtra'],
                    ['id' => 'UP', 'name' => 'Uttar Pradesh'],
                    ['id' => 'KA', 'name' => 'Karnataka'],
                    ['id' => 'TN', 'name' => 'Tamil Nadu'],
                    ['id' => 'AP', 'name' => 'Andhra Pradesh'],
                    ['id' => 'KL', 'name' => 'Kerala'],
                    ['id' => 'RJ', 'name' => 'Rajasthan'],
                    ['id' => 'MP', 'name' => 'Madhya Pradesh'],

                ];
                break;
            // Add more countries as needed
        }
        
        return response()->json($states);
    }

    /**
     * Get cities for a specific state
     */
    public function getCities(Request $request)
    {
        $country = $request->country;
        $state = $request->state;
        
        // Demo data - in a real app, this would come from a database
        $cities = [];
        
        // United States cities
        if ($country == 'US') {
            switch($state) {
                case 'AL':
                    $cities = [
                        ['id' => 'BHM', 'name' => 'Birmingham'],
                        ['id' => 'MGM', 'name' => 'Montgomery'],
                        ['id' => 'MOB', 'name' => 'Mobile'],
                        ['id' => 'HSV', 'name' => 'Huntsville'],
                        ['id' => 'TUS', 'name' => 'Tuscaloosa'],
                    ];
                    break;
                case 'AK':
                    $cities = [
                        ['id' => 'ANC', 'name' => 'Anchorage'],
                        ['id' => 'FAI', 'name' => 'Fairbanks'],
                        ['id' => 'JNU', 'name' => 'Juneau'],
                        ['id' => 'KTN', 'name' => 'Ketchikan'],
                        ['id' => 'SIT', 'name' => 'Sitka'],
                    ];
                    break;
                case 'AZ':
                    $cities = [
                        ['id' => 'PHX', 'name' => 'Phoenix'],
                        ['id' => 'TUC', 'name' => 'Tucson'],
                        ['id' => 'MES', 'name' => 'Mesa'],
                        ['id' => 'CHA', 'name' => 'Chandler'],
                        ['id' => 'SCO', 'name' => 'Scottsdale'],
                    ];
                    break;
                case 'AR':
                    $cities = [
                        ['id' => 'LIT', 'name' => 'Little Rock'],
                        ['id' => 'FTS', 'name' => 'Fort Smith'],
                        ['id' => 'FAY', 'name' => 'Fayetteville'],
                        ['id' => 'SPD', 'name' => 'Springdale'],
                        ['id' => 'JBR', 'name' => 'Jonesboro'],
                    ];
                    break;
                case 'CA':
                    $cities = [
                        ['id' => 'LA', 'name' => 'Los Angeles'],
                        ['id' => 'SF', 'name' => 'San Francisco'],
                        ['id' => 'SD', 'name' => 'San Diego'],
                        ['id' => 'SJ', 'name' => 'San Jose'],
                        ['id' => 'SAC', 'name' => 'Sacramento'],
                        ['id' => 'LB', 'name' => 'Long Beach'],
                        ['id' => 'OAK', 'name' => 'Oakland'],
                        ['id' => 'BAK', 'name' => 'Bakersfield'],
                        ['id' => 'ANA', 'name' => 'Anaheim'],
                        ['id' => 'FRE', 'name' => 'Fresno'],
                    ];
                    break;
                case 'CO':
                    $cities = [
                        ['id' => 'DEN', 'name' => 'Denver'],
                        ['id' => 'COS', 'name' => 'Colorado Springs'],
                        ['id' => 'AUR', 'name' => 'Aurora'],
                        ['id' => 'FTC', 'name' => 'Fort Collins'],
                        ['id' => 'LAK', 'name' => 'Lakewood'],
                    ];
                    break;
                case 'CT':
                    $cities = [
                        ['id' => 'BRD', 'name' => 'Bridgeport'],
                        ['id' => 'NHV', 'name' => 'New Haven'],
                        ['id' => 'STA', 'name' => 'Stamford'],
                        ['id' => 'HTF', 'name' => 'Hartford'],
                        ['id' => 'WAT', 'name' => 'Waterbury'],
                    ];
                    break;
                case 'FL':
                    $cities = [
                        ['id' => 'JAX', 'name' => 'Jacksonville'],
                        ['id' => 'MIA', 'name' => 'Miami'],
                        ['id' => 'TPA', 'name' => 'Tampa'],
                        ['id' => 'ORL', 'name' => 'Orlando'],
                        ['id' => 'STP', 'name' => 'St. Petersburg'],
                    ];
                    break;
                case 'GA':
                    $cities = [
                        ['id' => 'ATL', 'name' => 'Atlanta'],
                        ['id' => 'AUG', 'name' => 'Augusta'],
                        ['id' => 'COL', 'name' => 'Columbus'],
                        ['id' => 'MAC', 'name' => 'Macon'],
                        ['id' => 'SAV', 'name' => 'Savannah'],
                    ];
                    break;
                case 'IL':
                    $cities = [
                        ['id' => 'CHI', 'name' => 'Chicago'],
                        ['id' => 'AUR', 'name' => 'Aurora'],
                        ['id' => 'JOL', 'name' => 'Joliet'],
                        ['id' => 'NAP', 'name' => 'Naperville'],
                        ['id' => 'SPR', 'name' => 'Springfield'],
                    ];
                    break;
                case 'NY':
                    $cities = [
                        ['id' => 'NYC', 'name' => 'New York City'],
                        ['id' => 'BUF', 'name' => 'Buffalo'],
                        ['id' => 'ROC', 'name' => 'Rochester'],
                        ['id' => 'YON', 'name' => 'Yonkers'],
                        ['id' => 'SYR', 'name' => 'Syracuse'],
                        ['id' => 'ALB', 'name' => 'Albany'],
                        ['id' => 'NF', 'name' => 'Niagara Falls'],
                        ['id' => 'UTI', 'name' => 'Utica'],
                    ];
                    break;
                case 'TX':
                    $cities = [
                        ['id' => 'HOU', 'name' => 'Houston'],
                        ['id' => 'DAL', 'name' => 'Dallas'],
                        ['id' => 'AUS', 'name' => 'Austin'],
                        ['id' => 'SAT', 'name' => 'San Antonio'],
                        ['id' => 'ELP', 'name' => 'El Paso'],
                        ['id' => 'FTW', 'name' => 'Fort Worth'],
                        ['id' => 'ARL', 'name' => 'Arlington'],
                        ['id' => 'COR', 'name' => 'Corpus Christi'],
                        ['id' => 'PLN', 'name' => 'Plano'],
                        ['id' => 'LUB', 'name' => 'Lubbock'],
                    ];
                    break;
                // Add more states as needed with their cities
                default:
                    $cities = [
                        ['id' => 'OTH', 'name' => 'Other Cities'],
                    ];
            }
        } 
        // Canadian cities
        elseif ($country == 'CA') {
            switch($state) {
                case 'AB':
                    $cities = [
                        ['id' => 'CAL', 'name' => 'Calgary'],
                        ['id' => 'EDM', 'name' => 'Edmonton'],
                        ['id' => 'RED', 'name' => 'Red Deer'],
                        ['id' => 'LET', 'name' => 'Lethbridge'],
                        ['id' => 'MED', 'name' => 'Medicine Hat'],
                        ['id' => 'FOR', 'name' => 'Fort McMurray'],
                        ['id' => 'GRA', 'name' => 'Grande Prairie'],
                        ['id' => 'AIR', 'name' => 'Airdrie'],
                        ['id' => 'SPR', 'name' => 'Spruce Grove'],
                        ['id' => 'STL', 'name' => 'St. Albert'],
                        ['id' => 'SHE', 'name' => 'Sherwood Park'],
                        ['id' => 'FOT', 'name' => 'Fort Saskatchewan'],
                        ['id' => 'CAN', 'name' => 'Canmore'],
                        ['id' => 'COC', 'name' => 'Cochrane'],
                        ['id' => 'CHS', 'name' => 'Chestermere'],
                        ['id' => 'CAM', 'name' => 'Camrose'],
                        ['id' => 'COL', 'name' => 'Cold Lake'],
                        ['id' => 'BEA', 'name' => 'Beaumont'],
                        ['id' => 'STP', 'name' => 'Stony Plain'],
                        ['id' => 'OKO', 'name' => 'Okotoks'],
                    ];
                    break;
                case 'BC':
                    $cities = [
                        ['id' => 'VAN', 'name' => 'Vancouver'],
                        ['id' => 'VIC', 'name' => 'Victoria'],
                        ['id' => 'KEL', 'name' => 'Kelowna'],
                        ['id' => 'ABB', 'name' => 'Abbotsford'],
                        ['id' => 'NAM', 'name' => 'Nanaimo'],
                        ['id' => 'KAM', 'name' => 'Kamloops'],
                        ['id' => 'PRI', 'name' => 'Prince George'],
                        ['id' => 'WHI', 'name' => 'Whistler'],
                        ['id' => 'BUR', 'name' => 'Burnaby'],
                        ['id' => 'RIC', 'name' => 'Richmond'],
                        ['id' => 'SUR', 'name' => 'Surrey'],
                        ['id' => 'COQ', 'name' => 'Coquitlam'],
                        ['id' => 'LAN', 'name' => 'Langley'],
                        ['id' => 'DEL', 'name' => 'Delta'],
                        ['id' => 'NVA', 'name' => 'North Vancouver'],
                        ['id' => 'CHI', 'name' => 'Chilliwack'],
                        ['id' => 'MAR', 'name' => 'Maple Ridge'],
                        ['id' => 'PEN', 'name' => 'Penticton'],
                        ['id' => 'VER', 'name' => 'Vernon'],
                        ['id' => 'DUN', 'name' => 'Duncan'],
                        ['id' => 'CAM', 'name' => 'Campbell River'],
                        ['id' => 'SQU', 'name' => 'Squamish'],
                        ['id' => 'POR', 'name' => 'Port Alberni'],
                        ['id' => 'POW', 'name' => 'Powell River'],
                        ['id' => 'TER', 'name' => 'Terrace'],
                    ];
                    break;
                case 'MB':
                    $cities = [
                        ['id' => 'WIN', 'name' => 'Winnipeg'],
                        ['id' => 'BRA', 'name' => 'Brandon'],
                        ['id' => 'STB', 'name' => 'Steinbach'],
                        ['id' => 'THO', 'name' => 'Thompson'],
                        ['id' => 'POR', 'name' => 'Portage la Prairie'],
                        ['id' => 'WIK', 'name' => 'Winkler'],
                        ['id' => 'SEL', 'name' => 'Selkirk'],
                        ['id' => 'DAU', 'name' => 'Dauphin'],
                        ['id' => 'MOD', 'name' => 'Morden'],
                        ['id' => 'FLF', 'name' => 'Flin Flon'],
                        ['id' => 'THE', 'name' => 'The Pas'],
                        ['id' => 'STJ', 'name' => 'Stonewall'],
                        ['id' => 'NIV', 'name' => 'Niverville'],
                        ['id' => 'ALT', 'name' => 'Altona'],
                        ['id' => 'NEE', 'name' => 'Neepawa'],
                    ];
                    break;
                case 'NB':
                    $cities = [
                        ['id' => 'MON', 'name' => 'Moncton'],
                        ['id' => 'SAI', 'name' => 'Saint John'],
                        ['id' => 'FRE', 'name' => 'Fredericton'],
                        ['id' => 'EDM', 'name' => 'Edmundston'],
                        ['id' => 'BAT', 'name' => 'Bathurst'],
                        ['id' => 'MIR', 'name' => 'Miramichi'],
                        ['id' => 'CAM', 'name' => 'Campbellton'],
                        ['id' => 'DIE', 'name' => 'Dieppe'],
                        ['id' => 'ORM', 'name' => 'Oromocto'],
                        ['id' => 'SAC', 'name' => 'Sackville'],
                        ['id' => 'ROT', 'name' => 'Rothesay'],
                        ['id' => 'QUI', 'name' => 'Quispamsis'],
                        ['id' => 'RIV', 'name' => 'Riverview'],
                        ['id' => 'SUS', 'name' => 'Sussex'],
                        ['id' => 'SHI', 'name' => 'Shippagan'],
                    ];
                    break;
                case 'NL':
                    $cities = [
                        ['id' => 'STJ', 'name' => 'St. John\'s'],
                        ['id' => 'MOU', 'name' => 'Mount Pearl'],
                        ['id' => 'CON', 'name' => 'Conception Bay South'],
                        ['id' => 'GRA', 'name' => 'Grand Falls-Windsor'],
                        ['id' => 'COR', 'name' => 'Corner Brook'],
                        ['id' => 'PAR', 'name' => 'Paradise'],
                        ['id' => 'GAI', 'name' => 'Gander'],
                        ['id' => 'LAB', 'name' => 'Labrador City'],
                        ['id' => 'STE', 'name' => 'Stephenville'],
                        ['id' => 'BAY', 'name' => 'Bay Roberts'],
                        ['id' => 'HAP', 'name' => 'Happy Valley-Goose Bay'],
                        ['id' => 'POR', 'name' => 'Portugal Cove-St. Philip\'s'],
                        ['id' => 'TOB', 'name' => 'Torbay'],
                        ['id' => 'CAR', 'name' => 'Carbonear'],
                        ['id' => 'MAR', 'name' => 'Marystown'],
                    ];
                    break;
                case 'NS':
                    $cities = [
                        ['id' => 'HAL', 'name' => 'Halifax'],
                        ['id' => 'SYD', 'name' => 'Sydney'],
                        ['id' => 'TRU', 'name' => 'Truro'],
                        ['id' => 'NEW', 'name' => 'New Glasgow'],
                        ['id' => 'YAR', 'name' => 'Yarmouth'],
                        ['id' => 'KEN', 'name' => 'Kentville'],
                        ['id' => 'AMH', 'name' => 'Amherst'],
                        ['id' => 'BRI', 'name' => 'Bridgewater'],
                        ['id' => 'GLB', 'name' => 'Glace Bay'],
                        ['id' => 'DAR', 'name' => 'Dartmouth'],
                        ['id' => 'BED', 'name' => 'Bedford'],
                        ['id' => 'COL', 'name' => 'Colchester'],
                        ['id' => 'PIK', 'name' => 'Pictou'],
                        ['id' => 'SYP', 'name' => 'Sydney Mines'],
                        ['id' => 'WOL', 'name' => 'Wolfville'],
                        ['id' => 'CAB', 'name' => 'Cape Breton'],
                        ['id' => 'ANT', 'name' => 'Antigonish'],
                    ];
                    break;
                case 'NT':
                    $cities = [
                        ['id' => 'YEL', 'name' => 'Yellowknife'],
                        ['id' => 'HAY', 'name' => 'Hay River'],
                        ['id' => 'FOR', 'name' => 'Fort Smith'],
                        ['id' => 'INV', 'name' => 'Inuvik'],
                        ['id' => 'BEH', 'name' => 'Behchoko'],
                        ['id' => 'FTL', 'name' => 'Fort Liard'],
                        ['id' => 'FTP', 'name' => 'Fort Providence'],
                        ['id' => 'FTSI', 'name' => 'Fort Simpson'],
                        ['id' => 'NOR', 'name' => 'Norman Wells'],
                        ['id' => 'TUK', 'name' => 'Tuktoyaktuk'],
                    ];
                    break;
                case 'NU':
                    $cities = [
                        ['id' => 'IQA', 'name' => 'Iqaluit'],
                        ['id' => 'RAN', 'name' => 'Rankin Inlet'],
                        ['id' => 'ARV', 'name' => 'Arviat'],
                        ['id' => 'BAK', 'name' => 'Baker Lake'],
                        ['id' => 'CAM', 'name' => 'Cambridge Bay'],
                        ['id' => 'KUG', 'name' => 'Kugluktuk'],
                        ['id' => 'PAN', 'name' => 'Pangnirtung'],
                        ['id' => 'PON', 'name' => 'Pond Inlet'],
                        ['id' => 'CAP', 'name' => 'Cape Dorset'],
                        ['id' => 'IGL', 'name' => 'Igloolik'],
                        ['id' => 'QIK', 'name' => 'Qikiqtarjuaq'],
                        ['id' => 'SAL', 'name' => 'Sanikiluaq'],
                    ];
                    break;
                case 'ON':
                    $cities = [
                        ['id' => 'TOR', 'name' => 'Toronto'],
                        ['id' => 'OTT', 'name' => 'Ottawa'],
                        ['id' => 'MIS', 'name' => 'Mississauga'],
                        ['id' => 'HAM', 'name' => 'Hamilton'],
                        ['id' => 'LON', 'name' => 'London'],
                        ['id' => 'WIN', 'name' => 'Windsor'],
                        ['id' => 'KIT', 'name' => 'Kitchener'],
                        ['id' => 'VAU', 'name' => 'Vaughan'],
                        ['id' => 'WAT', 'name' => 'Waterloo'],
                        ['id' => 'GUE', 'name' => 'Guelph'],
                        ['id' => 'BRA', 'name' => 'Brampton'],
                        ['id' => 'MAR', 'name' => 'Markham'],
                        ['id' => 'OAK', 'name' => 'Oakville'],
                        ['id' => 'RIC', 'name' => 'Richmond Hill'],
                        ['id' => 'BUR', 'name' => 'Burlington'],
                        ['id' => 'SUD', 'name' => 'Sudbury'],
                        ['id' => 'OSH', 'name' => 'Oshawa'],
                        ['id' => 'BAR', 'name' => 'Barrie'],
                        ['id' => 'STH', 'name' => 'St. Catharines'],
                        ['id' => 'CAM', 'name' => 'Cambridge'],
                        ['id' => 'KIN', 'name' => 'Kingston'],
                        ['id' => 'WIL', 'name' => 'Whitby'],
                        ['id' => 'THU', 'name' => 'Thunder Bay'],
                        ['id' => 'MIL', 'name' => 'Milton'],
                        ['id' => 'AJA', 'name' => 'Ajax'],
                        ['id' => 'PEM', 'name' => 'Pembroke'],
                        ['id' => 'PIC', 'name' => 'Pickering'],
                        ['id' => 'NIL', 'name' => 'Niagara Falls'],
                        ['id' => 'NMK', 'name' => 'Newmarket'],
                        ['id' => 'PET', 'name' => 'Peterborough'],
                    ];
                    break;
                case 'PE':
                    $cities = [
                        ['id' => 'CHA', 'name' => 'Charlottetown'],
                        ['id' => 'SUM', 'name' => 'Summerside'],
                        ['id' => 'STR', 'name' => 'Stratford'],
                        ['id' => 'COR', 'name' => 'Cornwall'],
                        ['id' => 'MON', 'name' => 'Montague'],
                        ['id' => 'KEN', 'name' => 'Kensington'],
                        ['id' => 'ALB', 'name' => 'Alberton'],
                        ['id' => 'SOU', 'name' => 'Souris'],
                        ['id' => 'TIG', 'name' => 'Tignish'],
                        ['id' => 'GEO', 'name' => 'Georgetown'],
                    ];
                    break;
                case 'QC':
                    $cities = [
                        ['id' => 'MTL', 'name' => 'Montreal'],
                        ['id' => 'QUE', 'name' => 'Quebec City'],
                        ['id' => 'LAV', 'name' => 'Laval'],
                        ['id' => 'GAT', 'name' => 'Gatineau'],
                        ['id' => 'LON', 'name' => 'Longueuil'],
                        ['id' => 'SHE', 'name' => 'Sherbrooke'],
                        ['id' => 'SAG', 'name' => 'Saguenay'],
                        ['id' => 'LEV', 'name' => 'Lévis'],
                        ['id' => 'TRO', 'name' => 'Trois-Rivières'],
                        ['id' => 'TER', 'name' => 'Terrebonne'],
                        ['id' => 'STE', 'name' => 'St-Jean-sur-Richelieu'],
                        ['id' => 'REP', 'name' => 'Repentigny'],
                        ['id' => 'BRO', 'name' => 'Brossard'],
                        ['id' => 'DRU', 'name' => 'Drummondville'],
                        ['id' => 'STJ', 'name' => 'Saint-Jérôme'],
                        ['id' => 'GRA', 'name' => 'Granby'],
                        ['id' => 'SHF', 'name' => 'Shawinigan'],
                        ['id' => 'BLI', 'name' => 'Blainville'],
                        ['id' => 'STH', 'name' => 'Saint-Hyacinthe'],
                        ['id' => 'MIR', 'name' => 'Mirabel'],
                        ['id' => 'DOR', 'name' => 'Dollard-des-Ormeaux'],
                        ['id' => 'CHA', 'name' => 'Châteauguay'],
                        ['id' => 'STG', 'name' => 'Saint-Georges'],
                        ['id' => 'RIM', 'name' => 'Rimouski'],
                        ['id' => 'STF', 'name' => 'Saint-Félicien'],
                    ];
                    break;
                case 'SK':
                    $cities = [
                        ['id' => 'SAS', 'name' => 'Saskatoon'],
                        ['id' => 'REG', 'name' => 'Regina'],
                        ['id' => 'PRI', 'name' => 'Prince Albert'],
                        ['id' => 'MOO', 'name' => 'Moose Jaw'],
                        ['id' => 'SWI', 'name' => 'Swift Current'],
                        ['id' => 'YOR', 'name' => 'Yorkton'],
                        ['id' => 'NOR', 'name' => 'North Battleford'],
                        ['id' => 'WAR', 'name' => 'Warman'],
                        ['id' => 'MAR', 'name' => 'Martensville'],
                        ['id' => 'EST', 'name' => 'Estevan'],
                        ['id' => 'WEY', 'name' => 'Weyburn'],
                        ['id' => 'LLO', 'name' => 'Lloydminster'],
                        ['id' => 'HUM', 'name' => 'Humboldt'],
                        ['id' => 'MEA', 'name' => 'Meadow Lake'],
                        ['id' => 'NIL', 'name' => 'Nipawin'],
                    ];
                    break;
                case 'YT':
                    $cities = [
                        ['id' => 'WHI', 'name' => 'Whitehorse'],
                        ['id' => 'DAW', 'name' => 'Dawson City'],
                        ['id' => 'WAT', 'name' => 'Watson Lake'],
                        ['id' => 'HAI', 'name' => 'Haines Junction'],
                        ['id' => 'MAY', 'name' => 'Mayo'],
                        ['id' => 'FAR', 'name' => 'Faro'],
                        ['id' => 'CAR', 'name' => 'Carmacks'],
                        ['id' => 'TES', 'name' => 'Teslin'],
                        ['id' => 'CAR', 'name' => 'Carcross'],
                        ['id' => 'ROS', 'name' => 'Ross River'],
                    ];
                    break;
                default:
                    $cities = [
                        ['id' => 'OTH', 'name' => 'Other Cities'],
                    ];
            }
        }
        // India cities
        elseif ($country == 'IN') {
            switch($state) {
                case 'MH':
                    $cities = [
                        ['id' => 'MUM', 'name' => 'Mumbai'],
                        ['id' => 'NAG', 'name' => 'Nagpur'],
                        ['id' => 'PUN', 'name' => 'Pune'],
                        ['id' => 'NAS', 'name' => 'Nasik'],
                        ['id' => 'SOL', 'name' => 'Solapur'],
                        ['id' => 'JUN', 'name' => 'Junnar'],
                        ['id' => 'KOL', 'name' => 'Kolhapur'],
                        ['id' => 'NAV', 'name' => 'Nashik'],
                        ['id' => 'THN', 'name' => 'Thane'],
                        ['id' => 'AUR', 'name' => 'Aurangabad'],
                        ['id' => 'AMR', 'name' => 'Amravati'],
                    ];
                    break;
                case 'UP':
                    $cities = [
                        ['id' => 'KAN', 'name' => 'Kanpur'],
                        ['id' => 'LKO', 'name' => 'Lucknow'],
                        ['id' => 'AGR', 'name' => 'Agra'],
                        ['id' => 'VAR', 'name' => 'Varanasi'],
                        ['id' => 'ALI', 'name' => 'Aligarh'],
                        ['id' => 'MER', 'name' => 'Meerut'],
                        ['id' => 'GAZ', 'name' => 'Ghaziabad'],
                        ['id' => 'NID', 'name' => 'Noida'],
                    ];
                    break;
                case 'KA':
                    $cities = [
                        ['id' => 'BLR', 'name' => 'Bengaluru'],
                        ['id' => 'MYS', 'name' => 'Mysore'],
                        ['id' => 'HUB', 'name' => 'Hubli'],
                        ['id' => 'MNG', 'name' => 'Mangalore'],
                        ['id' => 'BEL', 'name' => 'Belgaum'],
                        ['id' => 'DVG', 'name' => 'Davangere'],
                    ];
                    break;
                case 'TN':
                    $cities = [
                        ['id' => 'CHN', 'name' => 'Chennai'],
                        ['id' => 'MAD', 'name' => 'Madurai'],
                        ['id' => 'COI', 'name' => 'Coimbatore'],
                        ['id' => 'TIR', 'name' => 'Tiruchirappalli'],
                        ['id' => 'SAL', 'name' => 'Salem'],
                        ['id' => 'TIR', 'name' => 'Tirunelveli'],
                        ['id' => 'ERO', 'name' => 'Erode'],
                    ];
                    break;
                case 'AP':
                    $cities = [
                        ['id' => 'HYD', 'name' => 'Hyderabad'],
                        ['id' => 'VIS', 'name' => 'Visakhapatnam'],
                        ['id' => 'VIJ', 'name' => 'Vijayawada'],
                        ['id' => 'WAR', 'name' => 'Warangal'],
                        ['id' => 'TIR', 'name' => 'Tirupati'],
                        ['id' => 'NEL', 'name' => 'Nellore'],
                        ['id' => 'KAK', 'name' => 'Kakinada'],
                    ];
                    break;
                case 'KL':
                    $cities = [
                        ['id' => 'TVM', 'name' => 'Thiruvananthapuram'],
                        ['id' => 'KOC', 'name' => 'Kochi'],
                        ['id' => 'KOZ', 'name' => 'Kozhikode'],
                        ['id' => 'THR', 'name' => 'Thrissur'],
                        ['id' => 'KOL', 'name' => 'Kollam'],
                        ['id' => 'KOT', 'name' => 'Kottayam'],
                    ];
                    break;
                case 'RJ':
                    $cities = [
                        ['id' => 'JAI', 'name' => 'Jaipur'],
                        ['id' => 'JOD', 'name' => 'Jodhpur'],
                        ['id' => 'UDA', 'name' => 'Udaipur'],
                        ['id' => 'KOT', 'name' => 'Kota'],
                        ['id' => 'BIK', 'name' => 'Bikaner'],
                        ['id' => 'AJM', 'name' => 'Ajmer'],
                    ];
                    break;
                case 'MP':
                    $cities = [
                        ['id' => 'BHO', 'name' => 'Bhopal'],
                        ['id' => 'IND', 'name' => 'Indore'],
                        ['id' => 'JAB', 'name' => 'Jabalpur'],
                        ['id' => 'GWA', 'name' => 'Gwalior'],
                        ['id' => 'UJJ', 'name' => 'Ujjain'],
                        ['id' => 'SAT', 'name' => 'Sagar'],
                    ];
                    break;
                default:
                    $cities = [
                        ['id' => 'OTH', 'name' => 'Other Cities'],
                    ];
            }
        }
    
        
        // Keep other countries as needed
        
        return response()->json($cities);
    }
} 