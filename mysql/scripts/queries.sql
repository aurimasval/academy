SELECT v.first_name, v.last_name from vartotojas2 as v ;


SELECT * from vartotojai v
WHERE v.country  = 'GB';

SELECT  * from pazymiai p
WHERE p.value  != 4;


SELECT * from vartotojai v
WHERE v.country  = 'GB';

SELECT * from vartotojai v
WHERE v.date_register IS NULL;


SELECT  * from pazymiai p
ORDER BY p.value

SELECT * from vartotojai v
ORDER BY v.date_register;


SELECT v.country, COUNT(*) as kiekis from vartotojai v
group by country
HAVING kiekis >= 2;


SELECT CONCAT(v.first_name, ' ', v.last_name) as fullName, AVG(p.value) as avg
FROM pazymiai as p
    JOIN vartotojai as v ON v.id = p.user_id
group by p.user_id;

Select CONCAT(v.first_name, ' ', v.last_name), AVG(p.value) from vartotojai v
                                                                     LEFT join pazymiai p on v.id  = p.user_id
GROUP by v.id ;

