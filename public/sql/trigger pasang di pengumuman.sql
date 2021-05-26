DELIMITER $$

CREATE OR REPLACE TRIGGER `isi_visibilitas`
AFTER INSERT ON `pengumuman`
FOR EACH ROW
BEGIN
DECLARE done INT DEFAULT FALSE;
DECLARE ids INT;
DECLARE roles INT;
DECLARE cur1 CURSOR FOR SELECT `uid` FROM `user`;
DECLARE cur2 CURSOR FOR SELECT `role` FROM `user`;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

OPEN cur1;
OPEN cur2;

	ins_loop: LOOP
            FETCH cur1 INTO ids;
            FETCH cur2 INTO roles;
            IF done THEN
                LEAVE ins_loop;
            END IF;
            INSERT INTO `pengumuman_visibility` VALUES (NULL, new.`id_pengumuman`, ids, roles, "Belum Dilihat", new.`waktu`);
        END LOOP;

CLOSE cur1;
CLOSE cur2;
END$$
DELIMITER ;