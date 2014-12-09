ALTER TABLE "schemas" ADD COLUMN "layout" TEXT NULL;

ALTER TABLE "schemas" ADD CONSTRAINT "layout_filled" CHECK ("layout" != '');
