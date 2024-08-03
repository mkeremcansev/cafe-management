<?php

return [
    'menu' => [
        'home' => 'Ana Sayfa',
        'category' => [
            'category' => 'Kategori',
            'index' => 'Kategoriler',
            'create' => 'Kategori Oluştur',
            'edit' => 'Kategori Düzenle',
        ],
        'product' => [
            'product' => 'Ürün',
            'index' => 'Ürünler',
            'create' => 'Ürün Oluştur',
            'edit' => 'Ürün Düzenle',
        ],
        'table' => [
            'table' => 'Masa',
            'index' => 'Masalar',
            'create' => 'Masa Oluştur',
            'edit' => 'Masa Düzenle',
            'show' => 'Masa Göster',
        ],
        'report' => [
            'report' => 'Rapor',
            'index' => 'Raporlar',
        ],
        'company' => [
            'company' => 'Şirket',
            'edit' => 'Şirket Düzenle',
        ],
        'user' => [
            'user' => 'Kullanıcı',
            'index' => 'Kullanıcılar',
            'create' => 'Kullanıcı Oluştur',
            'edit' => 'Kullanıcı Düzenle',
        ],
        'logout' => 'Çıkış Yap',
        'login' => 'Giriş Yap',
        'register' => 'Kayıt Ol',
    ],
    'messages' => [
        'errors' => [
            'credentials' => 'Sağlanan kimlik bilgileri kayıtlarımızla eşleşmiyor.',
        ],
        'success' => [
            'category' => [
                'created' => 'Kategori başarıyla oluşturuldu.',
                'updated' => 'Kategori başarıyla güncellendi.',
                'deleted' => 'Kategori başarıyla silindi.',
            ],
            'product' => [
                'created' => 'Ürün başarıyla oluşturuldu.',
                'updated' => 'Ürün başarıyla güncellendi.',
                'deleted' => 'Ürün başarıyla silindi.',
            ],
            'table' => [
                'created' => 'Masa başarıyla oluşturuldu.',
                'updated' => 'Masa başarıyla güncellendi.',
                'deleted' => 'Masa başarıyla silindi.',
            ],
            'cart' => [
                'created' => 'Sepet başarıyla oluşturuldu.',
                'updated' => 'Sepet başarıyla güncellendi.',
                'deleted' => 'Sepet başarıyla silindi.',
            ],
            'collection' => [
                'created' => 'Tahsilat başarıyla oluşturuldu.',
            ],
            'company' => [
                'updated' => 'Şirket başarıyla güncellendi.',
            ],
            'user' => [
                'created' => 'Kullanıcı başarıyla oluşturuldu.',
                'updated' => 'Kullanıcı başarıyla güncellendi.',
            ],
            'logout' => 'Başarıyla çıkış yapıldı.',
            'login' => 'Başarıyla giriş yapıldı.',
            'register' => 'Başarıyla kayıt olundu.',
        ],
        'error' => [
            'validations' => [
                'general_error' => 'Form doğrulaması sırasında bir hata oluştu.',
                'high_amount' => 'Girdiğiniz miktar toplam fiyattan daha yüksek.',
                'product_quantity_greater_than_cart' => 'Girdiğiniz miktar sepet miktarından daha fazla.',
                'default_max_company_user' => 'Şirketinizin :limit kullanıcı sınırına ulaştınız.',
            ],
            'general_error' => 'Bir hata oluştu.',
            'not_allowed_access' => 'Bu sayfaya erişmeye izniniz yok.',
        ],
        'general' => [
            'created_by_user' => '<b class="text-primary">:name</b> tarafında <b class="text-primary">:quantity</b> adet <b class="text-primary">:product</b> adlı ürün sepete eklendi.',
        ],
    ],
    'content' => [
        'category_details' => 'Kategori Detayları',
        'product_details' => 'Ürün Detayları',
        'table_details' => 'Masa Detayları',
        'company_details' => 'Şirket Detayları',
        'manual_collection' => 'Manuel Tahsilat',
        'product_collection' => 'Ürün Tahsilatı',
        'user_details' => 'Kullanıcı Detayları',
        'has_no_product' => 'Ürün yok.',
        'table_history' => 'Masa Geçmişi',
        'analysis' => [
            'open_tables_amount' => 'Açık Masaların Tutarı',
            'total_sales_amount' => 'Toplam Satış Tutarı',
            'last_month_sales_amount' => 'Geçen Ayın Satış Tutarı',
            'last_day_sales_amount' => 'Dünün Satış Tutarı',
            'month_based_sales_amount' => 'Aya Göre Satış Tutarı',
            'filter_based_sales_amount' => 'Filtreye Göre Satış Tutarı',
            'has_no_filter' => 'Filtre yok.',
        ],
        'home' => [
            'there_is_no_have_table' => 'Masa bulunmamaktadır.',
        ],
        'are_u_have_not_a_account' => 'Hesabınız yok mu?',
        'are_u_already_have_a_account' => 'Zaten bir hesabınız var mı?',
    ],
    'fields' => [
        'category' => [
            'name' => 'Kategori Adı',
        ],
        'product' => [
            'name' => 'Ürün Adı',
            'price' => 'Fiyat',
            'category' => 'Kategori',
        ],
        'table' => [
            'name' => 'Masa Adı',
        ],
        'cart' => [
            'quantity' => 'Miktar',
        ],
        'collection' => [
            'amount' => 'Tutar',
            'method' => 'Yöntem',
            'type' => 'Tür',
            'methods' => [
                'cash' => 'Nakit',
                'credit_card' => 'Kredi Kartı',
            ],
            'total_amount' => 'Toplam Tutar',
            'paid_amount' => 'Ödenen Tutar',
            'remaining_amount' => 'Kalan Tutar',
        ],
        'report' => [
            'start_date' => 'Başlangıç Tarihi',
            'end_date' => 'Bitiş Tarihi',
        ],
        'company' => [
            'name' => 'Şirket Adı',
            'address' => 'Şirket Adresi',
            'phone' => 'Şirket Telefonu',
            'email' => 'Şirket E-postası',
        ],
        'user' => [
            'name' => 'Kullanıcı Adı',
            'email' => 'Kullanıcı E-postası',
            'password' => 'Kullanıcı Parolası',
            'password_confirmation' => 'Kullanıcı Parolası Onayı',
        ],
    ],
    'buttons' => [
        'create' => 'Oluştur',
        'update' => 'Güncelle',
        'delete' => 'Sil',
        'cancel' => 'İptal',
        'edit' => 'Düzenle',
        'actions' => 'İşlemler',
        'new_add' => 'Yeni Ekle',
        'close' => 'Kapat',
        'collection' => 'Tahsilat',
        'filter' => 'Filtre',
        'move' => 'Taşı',
    ],
    'inputs' => [
        'search' => 'Ara...',
        'choose_one' => 'Birini seç...',
    ],
    'modal_titles' => [
        'delete' => 'Sil',
    ],
    'modal_descriptions' => [
        'delete' => 'Bu kaydı silmek istediğinizden emin misiniz?',
    ],
    'release_announcements' => [
        '1_0_0' => 'Coffee-Managing uygulamasının ilk sürümü yayınlandı! 🎉',
    ],
];
