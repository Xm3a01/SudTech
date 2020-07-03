BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "migrations" (
	"id"	integer NOT NULL,
	"migration"	varchar NOT NULL,
	"batch"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "users" (
	"id"	integer NOT NULL,
	"name"	varchar NOT NULL,
	"email"	varchar NOT NULL,
	"email_verified_at"	datetime,
	"password"	varchar NOT NULL,
	"remember_token"	varchar,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "password_resets" (
	"email"	varchar NOT NULL,
	"token"	varchar NOT NULL,
	"created_at"	datetime
);
CREATE TABLE IF NOT EXISTS "failed_jobs" (
	"id"	integer NOT NULL,
	"connection"	text NOT NULL,
	"queue"	text NOT NULL,
	"payload"	text NOT NULL,
	"exception"	text NOT NULL,
	"failed_at"	datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "visitors" (
	"id"	integer NOT NULL,
	"email"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "migrations" VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO "migrations" VALUES (2,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO "migrations" VALUES (3,'2019_08_19_000000_create_failed_jobs_table',1);
INSERT INTO "migrations" VALUES (4,'2020_06_29_080130_create_visitors_table',2);
INSERT INTO "users" VALUES (1,'Mohamed Amin','me@gmail.com',NULL,'$2y$10$fnmaYPFdBP4u1Ib.n8ih7OwlPhlNQ2aQfXaGT2fipYBBNODpgyQUK',NULL,'2020-06-15 04:57:34','2020-06-15 04:57:34');
INSERT INTO "users" VALUES (2,'Mohamed Amin','m@gmail.com',NULL,'$2y$10$i55scwQ2lpF5sCxiIzoCB.GRTj3tYmdeYESdpg2h1h4ebOE6NByR6',NULL,'2020-06-19 15:31:26','2020-06-19 15:31:26');
INSERT INTO "users" VALUES (3,'Mohamed Amin','me@app.com',NULL,'$2y$10$mts5U7gd/aS.VbRODQVyjOpnpXs98abfj6sGHrB0jVDnHIyiTYVHu',NULL,'2020-06-23 15:58:02','2020-06-23 15:58:02');
INSERT INTO "users" VALUES (4,'Mohamed Amin','m@app.com',NULL,'$2y$10$hCuz.UTa7O2ZSPvZA5GHiu2S7nUBvHaUxrNQDi.vonCzzGwTQjqn.',NULL,'2020-06-23 15:59:17','2020-06-23 15:59:17');
INSERT INTO "users" VALUES (5,'Mohamed Amin','a@app.com',NULL,'$2y$10$awQ.TImx3284B96Hvy3A1.AphcwoEAOKYqbGSaJTPhJVtoLAzmG9q',NULL,'2020-06-23 15:59:57','2020-06-23 15:59:57');
INSERT INTO "users" VALUES (6,'Mohamed Amin','me@m2.com',NULL,'$2y$10$EOk2fKqH5d3uKHZBOHrXY.1yVJN8vROW1xhEguo4GLJzZD9oO0azS',NULL,'2020-06-23 16:01:05','2020-06-23 16:01:05');
INSERT INTO "users" VALUES (7,'Mohamed Amin','b@gmail.com',NULL,'$2y$10$cnNtkq3WpZ.3oYG1ploxlu6k4GOVrEVuL963DA.ZmUHWQj6K85bfe',NULL,'2020-06-25 05:05:49','2020-06-25 05:05:49');
INSERT INTO "users" VALUES (8,'m2@app.com','m2@app.com',NULL,'$2y$10$YPHqJkbuRSVDNWbYmKt5E.GgjGA3380MwIC9fMfUbHr6TQHYqgK42',NULL,'2020-06-26 20:13:59','2020-06-26 20:13:59');
INSERT INTO "visitors" VALUES (1,'mohamed29w@gmail.com',NULL,NULL);
INSERT INTO "visitors" VALUES (2,'mohamed29w@gmail.com',NULL,NULL);
INSERT INTO "visitors" VALUES (3,'mohamed29w@gmail.com',NULL,NULL);
INSERT INTO "visitors" VALUES (4,'xm3a01@gmail.com',NULL,NULL);
CREATE UNIQUE INDEX IF NOT EXISTS "users_email_unique" ON "users" (
	"email"
);
CREATE INDEX IF NOT EXISTS "password_resets_email_index" ON "password_resets" (
	"email"
);
COMMIT;
