Lista alla som tjänar mer än en viss (valfri) summa.
SELECT Position_ID, Income FROM Position WHERE Income > 1000;

Compiled:
+-------------+---------+
| Position_ID | Income  |
+-------------+---------+
|           3 |   10000 |
|           4 |  100000 |
|           5 | 1000000 |
+-------------+---------+