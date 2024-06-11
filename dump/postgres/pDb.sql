CREATE TABLE payments (
    customer_name varchar(128),
    processed_at date,
    amount int
);

INSERT INTO payments VALUES ('antoine', '2020-01-01', 100);
INSERT INTO payments VALUES ('clement', '2020-01-02', 10);
INSERT INTO payments VALUES ('antoine', '2020-01-02', 100);
INSERT INTO payments VALUES ('antoine', '2020-01-03', 100);
INSERT INTO payments VALUES ('simon', '2020-02-05', 1000);
INSERT INTO payments VALUES ('antoine', '2020-02-01', 100);

