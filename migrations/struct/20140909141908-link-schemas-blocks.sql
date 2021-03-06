CREATE TABLE schemas_x_blocks (
  id SERIAL NOT NULL,
  schema_id int4 NOT NULL,
  block_id int4 NOT NULL,
  PRIMARY KEY (id)
);

CREATE INDEX IDX_9E929223A76ED395 ON schemas_x_blocks (schema_id);

ALTER TABLE
  schemas_x_blocks
ADD
  CONSTRAINT FK_9E929223A76ED395 FOREIGN KEY (schema_id) REFERENCES schemas (id) NOT DEFERRABLE INITIALLY IMMEDIATE;

CREATE INDEX IDX_9E929223A76AB123 ON schemas_x_blocks (block_id);

ALTER TABLE
  schemas_x_blocks
ADD
  CONSTRAINT FK_9E929223A76AB123 FOREIGN KEY (block_id) REFERENCES blocks (id) NOT DEFERRABLE INITIALLY IMMEDIATE;
