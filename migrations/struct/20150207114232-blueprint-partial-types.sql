ALTER TABLE "blueprint_partials" ADD COLUMN "answer_type" VARCHAR(255) NULL;
ALTER TABLE "blueprint_partials" ADD CONSTRAINT "answer_type_filled" CHECK ("answer_type" != '');

UPDATE blueprint_partials SET answer_type='scalar';

ALTER TABLE "blueprint_partials" ALTER COLUMN "answer_type" SET NOT NULL;
