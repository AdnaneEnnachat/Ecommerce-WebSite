<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOrderDetailsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER order_details_trigger AFTER INSERT ON order_details FOR EACH ROW
            BEGIN
                UPDATE products
                SET quantiteStock = quantiteStock - NEW.quantite
                WHERE id = NEW.product_id;
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
        DB::unprepared('DROP TRIGGER IF EXISTS order_details_trigger');
    }
}
