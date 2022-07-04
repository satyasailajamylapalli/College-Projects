--
-- PostgreSQL database dump
--

-- Dumped from database version 14.4
-- Dumped by pg_dump version 14.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: academic_details; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.academic_details (
    qualification text,
    course_year integer,
    percentage integer,
    create_date date,
    write_date date,
    student_id integer NOT NULL
);


ALTER TABLE public.academic_details OWNER TO postgres;

--
-- Name: certificates; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.certificates (
    certificate text,
    create_date date NOT NULL,
    write_date date NOT NULL,
    student_id integer NOT NULL
);


ALTER TABLE public.certificates OWNER TO postgres;

--
-- Name: innovative_solutions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.innovative_solutions (
    problem text,
    solution text,
    implementation text,
    create_date date NOT NULL,
    write_date date NOT NULL,
    student_id integer NOT NULL
);


ALTER TABLE public.innovative_solutions OWNER TO postgres;

--
-- Name: languages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.languages (
    skill text,
    certificate text,
    create_date date,
    write_date date,
    student_id integer NOT NULL,
    rating integer NOT NULL
);


ALTER TABLE public.languages OWNER TO postgres;

--
-- Name: login; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.login (
    uname text NOT NULL,
    pswrd text NOT NULL
);


ALTER TABLE public.login OWNER TO postgres;

--
-- Name: new_ideas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.new_ideas (
    idea text,
    domain_impact text,
    create_date date NOT NULL,
    write_date date NOT NULL,
    student_id integer NOT NULL
);


ALTER TABLE public.new_ideas OWNER TO postgres;

--
-- Name: student_info; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.student_info (
    sname text NOT NULL,
    student_id text NOT NULL,
    email text NOT NULL,
    mobile text NOT NULL,
    course text NOT NULL,
    branch text,
    course_year integer,
    semester integer,
    others_info text,
    create_date date NOT NULL,
    write_date date NOT NULL,
    id integer NOT NULL
);


ALTER TABLE public.student_info OWNER TO postgres;

--
-- Name: student_info_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.student_info_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.student_info_id_seq OWNER TO postgres;

--
-- Name: student_info_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.student_info_id_seq OWNED BY public.student_info.id;


--
-- Name: student_info id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_info ALTER COLUMN id SET DEFAULT nextval('public.student_info_id_seq'::regclass);


--
-- Data for Name: academic_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.academic_details (qualification, course_year, percentage, create_date, write_date, student_id) FROM stdin;
\.


--
-- Data for Name: certificates; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.certificates (certificate, create_date, write_date, student_id) FROM stdin;
\.


--
-- Data for Name: innovative_solutions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.innovative_solutions (problem, solution, implementation, create_date, write_date, student_id) FROM stdin;
\.


--
-- Data for Name: languages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.languages (skill, certificate, create_date, write_date, student_id, rating) FROM stdin;
\.


--
-- Data for Name: login; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.login (uname, pswrd) FROM stdin;
admin	admin
\.


--
-- Data for Name: new_ideas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.new_ideas (idea, domain_impact, create_date, write_date, student_id) FROM stdin;
\.


--
-- Data for Name: student_info; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.student_info (sname, student_id, email, mobile, course, branch, course_year, semester, others_info, create_date, write_date, id) FROM stdin;
\.


--
-- Name: student_info_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.student_info_id_seq', 4, true);


--
-- Name: login login_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.login
    ADD CONSTRAINT login_pkey PRIMARY KEY (uname);


--
-- Name: student_info student_info_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_info
    ADD CONSTRAINT student_info_email_key UNIQUE (email);


--
-- Name: student_info student_info_id_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_info
    ADD CONSTRAINT student_info_id_key UNIQUE (id);


--
-- Name: student_info student_info_mobile_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_info
    ADD CONSTRAINT student_info_mobile_key UNIQUE (mobile);


--
-- Name: student_info student_info_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_info
    ADD CONSTRAINT student_info_pkey PRIMARY KEY (id);


--
-- Name: student_info student_info_student_id_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_info
    ADD CONSTRAINT student_info_student_id_key UNIQUE (student_id);


--
-- Name: academic_details academic_details_student_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_details
    ADD CONSTRAINT academic_details_student_id_fkey FOREIGN KEY (student_id) REFERENCES public.student_info(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: certificates certificates_student_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.certificates
    ADD CONSTRAINT certificates_student_id_fkey FOREIGN KEY (student_id) REFERENCES public.student_info(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: innovative_solutions innovative_solutions_student_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.innovative_solutions
    ADD CONSTRAINT innovative_solutions_student_id_fkey FOREIGN KEY (student_id) REFERENCES public.student_info(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: languages languages_student_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.languages
    ADD CONSTRAINT languages_student_id_fkey FOREIGN KEY (student_id) REFERENCES public.student_info(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: new_ideas new_ideas_student_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.new_ideas
    ADD CONSTRAINT new_ideas_student_id_fkey FOREIGN KEY (student_id) REFERENCES public.student_info(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- PostgreSQL database dump complete
--

