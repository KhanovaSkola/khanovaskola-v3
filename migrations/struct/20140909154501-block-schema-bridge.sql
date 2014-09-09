ALTER TABLE
  schemas_x_blocks
RENAME TO
  block_schema_bridges;

ALTER TABLE
  block_schema_bridges
ADD COLUMN position int4 NOT NULL;

ALTER TABLE
  block_schema_bridges
ADD COLUMN created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL;
