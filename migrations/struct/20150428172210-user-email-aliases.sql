CREATE TABLE "user_aliases" (
  "id" serial NOT NULL,
  "user_id" bigint NOT NULL,
  "email" character varying(255) NOT NULL
);

ALTER TABLE "user_aliases" ADD CONSTRAINT "email_filled" CHECK ("email" != '');

ALTER TABLE "user_aliases" ADD FOREIGN KEY ("user_id") REFERENCES "users" ("id")
ON DELETE CASCADE ON UPDATE CASCADE;
