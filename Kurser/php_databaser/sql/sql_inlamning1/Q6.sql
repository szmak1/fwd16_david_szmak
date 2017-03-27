Hur många är listade som avlidna
SELECT * FROM Squad WHERE Status_FK = 2;

Compiled:
+----------+------------+-----------+--------+-------------+-----+-------------+-----------+---------+
| Squad_ID | First_name | Last_name | Gender | From_planet | Age | Position_FK | Status_FK | Area_FK |
+----------+------------+-----------+--------+-------------+-----+-------------+-----------+---------+
|        1 | Cosi       | Cosmos    | Male   | Earth       |   4 |           4 |         2 |       6 |
|        2 | Atlas      | Destroyer | Male   | Unknown     |   4 |           5 |         2 |       1 |
|        3 | Ödonke     | fishi     | Male   | Earth       |   1 |           1 |         2 |       4 |
|        4 | Lili       | Ke        | Female | Earth       |   1 |           2 |         2 |       5 |
|        6 | Vimse      | Spindel   | Male   | Venus       |   6 |           2 |         2 |       2 |
+----------+------------+-----------+--------+-------------+-----+-------------+-----------+---------+