--
-- App structure of database
--

drop database if exists skeleton;
create database skeleton with encoding = 'UTF8';
alter database skeleton owner to postgres;

\connect skeleton;


--
-- Type for type `field_type`
--
create type public.field_type as enum (
  'string', 'integer', 'float', 'boolean', 'serialized'
);

alter type public.field_type owner to postgres;


--
-- Table structure for table `field`
--
create table public.field (
  "field_id" serial4 not null primary key,
  "field_key" varchar(255) not null default '',
  "field_value" text not null default '',
  "field_value_type" public.field_type not null default 'string'::public.field_type
);

alter table public.field owner to postgres;
create index idx_field_key on public.field (field_key);
