DROP
  TABLE vocatives;

ALTER TABLE
  answers
DROP
  FOREIGN KEY answers_user_id;

ALTER TABLE
  answers
DROP
  FOREIGN KEY answers_blueprint_id;

DROP
  INDEX IDX_50D0C606A76ED395 ON answers;

DROP
  INDEX IDX_50D0C60640E556F5 ON answers;

ALTER TABLE
  answers
DROP
  correct,
DROP
  seed,
DROP
  time,
DROP
  inactivity,
DROP
  hint,
  CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  CHANGE answer answer VARCHAR(255) NOT NULL;

ALTER TABLE
  badges CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  CHANGE `key` `key` VARCHAR(255) NOT NULL;

ALTER TABLE
  badge_user_bridges
DROP
  FOREIGN KEY badge_user_bridges_badge_id;

ALTER TABLE
  badge_user_bridges
DROP
  FOREIGN KEY badge_user_bridges_user_id;

ALTER TABLE
  badge_user_bridges
DROP
  FOREIGN KEY badge_user_bridges_video_id;

ALTER TABLE
  badge_user_bridges
DROP
  FOREIGN KEY badge_user_bridges_blueprint_id;

DROP
  INDEX IDX_3B83999EF7A2C2FC ON badge_user_bridges;

DROP
  INDEX IDX_3B83999EA76ED395 ON badge_user_bridges;

DROP
  INDEX IDX_3B83999E29C1004E ON badge_user_bridges;

DROP
  INDEX IDX_3B83999E40E556F5 ON badge_user_bridges;

ALTER TABLE
  badge_user_bridges CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  CHANGE video_id video_id INT NOT NULL,
  CHANGE blueprint_id blueprint_id INT NOT NULL;

DROP
  INDEX blueprints_title ON blueprints;

DROP
  INDEX blueprints_slug ON blueprints;

ALTER TABLE
  blueprints
DROP
  vars,
DROP
  hints,
  CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  CHANGE title title VARCHAR(255) NOT NULL,
  CHANGE slug slug VARCHAR(255) NOT NULL,
  CHANGE description description VARCHAR(255) NOT NULL,
  CHANGE question question VARCHAR(255) NOT NULL,
  CHANGE answer answer VARCHAR(255) NOT NULL;

ALTER TABLE
  comments
DROP
  FOREIGN KEY comments_author_id;

ALTER TABLE
  comments
DROP
  FOREIGN KEY comments_video_id;

ALTER TABLE
  comments
DROP
  FOREIGN KEY comments_in_reply_to_id;

DROP
  INDEX IDX_5F9E962AF675F31B ON comments;

DROP
  INDEX IDX_5F9E962A29C1004E ON comments;

DROP
  INDEX IDX_5F9E962ADD92DAB8 ON comments;

ALTER TABLE
  comments CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  CHANGE text text VARCHAR(255) NOT NULL,
  CHANGE in_reply_to_id inReplyTo_id INT DEFAULT NULL;

DROP
  INDEX gists_name ON gists;

ALTER TABLE
  gists CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  CHANGE name name VARCHAR(255) NOT NULL,
  CHANGE text text VARCHAR(255) NOT NULL;

ALTER TABLE
  paths
DROP
  FOREIGN KEY paths_author_id;

DROP
  INDEX IDX_8BBA8611F675F31B ON paths;

ALTER TABLE
  paths
DROP
  author_id,
  CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL;

DROP
  INDEX tags_title ON tags;

DROP
  INDEX tags_slug ON tags;

ALTER TABLE
  tags CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  CHANGE title title VARCHAR(255) NOT NULL,
  CHANGE slug slug VARCHAR(255) NOT NULL;

DROP
  INDEX users_email ON users;

ALTER TABLE
  users CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  CHANGE email email VARCHAR(255) NOT NULL,
  CHANGE name name VARCHAR(255) NOT NULL,
  CHANGE family_name family_name VARCHAR(255) NOT NULL,
  CHANGE nominative nominative VARCHAR(255) NOT NULL,
  CHANGE vocative vocative VARCHAR(255) NOT NULL,
  CHANGE gender gender VARCHAR(255) NOT NULL,
  CHANGE password password VARCHAR(255) DEFAULT NULL,
  CHANGE facebook_id facebook_id VARCHAR(255) DEFAULT NULL,
  CHANGE facebook_access_token facebook_access_token VARCHAR(255) DEFAULT NULL,
  CHANGE google_id google_id VARCHAR(255) DEFAULT NULL,
  CHANGE google_access_token google_access_token VARCHAR(255) DEFAULT NULL;

ALTER TABLE
  videos
DROP
  FOREIGN KEY videos_redirect_to;

DROP
  INDEX videos_youtube_id ON videos;

DROP
  INDEX videos_slug ON videos;

DROP
  INDEX videos_title ON videos;

DROP
  INDEX IDX_29AA6432DC9332D9 ON videos;

ALTER TABLE
  videos
DROP
  redirect_to,
  CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  CHANGE title title VARCHAR(255) NOT NULL,
  CHANGE slug slug VARCHAR(255) NOT NULL,
  CHANGE description description VARCHAR(255) NOT NULL,
  CHANGE youtube_id youtube_id VARCHAR(255) NOT NULL,
  CHANGE youtube_id_original youtube_id_original VARCHAR(255) NOT NULL;
