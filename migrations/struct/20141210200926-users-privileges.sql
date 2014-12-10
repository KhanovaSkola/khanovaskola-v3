ALTER TABLE "users" ADD COLUMN "privileges" TEXT NULL;

ALTER TABLE "users" ADD CONSTRAINT "privileges_filled" CHECK ("privileges" != '');
