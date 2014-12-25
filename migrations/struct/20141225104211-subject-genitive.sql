ALTER TABLE "subjects" ADD COLUMN "genitive" VARCHAR(255) NULL;
ALTER TABLE "subjects" ADD CONSTRAINT "genitive_filled" CHECK ("genitive" != '');
