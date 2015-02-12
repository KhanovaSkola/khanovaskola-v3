ALTER TABLE "blueprint_partials" ADD COLUMN "data" TEXT NULL;
ALTER TABLE "blueprint_partials" ADD CONSTRAINT "data_filled" CHECK ("data" != '');
