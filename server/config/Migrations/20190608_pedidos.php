<?php
use Migrations\AbstractMigration;

class Pedidos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $this->execute('
            CREATE TABLE "pedi_pedido"  ( 
                "pedi_codigo"               SERIAL NOT NULL,
                "pedi_pedi_codigo"          INT NULL,
                "pedi_tipo"                 CHAR(1) NOT NULL,
                "pedi_baixado"              TIMESTAMP NULL,
                "pedi_clie_codigo"          INT NULL,
                "pedi_forn_codigo"          INT NULL,
                "pedi_vend_codigo_estoque"  INT NOT NULL,
                "pedi_vend_codigo"          INT NOT NULL,
                "pedi_usua_codigo"          INT NOT NULL,
                "pedi_empr_codigo"          INT NOT NULL,
                "pedi_created"              TIMESTAMP NOT NULL,
                "pedi_modified"             TIMESTAMP NULL,
                "pedi_deleted"              TIMESTAMP NULL,
                PRIMARY KEY("pedi_codigo")
            )
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                ADD CONSTRAINT "pedi_empr"
                FOREIGN KEY("pedi_empr_codigo")
                REFERENCES "empr_empresa"("empr_codigo")
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                ADD CONSTRAINT "pedi_usua"
                FOREIGN KEY("pedi_usua_codigo")
                REFERENCES "usua_usuario"("usua_codigo")
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                ADD CONSTRAINT "pedi_clie"
                FOREIGN KEY("pedi_clie_codigo")
                REFERENCES "clie_cliente"("clie_codigo")
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                ADD CONSTRAINT "pedi_forn"
                FOREIGN KEY("pedi_forn_codigo")
                REFERENCES "forn_fornecedor"("forn_codigo")
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                ADD CONSTRAINT "pedi_vend"
                FOREIGN KEY("pedi_vend_codigo")
                REFERENCES "vend_vendedor"("vend_codigo")
        ');

        $this->execute('
            CREATE TABLE "pite_pedido_item"  ( 
                "pite_codigo"           SERIAL NOT NULL,
                "pite_pedi_codigo"      INT NOT NULL,
                "pite_prod_codigo"      INT NOT NULL,
                "pite_quantidade"       DECIMAL(15,2) NOT NULL,
                "pite_valor_custo"      DECIMAL(15,2) NOT NULL,
                "pite_valor"            DECIMAL(15,2) NOT NULL,
                "pite_valor_realizado"  DECIMAL(15,2) NOT NULL,
                "pite_usua_codigo"      INT NOT NULL,
                "pite_empr_codigo"      INT NOT NULL,
                "pite_created"          TIMESTAMP NOT NULL,
                "pite_modified"         TIMESTAMP NULL,
                "pite_deleted"          TIMESTAMP NULL,
                PRIMARY KEY("pite_codigo")
            )
        ');

        $this->execute('
            ALTER TABLE "pite_pedido_item"
                ADD CONSTRAINT "pite_empr"
                FOREIGN KEY("pite_empr_codigo")
                REFERENCES "empr_empresa"("empr_codigo")
        ');

        $this->execute('
            ALTER TABLE "pite_pedido_item"
                ADD CONSTRAINT "pite_usua"
                FOREIGN KEY("pite_usua_codigo")
                REFERENCES "usua_usuario"("usua_codigo")
        ');

        $this->execute('
            ALTER TABLE "pite_pedido_item"
                ADD CONSTRAINT "pite_prod"
                FOREIGN KEY("pite_prod_codigo")
                REFERENCES "prod_produto"("prod_codigo")
        ');
    }

    public function down()
    {
        $this->execute('
            ALTER TABLE "pite_pedido_item"
                DROP CONSTRAINT "pite_usua" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "pite_pedido_item"
                DROP CONSTRAINT "pite_empr" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "pite_pedido_item"
                DROP CONSTRAINT "pite_prod" CASCADE 
        ');

        $this->execute('
            DROP TABLE IF EXISTS "pite_pedido_item"
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido" 
                DROP CONSTRAINT "pedi_empr" CASCADE
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                DROP CONSTRAINT "pedi_usua"
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                DROP CONSTRAINT "pedi_clie"
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                DROP CONSTRAINT "pedi_forn"
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                DROP CONSTRAINT "pedi_vend"
        ');

        $this->execute('
            DROP TABLE IF EXISTS "pedi_pedido"
        ');
    }
}
