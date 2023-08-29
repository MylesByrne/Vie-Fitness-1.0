-- How many users are currently registered?
    SELECT COUNT(users_id)
    FROM users;
-- Output: 15

-- List of User Emails
SELECT users.username, users.email 
FROM users;
-- Output: 
-- username	email	
-- mylesbyrne01	a@gmail.com	
-- tommybuns21	b@gmail.com	
-- Markymark	c@gmail.com	
-- Compton	d@gmail.com	
-- Kbarnes01	e@gmail.com	
-- Joeymiggs	f@gmail.com	
-- MasonD	g@gmail.com	
-- Kdog	h@gmail.com	
-- Cdog	i@gmail.com	
-- Mray12	j@gmail.com	
-- Msaba	k@gmail.com	
-- Kman12	l@gmail.com	
-- Sluby	m@gmail.com	
-- Jill	n@gmail.com	
-- Mb2019	o@gmail.com	


-- List of Group Names
SELECT groups.g_name
FROM groups;

-- Output: 
-- g_name	
-- Guzman	
-- Mcdermont	
-- Mcvinny	


-- Users who are Admins
SELECT users.username
FROM users, groups
WHERE users.users_id = groups.admin_uid;
-- Output: 
-- username	
-- mylesbyrne01	
-- tommybuns21	
-- Compton	


-- Average age of users
SELECT FLOOR(AVG(DATEDIFF(CURRENT_DATE(), users.birth_date)/365))
FROM users;
-- Output: 21

-- Average weight of female Users
SELECT FLOOR(AVG(users.current_weight))
FROM users
WHERE users.sex = 'F';
-- Output: 112 Lbs

-- Average Weight of Male users
SELECT FLOOR(AVG(users.current_weight))
FROM users
WHERE users.sex = 'M';
-- Output: 171 Lbs

-- Users and number of strength logs

SELECT users.username, users.users_id, COUNT(strength_logs.log_id)
FROM users, strength_logs
WHERE users.users_id = strength_logs.uid_s
GROUP BY users.username;

-- Output: 

-- username	users_id	COUNT(strength_logs.log_id)	
-- Cdog	9	1	
-- Joeymiggs	6	2	
-- Kdog	8	1	
-- Kman12	12	1	
-- MasonD	7	1	
-- Mray12	10	2	
-- mylesbyrne01	1	1	
-- tommybuns21	2	3	



-- Users who are male
SELECT * 
FROM users
WHERE users.sex = 'M';
-- Output: 
-- users_id	fname	lname	username	pword	sex	height	birth_date	current_points	bodyfat_pct	last_login	current_weight	point_multiplier	email	
-- 1	Myles	Byrne	mylesbyrne01	charlie	M	72	2000-06-01	0	20	2021-11-29	198	1	a@gmail.com	
-- 2	Tom	Moloney	tommybuns21	echo	M	74	2000-10-05	0	18	2021-11-27	188	1	b@gmail.com	
-- 3	Mark	Downey	Markymark	Alpha	M	67	2001-08-01	0	13	2021-11-26	150	1	c@gmail.com	
-- 4	Kevin	Compton	Compton	Bravo	M	68	2001-06-01	0	16	2021-11-25	175	1	d@gmail.com	
-- 5	Kevin	Barnes	Kbarnes01	Delta	M	72	2001-07-16	0	22	2021-11-24	190	1	e@gmail.com	
-- 6	Joe	Miggs	Joeymiggs	foxtrot	M	65	2000-12-06	0	17	2021-11-23	155	1	f@gmail.com	
-- 7	Mason	Domico	MasonD	Romero	M	73	2000-11-14	0	16	2021-11-22	150	1	g@gmail.com	
-- 8	Kenny	Solosky	Kdog	Quebec	M	69	2002-10-11	0	22	2021-11-21	170	1	h@gmail.com	
-- 9	Colin	Giombetti	Cdog	Golf	M	71	2000-05-22	0	16	2021-11-20	160	1	i@gmail.com	
-- 10	Matthew	Ray	Mray12	Kilo	M	66	2000-08-13	0	19	2021-11-19	162	1	j@gmail.com	
-- 11	Matthew	Saba	Msaba	India	M	73	2000-02-01	0	18	2021-11-18	200	1	k@gmail.com	
-- 12	Kieran	Connor	Kman12	lima	M	67	2000-09-16	0	20	2021-11-17	154	1	l@gmail.com	

-- Users who are female and participate in a group
SELECT users.username, groups.g_name
FROM users, groups, participates_in
WHERE users.sex = 'F' AND users.users_id = participates_in.u_id AND participates_in.g_id = groups.g_id;
-- Output: 

-- username	g_name	
-- Sluby	Mcvinny	
-- Jill	Mcvinny	
-- Mb2019	Mcvinny	

-- amount of groups a user participates in 
SELECT users.username, COUNT(participates_in.u_id)
FROM users, participates_in
WHERE users.users_id = participates_in.u_id
GROUP BY users.username;
-- Output: 
-- username	COUNT(participates_in.u_id)	
-- Cdog	2	
-- Compton	1	
-- Jill	2	
-- Joeymiggs	1	
-- Kbarnes01	1	
-- Kdog	2	
-- Kman12	1	
-- Markymark	3	
-- MasonD	1	
-- Mb2019	1	
-- Mray12	2	
-- Msaba	1	
-- mylesbyrne01	2	
-- Sluby	1	
-- tommybuns21	1	

-- Users point multiplier
SELECT username, point_multiplier
FROM users;
-- Output: 

-- username	point_multiplier	
-- mylesbyrne01	1	
-- tommybuns21	1	
-- Markymark	1	
-- Compton	1	
-- Kbarnes01	1	
-- Joeymiggs	1	
-- MasonD	1	
-- Kdog	1	
-- Cdog	1	
-- Mray12	1	
-- Msaba	1	
-- Kman12	1	
-- Sluby	1	
-- Jill	1	
-- Mb2019	1	

-- Usernames in certain group
SELECT users.username, groups.g_name
FROM groups, users, participates_in
WHERE users.users_id = participates_in.u_id AND participates_in.g_id = groups.g_id AND groups.g_name = "Guzman";
-- Output: 

-- username	g_name	
-- tommybuns21	Guzman	
-- mylesbyrne01	Guzman	
-- Compton	Guzman	
-- Cdog	Guzman	
-- Mray12	Guzman	
-- Jill	Guzman	

-- most common strength excercises
SELECT strength_logs.e_name
FROM strength_logs
GROUP BY strength_logs.e_name
LIMIT 1;
-- Output: benchpress

-- user who completed heaviest deadlift by weight and reps
SELECT users.username, MAX(strength_logs.s_value * strength_logs.reps)/strength_logs.reps as "weight", (strength_logs.s_value * strength_logs.reps)/strength_logs.s_value as "reps"
FROM users, strength_logs
WHERE strength_logs.e_name = "deadlift";
-- Output: 
-- mylesbyrne01	315.0000 3.0000	

-- users and date of last login
SELECT users.username, users.last_login
FROM users;
-- Output: 
-- username	last_login	
-- mylesbyrne01	2021-11-29	
-- tommybuns21	2021-11-27	
-- Markymark	2021-11-26	
-- Compton	2021-11-25	
-- Kbarnes01	2021-11-24	
-- Joeymiggs	2021-11-23	
-- MasonD	2021-11-22	
-- Kdog	2021-11-21	
-- Cdog	2021-11-20	
-- Mray12	2021-11-19	
-- Msaba	2021-11-18	
-- Kman12	2021-11-17	
-- Sluby	2021-11-16	
-- Jill	2021-11-15	
-- Mb2019	2021-11-14	

-- male users average height
SELECT AVG(users.height)
FROM users
WHERE users.sex = "M";
-- Output: 69.7500	


-- user with most points 
SELECT MAX(current_points), users.username
FROM users
GROUP BY current_points
ORDER BY current_points desc
LIMIT 1;

-- Output: 
-- 5	Markymark	

-- Users that participate in more than 1 group
SELECT users.username, COUNT(participates_in.u_id) as "number of groups"
FROM users, participates_in
WHERE users.users_id = participates_in.u_id
GROUP BY users.username
HAVING COUNT(participates_in.u_id) > 1;
-- Output: 
-- username	number of groups	
-- Cdog	2	
-- Jill	2	
-- Kdog	2	
-- Markymark	3	
-- Mray12	2	
-- mylesbyrne01	2	

-- list of usernames and first and last names
SELECT users.username, users.fname, users.lname
FROM users;
-- Output: 
-- username	fname	lname	
-- mylesbyrne01	Myles	Byrne	
-- tommybuns21	Tom	Moloney	
-- Markymark	Mark	Downey	
-- Compton	Kevin	Compton	
-- Kbarnes01	Kevin	Barnes	
-- Joeymiggs	Joe	Miggs	
-- MasonD	Mason	Domico	
-- Kdog	Kenny	Solosky	
-- Cdog	Colin	Giombetti	
-- Mray12	Matthew	Ray	
-- Msaba	Matthew	Saba	
-- Kman12	Kieran	Connor	
-- Sluby	Sarah	Lubicich	
-- Jill	Jillbert	Kelly	
-- Mb2019	Michaela	Byrne	

