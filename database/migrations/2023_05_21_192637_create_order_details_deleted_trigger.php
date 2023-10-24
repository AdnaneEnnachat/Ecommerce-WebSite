<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOrderDetailsDeletedTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TRIGGER order_details_deleted_trigger
            AFTER DELETE ON order_details
            FOR EACH ROW
            BEGIN
                UPDATE products
                SET quantiteStock = quantiteStock + OLD.quantite
                WHERE id = OLD.product_id;
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
        DB::statement('DROP TRIGGER IF EXISTS order_details_deleted_trigger');
    }
}
