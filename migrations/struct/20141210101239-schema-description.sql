ALTER TABLE "schemas" ADD COLUMN "description" TEXT NULL;

ALTER TABLE "schemas" ADD CONSTRAINT "description_filled" CHECK ("description" != '');
