CREATE TABLE "old_links" (
  "id" serial NOT NULL,
  "created_at" timestamp NOT NULL DEFAULT 'Now()',
  "router" character varying(50) NOT NULL,
  "mask" text NOT NULL,
  "target" text NOT NULL
);
