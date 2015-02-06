CREATE TABLE "blueprint_partials" (
  "id" serial NOT NULL,
  "created_at" TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  "blueprint_id" int NOT NULL,
  "question" text NOT NULL,
  "answer" text NOT NULL,
  "hints" text NOT NULL,
  PRIMARY KEY ("id")
);

ALTER TABLE
  blueprint_partials
ADD
  CONSTRAINT fk_blueprint FOREIGN KEY (blueprint_id) REFERENCES contents (id) NOT DEFERRABLE INITIALLY IMMEDIATE;
