select * from cycle;

select cycle.*, merk.name from cycle inner join merk on cycle.id_merk = merk.id;

update cycle, merk SET cycle.name = "sepeda united detroit 2.00", cycle.price = 2875000, cycle.id_merk = 3 WHERE cycle.id = 4;

select * from cycle where id = 4;

select * from cycle where stock < 10;

select cycle.*, merk.name from cycle inner join merk on cycle.id_merk = merk.id where merk.name = "Polygon";