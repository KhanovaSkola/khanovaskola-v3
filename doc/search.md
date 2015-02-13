Search
======

Search is implemented with Elasticsearch (es). Data in es is considered volatile and it
should always be possible to rebuild the index from other data sources (postgres in this case).

Setting up
----------

Install Elasticsearch from http://www.elasticsearch.org/overview/elkdownloads/. Install the ICU plugin https://github.com/elasticsearch/elasticsearch-analysis-icu, making sure you select the proper version for your version of es. Once set up, recreate es mappings by invoking the `elasticsearch:recreate` command and populate the index by invoking `elasticsearch:populate` (this might take a long time you your subtitle cache is empty).

Adding new synonyms
-------------------

Edit `synonyms.esn` file (see http://www.elasticsearch.org/guide/en/elasticsearch/guide/current/synonyms-expand-or-contract.html). Then invoke `elasticsearch:build-synonyms` which will update `synonyms.compiled.neon`. Make sure the compiled file  is ok. Commit both files.

All synonym changes require reindexing.

Elasticsearch mapping reasoning:
--------------------------------

We use whitespace tokenizer so we can add `atp.` as stopword while retaining `atp` as `adenosintrifosfát`.

In order to remove the special characters we use `pattern_replace` filter.
