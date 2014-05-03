Data
====

Postgres holds all data except relations, which are stored in Neo4j. Both must be backed up and are critical for the application.

ElasticSearch is used for fulltext search. Indices can be populated from postgres so it does not have to be backed up.

Redis is only used as low level temporary storage. Does not have to be backed up. Data is regenerated automatically.
