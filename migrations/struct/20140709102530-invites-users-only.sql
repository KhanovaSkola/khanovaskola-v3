ALTER TABLE
  student_invites
DROP
  email;

ALTER TABLE
  student_invites ALTER student_id
SET
  NOT NULL;
