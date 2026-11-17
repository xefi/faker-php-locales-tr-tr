<?php

namespace Xefi\Faker\TrTr\Extensions;

use Xefi\Faker\Extensions\TextExtension as BaseTextExtension;

class TextExtension extends BaseTextExtension
{
    public function getLocale(): ?string
    {
        return 'tr_TR';
    }

    protected array $paragraphs = [
        [
            ['Hizmet', 'kalitesi', 'her', 'modern', 'şirket', 'için', 'temel', 'bir', 'hedef', 'olmaya', 'devam', 'ediyor.'],
            ['Her', 'proje', 'başarıya', 'ulaşmak', 'için', 'özel', 'bir', 'dikkat', 've', 'planlama', 'gerektirir.'],
            ['Ekipler', 'ortak', 'hedeflere', 'ulaşmak', 'için', 'birlikte', 'çalışır.'],
            ['Çalışanlar', 'arasındaki', 'etkili', 'iletişim', 'verimliliği', 'artırır.'],
        ],
        [
            ['Kaynak', 'yönetimi', 'genel', 'performansın', 'anahtarıdır.'],
            ['Çalışma', 'yöntemleri', 'ihtiyaçlara', 've', 'teknolojilere', 'göre', 'değişir.'],
            ['Esneklik,', 'kurumların', 'rekabetçi', 've', 'yenilikçi', 'kalmasını', 'sağlar.'],
            ['Süreçler,', 'sonuçları', 'iyileştirmek', 've', 'pazarın', 'taleplerine', 'yanıt', 'vermek', 'için', 'gözden', 'geçirilir.'],
        ],
        [
            ['Müşteri', 'memnuniyeti', 'sunulan', 'hizmetin', 'kalitesine', 've', 'yanıt', 'hızına', 'bağlıdır.'],
            ['Göstergeler', 'performansı', 'ölçmek', 've', 'stratejik', 'kararlara', 'yön', 'vermek', 'için', 'kullanılır.'],
            ['Günlük', 'zorluklar', 'etkili', 'bir', 'yönetim', 've', 'uygun', 'becerilerle', 'aşılır.'],
            ['Uygulamaların', 'düzenli', 'değerlendirmesi', 'olası', 'iyileştirmeleri', 'ortaya', 'çıkarır.'],
        ],
        [
            ['Eğitim', 've', 'yetkinlik', 'gelişimi', 'şirketler', 'için', 'önceliklidir.'],
            ['Çalışanlar', 'yeni', 'beceriler', 'edinmeye', 've', 'yenilik', 'yapmaya', 'teşvik', 'edilir.'],
            ['Sürekli', 'iyileştirme', 'stratejileri', 'riskleri', 'azaltır', 've', 'performansı', 'artırır.'],
            ['İşletmeler', 'bireysel', 've', 'kolektif', 'gelişimi', 'desteklemek', 'için', 'özel', 'eğitim', 'programları', 'sunar.'],
        ],
        [
            ['Veri', 'analizi', 'büyüme', 've', 'gelişme', 'alanlarını', 'belirlemeye', 'yardımcı', 'olur.'],
            ['Hedefler', 'pazarın', 'gelişimine', 've', 'müşteri', 'beklentilerine', 'göre', 'ayarlanır.'],
            ['İlerlemenin', 'düzenli', 'takibi', 'değişikliklere', 'hızlı', 'uyum', 'sağlar.'],
            ['Kararlar', 'güvenilir', 'verilere', 've', 'doğru', 'analizlere', 'dayanır.'],
            ['Dönemsel', 'değerlendirmeler', 'stratejilerin', 'yeniden', 'ele', 'alınmasını', 'sağlar.'],
        ],
    ];

    /**
     * Return the given number of random words, lowercased following the Turkish dotted / dotless i rules.
     *
     * @param int $words
     *
     * @return string
     */
    public function words(int $words = 3): string
    {
        $words = preg_replace('/[.,]/', '', implode(' ', $this->wordsAsArray($words)));

        return mb_strtolower(str_replace(['I', 'İ'], ['ı', 'i'], $words), 'UTF-8');
    }
}
