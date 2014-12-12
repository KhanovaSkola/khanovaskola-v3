ACL (Access control list)
=========================

Users have privileges. Privilege `all` means user has ultimate admin access and is allowed to do everything.

Besides user privileges, acl allows edits to authors and editors of the content itself and of all authors
and editors of content above in the hierarchy. For example, author of a block can only edit the block itself,
whereas the editor of the subject that contains the block can edit the subject, all contained schemas and all
blocks contained in those schemas.

Authorship is set upon creating the content and can never be changed. Editors can be set arbitrarily on the
respective content edit page.

Note that this ACL is by design flawed. Since schema editor allows to add any block, malicious user can
create a new schema, add any block and thus gain edit access to it. The current ACL prevents user mistakes,
but once a user gains a privilege to any node in the hierarchy, all lower nodes could be edited as well.
For example, gaining privileges to schema allows user to edit any block, but does not allow to edit any
subject or other schemas. Generic users without any privileges should not be able to bypass the system.

Privileges are only given to handpicked reliable users.
