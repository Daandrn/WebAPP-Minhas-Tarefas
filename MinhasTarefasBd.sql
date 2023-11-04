CREATE DATABASE "MinhasTarefas"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Portuguese_Brazil.1252'
    LC_CTYPE = 'Portuguese_Brazil.1252'
    LOCALE_PROVIDER = 'libc'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;


-------------------------------------->
    CREATE TABLE public.tarefas
(
    id integer NOT NULL UNIQUE,
    status_tarefa integer NOT NULL,
    descricao character varying(50) NOT NULL,
    tarefa text NOT NULL,
    prazo text NOT NULL,
        FOREIGN KEY (status_tarefa)
        REFERENCES public.statustarefa (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.tarefas
    OWNER to postgres;

-------------------------------------->
CREATE TABLE public.statustarefa
(
    id integer NOT NULL,
    descricao text NOT NULL,
    PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.staustarefa
    OWNER to postgres;

-------------------------------------->

INSERT INTO statustarefa (id, descricao) VALUES 
	(1, 'Cadastrada'),
	(2, 'Em analise'),
	(3, 'Em execução'),
	(4, 'Pausada'),
	(5, 'Aguardando Resposta'),
	(6, 'Concluída');