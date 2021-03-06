PGDMP         ,                x            db_sis    12.0    12.0 N    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16393    db_sis    DATABASE     �   CREATE DATABASE db_sis WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE db_sis;
                postgres    false            �            1255    41277 4   fn_sis_master_data_get_name(bigint, bigint, integer)    FUNCTION     �  CREATE FUNCTION public.fn_sis_master_data_get_name(module_table_id bigint, data_id bigint, languange_id integer) RETURNS character varying
    LANGUAGE plpgsql
    AS $$

DECLARE ret_name character varying;

BEGIN

	select name into ret_name
	from ci_sis_master_data a, ci_sis_master_data_language b
	where a.id = b.data__id and a.module_table__id = module_table_id
	and b.data__id = data_id and b.language__id = 1;

RETURN ret_name;

END;

$$;
 p   DROP FUNCTION public.fn_sis_master_data_get_name(module_table_id bigint, data_id bigint, languange_id integer);
       public          postgres    false            �            1259    32886    ci_sis_employee_asset    TABLE     ;  CREATE TABLE public.ci_sis_employee_asset (
    data__id character varying(20) NOT NULL,
    processor_id character varying(20) NOT NULL,
    windows_sn character varying(30) NOT NULL,
    key character varying(50) NOT NULL,
    value character varying(500) NOT NULL,
    update_date timestamp without time zone
);
 )   DROP TABLE public.ci_sis_employee_asset;
       public         heap    postgres    false            �            1259    41088    ci_sis_employee_company    TABLE     �   CREATE TABLE public.ci_sis_employee_company (
    id bigint NOT NULL,
    data__id character varying(30) NOT NULL,
    school__id bigint NOT NULL,
    join_date_start date,
    employee_status__id bigint,
    job_status__id bigint
);
 +   DROP TABLE public.ci_sis_employee_company;
       public         heap    postgres    false            �            1259    41086    ci_sis_employee_company_id_seq    SEQUENCE     �   CREATE SEQUENCE public.ci_sis_employee_company_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.ci_sis_employee_company_id_seq;
       public          postgres    false    211            �           0    0    ci_sis_employee_company_id_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.ci_sis_employee_company_id_seq OWNED BY public.ci_sis_employee_company.id;
          public          postgres    false    210            �            1259    32894    ci_sis_employee_data    TABLE       CREATE TABLE public.ci_sis_employee_data (
    id character varying(30) NOT NULL,
    name_first character varying(30) DEFAULT NULL::character varying,
    name_middle character varying(30) DEFAULT NULL::character varying,
    name_last character varying(30) DEFAULT NULL::character varying,
    name_official character varying(100) DEFAULT NULL::character varying,
    name_nick character varying(30) DEFAULT NULL::character varying,
    salutation__id bigint,
    birth_place_city__id bigint NOT NULL,
    birth_date date,
    address character varying(255) DEFAULT NULL::character varying,
    gender__id bigint NOT NULL,
    religion__id bigint NOT NULL,
    marital_status__id bigint,
    marital_date date,
    marital_place character varying(30) DEFAULT NULL::character varying,
    blood_type__id bigint,
    tax_id character varying(30),
    tax_status__id bigint,
    tax_type__id bigint,
    bpjstk__id bigint,
    idcard_number integer NOT NULL,
    family_card_id integer NOT NULL,
    height bigint,
    weight bigint
);
 (   DROP TABLE public.ci_sis_employee_data;
       public         heap    postgres    false            �            1259    16526    ci_sis_master_data    TABLE     �   CREATE TABLE public.ci_sis_master_data (
    id integer NOT NULL,
    module_table__id integer,
    parent_id integer,
    reference_id integer
);
 &   DROP TABLE public.ci_sis_master_data;
       public         heap    postgres    false            �            1259    16542    ci_sis_master_data_language    TABLE     �   CREATE TABLE public.ci_sis_master_data_language (
    data__id integer NOT NULL,
    language__id integer NOT NULL,
    name character varying(255),
    description text
);
 /   DROP TABLE public.ci_sis_master_data_language;
       public         heap    postgres    false            �            1259    16503    ci_sis_master_module    TABLE     j   CREATE TABLE public.ci_sis_master_module (
    id character varying(50) NOT NULL,
    description text
);
 (   DROP TABLE public.ci_sis_master_module;
       public         heap    postgres    false            �            1259    16516    ci_sis_master_module_table    TABLE     �   CREATE TABLE public.ci_sis_master_module_table (
    id integer NOT NULL,
    module__id character varying(50),
    name character varying(255)
);
 .   DROP TABLE public.ci_sis_master_module_table;
       public         heap    postgres    false            �            1259    41104    ci_sis_user_data    TABLE     �   CREATE TABLE public.ci_sis_user_data (
    system_user__id character varying(20) NOT NULL,
    alias_user_id character varying(30) NOT NULL,
    auth_type__id bigint NOT NULL,
    timezone character varying(5),
    status character varying(10)
);
 $   DROP TABLE public.ci_sis_user_data;
       public         heap    postgres    false            �            1259    41266    ci_sis_user_data_work_location    TABLE     �   CREATE TABLE public.ci_sis_user_data_work_location (
    id bigint NOT NULL,
    system_user__id bigint NOT NULL,
    company__id bigint NOT NULL,
    work_location__id bigint NOT NULL
);
 2   DROP TABLE public.ci_sis_user_data_work_location;
       public         heap    postgres    false            �            1259    41096    ci_sis_user_group    TABLE     i  CREATE TABLE public.ci_sis_user_group (
    id bigint NOT NULL,
    company__id bigint NOT NULL,
    name character varying(30) NOT NULL,
    status character varying(10),
    employee_default character varying(7) DEFAULT 'FALSE'::character varying,
    auth_type__id bigint NOT NULL,
    candidate_role character varying(20) DEFAULT 'NO'::character varying
);
 %   DROP TABLE public.ci_sis_user_group;
       public         heap    postgres    false            �            1259    41250    ci_sis_user_group_access    TABLE     �   CREATE TABLE public.ci_sis_user_group_access (
    group__id bigint NOT NULL,
    menus__id bigint NOT NULL,
    type character varying(8) DEFAULT 'view'::character varying NOT NULL
);
 ,   DROP TABLE public.ci_sis_user_group_access;
       public         heap    postgres    false            �            1259    41094    ci_sis_user_group_id_seq    SEQUENCE     �   CREATE SEQUENCE public.ci_sis_user_group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.ci_sis_user_group_id_seq;
       public          postgres    false    213            �           0    0    ci_sis_user_group_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.ci_sis_user_group_id_seq OWNED BY public.ci_sis_user_group.id;
          public          postgres    false    212            �            1259    41119    ci_sis_user_group_member    TABLE     �   CREATE TABLE public.ci_sis_user_group_member (
    group__id bigint NOT NULL,
    system_user__id character varying NOT NULL
);
 ,   DROP TABLE public.ci_sis_user_group_member;
       public         heap    postgres    false            �            1259    16492    ci_system_language    TABLE     �   CREATE TABLE public.ci_system_language (
    id integer NOT NULL,
    name character varying(30),
    abbreviation character varying(3)
);
 &   DROP TABLE public.ci_system_language;
       public         heap    postgres    false            �            1259    41271    ci_system_logging_log    TABLE     7  CREATE TABLE public.ci_system_logging_log (
    access_time timestamp without time zone,
    system_user__id character varying(30),
    ip_address character varying(30),
    user_agent character varying(255),
    menus__id bigint,
    parameters character varying(255),
    action_note character varying(50)
);
 )   DROP TABLE public.ci_system_logging_log;
       public         heap    postgres    false            �            1259    41155    ci_system_menus    TABLE       CREATE TABLE public.ci_system_menus (
    id bigint NOT NULL,
    parent_id bigint NOT NULL,
    orders character varying(3),
    shows character varying(5),
    link character varying(255),
    target character varying(7),
    icons character varying(50)
);
 #   DROP TABLE public.ci_system_menus;
       public         heap    postgres    false            �            1259    41160    ci_system_menus_detail    TABLE     �   CREATE TABLE public.ci_system_menus_detail (
    language__id integer NOT NULL,
    menus__id bigint NOT NULL,
    name character varying(100) NOT NULL,
    title character varying(100) NOT NULL,
    description text
);
 *   DROP TABLE public.ci_system_menus_detail;
       public         heap    postgres    false            �            1259    41137    ci_system_menus_language    TABLE     �   CREATE TABLE public.ci_system_menus_language (
    id bigint NOT NULL,
    menus__id bigint NOT NULL,
    type character varying(20)
);
 ,   DROP TABLE public.ci_system_menus_language;
       public         heap    postgres    false            �            1259    16486    ci_system_user    TABLE     �   CREATE TABLE public.ci_system_user (
    id character varying(30) DEFAULT ''::character varying NOT NULL,
    name character varying(60),
    pass character varying(255),
    language__id integer NOT NULL,
    menu_module_use character varying(7)
);
 "   DROP TABLE public.ci_system_user;
       public         heap    postgres    false            �
           2604    41091    ci_sis_employee_company id    DEFAULT     �   ALTER TABLE ONLY public.ci_sis_employee_company ALTER COLUMN id SET DEFAULT nextval('public.ci_sis_employee_company_id_seq'::regclass);
 I   ALTER TABLE public.ci_sis_employee_company ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    210    211            �
           2604    41099    ci_sis_user_group id    DEFAULT     |   ALTER TABLE ONLY public.ci_sis_user_group ALTER COLUMN id SET DEFAULT nextval('public.ci_sis_user_group_id_seq'::regclass);
 C   ALTER TABLE public.ci_sis_user_group ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    212    213            �          0    32886    ci_sis_employee_asset 
   TABLE DATA           l   COPY public.ci_sis_employee_asset (data__id, processor_id, windows_sn, key, value, update_date) FROM stdin;
    public          postgres    false    208   Lq       �          0    41088    ci_sis_employee_company 
   TABLE DATA           �   COPY public.ci_sis_employee_company (id, data__id, school__id, join_date_start, employee_status__id, job_status__id) FROM stdin;
    public          postgres    false    211   iq       �          0    32894    ci_sis_employee_data 
   TABLE DATA           g  COPY public.ci_sis_employee_data (id, name_first, name_middle, name_last, name_official, name_nick, salutation__id, birth_place_city__id, birth_date, address, gender__id, religion__id, marital_status__id, marital_date, marital_place, blood_type__id, tax_id, tax_status__id, tax_type__id, bpjstk__id, idcard_number, family_card_id, height, weight) FROM stdin;
    public          postgres    false    209   �q       �          0    16526    ci_sis_master_data 
   TABLE DATA           [   COPY public.ci_sis_master_data (id, module_table__id, parent_id, reference_id) FROM stdin;
    public          postgres    false    206   �q       �          0    16542    ci_sis_master_data_language 
   TABLE DATA           `   COPY public.ci_sis_master_data_language (data__id, language__id, name, description) FROM stdin;
    public          postgres    false    207   �q       �          0    16503    ci_sis_master_module 
   TABLE DATA           ?   COPY public.ci_sis_master_module (id, description) FROM stdin;
    public          postgres    false    204   �q       �          0    16516    ci_sis_master_module_table 
   TABLE DATA           J   COPY public.ci_sis_master_module_table (id, module__id, name) FROM stdin;
    public          postgres    false    205   ar       �          0    41104    ci_sis_user_data 
   TABLE DATA           k   COPY public.ci_sis_user_data (system_user__id, alias_user_id, auth_type__id, timezone, status) FROM stdin;
    public          postgres    false    214   ~r       �          0    41266    ci_sis_user_data_work_location 
   TABLE DATA           m   COPY public.ci_sis_user_data_work_location (id, system_user__id, company__id, work_location__id) FROM stdin;
    public          postgres    false    220   �r       �          0    41096    ci_sis_user_group 
   TABLE DATA           {   COPY public.ci_sis_user_group (id, company__id, name, status, employee_default, auth_type__id, candidate_role) FROM stdin;
    public          postgres    false    213   �r       �          0    41250    ci_sis_user_group_access 
   TABLE DATA           N   COPY public.ci_sis_user_group_access (group__id, menus__id, type) FROM stdin;
    public          postgres    false    219   �r       �          0    41119    ci_sis_user_group_member 
   TABLE DATA           N   COPY public.ci_sis_user_group_member (group__id, system_user__id) FROM stdin;
    public          postgres    false    215   s       �          0    16492    ci_system_language 
   TABLE DATA           D   COPY public.ci_system_language (id, name, abbreviation) FROM stdin;
    public          postgres    false    203   2s       �          0    41271    ci_system_logging_log 
   TABLE DATA           �   COPY public.ci_system_logging_log (access_time, system_user__id, ip_address, user_agent, menus__id, parameters, action_note) FROM stdin;
    public          postgres    false    221   ms       �          0    41155    ci_system_menus 
   TABLE DATA           \   COPY public.ci_system_menus (id, parent_id, orders, shows, link, target, icons) FROM stdin;
    public          postgres    false    217   �s       �          0    41160    ci_system_menus_detail 
   TABLE DATA           c   COPY public.ci_system_menus_detail (language__id, menus__id, name, title, description) FROM stdin;
    public          postgres    false    218   �s       �          0    41137    ci_system_menus_language 
   TABLE DATA           G   COPY public.ci_system_menus_language (id, menus__id, type) FROM stdin;
    public          postgres    false    216   �s       �          0    16486    ci_system_user 
   TABLE DATA           W   COPY public.ci_system_user (id, name, pass, language__id, menu_module_use) FROM stdin;
    public          postgres    false    202   �s       �           0    0    ci_sis_employee_company_id_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.ci_sis_employee_company_id_seq', 1, false);
          public          postgres    false    210            �           0    0    ci_sis_user_group_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.ci_sis_user_group_id_seq', 1, false);
          public          postgres    false    212            �
           2606    32893 3   ci_sis_employee_asset ci_sis_employee_asset_primary 
   CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_employee_asset
    ADD CONSTRAINT ci_sis_employee_asset_primary PRIMARY KEY (data__id, processor_id, windows_sn, key);
 ]   ALTER TABLE ONLY public.ci_sis_employee_asset DROP CONSTRAINT ci_sis_employee_asset_primary;
       public            postgres    false    208    208    208    208            �
           2606    41093 4   ci_sis_employee_company ci_sis_employee_company_pkey 
   CONSTRAINT     r   ALTER TABLE ONLY public.ci_sis_employee_company
    ADD CONSTRAINT ci_sis_employee_company_pkey PRIMARY KEY (id);
 ^   ALTER TABLE ONLY public.ci_sis_employee_company DROP CONSTRAINT ci_sis_employee_company_pkey;
       public            postgres    false    211            �
           2606    32908 .   ci_sis_employee_data ci_sis_employee_data_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.ci_sis_employee_data
    ADD CONSTRAINT ci_sis_employee_data_pkey PRIMARY KEY (id);
 X   ALTER TABLE ONLY public.ci_sis_employee_data DROP CONSTRAINT ci_sis_employee_data_pkey;
       public            postgres    false    209            �
           2606    16496 *   ci_system_language ci_sis_language_primary 
   CONSTRAINT     h   ALTER TABLE ONLY public.ci_system_language
    ADD CONSTRAINT ci_sis_language_primary PRIMARY KEY (id);
 T   ALTER TABLE ONLY public.ci_system_language DROP CONSTRAINT ci_sis_language_primary;
       public            postgres    false    203            �
           2606    16530 -   ci_sis_master_data ci_sis_master_data_primary 
   CONSTRAINT     k   ALTER TABLE ONLY public.ci_sis_master_data
    ADD CONSTRAINT ci_sis_master_data_primary PRIMARY KEY (id);
 W   ALTER TABLE ONLY public.ci_sis_master_data DROP CONSTRAINT ci_sis_master_data_primary;
       public            postgres    false    206            �
           2606    16549 ?   ci_sis_master_data_language ci_sis_master_data_primary_language 
   CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_master_data_language
    ADD CONSTRAINT ci_sis_master_data_primary_language PRIMARY KEY (data__id, language__id);
 i   ALTER TABLE ONLY public.ci_sis_master_data_language DROP CONSTRAINT ci_sis_master_data_primary_language;
       public            postgres    false    207    207            �
           2606    16510 1   ci_sis_master_module ci_sis_master_module_primary 
   CONSTRAINT     o   ALTER TABLE ONLY public.ci_sis_master_module
    ADD CONSTRAINT ci_sis_master_module_primary PRIMARY KEY (id);
 [   ALTER TABLE ONLY public.ci_sis_master_module DROP CONSTRAINT ci_sis_master_module_primary;
       public            postgres    false    204            �
           2606    16520 =   ci_sis_master_module_table ci_sis_master_module_table_primary 
   CONSTRAINT     {   ALTER TABLE ONLY public.ci_sis_master_module_table
    ADD CONSTRAINT ci_sis_master_module_table_primary PRIMARY KEY (id);
 g   ALTER TABLE ONLY public.ci_sis_master_module_table DROP CONSTRAINT ci_sis_master_module_table_primary;
       public            postgres    false    205            �
           2606    41108 '   ci_sis_user_data ci_sis_user_data_pkey1 
   CONSTRAINT     r   ALTER TABLE ONLY public.ci_sis_user_data
    ADD CONSTRAINT ci_sis_user_data_pkey1 PRIMARY KEY (system_user__id);
 Q   ALTER TABLE ONLY public.ci_sis_user_data DROP CONSTRAINT ci_sis_user_data_pkey1;
       public            postgres    false    214            �
           2606    41270 B   ci_sis_user_data_work_location ci_sis_user_data_work_location_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_user_data_work_location
    ADD CONSTRAINT ci_sis_user_data_work_location_pkey PRIMARY KEY (id);
 l   ALTER TABLE ONLY public.ci_sis_user_data_work_location DROP CONSTRAINT ci_sis_user_data_work_location_pkey;
       public            postgres    false    220            �
           2606    41255 9   ci_sis_user_group_access ci_sis_user_group_access_primary 
   CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_user_group_access
    ADD CONSTRAINT ci_sis_user_group_access_primary PRIMARY KEY (group__id, menus__id, type);
 c   ALTER TABLE ONLY public.ci_sis_user_group_access DROP CONSTRAINT ci_sis_user_group_access_primary;
       public            postgres    false    219    219    219            �
           2606    41103 (   ci_sis_user_group ci_sis_user_group_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.ci_sis_user_group
    ADD CONSTRAINT ci_sis_user_group_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.ci_sis_user_group DROP CONSTRAINT ci_sis_user_group_pkey;
       public            postgres    false    213            �
           2606    41141 6   ci_system_menus_language ci_system_menus_language_pkey 
   CONSTRAINT     t   ALTER TABLE ONLY public.ci_system_menus_language
    ADD CONSTRAINT ci_system_menus_language_pkey PRIMARY KEY (id);
 `   ALTER TABLE ONLY public.ci_system_menus_language DROP CONSTRAINT ci_system_menus_language_pkey;
       public            postgres    false    216            �
           2606    41159 $   ci_system_menus ci_system_menus_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.ci_system_menus
    ADD CONSTRAINT ci_system_menus_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.ci_system_menus DROP CONSTRAINT ci_system_menus_pkey;
       public            postgres    false    217            �
           2606    16491 "   ci_system_user cl_sis_user_primary 
   CONSTRAINT     `   ALTER TABLE ONLY public.ci_system_user
    ADD CONSTRAINT cl_sis_user_primary PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.ci_system_user DROP CONSTRAINT cl_sis_user_primary;
       public            postgres    false    202            �
           2606    41126 4   ci_sis_user_group_member pk_ci_sis_user_group_member 
   CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_user_group_member
    ADD CONSTRAINT pk_ci_sis_user_group_member PRIMARY KEY (group__id, system_user__id);
 ^   ALTER TABLE ONLY public.ci_sis_user_group_member DROP CONSTRAINT pk_ci_sis_user_group_member;
       public            postgres    false    215    215            �
           2606    41167 &   ci_system_menus_detail pk_menus_detail 
   CONSTRAINT     y   ALTER TABLE ONLY public.ci_system_menus_detail
    ADD CONSTRAINT pk_menus_detail PRIMARY KEY (language__id, menus__id);
 P   ALTER TABLE ONLY public.ci_system_menus_detail DROP CONSTRAINT pk_menus_detail;
       public            postgres    false    218    218            �
           1259    16502    fki_ci_sis_user_language    INDEX     [   CREATE INDEX fki_ci_sis_user_language ON public.ci_system_user USING btree (language__id);
 ,   DROP INDEX public.fki_ci_sis_user_language;
       public            postgres    false    202            �
           2606    16497 #   ci_system_user ci_sis_user_language    FK CONSTRAINT     �   ALTER TABLE ONLY public.ci_system_user
    ADD CONSTRAINT ci_sis_user_language FOREIGN KEY (language__id) REFERENCES public.ci_system_language(id) NOT VALID;
 M   ALTER TABLE ONLY public.ci_system_user DROP CONSTRAINT ci_sis_user_language;
       public          postgres    false    202    203    2782                       2606    16555 Z   ci_sis_master_data_language fk_bz_hris_master_data_has_bz_biskitz_language_bz_hris_master1    FK CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_master_data_language
    ADD CONSTRAINT fk_bz_hris_master_data_has_bz_biskitz_language_bz_hris_master1 FOREIGN KEY (data__id) REFERENCES public.ci_sis_master_data(id);
 �   ALTER TABLE ONLY public.ci_sis_master_data_language DROP CONSTRAINT fk_bz_hris_master_data_has_bz_biskitz_language_bz_hris_master1;
       public          postgres    false    2788    207    206            �
           2606    16531 +   ci_sis_master_data fk_ci_master_data_module    FK CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_master_data
    ADD CONSTRAINT fk_ci_master_data_module FOREIGN KEY (module_table__id) REFERENCES public.ci_sis_master_module_table(id);
 U   ALTER TABLE ONLY public.ci_sis_master_data DROP CONSTRAINT fk_ci_master_data_module;
       public          postgres    false    206    2786    205                        2606    16550 :   ci_sis_master_data_language fk_ci_sis_master_data_language    FK CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_master_data_language
    ADD CONSTRAINT fk_ci_sis_master_data_language FOREIGN KEY (language__id) REFERENCES public.ci_system_language(id);
 d   ALTER TABLE ONLY public.ci_sis_master_data_language DROP CONSTRAINT fk_ci_sis_master_data_language;
       public          postgres    false    2782    207    203                       2606    41127 /   ci_sis_user_group_member fk_ci_sis_to_user_data    FK CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_user_group_member
    ADD CONSTRAINT fk_ci_sis_to_user_data FOREIGN KEY (system_user__id) REFERENCES public.ci_sis_user_data(system_user__id);
 Y   ALTER TABLE ONLY public.ci_sis_user_group_member DROP CONSTRAINT fk_ci_sis_to_user_data;
       public          postgres    false    215    214    2800                       2606    41132 0   ci_sis_user_group_member fk_ci_sis_to_user_group    FK CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_user_group_member
    ADD CONSTRAINT fk_ci_sis_to_user_group FOREIGN KEY (group__id) REFERENCES public.ci_sis_user_group(id);
 Z   ALTER TABLE ONLY public.ci_sis_user_group_member DROP CONSTRAINT fk_ci_sis_to_user_group;
       public          postgres    false    2798    213    215                       2606    41261 Q   ci_sis_user_group_access fk_ci_sis_user_group_has_ci_sis_menus_ci_sis_user_group1    FK CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_user_group_access
    ADD CONSTRAINT fk_ci_sis_user_group_has_ci_sis_menus_ci_sis_user_group1 FOREIGN KEY (group__id) REFERENCES public.ci_sis_user_group(id);
 {   ALTER TABLE ONLY public.ci_sis_user_group_access DROP CONSTRAINT fk_ci_sis_user_group_has_ci_sis_menus_ci_sis_user_group1;
       public          postgres    false    2798    213    219                       2606    41256 W   ci_sis_user_group_access fk_ci_sis_user_group_has_ci_system_menus_menus_ci_menus_menus1    FK CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_user_group_access
    ADD CONSTRAINT fk_ci_sis_user_group_has_ci_system_menus_menus_ci_menus_menus1 FOREIGN KEY (menus__id) REFERENCES public.ci_system_menus(id);
 �   ALTER TABLE ONLY public.ci_sis_user_group_access DROP CONSTRAINT fk_ci_sis_user_group_has_ci_system_menus_menus_ci_menus_menus1;
       public          postgres    false    217    2806    219                       2606    41168 +   ci_system_menus_detail fk_menus_to_language    FK CONSTRAINT     �   ALTER TABLE ONLY public.ci_system_menus_detail
    ADD CONSTRAINT fk_menus_to_language FOREIGN KEY (language__id) REFERENCES public.ci_system_language(id);
 U   ALTER TABLE ONLY public.ci_system_menus_detail DROP CONSTRAINT fk_menus_to_language;
       public          postgres    false    218    2782    203                       2606    41173 (   ci_system_menus_detail fk_menus_to_menus    FK CONSTRAINT     �   ALTER TABLE ONLY public.ci_system_menus_detail
    ADD CONSTRAINT fk_menus_to_menus FOREIGN KEY (menus__id) REFERENCES public.ci_system_menus(id);
 R   ALTER TABLE ONLY public.ci_system_menus_detail DROP CONSTRAINT fk_menus_to_menus;
       public          postgres    false    218    2806    217            �
           2606    16521 6   ci_sis_master_module_table fk_sis_master_module_module    FK CONSTRAINT     �   ALTER TABLE ONLY public.ci_sis_master_module_table
    ADD CONSTRAINT fk_sis_master_module_module FOREIGN KEY (module__id) REFERENCES public.ci_sis_master_module(id);
 `   ALTER TABLE ONLY public.ci_sis_master_module_table DROP CONSTRAINT fk_sis_master_module_module;
       public          postgres    false    205    2784    204            �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �   t   x�M�A
�@��u�)z�ޡHqS�܄�Yƌ�q��oiE���C��So���E���������vR='�\I���O;��W�ƟÏ0SiRB:��mזP�CPm��}4�)0����J%      �      x������ � �      �   0   x�s�420200702�44�M9��-8C�9�K2�R�b���� �J	2      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �   +   x�3���K��K-�L���s�2�t�K��,��t�s����� ��	z      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �   G   x�s�420200702�tI���L3MJ2H�HI541K63O21IJLJJ3I53�0IN6�4�ts�	v����� ��     