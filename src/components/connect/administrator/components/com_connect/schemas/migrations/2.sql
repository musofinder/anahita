UPDATE jos_connect_sessions SET owner_type = REPLACE(REPLACE(owner_type,'lib.anahita.se.entity.person','com:people.domain.entity.person'),'com.','com:')