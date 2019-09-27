CREATE TABLE courses (
  'id' int(11) NOT NULL AUTO_INCREMENT,
  'name' varchar(255) NOT NULL,
  'code' varchar(10) NOT NULL,
  'progression' varchar(10) NOT NULL,
  'syllabus' varchar(255) NOT NULL,
  'created_at' datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);
INSERT INTO
  posts ('id', 'category_id', 'title', 'body', 'author')
VALUES
  (
    'Administration av UNIX-lika system',
    'DT149G',
    'B',
    'https://www.miun.se/utbildning/kurser/Sok-kursplan/kursplan/?kursplanid=21588'
  ),
  (
    'Java I',
    'DT006G',
    'A',
    'https://www.miun.se/utbildning/kurser/Sok-kursplan/kursplan/?kursplanid=18814'
  ),
  (
    'Operativsystem introduktionskurs',
    'DT011G',
    'A',
    'https://www.miun.se/utbildning/kurser/Sok-kursplan/kursplan/?kursplanid=21259'
  ),
  (
    'Stickningsanvisningar',
    'ST014G',
    'C',
    'https://www.hjarteroten.simplesite.com'
  )