COPY RETAILER FROM '/home/sriramsk/Desktop/CSV/retailerdata.csv' DELIMITERS ',' csv;

COPY CATEGORY FROM '/home/sriramsk/Desktop/CSV/categorydata.csv' DELIMITERS ',' csv;
ALTER SEQUENCE category_c_id_seq RESTART 21;
insert into category values(DEFAULT,'stuff',0,0);

COPY WAREHOUSE FROM '/home/sriramsk/Desktop/CSV/warehousedata.csv' DELIMITERS ',' csv;
ALTER SEQUENCE warehouse_w_id_seq RESTART 11;

COPY SUPPLIER FROM '/home/sriramsk/Desktop/CSV/supplierdata.csv' DELIMITERS ',' csv;
ALTER SEQUENCE supplier_sup_id_seq RESTART 51;

COPY ITEMS FROM '/home/sriramsk/Desktop/CSV/itemdata.csv' DELIMITERS ',' csv;
ALTER SEQUENCE items_i_id_seq RESTART 51;

COPY BUY FROM '/home/sriramsk/Desktop/CSV/buydata.csv' DELIMITERS ',' csv;
ALTER SEQUENCE buy_buy_id_seq RESTART 51;

COPY SELL FROM '/home/sriramsk/Desktop/CSV/selldata.csv' DELIMITERS ',' csv;
ALTER SEQUENCE sell_sell_id_seq RESTART 51;

COPY W_MAP FROM '/home/sriramsk/Desktop/CSV/wmapdata.csv' DELIMITERS ',' csv;
COPY BUY_MAP FROM '/home/sriramsk/Desktop/CSV/buymapdata.csv' DELIMITERS ',' csv;
COPY SELL_MAP FROM '/home/sriramsk/Desktop/CSV/sellmapdata.csv' DELIMITERS ',' csv;
