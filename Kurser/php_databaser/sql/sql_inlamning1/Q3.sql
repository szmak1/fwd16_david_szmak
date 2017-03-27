Kunna söka på för en viss rang?
SELECT Squad_ID, Position_FK, First_name, Last_name, Rank FROM Squad, Position WHERE Position_FK = 5 AND Position_ID = 5;

Compiled:
+----------+-------------+------------+-----------+--------------+
| Squad_ID | Position_FK | First_name | Last_name | Rank         |
+----------+-------------+------------+-----------+--------------+
|        2 |           5 | Atlas      | Destroyer | Global_Elite |
|        5 |           5 | Peti       | Ke        | Global_Elite |
|        7 |           5 | Beata      | Bea       | Global_Elite |
|        8 |           5 | Bence      | Bertalan  | Global_Elite |
|       10 |           5 | Mici       | Ke        | Global_Elite |
+----------+-------------+------------+-----------+--------------+