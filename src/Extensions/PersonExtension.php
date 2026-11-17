<?php

namespace Xefi\Faker\TrTr\Extensions;

use Xefi\Faker\Extensions\PersonExtension as BasePersonExtension;

class PersonExtension extends BasePersonExtension
{
    public function getLocale(): ?string
    {
        return 'tr_TR';
    }

    protected $firstNameMale = [
        'Mehmet', 'Mustafa', 'Ahmet', 'Ali', 'Hüseyin', 'Hasan', 'İbrahim', 'İsmail', 'Osman', 'Yusuf',
        'Murat', 'Ömer', 'Ramazan', 'Halil', 'Süleyman', 'Abdullah', 'Mahmut', 'Recep', 'Salih', 'Fatih',
        'Kadir', 'Emre', 'Hakan', 'Burak', 'Serkan', 'Cem', 'Can', 'Kemal', 'Orhan', 'Erkan',
        'Tolga', 'Oğuz', 'Barış', 'Selim', 'Volkan', 'Uğur', 'Kaan', 'Eren', 'Berk', 'Yiğit',
    ];

    protected $firstNameFemale = [
        'Fatma', 'Ayşe', 'Emine', 'Hatice', 'Zeynep', 'Elif', 'Meryem', 'Şerife', 'Zehra', 'Sultan',
        'Hanife', 'Merve', 'Özlem', 'Esra', 'Büşra', 'Ebru', 'Yasemin', 'Hülya', 'Gül', 'Derya',
        'Sevgi', 'Aslı', 'Burcu', 'Seda', 'Gamze', 'Pınar', 'Tuğba', 'Dilek', 'Ceren', 'Selin',
        'İrem', 'Damla', 'Ece', 'Melis', 'Nur', 'Sibel', 'Gizem', 'Kübra', 'Songül', 'Leyla',
    ];

    protected $lastName = [
        'Yılmaz', 'Kaya', 'Demir', 'Şahin', 'Çelik', 'Yıldız', 'Yıldırım', 'Öztürk', 'Aydın', 'Özdemir',
        'Arslan', 'Doğan', 'Kılıç', 'Aslan', 'Çetin', 'Kara', 'Koç', 'Kurt', 'Özkan', 'Şimşek',
        'Polat', 'Özcan', 'Korkmaz', 'Çakır', 'Erdem', 'Yavuz', 'Can', 'Acar', 'Şen', 'Aktaş',
        'Güler', 'Yalçın', 'Güneş', 'Bozkurt', 'Bulut', 'Keskin', 'Ünal', 'Turan', 'Gül', 'Özer',
    ];

    protected $titleMale = ['Bay', 'Dr.', 'Prof.', 'Av.'];
    protected $titleFemale = ['Bayan', 'Dr.', 'Prof.', 'Av.'];

    /**
     * Return a Turkish identity number (T.C. Kimlik No, 11 digits with two check digits).
     *
     * @return string
     */
    public function tcKimlikNo(): string
    {
        $digits = [$this->randomizer->getInt(1, 9)];
        for ($i = 1; $i < 9; $i++) {
            $digits[] = $this->randomizer->getInt(0, 9);
        }

        $odd = $digits[0] + $digits[2] + $digits[4] + $digits[6] + $digits[8];
        $even = $digits[1] + $digits[3] + $digits[5] + $digits[7];

        $digits[] = (($odd * 7 - $even) % 10 + 10) % 10;
        $digits[] = array_sum($digits) % 10;

        return implode('', $digits);
    }
}
