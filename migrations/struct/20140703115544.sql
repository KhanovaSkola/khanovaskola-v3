CREATE TABLE answers (
  id SERIAL NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  answer TEXT NOT NULL,
  correct BOOLEAN NOT NULL,
  hint BOOLEAN NOT NULL,
  inactivity BOOLEAN NOT NULL,
  seed INT NOT NULL,
  time INT NOT NULL,
  blueprint_id INT NOT NULL,
  user_id INT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE badges (
  id SERIAL NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  key VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE badge_user_bridges (
  id SERIAL NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  badge_id INT NOT NULL,
  user_id INT NOT NULL,
  video_id INT NOT NULL,
  blueprint_id INT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE blueprints (
  id SERIAL NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  vars TEXT NOT NULL,
  question TEXT NOT NULL,
  answer TEXT NOT NULL,
  hints TEXT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE comments (
  id SERIAL NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  text TEXT NOT NULL,
  inReplyTo_id INT DEFAULT NULL,
  author_id INT NOT NULL,
  video_id INT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE gists (
  id SERIAL NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  name VARCHAR(255) NOT NULL,
  text TEXT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE paths (
  id SERIAL NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  list TEXT NOT NULL,
  author_id INT DEFAULT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE tags (
  id SERIAL NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE users (
  id SERIAL NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  name VARCHAR(255) NOT NULL,
  family_name VARCHAR(255) NOT NULL,
  nominative VARCHAR(255) NOT NULL,
  vocative VARCHAR(255) NOT NULL,
  gender VARCHAR(255) NOT NULL,
  password VARCHAR(255) DEFAULT NULL,
  email VARCHAR(255) NOT NULL,
  facebook_id VARCHAR(255) DEFAULT NULL,
  facebook_access_token VARCHAR(255) DEFAULT NULL,
  google_id VARCHAR(255) DEFAULT NULL,
  google_access_token VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE videos (
  id SERIAL NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  youtube_id VARCHAR(255) NOT NULL,
  youtube_id_original VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
);

INSERT INTO badges (key, created_at) VALUES
  ('VideoWatched', Now());

INSERT INTO badges (key, created_at) VALUES
  ('ExerciseMastery', Now());

INSERT INTO badges (key, created_at) VALUES
  ('UserOldWeek', Now());
