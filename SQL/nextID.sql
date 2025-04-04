CREATE SEQUENCE ab_user_id_seq START 1;
ALTER TABLE ab_user ALTER COLUMN id SET DEFAULT nextval('ab_user_id_seq');
SELECT setval('ab_user_id_seq', (SELECT MAX(id) FROM ab_user));
