DELIMITER $$

CREATE OR REPLACE TRIGGER `komp_visibilitas`
AFTER INSERT ON `komplain`
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
            INSERT INTO `komplain_visibility` VALUES (NULL, new.`no_komplain`, ids, roles, "Belum Dilihat", CURDATE());
        END LOOP;

CLOSE cur1;
CLOSE cur2;
END$$
DELIMITER ;