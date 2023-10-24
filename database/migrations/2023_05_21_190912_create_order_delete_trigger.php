<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOrderDeleteTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER order_delete_trigger AFTER DELETE ON orders FOR EACH ROW
            BEGIN
                INSERT INTO canceled_orders (order_number, email, address, city, phone, fullName, total, status, order_date, user_id, created_at, updated_at)
                SELECT OLD.numero, OLD.email, OLD.adresse, OLD.ville, OLD.phone, OLD.fullName, OLD.total, "canceled", OLD.oder_date, OLD.user_id, NOW(), NOW();
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS order_delete_trigger');
    }
}
