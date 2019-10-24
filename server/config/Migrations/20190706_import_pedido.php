<?php
use Migrations\AbstractMigration;

class ImportPedido extends AbstractMigration
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
            CREATE TABLE "iped_import_pedido"  ( 
                "iped_codigo"               serial NOT NULL,
                "iped_ifil_codigo"          INT NOT NULL,
                "iped_pedi_codigo"          INT NULL,
                "iped_tipo"                 CHAR(1) NOT NULL,
                "iped_baixado"              TIMESTAMP NULL,
                "iped_clie_cnpjcpf"         varchar(14) NULL,
                "iped_clie_nome"            varchar(60) NULL,
                "iped_clie_codigo"          INT NULL,
                "iped_forn_cnpjcpf"         varchar(14) NULL,
                "iped_forn_nome"            varchar(60) NULL,
                "iped_forn_codigo"          INT NULL,
                "iped_vend_cnpjcpf_estoque" varchar(14) NOT NULL,
                "iped_vend_codigo_estoque"  INT NULL,
                "iped_vend_cnpjcpf"         varchar(14) NOT NULL,
                "iped_vend_codigo"          INT NULL,
                "iped_empr_codigo"          int NOT NULL,
                "iped_usua_codigo"          int NOT NULL,
                "iped_imported"             timestamp NULL,
                "iped_message"              json NULL,
                "iped_created"              timestamp NOT NULL,
                "iped_modified"             timestamp NULL,
                "iped_deleted"              timestamp NULL,
                PRIMARY KEY("iped_codigo")
            )
        ');
        
        $this->execute('
            ALTER TABLE "iped_import_pedido"
                ADD CONSTRAINT "iped_ifil"
                FOREIGN KEY("iped_ifil_codigo")
                REFERENCES "ifil_import_file"("ifil_codigo")
        ');

        $this->execute('
            ALTER TABLE "iped_import_pedido"
                ADD CONSTRAINT "iped_empr"
                FOREIGN KEY("iped_empr_codigo")
                REFERENCES "empr_empresa"("empr_codigo")
        ');

        $this->execute('
            ALTER TABLE "iped_import_pedido"
                ADD CONSTRAINT "iped_usua"
                FOREIGN KEY("iped_usua_codigo")
                REFERENCES "usua_usuario"("usua_codigo")
        ');

        $this->execute('
            CREATE TABLE "ipit_import_pedido_item"  ( 
                "ipit_codigo"               serial NOT NULL,
                "ipit_iped_codigo"          int NOT NULL,
                "ipit_pite_codigo"          INT NULL,
                "ipit_prod_codigo_interno"  varchar(20) NOT NULL,
                "ipit_prod_codigo"          INT NULL,
                "ipit_quantidade"           DECIMAL(15,2) NOT NULL,
                "ipit_valor_realizado"      DECIMAL(15,2) NOT NULL,
                "ipit_prod_tamanho"         varchar(5) NULL,
                "ipit_prod_cor"             varchar(20) NULL,
                "ipit_empr_codigo"          int NOT NULL,
                "ipit_usua_codigo"          int NOT NULL,
                "ipit_imported"             timestamp NULL,
                "ipit_message"              json NULL,
                "ipit_created"              timestamp NOT NULL,
                "ipit_modified"             timestamp NULL,
                "ipit_deleted"              timestamp NULL,
                PRIMARY KEY("ipit_codigo")
            )
        ');

        $this->execute('
            ALTER TABLE "ipit_import_pedido_item"
                ADD CONSTRAINT "ipit_iped"
                FOREIGN KEY("ipit_iped_codigo")
                REFERENCES "iped_import_pedido"("iped_codigo")
        ');

        $this->execute('
            ALTER TABLE "ipit_import_pedido_item"
                ADD CONSTRAINT "ipit_prod"
                FOREIGN KEY("ipit_prod_codigo")
                REFERENCES "prod_produto"("prod_codigo")
        ');

        $this->execute('
            ALTER TABLE "ipit_import_pedido_item"
                ADD CONSTRAINT "ipit_empr"
                FOREIGN KEY("ipit_empr_codigo")
                REFERENCES "empr_empresa"("empr_codigo")
        ');

        $this->execute('
            ALTER TABLE "ipit_import_pedido_item"
                ADD CONSTRAINT "ipit_usua"
                FOREIGN KEY("ipit_usua_codigo")
                REFERENCES "usua_usuario"("usua_codigo")
        ');
    }

    public function down()
    {
        $this->execute('
            ALTER TABLE "ipit_import_pedido_item"
                DROP CONSTRAINT "ipit_iped" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "ipit_import_pedido_item"
                DROP CONSTRAINT "ipit_prod" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "ipit_import_pedido_item"
                DROP CONSTRAINT "ipit_empr" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "ipit_import_pedido_item"
                DROP CONSTRAINT "ipit_usua" CASCADE 
        ');

        $this->execute('
            DROP TABLE IF EXISTS "ipit_import_pedido_item"
        ');

        $this->execute('
            ALTER TABLE "iped_import_pedido"
                DROP CONSTRAINT "iped_ifil" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "iped_import_pedido"
                DROP CONSTRAINT "iped_empr" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "iped_import_pedido"
                DROP CONSTRAINT "iped_usua" CASCADE 
        ');

        $this->execute('
            DROP TABLE IF EXISTS "iped_import_pedido"
        ');
    }
}
