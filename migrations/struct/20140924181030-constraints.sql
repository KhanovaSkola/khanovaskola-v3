ALTER TABLE "public"."badges" ADD CONSTRAINT "key_filled" CHECK ("key" != '');

ALTER TABLE "public"."block_schema_bridges" ADD CONSTRAINT "position_n" CHECK ("position" >= 0);
ALTER TABLE "public"."block_schema_bridges" ADD CONSTRAINT "u_block_position" UNIQUE ("schema_id","position");

ALTER TABLE "public"."blocks" ADD CONSTRAINT "name_filled" CHECK ("name" != '');

ALTER TABLE "public"."comments" ADD CONSTRAINT "text_filled" CHECK ("text" != '');

ALTER TABLE "public"."content_block_bridges" ADD CONSTRAINT "position_n" CHECK ("position" >= 0);
ALTER TABLE "public"."content_block_bridges" ADD CONSTRAINT "u_content_position" UNIQUE ("block_id","position");

ALTER TABLE "public"."contents" ADD CONSTRAINT "u_content_slug" UNIQUE ("slug"),
ADD CONSTRAINT "title_filled" CHECK ("title" != ''),
ADD CONSTRAINT "slug_filled" CHECK ("slug" != '');

ALTER TABLE "public"."gists" ADD CONSTRAINT "u_gist_name" UNIQUE ("name"),
ADD CONSTRAINT "name_filled" CHECK ("name" != '');

ALTER TABLE "public"."schemas" ADD CONSTRAINT "name_filled" CHECK ("name" != '');

ALTER TABLE "public"."tags" ADD CONSTRAINT "u_tags_slug" UNIQUE ("slug"),
ADD CONSTRAINT "title_filled" CHECK ("title" != ''),
ADD CONSTRAINT "slug_filled" CHECK ("slug" != '');

ALTER TABLE "public"."tokens" ADD CONSTRAINT "hash_filled" CHECK ("hash" != '');

ALTER TABLE "public"."unsubscribes" ADD CONSTRAINT "email_filled" CHECK ("email" != '');

ALTER TABLE "public"."users"
ADD CONSTRAINT "name_not_empty" CHECK ("name" IS NULL OR "name" != ''),
ADD CONSTRAINT "family_name_not_empty" CHECK ("family_name" IS NULL OR "family_name" != ''),
ADD CONSTRAINT "nominative_not_empty" CHECK ("nominative" IS NULL OR "nominative" != ''),
ADD CONSTRAINT "vocative_not_empty" CHECK ("vocative" IS NULL OR "vocative" != ''),
ADD CONSTRAINT "email_not_empty" CHECK ("email" IS NULL OR "email" != ''),
ADD CONSTRAINT "facebook_id_not_empty" CHECK ("facebook_id" IS NULL OR "facebook_id" != ''),
ADD CONSTRAINT "facebook_access_token_not_empty" CHECK ("facebook_access_token" IS NULL OR "facebook_access_token" != ''),
ADD CONSTRAINT "google_id_not_empty" CHECK ("google_id" IS NULL OR "google_id" != ''),
ADD CONSTRAINT "google_access_token_not_empty" CHECK ("google_access_token" IS NULL OR "google_access_token" != '');

CREATE UNIQUE INDEX "u_users_email" ON "public"."users" ("email")
  WHERE "email" IS NOT NULL;
CREATE UNIQUE INDEX "u_users_facebook_id" ON "public"."users" ("facebook_id")
  WHERE "facebook_id" IS NOT NULL;
CREATE UNIQUE INDEX "u_users_google_id" ON "public"."users" ("google_id")
  WHERE "google_id" IS NOT NULL;

ALTER TABLE "public"."contents" DROP CONSTRAINT "video";
ALTER TABLE "public"."contents" ADD CONSTRAINT "video" CHECK ((((type)::text <> 'video'::text) OR (youtube_id IS NOT NULL))) NOT DEFERRABLE INITIALLY IMMEDIATE;
