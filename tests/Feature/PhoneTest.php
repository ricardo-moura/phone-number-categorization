<?php

namespace Tests\Feature;

use Tests\TestCase;

class PhoneTest extends TestCase
{
    /** @test */
    public function it_should_be_able_to_list_phone_numbers(): void
    {
        $response = $this->get('/api/phones');
        $response->assertStatus(200);
        $response->assertJson($this->getAllPhones());
    }

    /** @test */
    public function it_should_be_able_to_list_phone_numbers_by_country_name(): void
    {
        $response = $this->get('/api/phones?country=Mozambique');
        $response->assertStatus(200);
        $response->assertJson($this->getPhonesByCountry());
    }

    /** @test */
    public function it_should_be_able_to_list_phone_numbers_by_state(): void
    {
        $response = $this->get('/api/phones?state=NOK');
        $response->assertStatus(200);
        $response->assertJson($this->getPhonesByState());
    }

    /** @test */
    public function it_should_be_able_to_list_phone_numbers_by_country_and_state(): void
    {
        $response = $this->get('/api/phones?country=Mozambique&state=NOK');
        $response->assertStatus(200);
        $response->assertJson($this->getPhonesByCountryAndState());
    }

    private function getAllPhones(): array
    {
        return [
            'status' => 200,
            'data' => [
                0 => [
                    'id' => 0,
                    'countryName' => 'Morocco',
                    'state' => 'NOK',
                    'countryCode' => '+212',
                    'phoneNumber' => '6007989253',
                ],
                1 => [
                    'id' => 1,
                    'countryName' => 'Morocco',
                    'state' => 'OK',
                    'countryCode' => '+212',
                    'phoneNumber' => '698054317',
                ],
                2 => [
                    'id' => 2,
                    'countryName' => 'Morocco',
                    'state' => 'OK',
                    'countryCode' => '+212',
                    'phoneNumber' => '6546545369',
                ],
                3 => [
                    'id' => 3,
                    'countryName' => 'Morocco',
                    'state' => 'OK',
                    'countryCode' => '+212',
                    'phoneNumber' => '6617344445',
                ],
                4 => [
                    'id' => 4,
                    'countryName' => 'Morocco',
                    'state' => 'OK',
                    'countryCode' => '+212',
                    'phoneNumber' => '691933626',
                ],
                5 => [
                    'id' => 5,
                    'countryName' => 'Morocco',
                    'state' => 'OK',
                    'countryCode' => '+212',
                    'phoneNumber' => '633963130',
                ],
                6 => [
                    'id' => 6,
                    'countryName' => 'Morocco',
                    'state' => 'OK',
                    'countryCode' => '+212',
                    'phoneNumber' => '654642448',
                ],
                7 => [
                    'id' => 7,
                    'countryName' => 'Mozambique',
                    'state' => 'OK',
                    'countryCode' => '+258',
                    'phoneNumber' => '847651504',
                ],
                8 => [
                    'id' => 8,
                    'countryName' => 'Mozambique',
                    'state' => 'OK',
                    'countryCode' => '+258',
                    'phoneNumber' => '846565883',
                ],
                9 => [
                    'id' => 9,
                    'countryName' => 'Mozambique',
                    'state' => 'OK',
                    'countryCode' => '+258',
                    'phoneNumber' => '849181828',
                ],
                10 => [
                    'id' => 10,
                    'countryName' => 'Mozambique',
                    'state' => 'NOK',
                    'countryCode' => '+258',
                    'phoneNumber' => '84330678235',
                ],
                11 => [
                    'id' => 11,
                    'countryName' => 'Mozambique',
                    'state' => 'OK',
                    'countryCode' => '+258',
                    'phoneNumber' => '847602609',
                ],
                12 => [
                    'id' => 12,
                    'countryName' => 'Mozambique',
                    'state' => 'NOK',
                    'countryCode' => '+258',
                    'phoneNumber' => '042423566',
                ],
                13 => [
                    'id' => 13,
                    'countryName' => 'Mozambique',
                    'state' => 'OK',
                    'countryCode' => '+258',
                    'phoneNumber' => '823747618',
                ],
                14 => [
                    'id' => 14,
                    'countryName' => 'Mozambique',
                    'state' => 'OK',
                    'countryCode' => '+258',
                    'phoneNumber' => '848826725',
                ],
                15 => [
                    'id' => 15,
                    'countryName' => 'Uganda',
                    'state' => 'OK',
                    'countryCode' => '+256',
                    'phoneNumber' => '775069443',
                ],
                16 => [
                    'id' => 16,
                    'countryName' => 'Uganda',
                    'state' => 'NOK',
                    'countryCode' => '+256',
                    'phoneNumber' => '7503O6263',
                ],
                17 => [
                    'id' => 17,
                    'countryName' => 'Uganda',
                    'state' => 'OK',
                    'countryCode' => '+256',
                    'phoneNumber' => '704244430',
                ],
                18 => [
                    'id' => 18,
                    'countryName' => 'Uganda',
                    'state' => 'OK',
                    'countryCode' => '+256',
                    'phoneNumber' => '7734127498',
                ],
                19 => [
                    'id' => 19,
                    'countryName' => 'Uganda',
                    'state' => 'OK',
                    'countryCode' => '+256',
                    'phoneNumber' => '7771031454',
                ],
                20 => [
                    'id' => 20,
                    'countryName' => 'Uganda',
                    'state' => 'OK',
                    'countryCode' => '+256',
                    'phoneNumber' => '3142345678',
                ],
                21 => [
                    'id' => 21,
                    'countryName' => 'Uganda',
                    'state' => 'OK',
                    'countryCode' => '+256',
                    'phoneNumber' => '714660221',
                ],
                22 => [
                    'id' => 22,
                    'countryName' => 'Ethiopia',
                    'state' => 'NOK',
                    'countryCode' => '+251',
                    'phoneNumber' => '9773199405',
                ],
                23 => [
                    'id' => 23,
                    'countryName' => 'Ethiopia',
                    'state' => 'OK',
                    'countryCode' => '+251',
                    'phoneNumber' => '914701723',
                ],
                24 => [
                    'id' => 24,
                    'countryName' => 'Ethiopia',
                    'state' => 'OK',
                    'countryCode' => '+251',
                    'phoneNumber' => '911203317',
                ],
                25 => [
                    'id' => 25,
                    'countryName' => 'Ethiopia',
                    'state' => 'OK',
                    'countryCode' => '+251',
                    'phoneNumber' => '9119454961',
                ],
                26 => [
                    'id' => 26,
                    'countryName' => 'Ethiopia',
                    'state' => 'OK',
                    'countryCode' => '+251',
                    'phoneNumber' => '914148181',
                ],
                27 => [
                    'id' => 27,
                    'countryName' => 'Ethiopia',
                    'state' => 'OK',
                    'countryCode' => '+251',
                    'phoneNumber' => '966002259',
                ],
                28 => [
                    'id' => 28,
                    'countryName' => 'Ethiopia',
                    'state' => 'OK',
                    'countryCode' => '+251',
                    'phoneNumber' => '988200000',
                ],
                29 => [
                    'id' => 29,
                    'countryName' => 'Ethiopia',
                    'state' => 'OK',
                    'countryCode' => '+251',
                    'phoneNumber' => '924418461',
                ],
                30 => [
                    'id' => 30,
                    'countryName' => 'Ethiopia',
                    'state' => 'OK',
                    'countryCode' => '+251',
                    'phoneNumber' => '911168450',
                ],
                31 => [
                    'id' => 31,
                    'countryName' => 'Cameroon',
                    'state' => 'OK',
                    'countryCode' => '+237',
                    'phoneNumber' => '697151594',
                ],
                32 => [
                    'id' => 32,
                    'countryName' => 'Cameroon',
                    'state' => 'OK',
                    'countryCode' => '+237',
                    'phoneNumber' => '677046616',
                ],
                33 => [
                    'id' => 33,
                    'countryName' => 'Cameroon',
                    'state' => 'NOK',
                    'countryCode' => '+237',
                    'phoneNumber' => '6A0311634',
                ],
                34 => [
                    'id' => 34,
                    'countryName' => 'Cameroon',
                    'state' => 'OK',
                    'countryCode' => '+237',
                    'phoneNumber' => '673122155',
                ],
                35 => [
                    'id' => 35,
                    'countryName' => 'Cameroon',
                    'state' => 'OK',
                    'countryCode' => '+237',
                    'phoneNumber' => '695539786',
                ],
                36 => [
                    'id' => 36,
                    'countryName' => 'Cameroon',
                    'state' => 'OK',
                    'countryCode' => '+237',
                    'phoneNumber' => '6780009592',
                ],
                37 => [
                    'id' => 37,
                    'countryName' => 'Cameroon',
                    'state' => 'OK',
                    'countryCode' => '+237',
                    'phoneNumber' => '6622284920',
                ],
                38 => [
                    'id' => 38,
                    'countryName' => 'Cameroon',
                    'state' => 'OK',
                    'countryCode' => '+237',
                    'phoneNumber' => '696443597',
                ],
                39 => [
                    'id' => 39,
                    'countryName' => 'Cameroon',
                    'state' => 'OK',
                    'countryCode' => '+237',
                    'phoneNumber' => '691816558',
                ],
                40 => [
                    'id' => 40,
                    'countryName' => 'Cameroon',
                    'state' => 'OK',
                    'countryCode' => '+237',
                    'phoneNumber' => '699209115',
                ],
            ],
        ];
    }
    private function getPhonesByCountry(): array
    {
        return [
            'status' => 200,
            'data' => [
                8 => [
                    'id' => 8,
                    'countryName' => 'Mozambique',
                    'state' => 'OK',
                    'countryCode' => '+258',
                    'phoneNumber' => '846565883',
                ],
                9 => [
                    'id' => 9,
                    'countryName' => 'Mozambique',
                    'state' => 'OK',
                    'countryCode' => '+258',
                    'phoneNumber' => '849181828',
                ],
                10 => [
                    'id' => 10,
                    'countryName' => 'Mozambique',
                    'state' => 'NOK',
                    'countryCode' => '+258',
                    'phoneNumber' => '84330678235',
                ],
                11 => [
                    'id' => 11,
                    'countryName' => 'Mozambique',
                    'state' => 'OK',
                    'countryCode' => '+258',
                    'phoneNumber' => '847602609',
                ],
                12 => [
                    'id' => 12,
                    'countryName' => 'Mozambique',
                    'state' => 'NOK',
                    'countryCode' => '+258',
                    'phoneNumber' => '042423566',
                ],
                13 => [
                    'id' => 13,
                    'countryName' => 'Mozambique',
                    'state' => 'OK',
                    'countryCode' => '+258',
                    'phoneNumber' => '823747618',
                ],
                14 => [
                    'id' => 14,
                    'countryName' => 'Mozambique',
                    'state' => 'OK',
                    'countryCode' => '+258',
                    'phoneNumber' => '848826725',
                ],
            ],
        ];
    }

    private function getPhonesByState(): array
    {
        return [
            'status' => 200,
            'data' =>  [
                0 =>  [
                    'id' =>  0,
                    'countryName' =>  'Morocco',
                    'state' =>  'NOK',
                    'countryCode' =>  '+212',
                    'phoneNumber' =>  '6007989253'
                ],
                10 =>  [
                    'id' =>  10,
                    'countryName' =>  'Mozambique',
                    'state' =>  'NOK',
                    'countryCode' =>  '+258',
                    'phoneNumber' =>  '84330678235'
                ],
                12 =>  [
                    'id' =>  12,
                    'countryName' =>  'Mozambique',
                    'state' =>  'NOK',
                    'countryCode' =>  '+258',
                    'phoneNumber' =>  '042423566'
                ],
                16 =>  [
                    'id' =>  16,
                    'countryName' =>  'Uganda',
                    'state' =>  'NOK',
                    'countryCode' =>  '+256',
                    'phoneNumber' =>  '7503O6263'
                ],
                22 =>  [
                    'id' =>  22,
                    'countryName' =>  'Ethiopia',
                    'state' =>  'NOK',
                    'countryCode' =>  '+251',
                    'phoneNumber' =>  '9773199405'
                ],
                33 =>  [
                    'id' =>  33,
                    'countryName' =>  'Cameroon',
                    'state' =>  'NOK',
                    'countryCode' =>  '+237',
                    'phoneNumber' =>  '6A0311634'
                ],
            ],
        ];
    }

    private function getPhonesByCountryAndState(): array
    {
        return [
            'status' => 200,
            'data' =>  [
                10 => [
                    'id' =>  10,
                    'countryName' =>  'Mozambique',
                    'state' =>  'NOK',
                    'countryCode' =>  '+258',
                    'phoneNumber' =>  '84330678235'
                ],
                12 => [
                    'id' =>  12,
                    'countryName' =>  'Mozambique',
                    'state' =>  'NOK',
                    'countryCode' =>  '+258',
                    'phoneNumber' =>  '042423566'
                ],
            ],
        ];
    }
}
