<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Habit;
use App\Plan;
use Illuminate\Support\Facades\Auth;

class HabitManagementTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function setUp():void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        // $this->habit = factory(Habit::class)->create();
        $habit_info = [
            'category_id'=>'1',
            'start_date'=>'2020-08-15',
            'finish_date'=>'2020-09-10',
            'purpose'=>'漢検2級に合格するため',
            'task'=>'毎日感じを勉強する',
            'user_id'=>$this->user->id,
            'is_open'=>1,
        ];
        $this->habit = new Habit;
        $this->habit->fill($habit_info)->save();

        $plan_info = [
            'habit_id'=>$this->habit->id,
            'plan_text'=>'電車の中で勉強する',
        ];
        $this->plan = new Plan;
        $this->plan->fill($plan_info)->save();
    }
    // 正常系
    public function test__認証ユーザーならば習慣を新規作成できる()
    {
        $response = $this->actingAs($this->user)->get('/habit/create');
        $response->assertStatus(200);

        $habit_info = [
            'category_id'=>'2',
            'start_date'=>'2021-01-15',
            'finish_date'=>'2021-02-10',
            'purpose'=>'英検１級に合格するため',
            'task'=>'毎日英語を勉強する',
            'plan_text'=>'眠くなったらストレッチをする',
            'user_id'=>Auth::id(),
            'is_open'=>1,
        ];

        $response = $this->post(route('habit.store'),$habit_info);
        $response->assertSessionHasNoErrors();

        $response->assertStatus(302);
        $response->assertRedirect('/home');

        $this->assertDatabaseHas('habits',['task'=>'毎日英語を勉強する']);

        $this->assertDatabaseHas('plans',['plan_text'=>'眠くなったらストレッチをする']);
    }

    // 習慣の更新
    public function test__認証ユーザーで適切な値を入力すれば既存の習慣を更新できる()
    {
        $response = $this->actingAs($this->user)->get(route('habit.edit',$this->habit->id));
        $response->assertStatus(200);

        $habit_info = [
            'category_id'=>'2',
            'start_date'=>'2021-01-10',
            'finish_date'=>'2021-02-20',
            'purpose'=>'世界遺産検定２級に合格するため',
            'task'=>'毎日教本で勉強する',
            'plan_text'=>'眠くなったら深呼吸をする',
            'is_open'=>0,
        ];
    }



    //  異常系
    public function test__認証ユーザーで不適切な入力をするとエラーつきで登録画面に返される()
    {
        $response = $this->actingAs($this->user)->get('/habit/create');
        $response->assertStatus(200);

        $habit_info = [
            'category_id'=>'2',
            'start_date'=>'',
            'finish_date'=>'2021-02-10',
            'purpose'=>'',
            'task'=>'毎日英語を勉強する',
            'plan_text'=>'眠くなったらストレッチをする',
            'is_open'=>1,
        ];

        $response = $this->post(route('habit.store'),$habit_info);
        $response->assertSessionHasErrors();

        $response->assertStatus(302);
        $response->assertRedirect('/habit/create');

        $response->assertSessionHasErrors();

    }
}
