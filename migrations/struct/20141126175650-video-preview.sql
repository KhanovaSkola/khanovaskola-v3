ALTER TABLE "contents" ADD COLUMN "preview" TEXT NULL;

ALTER TABLE "contents" ADD CONSTRAINT "preview_filled" CHECK ("preview" != '');

COMMENT ON COLUMN "contents"."preview" IS 'video';
