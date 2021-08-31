CREATE TABLE booked_sessions (
  name varchar(50) NOT NULL,
  court int NOT NULL,
  session DATETIME NOT NULL,
  PRIMARY KEY (court, session)
);

INSERT INTO booked_sessions VALUES ('Sam Johnson', 1, '2021-08-27 11:00:00');
INSERT INTO booked_sessions VALUES ('Ben Dover', 2, '2021-08-26 12:00:00');

CREATE TABLE notices (
  id int NOT NULL,
  title varchar(50) NOT NULL,
  body varchar(10000),
  PRIMARY KEY (id)
);

INSERT INTO notices VALUES (1,'Non-Marking Shoes on Court', 'Please ensure you are wearing non marking shoes on the court.');
INSERT INTO notices VALUES (2,'Free Racquets', 'Have a bunch of old racquets. Please contact Tracy on 021 342 213 for info');
