ALTER TABLE "users" ADD COLUMN "avatar" TEXT NULL;

ALTER TABLE "users" ADD CONSTRAINT "avatar_filled" CHECK ("avatar" != '');
