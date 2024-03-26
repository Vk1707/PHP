Database Management System (DBMS)

A DBMS is a dedicated software program used to store, process and organize large amounts of data.

Some advantages of using DBMS:
1. Concurrent access
2. Redundancy control
3. User Management
4. Remote access

Types of DBMS:
1. Hierarchical DBMS 
2. Network DBMS
3. Relational DBMS


Course
id  name        fee
1   HTML        10000

Student
id  course  name     startdate
1   1       Vivek    01-01-22


Popular RDBMS
- Microsoft SQL Server
- Oracle
- MySQL
- DB2



SQL : Structured Query Language is used to interact with the DBMSs. SQL is a standardized query language which is adhered by all dbmss. 




MySQL is a popular RDBMS.


Starting mysql using shell:
> mysql -u root -p
> Enter Password:<Enter>




Database : A database is a collection several related entities such as tables, views, procedures, functions etc.

Commands:

>create database <name>;
e.g.
>create database aptech;

>drop database <name>;
e.g.
drop database aptech;

>show databases;

>use <database-name>;
e.g.
>aptech;


Table: A table is the main logical entity of a database. A table is used to user data.

Comands:

>create table <table-name>
(
    <column-name> <data-type> [constraints],
    <column-name> <data-type> [constraints],
    [table-constraints]
)


Data Types:

Number:
A. bit      
B. smallint    
C. mediumint
D. int
E. bigint
F. float
G. double

Character
A. char(n)
B. varchar(n)
C. text 

Datetime
A. date
B. time
C. timestamp
D. datetime

e.g.

>create table student
(
    id int,
    name varchar(50),
    course varchar(50),
    fees double(10,2)
);

SQL Constraints:

1. PRIMARY KEY
2. FOREIGN
3. NOT NULL
4. UNIQUE
5. IN

e.g.

>create table product_category
(
    id int PRIMARY KEY,
    name varchar(50) NOT NULL,
    desc text(200) NOT NULL,
    created_at timestamp() NOT NULL,
    modified_at timestamp() NOT NULL,
    deleted_at timestamp() NOT NULL,
);

-----------------------------------------------

create table course
(
    course_id int primary key,
    course_name varchar(50) not null,
    fees double(10,2) not null
);

>create table student
(
    id int PRIMARY KEY,
    course_id int not null,
    name varchar(50) NOT NULL,
    email varchar(20) NOT NULL UNIQUE,
    group varchar(20) IN ('Group A', 'Group B', 'Group C'),
    FOREIGN KEY ('course_id') REFERENCES Course('course_id');
);


>show tables;

>desc <table-name>;


Delete table(s)

>drop table <table-name>;



----------------------------------------------------------------------------


Inserting Records in a table

Syntax:

>insert into <table-name>
[(column1),(column2),....(columnN)]
values(value1,value2,....valueN);

e.g.

>insert into course
(course_id,course_name,fees)
values(1,'HTML',11000);

or

>insert into course
values(1,'HTML',11000);


Displaying Records

Syntax:

>select <column1, column2, .. columnN>|*
from <table-name>
where <condition>
order <column-name> ASC|DESC;

JOIN CLAUASE

>select <column1, column2, .. columnN>|*
from <table1-name> JOIN <table2-name> ON <table1-column>=<table2-column>
[where <condition>]
[order <column-name> ASC|DESC];


Deleting Records

Syntax

>delete from <table-name>
[where <condition>];


Updating Records

Syntax

>update <table-name> 
set <column>=<value> [,<column>=<value>]
[where <condition>];

e.g.

update course
set fees=11500
where course_id=1;