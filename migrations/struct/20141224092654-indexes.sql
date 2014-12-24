CREATE INDEX "nominative" ON "public"."vocatives" USING hash(nominative);
CREATE INDEX "youtube_id" ON "public"."contents" USING hash(youtube_id);
CREATE INDEX "type" ON "public"."contents" USING hash("type");
