<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('weight_logs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // ユーザーID
        $table->date('date'); // 日付
        $table->decimal('weight', 4, 1); // 体重（小数点1桁まで）
        $table->integer('calories')->nullable(); // 摂取カロリー（任意）
        $table->time('exercise_time')->nullable(); // 運動時間（任意）
        $table->text('exercise_content')->nullable(); // 運動内容（任意）
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weight_logs');
    }
}
