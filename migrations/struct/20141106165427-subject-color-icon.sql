ALTER TABLE "public"."subjects"
ADD COLUMN "color" VARCHAR(255) NOT NULL DEFAULT 'blue',
ADD CONSTRAINT "color_filled" CHECK ("color" != ''),
ADD COLUMN "icon" VARCHAR(255) NOT NULL DEFAULT 'history',
ADD CONSTRAINT "icon_filled" CHECK ("color" != '');
