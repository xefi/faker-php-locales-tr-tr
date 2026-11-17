<?php

namespace Xefi\Faker\TrTr\Extensions;

use Xefi\Faker\Extensions\ColorsExtension as BaseColorsExtension;

class ColorsExtension extends BaseColorsExtension
{
    public function getLocale(): ?string
    {
        return 'tr_TR';
    }

    protected array $safeColorNames = [
        'Siyah', 'Bordo', 'Yeşil', 'Lacivert', 'Zeytin Yeşili',
        'Mor', 'Petrol Mavisi', 'Limon Yeşili', 'Mavi', 'Gümüş',
        'Gri', 'Sarı', 'Fuşya', 'Su Mavisi', 'Beyaz',
    ];

    protected array $colorNames = [
        'Siyah', 'Bordo', 'Yeşil', 'Lacivert', 'Zeytin Yeşili',
        'Mor', 'Petrol Mavisi', 'Limon Yeşili', 'Mavi', 'Gümüş',
        'Gri', 'Sarı', 'Fuşya', 'Su Mavisi', 'Beyaz',
        'Bej', 'Çikolata', 'Mercan', 'Camgöbeği', 'Kızıl',
        'Koyu Mavi', 'Koyu Turuncu', 'Kiremit', 'Deniz Yeşili', 'Çiçek Beyazı',
        'Orman Yeşili', 'Altın', 'Pembe', 'Çivit Mavisi', 'Haki',
        'Lavanta', 'Açık Mavi', 'Açık Mercan', 'Açık Yeşil', 'Açık Somon',
        'Keten', 'Macenta', 'Orta Mavi', 'Orkide', 'Mokasen',
        'Turuncu', 'Kırmızı', 'Erik', 'Peru', 'Kraliyet Mavisi',
        'Somon', 'Kum Rengi', 'Gök Mavisi', 'Kar Beyazı', 'Turkuaz',
        'Menekşe', 'Duman Beyazı',
    ];
}
