CREATE TABLE "completed_contents" (
  "id" SERIAL NOT NULL,
  "user_id" integer NOT NULL,
  "content_id" integer NOT NULL,
  "block_id" integer NOT NULL,
  "schema_id" integer NOT NULL,
  "created_at" TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  PRIMARY KEY(id)
);

ALTER TABLE
  completed_contents
ADD
  CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE;

ALTER TABLE
  completed_contents
ADD
  CONSTRAINT fk_content FOREIGN KEY (content_id) REFERENCES contents (id) NOT DEFERRABLE INITIALLY IMMEDIATE;

ALTER TABLE
  completed_contents
ADD
  CONSTRAINT fk_block FOREIGN KEY (block_id) REFERENCES blocks (id) NOT DEFERRABLE INITIALLY IMMEDIATE;

ALTER TABLE
  completed_contents
ADD
  CONSTRAINT fk_schema FOREIGN KEY (schema_id) REFERENCES schemas (id) NOT DEFERRABLE INITIALLY IMMEDIATE;

CREATE TABLE "completed_blocks" (
  "id" SERIAL NOT NULL,
  "user_id" integer NOT NULL,
  "block_id" integer NOT NULL,
  "schema_id" integer NOT NULL,
  "created_at" TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  PRIMARY KEY(id)
);

ALTER TABLE
  completed_blocks
ADD
  CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE;

ALTER TABLE
  completed_blocks
ADD
  CONSTRAINT fk_block FOREIGN KEY (block_id) REFERENCES blocks (id) NOT DEFERRABLE INITIALLY IMMEDIATE;

ALTER TABLE
  completed_blocks
ADD
  CONSTRAINT fk_schema FOREIGN KEY (schema_id) REFERENCES schemas (id) NOT DEFERRABLE INITIALLY IMMEDIATE;
