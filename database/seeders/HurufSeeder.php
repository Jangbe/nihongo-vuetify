<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HurufSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $huruf=[
            ['hiragana'=>'あ','katakana'=>'ァ','romaji'=>'a','index'=>1],
            ['hiragana'=>'い','katakana'=>'イ','romaji'=>'i','index'=>2],
            ['hiragana'=>'う','katakana'=>'ウ','romaji'=>'u','index'=>3],
            ['hiragana'=>'え','katakana'=>'エ','romaji'=>'e','index'=>4],
            ['hiragana'=>'お','katakana'=>'オ','romaji'=>'o','index'=>5],
            ['hiragana'=>'か','katakana'=>'カ','romaji'=>'ka','index'=>1],
            ['hiragana'=>'き','katakana'=>'キ','romaji'=>'ki','index'=>2],
            ['hiragana'=>'く','katakana'=>'ク','romaji'=>'ku','index'=>3],
            ['hiragana'=>'け','katakana'=>'ケ','romaji'=>'ke','index'=>4],
            ['hiragana'=>'こ','katakana'=>'コ','romaji'=>'ko','index'=>5],
            ['hiragana'=>'さ','katakana'=>'サ','romaji'=>'sa','index'=>1],
            ['hiragana'=>'し','katakana'=>'シ','romaji'=>'shi','index'=>2],
            ['hiragana'=>'す','katakana'=>'ス','romaji'=>'su','index'=>3],
            ['hiragana'=>'せ','katakana'=>'セ','romaji'=>'se','index'=>4],
            ['hiragana'=>'そ','katakana'=>'ソ','romaji'=>'so','index'=>5],
            ['hiragana'=>'た','katakana'=>'タ','romaji'=>'ta','index'=>1],
            ['hiragana'=>'ち','katakana'=>'チ','romaji'=>'chi','index'=>2],
            ['hiragana'=>'つ','katakana'=>'ツ','romaji'=>'tsu','index'=>3],
            ['hiragana'=>'て','katakana'=>'テ','romaji'=>'te','index'=>4],
            ['hiragana'=>'と','katakana'=>'ト','romaji'=>'to','index'=>5],
            ['hiragana'=>'な','katakana'=>'ナ','romaji'=>'na','index'=>1],
            ['hiragana'=>'に','katakana'=>'二','romaji'=>'ni','index'=>2],
            ['hiragana'=>'ぬ','katakana'=>'ヌ','romaji'=>'nu','index'=>3],
            ['hiragana'=>'ね','katakana'=>'ネ','romaji'=>'ne','index'=>4],
            ['hiragana'=>'の','katakana'=>'ノ','romaji'=>'no','index'=>5],
            ['hiragana'=>'は','katakana'=>'ハ','romaji'=>'ha','index'=>1],
            ['hiragana'=>'ひ','katakana'=>'ヒ','romaji'=>'hi','index'=>2],
            ['hiragana'=>'ふ','katakana'=>'フ','romaji'=>'fu','index'=>3],
            ['hiragana'=>'へ','katakana'=>'ヘ','romaji'=>'he','index'=>4],
            ['hiragana'=>'ほ','katakana'=>'ホ','romaji'=>'ho','index'=>5],
            ['hiragana'=>'ま','katakana'=>'マ','romaji'=>'ma','index'=>1],
            ['hiragana'=>'み','katakana'=>'ミ','romaji'=>'mi','index'=>2],
            ['hiragana'=>'む','katakana'=>'ム','romaji'=>'mu','index'=>3],
            ['hiragana'=>'め','katakana'=>'メ','romaji'=>'me','index'=>4],
            ['hiragana'=>'も','katakana'=>'モ','romaji'=>'mo','index'=>5],
            ['hiragana'=>'や','katakana'=>'ヤ','romaji'=>'ya','index'=>1],
            ['hiragana'=>'ゆ','katakana'=>'ユ','romaji'=>'yu','index'=>3],
            ['hiragana'=>'よ','katakana'=>'ヨ','romaji'=>'yo','index'=>5],
            ['hiragana'=>'ら','katakana'=>'ラ','romaji'=>'ra','index'=>1],
            ['hiragana'=>'り','katakana'=>'リ','romaji'=>'ri','index'=>2],
            ['hiragana'=>'る','katakana'=>'ル','romaji'=>'ru','index'=>3],
            ['hiragana'=>'れ','katakana'=>'レ','romaji'=>'re','index'=>4],
            ['hiragana'=>'ろ','katakana'=>'ロ','romaji'=>'ro','index'=>5],
            ['hiragana'=>'わ','katakana'=>'ワ','romaji'=>'wa','index'=>1],
            ['hiragana'=>'を','katakana'=>'ヲ','romaji'=>'wo','index'=>3],
            ['hiragana'=>'ん','katakana'=>'ン','romaji'=>'n','index'=>5],
        ];
        DB::table('huruf')->insert($huruf);
    }
}
