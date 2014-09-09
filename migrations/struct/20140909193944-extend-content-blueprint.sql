ALTER TABLE
  blueprints
ADD COLUMN content_id int4 NOT NULL;

ALTER TABLE
  blueprints
ADD CONSTRAINT fk_31ade32123c1004e
FOREIGN KEY (content_id)
REFERENCES contents (id)
ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE
  answers
DROP CONSTRAINT fk_50d0c60640e556f5;

ALTER TABLE
  answers
DROP COLUMN blueprint_id;

ALTER TABLE
  answers
ADD COLUMN content_id int4 NOT NULL;

ALTER TABLE
  answers
ADD CONSTRAINT idx_50d0c60640e5ae12
FOREIGN KEY (content_id)
REFERENCES contents (id)
ON UPDATE NO ACTION ON DELETE NO ACTION;

CREATE INDEX idx_50d0c60640e5ae12 ON
  answers USING btree(content_id ASC NULLS LAST);

ALTER TABLE
  blueprints
DROP CONSTRAINT blueprints_pkey;

ALTER TABLE
  blueprints
DROP COLUMN id,
DROP COLUMN title,
DROP COLUMN slug,
DROP COLUMN description;
