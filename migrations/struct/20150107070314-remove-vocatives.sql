ALTER TABLE "subjects" DROP "genitive";

ALTER TABLE "users" DROP "vocative";
ALTER TABLE "users" RENAME "nominative" TO "first_name";

DROP TABLE "vocatives";
