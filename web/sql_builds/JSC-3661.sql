
update newjs.PINCODE_MAPPING SET LOCALITY='North Delhi-1' WHERE LOCALITY='North Delhi' AND PINCODE IN(110007,110009,110033,110054);
update newjs.PINCODE_MAPPING SET LOCALITY='North Delhi-2' WHERE LOCALITY='North Delhi' AND PINCODE IN(110034,110035,110052,110088);
update newjs.PINCODE_MAPPING SET LOCALITY='North Delhi-3' WHERE LOCALITY='North Delhi' AND PINCODE IN(110085,110089);
update newjs.PINCODE_MAPPING SET LOCALITY='North Delhi-4' WHERE LOCALITY='North Delhi' AND PINCODE IN(110042,110056,110081,110083,110084,110086);

delete from newjs.PINCODE_MAPPING WHERE PINCODE IN(110082,110036,110039,110040) AND LOCALITY='North Delhi';

delete from jsadmin.AGENT_ALLOTED WHERE METHOD='FIELD_SALES' AND CENTER IN('Central Delhi','North Delhi','South West Delhi') ;
insert into jsadmin.AGENT_ALLOTED(USER,METHOD,CENTER,ALLOCATION_LIMIT) VALUES('','FIELD_SALES','North Delhi-1','20');
insert into jsadmin.AGENT_ALLOTED(USER,METHOD,CENTER,ALLOCATION_LIMIT) VALUES('','FIELD_SALES','North Delhi-2','20');
insert into jsadmin.AGENT_ALLOTED(USER,METHOD,CENTER,ALLOCATION_LIMIT) VALUES('','FIELD_SALES','North Delhi-3','20');
insert into jsadmin.AGENT_ALLOTED(USER,METHOD,CENTER,ALLOCATION_LIMIT) VALUES('','FIELD_SALES','North Delhi-4','20');

delete from incentive.SUB_LOCATION WHERE ID IN(125,126,127);
insert into incentive.SUB_LOCATION (LABEL,VALUE,PRIORITY) VALUES('North Delhi-1','DE0017','DE00');
insert into incentive.SUB_LOCATION (LABEL,VALUE,PRIORITY) VALUES('North Delhi-2','DE0018','DE00');
insert into incentive.SUB_LOCATION (LABEL,VALUE,PRIORITY) VALUES('North Delhi-3','DE0019','DE00');
insert into incentive.SUB_LOCATION (LABEL,VALUE,PRIORITY) VALUES('North Delhi-4','DE0020','DE00');