ALTER TABLE users ADD registered BOOLEAN NULL;
UPDATE users SET registered = true;
ALTER TABLE users ALTER registered DROP NOT NULL;

ALTER TABLE users ALTER email DROP NOT NULL;
