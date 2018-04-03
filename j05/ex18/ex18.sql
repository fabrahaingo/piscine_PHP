SELECT name
FROM distrib
WHERE id_distrib = 42
OR (id_distrib > 61 AND id_distrib < 70)
OR id_distrib = 71
OR (id_distrib >= 88 AND id_distrib <= 90)
OR name LIKE '%y%y%' OR name LIKE '%Y%Y%'
LIMIT 3, 5;
