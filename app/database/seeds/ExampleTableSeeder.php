<?php

use Illuminate\Database\Seeder;
use App\Example;

class ExampleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ifのパート
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'時間が足りなくなったら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'友達に遊びに誘われたら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'勉強用の教材が手元になかったら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'部活終わりで疲れていたら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'努力しても意味がないと思ったら
            ',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'三日坊主になったら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'お酒を飲んでしまったら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'目が疲れてきたら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'嫌なことを言われたら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'緊張してきたら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'ネガティブ思考になっていると思ったら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'段取りやスケジュールが崩れていると思ったら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'自暴自棄になったら',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>true,
            'body'=>'頼み事をされたら',
        ];
        $example->fill($param)->save();

        // Thenパート

        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'他の人にお願いしてみる',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'ベランダに出て深呼吸する',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'コンビニに出かける',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'果物を食べる',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'部屋の中のゴミを５つ捨てる',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'心の中で「頑張りません」と唱える',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'目標ややるべきことを紙に書く出す',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'家族や友達と一緒にやる',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'昼寝する',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'寄り道してみる',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'場所を変える',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'音楽を聴く',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'音読する',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'スマホの電源を切る',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'コップ１杯の水を飲む',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'エレベーターでなく階段を使う',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'公園で散歩する',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'その日のノルマの半分でよしとする',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'大きく深呼吸する',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'ストレッチをする',
        ];
        $example->fill($param)->save();
        $example = new Example;
        $param = [
            'is_ifcard'=>false,
            'body'=>'出来なかったことではなく、出来たことを考える',
        ];
        $example->fill($param)->save();
    }
}
