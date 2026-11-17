<?php

namespace Xefi\Faker\TrTr\Extensions;

use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
{
    public function getLocale(): ?string
    {
        return 'tr_TR';
    }

    protected $provinces = [
        '01' => 'Adana', '02' => 'Adıyaman', '03' => 'Afyonkarahisar', '04' => 'Ağrı', '05' => 'Amasya',
        '06' => 'Ankara', '07' => 'Antalya', '08' => 'Artvin', '09' => 'Aydın', '10' => 'Balıkesir',
        '11' => 'Bilecik', '12' => 'Bingöl', '13' => 'Bitlis', '14' => 'Bolu', '15' => 'Burdur',
        '16' => 'Bursa', '17' => 'Çanakkale', '18' => 'Çankırı', '19' => 'Çorum', '20' => 'Denizli',
        '21' => 'Diyarbakır', '22' => 'Edirne', '23' => 'Elazığ', '24' => 'Erzincan', '25' => 'Erzurum',
        '26' => 'Eskişehir', '27' => 'Gaziantep', '28' => 'Giresun', '29' => 'Gümüşhane', '30' => 'Hakkari',
        '31' => 'Hatay', '32' => 'Isparta', '33' => 'Mersin', '34' => 'İstanbul', '35' => 'İzmir',
        '36' => 'Kars', '37' => 'Kastamonu', '38' => 'Kayseri', '39' => 'Kırklareli', '40' => 'Kırşehir',
        '41' => 'Kocaeli', '42' => 'Konya', '43' => 'Kütahya', '44' => 'Malatya', '45' => 'Manisa',
        '46' => 'Kahramanmaraş', '47' => 'Mardin', '48' => 'Muğla', '49' => 'Muş', '50' => 'Nevşehir',
        '51' => 'Niğde', '52' => 'Ordu', '53' => 'Rize', '54' => 'Sakarya', '55' => 'Samsun',
        '56' => 'Siirt', '57' => 'Sinop', '58' => 'Sivas', '59' => 'Tekirdağ', '60' => 'Tokat',
        '61' => 'Trabzon', '62' => 'Tunceli', '63' => 'Şanlıurfa', '64' => 'Uşak', '65' => 'Van',
        '66' => 'Yozgat', '67' => 'Zonguldak', '68' => 'Aksaray', '69' => 'Bayburt', '70' => 'Karaman',
        '71' => 'Kırıkkale', '72' => 'Batman', '73' => 'Şırnak', '74' => 'Bartın', '75' => 'Ardahan',
        '76' => 'Iğdır', '77' => 'Yalova', '78' => 'Karabük', '79' => 'Kilis', '80' => 'Osmaniye',
        '81' => 'Düzce',
    ];

    protected $cities = [
        'İstanbul', 'Ankara', 'İzmir', 'Bursa', 'Antalya', 'Konya', 'Adana', 'Gaziantep', 'Şanlıurfa', 'Mersin',
        'Diyarbakır', 'Kayseri', 'Eskişehir', 'Samsun', 'Denizli', 'Malatya', 'Kahramanmaraş', 'Erzurum', 'Van', 'Batman',
        'Elazığ', 'Trabzon', 'Sivas', 'Manisa', 'Balıkesir', 'İzmit', 'Adapazarı', 'Alanya', 'Bodrum', 'Çorlu',
        'İskenderun', 'Tarsus', 'Kadıköy', 'Üsküdar', 'Çankaya', 'Karşıyaka', 'Nilüfer', 'Seyhan', 'Selçuklu', 'Ereğli',
    ];

    protected $streetTypes = ['Caddesi', 'Sokak', 'Bulvarı'];

    protected $streetNames = [
        'Atatürk', 'Cumhuriyet', 'İstiklal', 'İnönü', 'Gazi', 'Fevzi Çakmak', 'Mithatpaşa', 'Barbaros', 'Kazım Karabekir', 'Hürriyet',
        'Zafer', 'Millet', 'Fatih', 'Yavuz Selim', 'Mimar Sinan', 'Namık Kemal', 'Ziya Gökalp', 'Mehmet Akif Ersoy', 'Yunus Emre', 'Mevlana',
        'Lale', 'Gül', 'Menekşe', 'Papatya', 'Çınar', 'Akasya', 'Ihlamur', 'Kardelen', 'Yıldız', 'Güneş',
        'Bahar', 'Deniz', 'Pınar', 'Okul', 'Cami', 'İstasyon', 'Çarşı', 'Belediye', 'Bağdat', 'Sakarya',
    ];

    /**
     * Return a random province (il).
     *
     * @return string
     */
    public function province(): string
    {
        return $this->pickArrayRandomElement($this->provinces);
    }

    /**
     * Return a random province plate code, from 01 to 81.
     *
     * @return string
     */
    public function provinceCode(): string
    {
        return sprintf('%02d', $this->pickArrayRandomKey($this->provinces));
    }

    /**
     * Return a random city or district.
     *
     * @return string
     */
    public function city(): string
    {
        return $this->pickArrayRandomElement($this->cities);
    }

    /**
     * Return a random five-digit postcode whose first two digits are a province plate code.
     *
     * @return string
     */
    public function postcode(): string
    {
        return $this->postcodeFromPlateCode($this->provinceCode());
    }

    /**
     * Return a random building number.
     *
     * @return int
     */
    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 200);
    }

    /**
     * Return a random street name followed by its type.
     *
     * @return string
     */
    public function streetName(): string
    {
        $name = $this->pickArrayRandomElement($this->streetNames);
        $streetType = $this->pickArrayRandomElement($this->streetTypes);

        return sprintf('%s %s', $name, $streetType);
    }

    /**
     * Return a street name followed by a building number.
     *
     * @return string
     */
    public function streetAddress(): string
    {
        return sprintf('%s No: %d', $this->streetName(), $this->houseNumber());
    }

    /**
     * Return a full address whose postcode matches the province.
     *
     * @return string
     */
    public function fullAddress(): string
    {
        $plateCode = $this->provinceCode();

        return sprintf(
            '%s Daire: %d, %s %s',
            $this->streetAddress(),
            $this->randomizer->getInt(1, 40),
            $this->postcodeFromPlateCode($plateCode),
            $this->provinces[$plateCode]
        );
    }

    /**
     * Complete a province plate code into a five-digit postcode.
     *
     * @param string $plateCode
     *
     * @return string
     */
    private function postcodeFromPlateCode(string $plateCode): string
    {
        return sprintf('%s%03d', $plateCode, $this->randomizer->getInt(0, 999));
    }
}
