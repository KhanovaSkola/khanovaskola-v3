ALTER TABLE "subjects" ADD COLUMN "slug" TEXT NULL;
ALTER TABLE "subjects" ADD CONSTRAINT "slug_filled" CHECK ("slug" != '');

ALTER TABLE "schemas" ADD COLUMN "slug" TEXT NULL;
ALTER TABLE "schemas" ADD CONSTRAINT "slug_filled" CHECK ("slug" != '');

ALTER TABLE "blocks" ADD COLUMN "slug" TEXT NULL;
ALTER TABLE "blocks" ADD CONSTRAINT "slug_filled" CHECK ("slug" != '');
