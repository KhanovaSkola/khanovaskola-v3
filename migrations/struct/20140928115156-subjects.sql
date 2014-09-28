CREATE TABLE "public"."subjects" (
  "id" SERIAL NOT NULL,
  "created_at" TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  "name" VARCHAR(255) NOT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "name_filled" CHECK ("name" != '')
);

ALTER TABLE "public"."schemas"
ADD COLUMN "subject_id" int4 NOT NULL;

ALTER TABLE "public"."schemas"
ADD CONSTRAINT "fk_subject" FOREIGN KEY ("subject_id")
REFERENCES "public"."subjects" ("id") ON UPDATE CASCADE ON DELETE CASCADE;
