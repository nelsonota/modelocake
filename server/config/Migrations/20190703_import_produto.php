<?php
use Migrations\AbstractMigration;

class ImportProduto extends AbstractMigration
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
            CREATE TABLE "ifil_import_file"  ( 
                "ifil_codigo"       serial NOT NULL,
                "ifil_nome_arquivo" varchar(100) NOT NULL,
                "ifil_model"        varchar(100) NOT NULL,
                "ifil_empr_codigo"  int NOT NULL,
                "ifil_usua_codigo"  int NOT NULL,
                "ifil_imported"     timestamp NULL,
                "ifil_status"       char(1) NULL,
                "ifil_created"      timestamp NOT NULL,
                "ifil_modified"     timestamp NULL,
                "ifil_deleted"      timestamp NULL,
                PRIMARY KEY("ifil_codigo")
            )
        ');

        $this->execute('
            ALTER TABLE "ifil_import_file"
                ADD CONSTRAINT "ifil_empr"
                FOREIGN KEY("ifil_empr_codigo")
                REFERENCES "empr_empresa"("empr_codigo")
        ');

        $this->execute('
            ALTER TABLE "ifil_import_file"
                ADD CONSTRAINT "ifil_usua"
                FOREIGN KEY("ifil_usua_codigo")
                REFERENCES "usua_usuario"("usua_codigo")
        ');

        $this->execute('
            CREATE TABLE "ipro_import_produto"  ( 
                "ipro_codigo"       serial NOT NULL,
                "ipro_ifil_codigo"  int NOT NULL,
                "ipro_prod_codigo"  int NULL,
                "ipro_forn_codigo"  int NULL,
                "ipro_forn_cnpjcpf" varchar(14) NULL,
                "ipro_forn_nome"    varchar(60) NULL,
                "ipro_codigo_interno" varchar(20) NOT NULL,
                "ipro_codigo_externo" varchar(20) NULL,
                "ipro_descricao"    varchar(60) NOT NULL,
                "ipro_valor"        decimal(15,2) NOT NULL,
                "ipro_valor_custo"  decimal(15,2) NOT NULL,
                "ipro_unidade"      varchar(2) NULL,
                "ipro_tamanho"      varchar(5) NULL,
                "ipro_cor"          varchar(20) NULL,
                "ipro_status"       smallint NULL,
                "ipro_empr_codigo"  int NOT NULL,
                "ipro_usua_codigo"  int NOT NULL,
                "ipro_imported"     timestamp NULL,
                "ipro_message"      json NULL,
                "ipro_created"      timestamp NOT NULL,
                "ipro_modified"     timestamp NULL,
                "ipro_deleted"      timestamp NULL,
                PRIMARY KEY("ipro_codigo")
            )
        ');
        
        $this->execute('
            ALTER TABLE "ipro_import_produto"
                ADD CONSTRAINT "ipro_ifil"
                FOREIGN KEY("ipro_ifil_codigo")
                REFERENCES "ifil_import_file"("ifil_codigo")
        ');

        $this->execute('
            ALTER TABLE "ipro_import_produto"
                ADD CONSTRAINT "ipro_prod"
                FOREIGN KEY("ipro_prod_codigo")
                REFERENCES "prod_produto"("prod_codigo")
        ');

        $this->execute('
            ALTER TABLE "ipro_import_produto"
                ADD CONSTRAINT "ipro_forn"
                FOREIGN KEY("ipro_forn_codigo")
                REFERENCES "forn_fornecedor"("forn_codigo")
        ');

        $this->execute('
            ALTER TABLE "ipro_import_produto"
                ADD CONSTRAINT "ipro_empr"
                FOREIGN KEY("ipro_empr_codigo")
                REFERENCES "empr_empresa"("empr_codigo")
        ');

        $this->execute('
            ALTER TABLE "ipro_import_produto"
                ADD CONSTRAINT "ipro_usua"
                FOREIGN KEY("ipro_usua_codigo")
                REFERENCES "usua_usuario"("usua_codigo")
        ');
    }

    public function down()
    {
        $this->execute('
            ALTER TABLE "ipro_import_produto"
                DROP CONSTRAINT "ipro_ifil" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "ipro_import_produto"
                DROP CONSTRAINT "ipro_prod" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "ipro_import_produto"
                DROP CONSTRAINT "ipro_forn" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "ipro_import_produto"
                DROP CONSTRAINT "ipro_empr" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "ipro_import_produto"
                DROP CONSTRAINT "ipro_usua" CASCADE 
        ');

        $this->execute('
            DROP TABLE IF EXISTS "ipro_import_produto"
        ');

        $this->execute('
            ALTER TABLE "ifil_import_file"
                DROP CONSTRAINT "ifil_empr" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "ifil_import_file"
                DROP CONSTRAINT "ifil_usua" CASCADE 
        ');

        $this->execute('
            DROP TABLE IF EXISTS "ifil_import_file"
        ');
    }
}
