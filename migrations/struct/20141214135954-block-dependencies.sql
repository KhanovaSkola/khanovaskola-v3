CREATE TABLE "block_dependencies" (
  "id" SERIAL NOT NULL,
  "block_id" INT NOT NULL,
  "dependency_id" INT NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT Now(),
  PRIMARY KEY ("id")
);

ALTER TABLE
  block_dependencies
ADD
  CONSTRAINT fk_block FOREIGN KEY (block_id) REFERENCES blocks (id) NOT DEFERRABLE INITIALLY IMMEDIATE;

ALTER TABLE
  block_dependencies
ADD
  CONSTRAINT fk_dependency FOREIGN KEY (dependency_id) REFERENCES blocks (id) NOT DEFERRABLE INITIALLY IMMEDIATE;
