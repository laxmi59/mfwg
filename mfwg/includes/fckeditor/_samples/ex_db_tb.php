<?php
//include("../../../includes/constants.php");
//include("../../../includes/functions.php");
include("../../../includes/classes/Database.class.php");



$ex_db_fu=$_GET['ex_db_fu'];
$ex_db_st=$_GET['ex_db_st'];
$ex_tb=$_GET['ex_tb'];
$ex_mx=$_GET['ex_mx'];
$ex_fi=$_GET['ex_fi'];


		define('DIR_FS_BACKUP', '../../../admin/includes/backups/');
		define('PHP_DATE_TIME_FORMAT', 'm/d/Y H:i:s');
		define('COMP_NAME', 'SI');
		define('CMP_OWNER', 'SI');    
		define('DB_DATABASE', DB_MYSQL_DATABASE);


		function tep_db_query($query, $link = 'db_link') {
			$result = mysql_query($query) or tep_db_error($query, mysql_errno(), mysql_error());   
			return $result;
		}
		
		function tep_set_time_limit($limit) {
			if (!get_cfg_var('safe_mode')) {
				set_time_limit($limit);
			}
		}
		function tep_db_fetch_array($db_query) {
			return mysql_fetch_array($db_query);
		}
		function tep_not_null($value) {
			if (is_array($value)) {
				if (sizeof($value) > 0) {
					return true;
				} else {
					return false;
				}
			} else {
				if ( (is_string($value) || is_int($value)) && ($value != '') && ($value != 'NULL') && (strlen(trim($value)) > 0)) {
					return true;
				} else {
					return false;
				}
			}
		}
		
		








if((isset($ex_db_fu)&& $ex_db_fu!='')) {	
		
		tep_set_time_limit(0);	
		$backup_file = 'db ('. DB_DATABASE.') (Full-Database) ('.date('YmdHis').').sql';
		
		$fp = fopen(DIR_FS_BACKUP . $backup_file, 'w');
		
		$schema = '# Exported Data base File in Mysql' . "\n" .                
		'#' . "\n" .
		'# Database Backup For ' . CMP_NAME . "\n" .
		'# Copyright (c) ' . date('Y') . ' ' . CMP_OWNER . "\n" .
		'#' . "\n" .
		'# Database: ' . DB_DATABASE . "\n" .
		'# Database Server: ' . DB_SERVER . "\n" .
		'#' . "\n" .
		'# Backup Date: ' . date(PHP_DATE_TIME_FORMAT) . "\n\n";
		@fputs($fp, $schema);
		
		$tables_query = tep_db_query('show tables');
		while ($tables = tep_db_fetch_array($tables_query)) {
			list(,$table) = each($tables);
		
			$schema = 'drop table if exists ' . $table . ';' . "\n" . 'create table ' . $table . ' (' . "\n";
		
			$table_list = array();
			$fields_query = tep_db_query("show fields from " . $table);
			while ($fields = tep_db_fetch_array($fields_query)) {
				$table_list[] = $fields['Field'];
		
				$schema .= '  ' . $fields['Field'] . ' ' . $fields['Type'];
		
				if (strlen($fields['Default']) > 0) $schema .= ' default \'' . $fields['Default'] . '\'';
		
				if ($fields['Null'] != 'YES') $schema .= ' not null';
		
				if (isset($fields['Extra'])) $schema .= ' ' . $fields['Extra'];
		
				$schema .= ',' . "\n";
			}
		
			$schema = ereg_replace(",\n$", '', $schema);
		
			// add the keys
			$index = array();
			$keys_query = tep_db_query("show keys from " . $table);
			while ($keys = tep_db_fetch_array($keys_query)) {
				$kname = $keys['Key_name'];
		
				if (!isset($index[$kname])) {
					$index[$kname] = array('unique' => !$keys['Non_unique'],
					'fulltext' => ($keys['Index_type'] == 'FULLTEXT' ? '1' : '0'),
					'columns' => array());
				}
			
				$index[$kname]['columns'][] = $keys['Column_name'];
			}
		
			while (list($kname, $info) = each($index)) {
				$schema .= ',' . "\n";
				
				$columns = implode($info['columns'], ', ');
				
				if ($kname == 'PRIMARY') {
					$schema .= '  PRIMARY KEY (' . $columns . ')';
				} elseif ( $info['fulltext'] == '1' ) {
					$schema .= '  FULLTEXT ' . $kname . ' (' . $columns . ')';
				} elseif ($info['unique']) {
					$schema .= '  UNIQUE ' . $kname . ' (' . $columns . ')';
				} else {
					$schema .= '  KEY ' . $kname . ' (' . $columns . ')';
				}
			}
		
			$schema .= "\n" . ');' . "\n\n";
			@fputs($fp, $schema);
		
			// dump the data
			if ( ($table != TABLE_SESSIONS ) && ($table != TABLE_WHOS_ONLINE) ) {
				$rows_query = tep_db_query("select " . implode(',', $table_list) . " from " . $table);
				while ($rows = tep_db_fetch_array($rows_query)) {
					$schema = 'insert into ' . $table . ' (' . implode(', ', $table_list) . ') values (';
					
					reset($table_list);
					while (list(,$i) = each($table_list)) {
						if (!isset($rows[$i])) {
							$schema .= 'NULL, ';
						} elseif (tep_not_null($rows[$i])) {
							$row = addslashes($rows[$i]);
							$row = ereg_replace("\n#", "\n".'\#', $row);
							$schema .= '\'' . $row . '\', ';
						} else {
							$schema .= '\'\', ';
						}
					}
					$schema = ereg_replace(', $', '', $schema) . ');' . "\n";
					@fputs($fp, $schema);
				}
			}
		}
		
		@fclose($fp);
		
		header('Content-type: application/x-octet-stream');
		header('Content-disposition: attachment; filename=' . $backup_file);
		
		readfile(DIR_FS_BACKUP . $backup_file);
		//unlink(DIR_FS_BACKUP . $backup_file);
		exit;	
}














if((isset($ex_db_st)&& $ex_db_st!='')) {		
		
		tep_set_time_limit(0);
		$backup_file = 'db ('. DB_DATABASE.') (Table-Structures) ('.date('YmdHis').').sql';
		
		$fp = fopen(DIR_FS_BACKUP . $backup_file, 'w');
		
		$schema = '# Exported Data base File in Mysql' . "\n" .                
		'#' . "\n" .
		'# Database Backup For ' . CMP_NAME . "\n" .
		'# Copyright (c) ' . date('Y') . ' ' . CMP_OWNER . "\n" .
		'#' . "\n" .
		'# Database: ' . DB_DATABASE . "\n" .
		'# Database Server: ' . DB_SERVER . "\n" .
		'#' . "\n" .
		'# Backup Date: ' . date(PHP_DATE_TIME_FORMAT) . "\n\n";
		@fputs($fp, $schema);
		
		$tables_query = tep_db_query('show tables');
		while ($tables = tep_db_fetch_array($tables_query)) {
			list(,$table) = each($tables);
		
			$schema = 'drop table if exists ' . $table . ';' . "\n" . 'create table ' . $table . ' (' . "\n";
		
			$table_list = array();
			$fields_query = tep_db_query("show fields from " . $table);
			while ($fields = tep_db_fetch_array($fields_query)) {
				$table_list[] = $fields['Field'];
		
				$schema .= '  ' . $fields['Field'] . ' ' . $fields['Type'];
		
				if (strlen($fields['Default']) > 0) $schema .= ' default \'' . $fields['Default'] . '\'';
		
				if ($fields['Null'] != 'YES') $schema .= ' not null';
		
				if (isset($fields['Extra'])) $schema .= ' ' . $fields['Extra'];
		
				$schema .= ',' . "\n";
			}
		
			$schema = ereg_replace(",\n$", '', $schema);
		
			// add the keys
			$index = array();
			$keys_query = tep_db_query("show keys from " . $table);
			while ($keys = tep_db_fetch_array($keys_query)) {
				$kname = $keys['Key_name'];
		
				if (!isset($index[$kname])) {
					$index[$kname] = array('unique' => !$keys['Non_unique'],
					'fulltext' => ($keys['Index_type'] == 'FULLTEXT' ? '1' : '0'),
					'columns' => array());
				}
			
				$index[$kname]['columns'][] = $keys['Column_name'];
			}
		
			while (list($kname, $info) = each($index)) {
				$schema .= ',' . "\n";
				
				$columns = implode($info['columns'], ', ');
				
				if ($kname == 'PRIMARY') {
					$schema .= '  PRIMARY KEY (' . $columns . ')';
				} elseif ( $info['fulltext'] == '1' ) {
					$schema .= '  FULLTEXT ' . $kname . ' (' . $columns . ')';
				} elseif ($info['unique']) {
					$schema .= '  UNIQUE ' . $kname . ' (' . $columns . ')';
				} else {
					$schema .= '  KEY ' . $kname . ' (' . $columns . ')';
				}
			}
		
			$schema .= "\n" . ');' . "\n\n";
			@fputs($fp, $schema);
		
			// dump the data
			/*if ( ($table != TABLE_SESSIONS ) && ($table != TABLE_WHOS_ONLINE) ) {
				$rows_query = tep_db_query("select " . implode(',', $table_list) . " from " . $table);
				while ($rows = tep_db_fetch_array($rows_query)) {
					$schema = 'insert into ' . $table . ' (' . implode(', ', $table_list) . ') values (';
					
					reset($table_list);
					while (list(,$i) = each($table_list)) {
						if (!isset($rows[$i])) {
							$schema .= 'NULL, ';
						} elseif (tep_not_null($rows[$i])) {
							$row = addslashes($rows[$i]);
							$row = ereg_replace("\n#", "\n".'\#', $row);
							$schema .= '\'' . $row . '\', ';
						} else {
							$schema .= '\'\', ';
						}
					}
					$schema = ereg_replace(', $', '', $schema) . ');' . "\n";
					@fputs($fp, $schema);
				}
			}*/
		}
		
		@fclose($fp);
		
		header('Content-type: application/x-octet-stream');
		header('Content-disposition: attachment; filename=' . $backup_file);
		
		readfile(DIR_FS_BACKUP . $backup_file);
		//unlink(DIR_FS_BACKUP . $backup_file);
		exit;	
}















if((isset($ex_tb)&& $ex_tb!='')) {

$table=$ex_tb;
$ex_st=$_GET['ex_st'];
$ex_en=$_GET['ex_en'];
$ex_or=$_GET['ex_or'];		
		
		tep_set_time_limit(0);		
		$backup_file = 'db ('. DB_DATABASE.') ('.$ex_tb.') ('.$ex_st.' To '.$ex_en.') ('.date('YmdHis').').sql';
		
		$fp = fopen(DIR_FS_BACKUP . $backup_file, 'w');
		
				$table_list = array();
				$fields_query = tep_db_query("show fields from " . $table);
				while ($fields = tep_db_fetch_array($fields_query)) {
					$table_list[] = $fields['Field'];
					}	
			
				$rows_query = tep_db_query("select " . implode(',', $table_list) . " from " . $table." ORDER BY ".$ex_or." ASC LIMIT ".$ex_st.",".$ex_en." ");
				while ($rows = tep_db_fetch_array($rows_query)) {
					$schema = 'insert into ' . $table . ' (' . implode(', ', $table_list) . ') values (';
					
					reset($table_list);
					while (list(,$i) = each($table_list)) {
						if (!isset($rows[$i])) {
							$schema .= 'NULL, ';
						} elseif (tep_not_null($rows[$i])) {
							$row = addslashes($rows[$i]);
							$row = ereg_replace("\n#", "\n".'\#', $row);
							$schema .= '\'' . $row . '\', ';
						} else {
							$schema .= '\'\', ';
						}
					}
					
					
					$schema = ereg_replace(', $', '', $schema) . ');' . "\n";
					@fputs($fp, $schema);
				}
				 //ORDER BY id LIMIT ".$ex_st.",".$ex_en."
		
		
		
		@fclose($fp);
		
		header('Content-type: application/x-octet-stream');
		header('Content-disposition: attachment; filename=' . $backup_file);
		
		readfile(DIR_FS_BACKUP . $backup_file);
		//unlink(DIR_FS_BACKUP . $backup_file);
		exit;	
}











if((isset($ex_mx)&& $ex_mx!='')) {
		$table=$ex_mx;
		$ex_mx_or=$_GET['ex_mx_or'];	
		$query_sql="SELECT COUNT(*) AS total_id, MIN(".$ex_mx_or.") AS min_id, MAX(".$ex_mx_or.") AS max_id FROM ".$table;
		$query_exe=mysql_query($query_sql);
		$query_row=mysql_fetch_array($query_exe);		
		echo $table." (COUNT-ID) : ".$query_row['total_id'];
		echo "<br>";
		echo $table." (MIN-ID) : ".$query_row['min_id'];
		echo "<br>";	
		echo $table." (MAX-ID) : ".$query_row['max_id'];			
		exit;
		}
		








if((isset($ex_fi)&& $ex_fi!='')) {	
		unlink('../../../admin/includes/backups/'.$ex_fi);			
		exit;
		}
		


?>
