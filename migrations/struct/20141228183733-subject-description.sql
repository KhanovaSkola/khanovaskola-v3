ALTER TABLE "subjects" ADD COLUMN "description" TEXT NULL;

ALTER TABLE "subjects" ADD CONSTRAINT "description_filled" CHECK ("description" != '');
