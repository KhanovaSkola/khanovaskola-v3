Data
====

Postgres holds all data, including titles, descriptions etc which are also indexed with ElasticSearch. Must be backed up. Critical for the application.

ElasticSearch is used for fulltext search. Indices can be populated from postgres so it does not have to be backed up. If failing only search should break.

Redis is only used as low level temporary storage. Does not have to be backed up. Data is regenerated automatically.
