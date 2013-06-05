
SHOW TRIGGERS LIKE 'form_photos'
  
  
DROP TRIGGER IF EXISTS handle_insert_photos;

delimiter |

CREATE TRIGGER handle_insert_photos BEFORE INSERT ON form_photos
  FOR EACH ROW BEGIN
  declare isClanDefiTuple int;
  
  SELECT count(*) INTO isClanDefiTuple from form_defis_clans fdc
  WHERE fdc.clan_id = NEW.clan_id AND fdc.defi_id = NEW.defi_id 
  GROUP BY fdc.clan_id, fdc.defi_id;
  
  IF (isClanDefiTuple is null OR isClanDefiTuple < 1) THEN
	INSERT INTO form_defis_clans SET defi_id = NEW.defi_id, clan_id = NEW.clan_id;
  END IF;
 
  END;
|

delimiter ;
  
/*
DROP TRIGGER IF EXISTS handle_delete_photos; 

delimiter |

CREATE TRIGGER handle_delete_photos BEFORE DELETE ON form_photos
  FOR EACH ROW BEGIN
  declare nbrPhotosClanDefi int;
  
  SELECT count(*) INTO nbrPhotosClanDefi from form_photos p
  WHERE p.clan_id = OLD.clan_id AND p.defi_id = OLD.defi_id 
  GROUP BY p.clan_id, p.defi_id;
  
  IF (nbrPhotosClanDefi = 1) THEN
	DELETE FROM form_defis_clans WHERE defi_id = OLD.defi_id AND clan_id = OLD.clan_id;
  END IF;
 
  END;
|

delimiter ;

*/