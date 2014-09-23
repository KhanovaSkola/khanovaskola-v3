Authentication
==============

User authentication has three states:

- ephemeral guest
- persisted guest
- registered (and logged in) user

Users that open the app are ephemeral by default and do not create a record in database.
Once ephemeral guests trigger an action that needs to be persisted (such as viewing a video,
posting a comment etc.) a user entity is persisted. Those users have no way to log in, so
once their session is lost, they loose all their data (though everything is persisted, there
is no way for us to pair the guest to the entity other than the original lost session).
Those users do not have neither name nor email address set. Instead of redirecting to authentication,
guest users are redirected to registration.

If ephemeral guest registers or logs in, nothing special happens. However if persisted guest
logs in or registers, data from the guest entity is merged into the main (fully registered) entity.
