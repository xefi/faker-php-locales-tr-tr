<?php

namespace Xefi\Faker\TrTr\Extensions;

use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
{
    public function getLocale(): ?string
    {
        return 'tr_TR';
    }

    private array $companies = [
        'Anadolu Tekstil A.Ş.', 'Boğaziçi Yazılım Ltd. Şti.', 'Ege Gıda Sanayi A.Ş.',
        'Karadeniz Lojistik Ltd. Şti.', 'Toros İnşaat A.Ş.', 'Marmara Enerji A.Ş.',
        'Kapadokya Turizm Ltd. Şti.', 'Yıldız Mobilya Ltd. Şti.', 'Akdeniz Tarım Ürünleri A.Ş.',
        'Fırat Elektrik Ltd. Şti.', 'Kartal Otomotiv A.Ş.', 'Lale Kozmetik Ltd. Şti.',
        'Çınar Danışmanlık Ltd. Şti.', 'Doğu Madencilik A.Ş.', 'Pamukkale Seramik A.Ş.',
        'Başkent Bilişim Ltd. Şti.', 'Kızılırmak Su Ürünleri Ltd. Şti.', 'Bursa Makine A.Ş.',
        'Güneş Ambalaj Ltd. Şti.', 'Ararat Gıda A.Ş.', 'Erciyes Metal Ltd. Şti.',
        'Mavi Deniz Taşımacılık A.Ş.', 'Hisar Yapı Ltd. Şti.', 'Defne Medikal Ltd. Şti.',
        'Kardelen İlaç A.Ş.', 'Sahil Mimarlık Ltd. Şti.', 'Zirve Eğitim Hizmetleri A.Ş.',
        'Toprak Peyzaj Ltd. Şti.', 'Atlas Kimya A.Ş.', 'Selçuklu Halı Ltd. Şti.',
    ];

    /**
     * Return a random company name.
     *
     * @return string
     */
    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }

    /**
     * Return a tax identification number (Vergi Kimlik Numarası, 10 digits with one check digit).
     *
     * @return string
     */
    public function vkn(): string
    {
        $digits = [];
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $digits[] = $digit = $this->randomizer->getInt(0, 9);

            $shifted = ($digit + 9 - $i) % 10;
            $value = ($shifted * (2 ** (9 - $i))) % 9;
            if ($shifted !== 0 && $value === 0) {
                $value = 9;
            }
            $sum += $value;
        }

        $digits[] = (10 - $sum % 10) % 10;

        return implode('', $digits);
    }
}
