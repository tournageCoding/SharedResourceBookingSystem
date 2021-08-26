CREATE TABLE booked_sessions (
  name varchar(50) NOT NULL,
  court int NOT NULL CHECK (court == 1 OR court == 2),
  session DATETIME NOT NULL,
  PRIMARY KEY (court, session)
);

INSERT INTO booked_sessions VALUES ('Sam Johnson', 1, '2021-08-27 11:00:00');
INSERT INTO booked_sessions VALUES ('Ben Dover', 2, '2021-08-26 12:00:00');

CREATE TABLE papers (
  code varchar(7),
  name varchar(50) NOT NULL,
  PRIMARY KEY (code)
);

INSERT INTO papers VALUES ('COSC326','Effective Programming');
INSERT INTO papers VALUES ('COSC349','Cloud Computing Architecture');
