<?php
use Migrations\AbstractMigration;

class Init extends AbstractMigration
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
            CREATE TABLE "empr_empresa"  ( 
                "empr_codigo"       serial NOT NULL,
                "empr_documento"    varchar(15) NOT NULL,
                "empr_razao_social" varchar(60) NOT NULL,
                "empr_ativacao"     timestamp NULL,
                "empr_created"      timestamp NOT NULL,
                "empr_modified"     timestamp NULL,
                "empr_deleted"      timestamp NULL,
                PRIMARY KEY("empr_codigo")
            )
        ');

        $this->execute('
            CREATE TABLE "usua_usuario"  ( 
                "usua_codigo"       serial NOT NULL,
                "usua_nome"         varchar(60) NOT NULL,
                "usua_senha"        varchar(100) NOT NULL,
                "usua_email"        varchar(100) NOT NULL,
                "usua_empr_codigo"  int NOT NULL,
                "usua_ativacao"     timestamp NULL,
                "usua_usua_codigo"  int NULL,
                "usua_created"      timestamp NOT NULL,
                "usua_modified"     timestamp NULL,
                "usua_deleted"      timestamp NULL,
                PRIMARY KEY("usua_codigo")
            )
        ');

        $this->execute('
            ALTER TABLE "usua_usuario"
                ADD CONSTRAINT "empr_usua"
                FOREIGN KEY("usua_empr_codigo")
                REFERENCES "empr_empresa"("empr_codigo")
        ');

        $this->execute('
            CREATE TABLE "clie_cliente"  ( 
                "clie_codigo"      serial NOT NULL,
                "clie_nome"        varchar(60) NOT NULL,
                "clie_cnpjcpf"     varchar(14) NULL,
                "clie_insestrg"    varchar(15) NULL,
                "clie_insmun"      varchar(15) NULL,
                "clie_cep"         varchar(8) NULL,
                "clie_endereco"    varchar(100) NULL,
                "clie_numero"      varchar(10) NULL,
                "clie_complemento" varchar(15) NULL,
                "clie_bairro"      varchar(100) NULL,
                "clie_cidade"      varchar(100) NULL,
                "clie_uf"          varchar(2) NULL,
                "clie_celular"     varchar(11) NULL,
                "clie_telefone"    varchar(11) NULL,
                "clie_usua_codigo" int NOT NULL,
                "clie_empr_codigo" int NOT NULL,
                "clie_created"     timestamp NOT NULL,
                "clie_modified"    timestamp NULL,
                "clie_deleted"     timestamp NULL,
                PRIMARY KEY("clie_codigo")
            )
        ');

        $this->execute('
            ALTER TABLE "clie_cliente"
                ADD CONSTRAINT "clie_empr"
                FOREIGN KEY("clie_empr_codigo")
                REFERENCES "empr_empresa"("empr_codigo")
        ');

        $this->execute('
            ALTER TABLE "clie_cliente"
                ADD CONSTRAINT "clie_usua"
                FOREIGN KEY("clie_usua_codigo")
                REFERENCES "usua_usuario"("usua_codigo")
        ');

        $this->execute('
            CREATE TABLE "forn_fornecedor"  ( 
                "forn_codigo"      serial NOT NULL,
                "forn_nome"        varchar(60) NOT NULL,
                "forn_cnpjcpf"     varchar(14) NULL,
                "forn_insestrg"    varchar(15) NULL,
                "forn_insmun"      varchar(15) NULL,
                "forn_cep"         varchar(8) NULL,
                "forn_endereco"    varchar(100) NULL,
                "forn_numero"      varchar(10) NULL,
                "forn_complemento" varchar(15) NULL,
                "forn_bairro"      varchar(100) NULL,
                "forn_cidade"      varchar(100) NULL,
                "forn_uf"          varchar(2) NULL,
                "forn_celular"     varchar(11) NULL,
                "forn_telefone"    varchar(11) NULL,
                "forn_usua_codigo" int NOT NULL,
                "forn_empr_codigo" int NOT NULL,
                "forn_created"     timestamp NOT NULL,
                "forn_modified"    timestamp NULL,
                "forn_deleted"     timestamp NULL,
                PRIMARY KEY("forn_codigo")
            )
        ');

        $this->execute('
            ALTER TABLE "forn_fornecedor"
                ADD CONSTRAINT "forn_empr"
                FOREIGN KEY("forn_empr_codigo")
                REFERENCES "empr_empresa"("empr_codigo")
        ');

        $this->execute('
            ALTER TABLE "forn_fornecedor"
                ADD CONSTRAINT "forn_usua"
                FOREIGN KEY("forn_usua_codigo")
                REFERENCES "usua_usuario"("usua_codigo")
        ');

        $this->execute('
            CREATE TABLE "prod_produto"  ( 
                "prod_codigo"       serial NOT NULL,
                "prod_forn_codigo"  INT NULL,
                "prod_codigo_interno" varchar(20) NOT NULL,
                "prod_codigo_externo" varchar(20) NULL,
                "prod_descricao"    varchar(60) NOT NULL,
                "prod_valor"        decimal(15,2) NOT NULL,
                "prod_valor_custo"  decimal(15,2) NOT NULL,
                "prod_unidade"      varchar(2) NULL,
                "prod_tamanho"      varchar(5) NULL,
                "prod_cor"          varchar(20) NULL,
                "prod_status"       smallint NULL,
                "prod_empr_codigo"  int NOT NULL,
                "prod_usua_codigo"  int NOT NULL,
                "prod_created"      timestamp NOT NULL,
                "prod_modified"     timestamp NULL,
                "prod_deleted"      timestamp NULL,
                PRIMARY KEY("prod_codigo")
            )
        ');
            
        $this->execute('
            ALTER TABLE "prod_produto"
                ADD CONSTRAINT "prod_empr"
                FOREIGN KEY("prod_empr_codigo")
                REFERENCES "empr_empresa"("empr_codigo")
        ');

        $this->execute('
            ALTER TABLE "prod_produto"
                ADD CONSTRAINT "prod_usua"
                FOREIGN KEY("prod_usua_codigo")
                REFERENCES "usua_usuario"("usua_codigo")
        ');

        $this->execute('
            ALTER TABLE "prod_produto"
                ADD CONSTRAINT "prod_forn"
                FOREIGN KEY("prod_forn_codigo")
                REFERENCES "forn_fornecedor"("forn_codigo")
        ');

        $this->execute('
            CREATE TABLE "jour_journal"  ( 
                "jour_codigo"       bigserial NOT NULL,
                "jour_model"        varchar(60) NOT NULL,
                "jour_model_codigo" bigint NOT NULL,
                "jour_json_data"    text NULL,
                "jour_created"      timestamp NOT NULL,
                "jour_usua_codigo"  bigint NULL,
                PRIMARY KEY("jour_codigo")
            )
        ');

        $this->execute('
            CREATE TABLE "jdet_journal_detail"  ( 
                "jdet_codigo"       bigserial NOT NULL,
                "jdet_jour_codigo"  bigint NOT NULL,
                "jdet_property"     varchar(60) NOT NULL,
                "jdet_prop_key"     varchar(45) NULL,
                "jdet_old_value"    text NOT NULL,
                "jdet_value"        text NOT NULL,
                PRIMARY KEY("jdet_codigo")
            )
        ');

        $this->execute('
            ALTER TABLE "jdet_journal_detail"
                ADD CONSTRAINT "jour_jdet"
                FOREIGN KEY("jdet_jour_codigo")
                REFERENCES "jour_journal"("jour_codigo")
        ');

        $this->execute('
            CREATE TABLE "vend_vendedor"  ( 
                "vend_codigo"      serial NOT NULL,
                "vend_nome"        varchar(60) NOT NULL,
                "vend_cnpjcpf"     varchar(14) NULL,
                "vend_insestrg"    varchar(15) NULL,
                "vend_insmun"      varchar(15) NULL,
                "vend_cep"         varchar(8) NULL,
                "vend_endereco"    varchar(100) NULL,
                "vend_numero"      varchar(10) NULL,
                "vend_complemento" varchar(15) NULL,
                "vend_bairro"      varchar(100) NULL,
                "vend_cidade"      varchar(100) NULL,
                "vend_uf"          varchar(2) NULL,
                "vend_celular"     varchar(11) NULL,
                "vend_telefone"    varchar(11) NULL,
                "vend_usua_codigo" int NOT NULL,
                "vend_empr_codigo" int NOT NULL,
                "vend_created"     timestamp NOT NULL,
                "vend_modified"    timestamp NULL,
                "vend_deleted"     timestamp NULL,
                PRIMARY KEY("vend_codigo")
            )
        ');

        $this->execute('
            ALTER TABLE "vend_vendedor"
                ADD CONSTRAINT "vend_empr"
                FOREIGN KEY("vend_empr_codigo")
                REFERENCES "empr_empresa"("empr_codigo")
        ');

        $this->execute('
            ALTER TABLE "vend_vendedor"
                ADD CONSTRAINT "vend_usua"
                FOREIGN KEY("vend_usua_codigo")
                REFERENCES "usua_usuario"("usua_codigo")
        ');
    }

    public function down()
    {
        $this->execute('
            ALTER TABLE "jdet_journal_detail"
                DROP CONSTRAINT "jour_jdet" CASCADE 
        ');

        $this->execute('
            DROP TABLE IF EXISTS "jdet_journal_detail"
        ');

        $this->execute('
            DROP TABLE IF EXISTS "jour_journal"
        ');

        $this->execute('
            ALTER TABLE "prod_produto"
                DROP CONSTRAINT "prod_empr" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "prod_produto"
                DROP CONSTRAINT "prod_usua" CASCADE 
        ');

        $this->execute('
            DROP TABLE IF EXISTS "prod_produto"
        ');

        $this->execute('
            ALTER TABLE "clie_cliente"
                DROP CONSTRAINT "clie_empr" CASCADE 
        ');

        $this->execute('
            ALTER TABLE "clie_cliente"
                DROP CONSTRAINT "clie_usua" CASCADE 
        ');

        $this->execute('
            DROP TABLE IF EXISTS "clie_cliente"
        ');

        $this->execute('
            ALTER TABLE "vend_vendedor"
                DROP CONSTRAINT "vend_empr"
        ');

        $this->execute('
            ALTER TABLE "vend_vendedor"
                DROP CONSTRAINT "vend_usua"
        ');

        $this->execute('
            DROP TABLE IF EXISTS "vend_vendedor"
        ');

        $this->execute('
            ALTER TABLE "forn_fornecedor"
                DROP CONSTRAINT "forn_empr"
        ');

        $this->execute('
            ALTER TABLE "forn_fornecedor"
                DROP CONSTRAINT "forn_usua"
        ');

        $this->execute('
            DROP TABLE IF EXISTS "forn_fornecedor"
        ');

        $this->execute('
            ALTER TABLE "usua_usuario"
                DROP CONSTRAINT "empr_usua" CASCADE 
        ');

        $this->execute('
            DROP TABLE IF EXISTS "usua_usuario"
        ');

        $this->execute('
            DROP TABLE IF EXISTS "empr_empresa"
        ');
    }
}
