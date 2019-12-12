-- Mitch Duty, Brennen Rose, Eli Peters, and Pablo Nambo.
-- Last modified: 4 Dec 2019


-- Create a table to store our data.
drop table project_users cascade constraints;
drop table Student_Scores cascade constraints;
drop table students cascade constraints;
drop sequence score_seq;

create table project_users
 (user_id       varchar2(24),
  password      varchar2(24),
  PRIMARY KEY   (user_id)
 );
  
create table Student_Scores 
(score_id       number,
 user_id		varchar2(24) not null,	
 phase_num      number,
 date_stamp		date not null, 
 que_right      number,
 que_total      number,
 PRIMARY KEY	(score_id),
 FOREIGN KEY    (user_id) REFERENCES project_users
 );
 
 create table students
 (student_id    varchar2(24),
  teacher_id    varchar2(24),
  curr_phase    number,
  PRIMARY KEY   (student_id),
FOREIGN KEY (student_id) REFERENCES project_users(user_id),
FOREIGN KEY (teacher_id) REFERENCES project_users(user_id)  
 );
 
 INSERT INTO project_users
 VALUES('teststudent',
        'password');
		
 INSERT INTO project_users
 VALUES('testteacher',
        'password');
		
INSERT INTO students
VALUES('teststudent', 'testteacher', 1);
 
 CREATE SEQUENCE score_seq
    MINVALUE 0
	NOMAXVALUE
	START WITH 0;
     
-- Could put a fake insert for demonstrative purposes if one were so inclined.
-- If not, whatever, so long as it's capable of dynamically populating said table.


-- "Look under your seats! EVERYONE GETS ACCESS!"  --Oprah
GRANT
  SELECT,
  INSERT,
  UPDATE,
  DELETE
ON
  Student_Scores
TO
  bmr461;
  
GRANT
  SELECT,
  INSERT,
  UPDATE,
  DELETE
ON
  Student_Scores
TO
  elp5;
  
GRANT
  SELECT,
  INSERT,
  UPDATE,
  DELETE
ON
  Student_Scores
TO
  psn24;
