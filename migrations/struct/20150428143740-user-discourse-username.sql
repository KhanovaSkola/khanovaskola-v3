ALTER TABLE "users" ADD "discourse_username" character varying(255) NULL;
ALTER TABLE "users" ADD CONSTRAINT "discourse_username_filled" CHECK ("discourse_username" != '');
