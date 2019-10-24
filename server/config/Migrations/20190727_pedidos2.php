<?php
use Migrations\AbstractMigration;

class Pedidos2 extends AbstractMigration
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
            ALTER TABLE "pedi_pedido" ADD pedi_frete DECIMAL(15,2) NULL
        ');
        $this->execute('
            ALTER TABLE "pedi_pedido" ADD pedi_desconto DECIMAL(15,2) NULL
        ');
        $this->execute('
            ALTER TABLE "pedi_pedido" ADD pedi_comissao DECIMAL(15,2) NULL
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                ADD CONSTRAINT "pedi_pedi"
                FOREIGN KEY("pedi_pedi_codigo")
                REFERENCES "pedi_pedido"("pedi_codigo")
        ');

        $this->execute('
            CREATE UNIQUE INDEX prod_codigo_externo ON prod_produto (prod_codigo_externo, prod_forn_codigo, prod_tamanho, prod_cor);
        ');

        $this->execute('
            ALTER TABLE prod_produto ADD CONSTRAINT prod_codigo_externo UNIQUE USING INDEX prod_codigo_externo;
        ');
    }

    public function down()
    {
        $this->execute('
            ALTER TABLE "pedi_pedido"
                DROP COLUMN "pedi_frete"
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                DROP COLUMN "pedi_desconto"
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                DROP COLUMN "pedi_comissao"
        ');

        $this->execute('
            ALTER TABLE "pedi_pedido"
                DROP CONSTRAINT "pedi_pedi"
        ');

        $this->execute('
            ALTER TABLE "prod_produto"
                DROP CONSTRAINT "prod_codigo_externo"
        ');

        $this->execute('
            DROP INDEX "prod_codigo_externo"
        ');
    }
}
