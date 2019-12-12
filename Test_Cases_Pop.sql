-- Mitch Duty, CS 458 Capstone Project
-- Last modified: 11 Dec 2019

-- The purpose of this file is to populate the already existing
-- tables with some example entries for the sake of not only creating
-- a fuller table, but demonstrating that the application functions properly.

insert into project_users values(
	'otherteacher', '12345');

insert into project_users values(
	'HotSauce99', 'inferno');

insert into project_users values(
	'DrWhoNerd', 'scifichannel');
	
insert into project_users values(
	'BabyYoda', 'done2death');

insert into project_users values(
	'Brotendo5000', 'quizardry');
	
insert into students values(
	'HotSauce99', 'testteacher', 1);
	
insert into students values(
	'DrWhoNerd', 'testteacher', 1);
	
insert into students values(
	'BabyYoda', 'testteacher', 2);
	
insert into students values(
	'Brotendo5000', 'otherteacher', 2);
	
insert into Student_Scores values(
	score_seq.NEXTVAL, 'HotSauce99', 1, SYSDATE, 8, 8);
	
insert into Student_Scores values(
	score_seq.NEXTVAL, 'DrWhoNerd', 1, SYSDATE, 10, 11);
	
insert into Student_Scores values(
	score_seq.NEXTVAL, 'BabyYoda', 1, SYSDATE, 11, 13);
	
insert into Student_Scores values(
	score_seq.NEXTVAL, 'Brotendo5000', 1, SYSDATE, 10, 13);

