CREATE TABLE "editors_x_subjects" (
  "id" SERIAL NOT NULL,
  "user_id" INT NOT NULL,
  "subject_id" INT NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT Now(),
  PRIMARY KEY ("id")
);

CREATE TABLE "editors_x_schemas" (
  "id" SERIAL NOT NULL,
  "user_id" INT NOT NULL,
  "schema_id" INT NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT Now(),
  PRIMARY KEY ("id")
);

CREATE TABLE "editors_x_blocks" (
  "id" SERIAL NOT NULL,
  "user_id" INT NOT NULL,
  "block_id" INT NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT Now(),
  PRIMARY KEY ("id")
);
