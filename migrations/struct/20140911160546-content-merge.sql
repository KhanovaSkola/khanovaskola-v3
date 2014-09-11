ALTER TABLE "contents" ADD COLUMN "youtube_id" varchar(255),
ADD COLUMN "youtube_id_original" varchar(255),
ADD COLUMN "vars" text,
ADD COLUMN "question" text,
ADD COLUMN "answer" text,
ADD COLUMN "hints" text;

ALTER TABLE "contents" ADD CONSTRAINT "blueprint" CHECK ("type" <> 'blueprint' OR ("vars" IS NOT NULL AND "question" IS NOT NULL AND "answer" IS NOT NULL AND "hints" IS NOT NULL)),

ADD CONSTRAINT "video" CHECK ("type" <> 'video' OR ("youtube_id" IS NOT NULL AND "youtube_id_original" IS NOT NULL));

COMMENT ON COLUMN "contents"."youtube_id" IS 'video';
COMMENT ON COLUMN "contents"."youtube_id_original" IS 'video';
COMMENT ON COLUMN "contents"."vars" IS 'blueprint';
COMMENT ON COLUMN "contents"."question" IS 'blueprint';
COMMENT ON COLUMN "contents"."answer" IS 'blueprint';
COMMENT ON COLUMN "contents"."hints" IS 'blueprint';

DROP TABLE "videos";
DROP TABLE "blueprints";
