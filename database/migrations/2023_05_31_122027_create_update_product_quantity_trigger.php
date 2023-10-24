<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUpdateProductQuantityTrigger extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER update_product_quantity AFTER DELETE ON orders
            FOR EACH ROW
            BEGIN
                DECLARE quantite INT;
                DECLARE product_id INT;
                DECLARE done INT DEFAULT FALSE;
                DECLARE cur CURSOR FOR
                    SELECT quantite, product_id FROM order_details WHERE order_numero = OLD.numero;
                DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

                OPEN cur;

                read_loop: LOOP
                    FETCH cur INTO quantite, product_id;
                    IF done THEN
                        LEAVE read_loop;
                    END IF;

                    UPDATE products
                    SET quantiteStock = quantiteStock + quantite
                    WHERE id = product_id;
                END LOOP;

                CLOSE cur;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_product_quantity');
    }
}
