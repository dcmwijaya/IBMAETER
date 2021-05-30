DELIMITER $$

CREATE OR REPLACE TRIGGER `del_komp_visib`
AFTER DELETE ON `komplain`
FOR EACH ROW
BEGIN
DELETE FROM `komplain_visibility` WHERE `no_komplain` = old.`no_komplain`;
END$$
DELIMITER ;