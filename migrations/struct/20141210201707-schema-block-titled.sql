ALTER TABLE "public"."subjects" RENAME COLUMN "name" TO "title";
ALTER TABLE "public"."subjects" DROP CONSTRAINT "name_filled",
  ADD CONSTRAINT "title_filled" CHECK (title != '') NOT DEFERRABLE INITIALLY IMMEDIATE;

ALTER TABLE "public"."schemas" RENAME COLUMN "name" TO "title";
ALTER TABLE "public"."schemas" DROP CONSTRAINT "name_filled",
  ADD CONSTRAINT "title_filled" CHECK (title != '') NOT DEFERRABLE INITIALLY IMMEDIATE;

ALTER TABLE "public"."blocks" RENAME COLUMN "name" TO "title";
ALTER TABLE "public"."blocks" DROP CONSTRAINT "name_filled",
  ADD CONSTRAINT "title_filled" CHECK (title != '') NOT DEFERRABLE INITIALLY IMMEDIATE;

ALTER TABLE "blocks" ADD COLUMN "description" TEXT NULL;
ALTER TABLE "blocks" ADD CONSTRAINT "description_filled" CHECK ("description" != '');
