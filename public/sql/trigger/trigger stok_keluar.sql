DELIMITER $$

CREATE OR REPLACE TRIGGER `stok_keluar` 
AFTER INSERT
ON `detail_out`
FOR EACH ROW
    BEGIN
	UPDATE `item` SET `item`.`stok` = `item`.`stok` - new.`jumlah_out`
	WHERE new.`id_item` = `item`.`id_item`;
    END$$

DELIMITER ;