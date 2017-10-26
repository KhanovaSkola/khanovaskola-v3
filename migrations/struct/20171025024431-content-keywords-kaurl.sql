ALTER TABLE "contents" ADD COLUMN "ka_keywords" text NULL;
ALTER TABLE "contents" ADD COLUMN "keywords" text NULL;

COMMENT ON COLUMN "contents"."ka_keywords" IS 'from KA API';
COMMENT ON COLUMN "contents"."keywords" IS 'created by hand';

ALTER TABLE "contents" ADD COLUMN "ka_url" text NULL;
