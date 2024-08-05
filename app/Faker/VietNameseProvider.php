<?php 
namespace App\Faker;

use Faker\Provider\Base;
use Nette\Utils\Random;

class VietNameseProvider extends Base{
    protected static $firstNames = [
        'Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Huỳnh', 'Phan', 'Vũ', 'Đặng', 'Bùi'
    ];

    protected static $lastNames = [
        'Anh', 'Bảo', 'Cường', 'Dũng', 'Đạt', 'Hùng', 'Kiên', 'Lâm', 'Minh', 'Nam'
    ];
    protected static $image=[
        'dl1','dl2','dl3',
        'gd1','gd2','gd3','gd4','gd5','gd6','gd7',
        'gt1','gt2','gt3','gt4','gt5',
        'kh1','kh2','kh3','kh4','kh5','kh6','kh7','kh8','kh9','kh10','kh11','kh12','kh13',
        'sk1','sk2','sk3','sk4','sk5','sk6','sk7','sk8','sk9','sk10',
        'tg1','tg2','tg3','tg4','tg5','tg6','tg7','tg8',
        'tt','tt1','tt2','tt3','tt4'
    ];
    public static function getImage(){
        return static::randomElement(static::$image);
    }
    private static $words = [
        'xin', 'chào', 'bạn', 'công', 'nghệ', 'học', 'hỏi', 'phát', 'triển', 'lập', 'trình', 'máy', 'tính',
        'phần', 'mềm', 'ứng', 'dụng', 'dữ', 'liệu', 'hệ', 'thống', 'quản', 'lý', 'mạng', 'bảo', 'mật',
        'điện', 'toán', 'đám', 'mây', 'trí', 'tuệ', 'nhân', 'tạo', 'robot', 'thực', 'tế', 'ảo', 'blockchain',
        'thiết', 'kế', 'giao', 'diện', 'trải', 'nghiệm', 'người', 'dùng', 'web', 'di', 'động', 'phần', 'cứng',
        'thuật', 'toán', 'khoa', 'học', 'tự', 'động', 'hóa', 'kết', 'nối', 'công', 'nghệ', 'thông', 'tin',
        'nguồn', 'mở', 'kỹ', 'thuật', 'mã', 'hóa', 'phát', 'triển', 'ngôn', 'ngữ', 'cơ', 'sở', 'dữ', 'liệu',
        'tích', 'hợp', 'dịch', 'vụ', 'trực', 'tuyến', 'bản', 'quyền', 'hệ', 'điều', 'hành', 'máy', 'chủ',
        'thông', 'tin', 'sản', 'phẩm', 'dịch', 'vụ', 'người', 'dùng', 'kỹ', 'sư', 'khoa', 'học', 'kỹ', 'năng',
        'lãnh', 'đạo', 'quản', 'trị', 'dự', 'án', 'tầm', 'nhìn', 'sứ', 'mệnh', 'giá', 'trị'
    ];

    public static function generateVietnameseText($sentences = 3)
    {
        $text = '';
        $sentenceLength = rand(5, 9);

        for ($i = 0; $i < $sentences; $i++) {
            $sentence = '';
            for ($j = 0; $j < $sentenceLength; $j++) {
                $sentence .= self::$words[array_rand(self::$words)] . ' ';
            }
            $sentence = trim($sentence) . '. ';
            $text .= ucfirst($sentence);
        }

        return trim($text);
    }

    public static function fullName()
    {
        return static::randomElement(self::$firstNames) . ' ' . static::randomElement(self::$lastNames);
    }

    public static function vietnameseText($nbSentences = 3)
    {
        $sentences = [
            'Hôm nay là một ngày đẹp trời.',
            'Công việc hàng ngày của tôi rất bận rộn.',
            'Tôi thích ăn phở vào buổi sáng.',
            'Thành phố Hồ Chí Minh là một nơi tuyệt vời.',
            'Chúng tôi sẽ đi du lịch vào cuối tuần này.',
        ];

        return implode(' ', array_rand(array_flip($sentences), min($nbSentences, count($sentences))));
    }
}

?>