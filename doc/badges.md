Badges
======

Creating new badges
-------------------

1. Create new child class of `Badge` in `app\model\badges`. This class represents a "badge template" in the sense that these are not directly linked to user. Instead they are linked through `…UserBridge` entity that holds time and for example video of `VideoWatchedBadge`.
2. Create the `…UserBridge` class. If you need a new relation that does not yet have a column in `badge_user_bridges` table, add it in a migration from next step.
3. Create a migration that inserts new badge into `badges` table. `key` is class name without the `Badge` postfix.
4. Add the badge to `app\config\badges.neon`
5. If you are registering a new event, add it as constant to `EventList`
