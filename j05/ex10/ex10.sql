SELECT title AS `Title`, summary AS `Summary`, prod_year
from film
WHERE id_genre = "erotic"
ORDER BY prod_year DESC;
