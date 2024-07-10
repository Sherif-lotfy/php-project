create database school;

create table student (
	studentId int primary key auto_increment,
	fname varchar(20), 
    lname varchar(20),
    email varchar(20),
    phone varchar(11)
);

create table courses (
	courseCode varchar(10) primary key,
    title varchar(20)
);

create table student_course (
	grade varchar(5),
    studentId int,
    courseCode varchar(10),
    foreign key (studentId) references student(studentId),
    foreign key (courseCode) references courses(courseCode)
);

insert into courses (courseCode,title) values 
("COMP202","DataStructur"),
("COMP208","Automata"),
("MATH202","ODE");
