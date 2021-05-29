DELIMITER $$

CREATE OR REPLACE TRIGGER `del_pengumuman_visib`
AFTER DELETE ON `pengumuman`
FOR EACH ROW
BEGIN
DELETE FROM `pengumuman_visibility` WHERE `id_pengumuman` = old.`id_pengumuman`;
END$$
DELIMITER ;