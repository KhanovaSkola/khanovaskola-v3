Example SQL queries
-------------------

The following SQL queries might help you to understand how the Postgre DB is structured.


### Select videos and add information about blocks.
(this generates potentially more rows than there are videos since videos can be in multiple blocks)

```sql
SELECT ct.*, blocks.*
FROM "contents" ct 
JOIN content_block_bridges AS cbb
ON ct.id = cbb.content_id
JOIN blocks
ON blocks.id = cbb.block_id
```

### Add info about schema to the previous example

```sql
SELECT ct.*, blocks.*
FROM "contents" ct 
JOIN content_block_bridges AS cbb
ON ct.id = cbb.content_id
JOIN blocks
ON blocks.id = cbb.block_id
JOIN block_schema_bridges AS bsb
ON bsb.block_id = blocks.id
JOIN schemas AS sch
ON   sch.id = bsb.schema_id
```


### Filter out only videos in Math subject 
(subject_id=1 =Math in Czech DB)

```sql
SELECT ct.id "KS ID", ct.title "Název videa", ct.description "Popisek videa", to_char(CURRENT_DATE + ct.duration * INTERVAL '1 second','HH24:MI:SS') "Délka videa", bl.title "Název bloku", sch.title "Název schema", ct.youtube_id, ct.youtube_id_original, ct.hidden "Hidden video", sch.id "Schema ID", bl.id "block ID"
FROM "contents" AS ct
LEFT OUTER JOIN content_block_bridges AS cbb
ON ct.id = cbb.content_id
LEFT OUTER JOIN blocks AS bl
ON bl.id = cbb.block_id
LEFT OUTER JOIN block_schema_bridges AS bsb
ON bsb.block_id = bl.id
LEFT OUTER JOIN schemas AS sch
ON sch.id = bsb.schema_id
WHERE ct.type = 'video' AND sch.subject_id = 1
ORDER BY ct.id
```

