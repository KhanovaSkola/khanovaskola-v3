ALTER TABLE "contents" ADD COLUMN "duration" int NULL;

ALTER TABLE "contents" ADD CONSTRAINT "duration" CHECK ("duration" > 0);

COMMENT ON COLUMN "contents"."duration" IS 'video';
