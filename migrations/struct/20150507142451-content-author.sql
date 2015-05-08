ALTER TABLE "contents" ADD "author_id" bigint NULL;
ALTER TABLE "contents" ADD FOREIGN KEY ("author_id")
  REFERENCES "users" ("id") ON DELETE SET NULL ON UPDATE CASCADE;
