ALTER TABLE
  schemas_x_blocks
RENAME TO
  block_links;

ALTER TABLE
  block_links
ADD COLUMN position int4 NOT NULL;

ALTER TABLE
  block_links
ADD COLUMN created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL;
