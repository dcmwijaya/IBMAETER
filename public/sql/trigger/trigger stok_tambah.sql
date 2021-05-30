DELIMITER $$

CREATE OR REPLACE TRIGGER `stok_tambah` 
AFTER INSERT
ON `detail_in`
FOR EACH ROW
    BEGIN
	UPDATE `item` SET `item`.`stok` = `item`.`stok` + new.`jumlah_in`
	WHERE `item`.`id_item` = new.`id_item`;
    END$$

DELIMITER ;