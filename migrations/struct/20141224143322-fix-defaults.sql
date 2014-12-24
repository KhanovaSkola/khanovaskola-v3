ALTER TABLE "users"
ALTER "password" DROP DEFAULT,
ALTER "facebook_id" DROP DEFAULT,
ALTER "facebook_access_token" DROP DEFAULT,
ALTER "google_id" DROP DEFAULT,
ALTER "google_access_token" DROP DEFAULT;

ALTER TABLE "tokens"
ALTER "email_type" DROP DEFAULT;
