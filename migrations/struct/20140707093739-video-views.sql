CREATE TABLE video_views (
  id SERIAL NOT NULL,
  created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
  video_id INT NOT NULL,
  user_id INT NOT NULL,
  PRIMARY KEY(id)
);
