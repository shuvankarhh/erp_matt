<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $currencies = [
            [
                'name' => 'US Dollar',
                'code' => 'USD',
                'symbol' => '$',
            ],
            [
                'name' => 'Euro',
                'code' => 'EUR',
                'symbol' => '€',
            ],
            [
                'name' => 'Japanese Yen',
                'code' => 'JPY',
                'symbol' => '¥',
            ],
            [
                'name' => 'British Pound',
                'code' => 'GBP',
                'symbol' => '£',
            ],
            [
                'name' => 'Australian Dollar',
                'code' => 'AUD',
                'symbol' => 'A$',
            ],
            [
                'name' => 'Canadian Dollar',
                'code' => 'CAD',
                'symbol' => 'CA$',
            ],
            [
                'name' => 'Swiss Franc',
                'code' => 'CHF',
                'symbol' => 'Fr',
            ],
            [
                'name' => 'Chinese Yuan',
                'code' => 'CNY',
                'symbol' => '¥',
            ],
            [
                'name' => 'Swedish Krona',
                'code' => 'SEK',
                'symbol' => 'kr',
            ],
            [
                'name' => 'New Zealand Dollar',
                'code' => 'NZD',
                'symbol' => 'NZ$',
            ],
            [
                'name' => 'Mexican Peso',
                'code' => 'MXN',
                'symbol' => 'Mex$',
            ],
            [
                'name' => 'Hong Kong Dollar',
                'code' => 'HKD',
                'symbol' => 'HK$',
            ],
            [
                'name' => 'Singapore Dollar',
                'code' => 'SGD',
                'symbol' => 'S$',
            ],
            [
                'name' => 'Norwegian Krone',
                'code' => 'NOK',
                'symbol' => 'kr',
            ],
            [
                'name' => 'South Korean Won',
                'code' => 'KRW',
                'symbol' => '₩',
            ],
            [
                'name' => 'Turkish Lira',
                'code' => 'TRY',
                'symbol' => '₺',
            ],
            [
                'name' => 'Indian Rupee',
                'code' => 'INR',
                'symbol' => '₹',
            ],
            [
                'name' => 'Brazilian Real',
                'code' => 'BRL',
                'symbol' => 'R$',
            ],
            [
                'name' => 'Russian Ruble',
                'code' => 'RUB',
                'symbol' => '₽',
            ],
            [
                'name' => 'South African Rand',
                'code' => 'ZAR',
                'symbol' => 'R',
            ],
            [
                'name' => 'Danish Krone',
                'code' => 'DKK',
                'symbol' => 'kr',
            ],
            [
                'name' => 'Polish Zloty',
                'code' => 'PLN',
                'symbol' => 'zł',
            ],
            [
                'name' => 'Thai Baht',
                'code' => 'THB',
                'symbol' => '฿',
            ],
            [
                'name' => 'Israeli Shekel',
                'code' => 'ILS',
                'symbol' => '₪',
            ],
            [
                'name' => 'Czech Koruna',
                'code' => 'CZK',
                'symbol' => 'Kč',
            ],
            [
                'name' => 'Hungarian Forint',
                'code' => 'HUF',
                'symbol' => 'Ft',
            ],
            [
                'name' => 'Chilean Peso',
                'code' => 'CLP',
                'symbol' => '$',
            ],
            [
                'name' => 'Philippine Peso',
                'code' => 'PHP',
                'symbol' => '₱',
            ],
            [
                'name' => 'Indonesian Rupiah',
                'code' => 'IDR',
                'symbol' => 'Rp',
            ],
            [
                'name' => 'Ukrainian Hryvnia',
                'code' => 'UAH',
                'symbol' => '₴',
            ],
            [
                'name' => 'Saudi Riyal',
                'code' => 'SAR',
                'symbol' => '﷼',
            ],
            [
                'name' => 'Emirati Dirham',
                'code' => 'AED',
                'symbol' => 'د.إ',
            ],
            [
                'name' => 'Colombian Peso',
                'code' => 'COP',
                'symbol' => '$',
            ],
            [
                'name' => 'Egyptian Pound',
                'code' => 'EGP',
                'symbol' => 'E£',
            ],
            [
                'name' => 'Vietnamese Dong',
                'code' => 'VND',
                'symbol' => '₫',
            ],
            [
                'name' => 'Malaysian Ringgit',
                'code' => 'MYR',
                'symbol' => 'RM',
            ],
            [
                'name' => 'Argentine Peso',
                'code' => 'ARS',
                'symbol' => '$',
            ],
            [
                'name' => 'Peruvian Sol',
                'code' => 'PEN',
                'symbol' => 'S/',
            ],
            [
                'name' => 'Nigerian Naira',
                'code' => 'NGN',
                'symbol' => '₦',
            ],
            [
                'name' => 'Kenyan Shilling',
                'code' => 'KES',
                'symbol' => 'KSh',
            ],
            [
                'name' => 'Bangladeshi Taka',
                'code' => 'BDT',
                'symbol' => '৳',
            ],
            [
                'name' => 'Nepalese Rupee',
                'code' => 'NPR',
                'symbol' => 'रू',
            ],
            [
                'name' => 'Sri Lankan Rupee',
                'code' => 'LKR',
                'symbol' => 'රු',
            ],
            [
                'name' => 'Pakistani Rupee',
                'code' => 'PKR',
                'symbol' => '₨',
            ],
            [
                'name' => 'Afghan Afghani',
                'code' => 'AFN',
                'symbol' => '؋',
            ],
            [
                'name' => 'Iranian Rial',
                'code' => 'IRR',
                'symbol' => '﷼',
            ],
            [
                'name' => 'Iraqi Dinar',
                'code' => 'IQD',
                'symbol' => 'ع.د',
            ],
            [
                'name' => 'Kuwaiti Dinar',
                'code' => 'KWD',
                'symbol' => 'د.ك',
            ],
            [
                'name' => 'Omani Rial',
                'code' => 'OMR',
                'symbol' => 'ر.ع.',
            ],
            [
                'name' => 'Qatari Riyal',
                'code' => 'QAR',
                'symbol' => 'ر.ق',
            ],
            [
                'name' => 'Bahraini Dinar',
                'code' => 'BHD',
                'symbol' => 'د.ب',
            ],
            [
                'name' => 'Jordanian Dinar',
                'code' => 'JOD',
                'symbol' => 'د.ا',
            ],
            [
                'name' => 'Lebanese Pound',
                'code' => 'LBP',
                'symbol' => 'ل.ل',
            ],
            [
                'name' => 'Syrian Pound',
                'code' => 'SYP',
                'symbol' => '£S',
            ],
            [
                'name' => 'Yemeni Rial',
                'code' => 'YER',
                'symbol' => '﷼',
            ],
            [
                'name' => 'Armenian Dram',
                'code' => 'AMD',
                'symbol' => '֏',
            ],
            [
                'name' => 'Azerbaijani Manat',
                'code' => 'AZN',
                'symbol' => '₼',
            ],
            [
                'name' => 'Georgian Lari',
                'code' => 'GEL',
                'symbol' => '₾',
            ],
            [
                'name' => 'Kazakhstani Tenge',
                'code' => 'KZT',
                'symbol' => '₸',
            ],
            [
                'name' => 'Kyrgyzstani Som',
                'code' => 'KGS',
                'symbol' => 'с',
            ],
            [
                'name' => 'Mongolian Tögrög',
                'code' => 'MNT',
                'symbol' => '₮',
            ],
            [
                'name' => 'Tajikistani Somoni',
                'code' => 'TJS',
                'symbol' => 'ЅМ',
            ],
            [
                'name' => 'Turkmenistan Manat',
                'code' => 'TMT',
                'symbol' => 'm',
            ],
            [
                'name' => 'Uzbekistani Soʻm',
                'code' => 'UZS',
                'symbol' => 'soʻm',
            ],
            [
                'name' => 'Bhutanese Ngultrum',
                'code' => 'BTN',
                'symbol' => 'Nu.',
            ],
            [
                'name' => 'Maldivian Rufiyaa',
                'code' => 'MVR',
                'symbol' => 'ރ',
            ],
            [
                'name' => 'Papua New Guinean Kina',
                'code' => 'PGK',
                'symbol' => 'K',
            ],
            [
                'name' => 'Solomon Islands Dollar',
                'code' => 'SBD',
                'symbol' => '$',
            ],
            [
                'name' => 'Vanuatu Vatu',
                'code' => 'VUV',
                'symbol' => 'VT',
            ],
            [
                'name' => 'Fijian Dollar',
                'code' => 'FJD',
                'symbol' => '$',
            ],
            [
                'name' => 'Tongan Paʻanga',
                'code' => 'TOP',
                'symbol' => 'T$',
            ],
            [
                'name' => 'Samoa Tala',
                'code' => 'WST',
                'symbol' => 'T',
            ],
            [
                'name' => 'Cook Islands Dollar',
                'code' => 'CKD',
                'symbol' => '$',
            ],
            [
                'name' => 'Kiribati Dollar',
                'code' => 'KID',
                'symbol' => '$',
            ],
            [
                'name' => 'Niue Dollar',
                'code' => 'NID',
                'symbol' => '$',
            ],
            [
                'name' => 'Tuvaluan Dollar',
                'code' => 'TVD',
                'symbol' => '$',
            ],
            [
                'name' => 'East Caribbean Dollar',
                'code' => 'XCD',
                'symbol' => '$',
            ],
            [
                'name' => 'West African CFA Franc',
                'code' => 'XOF',
                'symbol' => 'CFA',
            ],
            [
                'name' => 'Central African CFA Franc',
                'code' => 'XAF',
                'symbol' => 'FCFA',
            ],
            [
                'name' => 'CFA Franc',
                'code' => 'XPF',
                'symbol' => 'CFP',
            ],
            [
                'name' => 'Comorian Franc',
                'code' => 'KMF',
                'symbol' => 'CF',
            ],
            [
                'name' => 'Moroccan Dirham',
                'code' => 'MAD',
                'symbol' => 'د.م.',
            ],
            [
                'name' => 'Algerian Dinar',
                'code' => 'DZD',
                'symbol' => 'د.ج',
            ],
            [
                'name' => 'Tunisian Dinar',
                'code' => 'TND',
                'symbol' => 'د.ت',
            ],
            [
                'name' => 'Libyan Dinar',
                'code' => 'LYD',
                'symbol' => 'ل.د',
            ],
            [
                'name' => 'Sudanese Pound',
                'code' => 'SDG',
                'symbol' => 'ج.س.',
            ],
            [
                'name' => 'Eritrean Nakfa',
                'code' => 'ERN',
                'symbol' => 'Nfk',
            ],
            [
                'name' => 'Ethiopian Birr',
                'code' => 'ETB',
                'symbol' => 'ብር',
            ],
            [
                'name' => 'Somali Shilling',
                'code' => 'SOS',
                'symbol' => 'Sh',
            ],
            [
                'name' => 'Djiboutian Franc',
                'code' => 'DJF',
                'symbol' => 'Fdj',
            ],
            [
                'name' => 'Angolan Kwanza',
                'code' => 'AOA',
                'symbol' => 'Kz',
            ],
            [
                'name' => 'Namibian Dollar',
                'code' => 'NAD',
                'symbol' => '$',
            ],
            [
                'name' => 'Botswana Pula',
                'code' => 'BWP',
                'symbol' => 'P',
            ],
            [
                'name' => 'Zambian Kwacha',
                'code' => 'ZMW',
                'symbol' => 'ZK',
            ],
            [
                'name' => 'Mauritian Rupee',
                'code' => 'MUR',
                'symbol' => '₨',
            ],
            [
                'name' => 'Malawian Kwacha',
                'code' => 'MWK',
                'symbol' => 'MK',
            ],
            [
                'name' => 'Zimbabwean Dollar',
                'code' => 'ZWL',
                'symbol' => '$',
            ],

        ];

        DB::table('crm_currencies')->insert($currencies);
    }
}

