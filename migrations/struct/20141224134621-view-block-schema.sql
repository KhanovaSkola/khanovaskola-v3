ALTER TABLE "video_views"
ADD COLUMN "block_id" int4 NULL,
ADD COLUMN "schema_id" int4 NULL;

CREATE INDEX idx_block ON video_views (block_id);
CREATE INDEX idx_schema ON video_views (schema_id);

ALTER TABLE
  "video_views"
ADD
  CONSTRAINT fk_block FOREIGN KEY (block_id) REFERENCES blocks (id) NOT DEFERRABLE INITIALLY IMMEDIATE;

ALTER TABLE
  "video_views"
ADD
  CONSTRAINT fk_schema FOREIGN KEY (schema_id) REFERENCES schemas (id) NOT DEFERRABLE INITIALLY IMMEDIATE;
